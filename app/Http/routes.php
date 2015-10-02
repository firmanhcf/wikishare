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

Route::get('/', 				['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/home', 			['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('artikel', 			['as' => 'article', 'uses' => 'HomeController@article']);
Route::get('artikel/detil', 	['as' => 'detail', 'uses' => 'HomeController@detail']);
Route::get('pencarian', 		['as' => 'search', 'uses' => 'HomeController@search']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['domain' => env('APP_BASE_DOMAIN'), 'middleware' => 'auth'], function(){

	Route::get('artikel', 					['as' => 'profile', 'uses' => 'MemberController@index']);
	Route::post('artikel', 					['as' => 'article.store', 'uses' => 'ArticleController@store']);
	Route::get('artikel/{id}/edit', 		['as' => 'article.edit', 'uses' => 'ArticleController@edit']);
	Route::post('artikel/{id}/edit', 		['as' => 'article.edit.action', 'uses' => 'ArticleController@update']);
	Route::get('artikel/{id}/hapus', 		['as' => 'article.remove', 'uses' => 'ArticleController@destroy']);


	Route::get('pengaturan', 				['as' => 'member.settings.view', 'uses' => 'MemberController@getSettings']);
	Route::post('pengaturan/profil', 		['as' => 'member.settings.action', 'uses' => 'MemberController@postSettings']);
	Route::post('pengaturan/password', 		['as' => 'member.settings.password', 'uses' => 'MemberController@postPassword']);
	
});
