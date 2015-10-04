<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;

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
		return view('member.article_edit', compact('categories', 'article'));
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
		$article -> title = $request -> title;
		$article -> slug = str_slug($request -> title, '-');
		$article -> category_id = $request -> category_id;
		$article -> content = $request -> content;
		$article -> user_id = \Auth::user()->id;
		$article -> article_status = 'unpublished';
		$article -> approval_status = 'pending';

		if($article->save()){
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
