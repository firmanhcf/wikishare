<?php namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\ArticleCategory;

use Illuminate\Http\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = ArticleCategory::orderBy('created_at', 'asc')
								     ->take(5)
								     ->get();
		$articles = Article::where('approval_status', '=', 'accepted')
						   ->orderBy('created_at', 'desc')
						   ->paginate(3);
		return view('front.home', compact('categories', 'articles'));
	}

	public function article()
	{
		$categories = ArticleCategory::get();
		$articles = Article::where('approval_status', '=', 'accepted')
						   ->orderBy('created_at', 'desc')
						   ->take(5)
						   ->get();
		return view('front.article', compact('categories','articles'));
	}

	public function detail($id, $slug)
	{
		$article = Article::findOrFail($id);
		$categories = ArticleCategory::orderBy('created_at', 'asc')
								     ->take(5)
								     ->get();
		$related = Article::where('approval_status', '=', 'accepted')
						   ->where('id','!=',$id)
						   ->where('category_id','=',$article->category_id)
						   ->orderBy('created_at', 'desc')
						   ->take(5)
						   ->get();
		
		return view('front.detail', compact('article', 'categories', 'related'));
	}

	public function search(Request $request)
	{
		$categories = ArticleCategory::orderBy('created_at', 'asc')
								     ->take(5)
								     ->get();
		$queryBuilder = Article::query();
		if($request->has('kategori')){
			$queryBuilder -> category($request->kategori);
		}

		if($request->has('q')){
			$queryBuilder -> text($request->q);
		}

		$articles = $queryBuilder -> paginate(3);
		return view('front.search', compact('articles','categories'));
	}

}
