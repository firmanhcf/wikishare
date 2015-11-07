<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$articles = \DB::select('select c.article_id as id, a.slug as slug, a.title as title, a.content as content,count(c.article_id) as comments, u.name as name, u.photo as photo, a.created_at as created_at  from article_comments as c, articles as a, users as u where c.article_id = a.id and u.id = a.user_id group by article_id order by comments desc limit 5');
		$users = \DB::select('select count(a.id) as articles, u.name as name, u.photo as photo from articles as a, users as u where a.user_id = u.id and a.approval_status = "accepted" group by a.user_id order by articles desc limit 5');

		$allArticles = \App\Article::where('approval_status','=','pending')->orderBy('updated_at', 'desc')->get();
		return view('admin.dashboard', compact('allArticles', 'articles', 'users'));
	}

}
