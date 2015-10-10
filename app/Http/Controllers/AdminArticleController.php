<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ArticleCategory;

class AdminArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = ArticleCategory::get();
		$allArticles = \App\Article::get();
		$myArticles = \App\Article::where('user_id','=',\Auth::user()->id)
								->orderBy('created_at', 'desc')
								->get();
		$collaborators = \App\ArticleCollaborator::where('user_id','=',\Auth::user()->id)
								->orderBy('created_at', 'desc')
								->get();
		$users = \App\User::where('id','!=', \Auth::user()->id)
					 ->where('admin', '=', 'false')
					 ->get();

		return view('admin.article.index', compact('categories', 'allArticles','myArticles', 'users', 'collaborators'));
	}

	public function acceptArticle($id){
		$article = App\Article::findOrFail($id);
		$article -> approval_status = 'accepted';
		if($article ->save()){
			return redirect() ->back()
							  ->with('success', 'Artikel telah disetujui dan dipublikasikan di halaman Wiki Share');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menyetujui Artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	public function rejectArticle($id){
		$article = App\Article::findOrFail($id);
		$article -> approval_status = 'rejected';
		if($article ->save()){
			return redirect() ->back()
							  ->with('success', 'Artikel telah ditolak');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menolak Artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeCategory(Request $request)
	{
		$this->validate($request, 
			['nama' => 'required'], 
			['required' => 'Silahkan masukkan :attribute kategori Anda']);

		$category = new ArticleCategory();
		$category -> name = $request -> nama;
		$category -> slug = str_slug($request -> nama, '-');

		if($category->save()){
			return redirect()
			->back()
			->with('success', 'Kategori Artikel telah disimpan.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat memperbarui kategori artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editCategory($id)
	{
		$category = ArticleCategory::findOrFail($id);
		return view('admin.article.create_edit_category', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateCategory($id, Request $request)
	{
		$this->validate($request, 
			['nama' => 'required'], 
			['required' => 'Silahkan masukkan :attribute kategory Anda']);

		$category = ArticleCategory::findOrFail($id);
		$category -> name = $request -> nama;
		$category -> slug = str_slug($request -> nama, '-');

		if($category->save()){
			return redirect()
			->back()
			->with('success', 'Kategori Artikel telah diperbarui.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat memperbarui kategori artikel, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyCategory($id)
	{
		$allArticles = \App\Article::where('category_id','=', $id)
									-> update(['category_id'=>2]);
		$cat = \App\ArticleCategory::destroy($id);
		return redirect()
			->back()
			->with('success', 'Kategori Artikel berhasil dihapus');
	}

}
