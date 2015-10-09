<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller {

	public function index()
	{
		$articles = \App\Article::where('approval_status','=','pending')->get();
		return view('admin.dashboard', $articles);
	}

}
