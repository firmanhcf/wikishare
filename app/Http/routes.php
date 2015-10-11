<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 					['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', 				['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('kategori-artikel', 		['as' => 'article', 'uses' => 'HomeController@article']);
Route::get('artikel/{id}/{slug}', 	['as' => 'detail', 'uses' => 'HomeController@detail']);
Route::get('pencarian', 			['as' => 'search', 'uses' => 'HomeController@search']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['domain' => env('APP_BASE_DOMAIN'), 'middleware' => 'auth'], function(){

	Route::get('artikel', 					['as' => 'profile', 'uses' => 'MemberController@index']);
	Route::post('artikel', 					['as' => 'article.store', 'uses' => 'ArticleController@store']);
	Route::get('artikel/{id}/edit/view', 	['as' => 'article.edit', 'uses' => 'ArticleController@edit']);
	Route::post('artikel/{id}/edit/action', ['as' => 'article.edit.action', 'uses' => 'ArticleController@update']);
	Route::get('artikel/{id}/hapus/action', ['as' => 'article.remove', 'uses' => 'ArticleController@destroy']);

	Route::get('pengaturan', 				['as' => 'member.settings.view', 'uses' => 'MemberController@getSettings']);
	Route::post('pengaturan/profil', 		['as' => 'member.settings.action', 'uses' => 'MemberController@postSettings']);
	Route::post('pengaturan/password', 		['as' => 'member.settings.password', 'uses' => 'MemberController@postPassword']);
	
	Route::get('dashboard', 				['as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@index']);


	Route::get('members', 					['as' => 'admin.member', 'uses' => 'AdminMemberController@index']);
	Route::post('member', 					['as' => 'admin.member.add', 'uses' => 'AdminMemberController@store']);
	Route::post('member/{id}/password', 	['as' => 'admin.member.password', 'uses' => 'AdminMemberController@password']);
	Route::post('member/{id}/block', 		['as' => 'admin.member.block', 'uses' => 'AdminMemberController@block']);
	Route::post('member/{id}/unblock', 		['as' => 'admin.member.unblock', 'uses' => 'AdminMemberController@unblock']);
	Route::get('member/{id}/edit', 			['as' => 'admin.member.edit.view', 'uses' => 'AdminMemberController@edit']);
	Route::post('member/{id}/edit', 		['as' => 'admin.member.edit.action', 'uses' => 'AdminMemberController@update']);

	Route::get('articles', 							['as' => 'admin.article', 'uses' => 'AdminArticleController@index']);
	Route::post('article/category/add', 			['as' => 'admin.article.category.add', 'uses' => 'AdminArticleController@storeCategory']);
	Route::post('article/category/{id}/remove', 	['as' => 'admin.article.category.remove', 'uses' => 'AdminArticleController@destroyCategory']);
	Route::post('article/category/{id}/edit', 		['as' => 'admin.article.category.edit', 'uses' => 'AdminArticleController@updateCategory']);
	Route::post('article/{id}/accept', 				['as' => 'admin.article.accept', 'uses' => 'AdminArticleController@acceptArticle']);
	Route::post('article/{id}/reject', 				['as' => 'admin.article.reject', 'uses' => 'AdminArticleController@rejectArticle']);
	
});
