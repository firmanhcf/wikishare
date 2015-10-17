<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleCollaborator;
use App\UpdateArticleLog;

class ArticleController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, 
			['judul' => 'required',
			'isi' => 'required'], 
			['required' => 'Silahkan masukkan :attribute artikel Anda']);

		$article = new Article();
		$article -> title = $request -> judul;
		$article -> slug = str_slug($request -> judul, '-');
		$article -> category_id = $request -> category_id;
		$article -> content = $request -> isi;
		$article -> user_id = \Auth::user()->id;
		$article -> article_status = 'unpublished';
		$article -> approval_status = 'pending';

		if($article->save()){

			if($request->has('collaborator')){
				$collaborator = json_decode($request->collaborator);

				foreach ($collaborator as $item) {
					$collItem = new ArticleCollaborator();
					$collItem -> article_id = $article->id;
					$collItem -> user_id = $item;
					$collItem -> save();
				}

			}

			return redirect()
			->back()
			->with('success', 'Artikel telah dikirim untuk mendapatkan persetujuan administrator. Artikel akan segera dipublikasikan sesaat setelah disetujui oleh administrator.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat mengirim artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	
	public function edit($id)
	{
		$categories = \App\ArticleCategory::get();
		$article = \App\Article::findOrFail($id);
		$users = \App\User::where('id','!=', \Auth::user()->id)
					 ->where('admin', '=', 'false')
					 ->get();
		$collaborators = ArticleCollaborator::where('article_id', '=', $id)
												 ->get();

		foreach ($users as $item) {
			$item['is_collaborator'] = '';
			foreach ($collaborators as $coll) {
				if($item->id == $coll->user_id){
					$item['is_collaborator'] = 'checked';
				}
			}
		}

		$collArr = [];
		foreach ($collaborators as $coll) {
			array_push($collArr, $coll->user_id);
		}

		$coll_json = json_encode($collArr);

		return view('member.article_edit', compact('categories', 'article', 'users','coll_json'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, 
			['judul' => 'required',
			'isi' => 'required'], 
			['required' => 'Silahkan masukkan :attribute artikel Anda']);
		
		$article = \App\Article::findOrFail($id);
		$article -> title = $request -> judul;
		$article -> slug = str_slug($request -> judul, '-');
		$article -> category_id = $request -> category_id;
		$article -> content = $request -> isi;
		$article -> article_status = 'unpublished';
		$article -> approval_status = 'pending';


		if($request->has('collaborator')){
			$dell_coll = ArticleCollaborator::where('article_id', '=', $id)
												 ->delete();
			$collaborator = json_decode($request->collaborator);

			foreach ($collaborator as $item) {
				$collItem = new ArticleCollaborator();
				$collItem -> article_id = $article->id;
				$collItem -> user_id = $item;
				$collItem -> save();
			}
		}

		if($article->save()){

			// $update = UpdateArticleLog::where('user_id','=', \Auth::user()->id)
			// 							->where('article_id', '=', $article->id)
			// 							->first();

			// if(!$update){
				$update = new UpdateArticleLog();
				$update->user_id = \Auth::user()->id;
				$update->article_id = $article->id;
				$update->count = 1;
			// }
			// else{
			// 	$update->count = $update->count+1;
			// }

			if($update->save()){
				return redirect()
								->back()
								->with('success', 'Artikel telah diperbarui. Artikel akan segera dipublikasikan sesaat setelah disetujui oleh administrator.');
			}

			return redirect()
							->back()
							->withErrors([
								'err_msg' => 'Terjadi kesalahan saat memperbarui artikel, silahkan coba kembali beberapa saat lagi.',
							]);
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat memperbarui artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = \App\Article::destroy($id);
		return redirect()
			->back()
			->with('success', 'Artikel berhasil dihapus');
		
	}

}
