<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller {

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = \App\ArticleCategory::get();
		$articles = \App\Article::orderBy('created_at', 'desc')->get();
		return view('member.index', compact('categories', 'articles'));
	}

	public function getSettings()
	{
		return view('member.settings');
	}

	public function postSettings(Request $request)
	{
		$this->validate($request, [
	        'email' => 'required|email'
	    ],
	    [
	    	'required' => 'Silahkan masukkan :attribute Anda',
	    	'email' => 'Masukkan format email dengan benar, contoh: namasaya@vendor.com'
	    ]);

		$user = User::findOrFail(\Auth::user()->id);
		$user->name = $request->name;
		$user->email = $request->email;

		if($user->save()){
            return redirect()
			->back()
			->with('success', 'Profil Anda telah diperbarui');
        };

        return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menyimpan password, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	public function postPassword(Request $request){

		$this->validate($request, [
	        'password_lama' => 'required',
	        'password_baru' => 'required|min:8|max:20|confirmed',
	    ],
	    [
	    	'required' => 'Silahkan masukkan :attribute Anda',
	    	'min' => ':attribute harus terdiri atas minimal 8 karakter',
	    	'max' => ':attribute harus terdiri atas maksimal 20 karakter',
	    	'confirmed' => 'Password baru dan konfirmasi password tidak cocok'
	    ]);

	    $user = User::findOrFail(\Auth::user()->id);

		if(!\Hash::check($request->password_lama, $user->password)){
            return redirect()
					->back()
					->withErrors([
						'err_msg' => 'Password lama yang Anda masukkan salah, silahkan masukkan password lama dengan benar.',
					]);
        }

	    $user->password = \Hash::make($request->password_baru);
        if($user->save()){
            return redirect()
			->back()
			->with('success', 'Password Anda berhasil diubah');
        };

        return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menyimpan password, silahkan coba kembali beberapa saat lagi.',
			]);
	}

}
