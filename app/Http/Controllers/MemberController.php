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
		$categories = \App\ArticleCategory::orderBy('name', 'asc')->get();
		$articles = \App\Article::where('user_id','=',\Auth::user()->id)
								->orderBy('updated_at', 'desc')
								->get();
		$collaborators = \App\ArticleCollaborator::where('user_id','=',\Auth::user()->id)
								->orderBy('created_at', 'desc')
								->get();
		$users = User::where('id','!=', \Auth::user()->id)
					 ->where('admin', '=', 'false')
					 ->get();

		return view('member.index', compact('categories', 'articles', 'users', 'collaborators'));
	}

	public function getSettings()
	{
		return view('member.settings');
	}

	public function getDashboard()
	{
		$articles = \DB::select('select c.article_id as id, a.slug as slug, a.title as title, a.content as content,count(c.article_id) as comments, u.name as name, u.photo as photo, a.created_at as created_at  from article_comments as c, articles as a, users as u where c.article_id = a.id and u.id = a.user_id group by article_id order by comments desc limit 5');
		$users = \DB::select('select count(a.id) as articles, u.name as name, u.photo as photo from articles as a, users as u where a.user_id = u.id and a.approval_status = "accepted" group by a.user_id order by articles desc limit 5');

		return view('member.dashboard', compact('articles', 'users'));
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

		$picture = $user->photo;

        if($request->hasFile('user_photo'))
        {
            $file = $request->file('user_photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
            $user->photo = $picture;

        }

        if($request->hasFile('user_photo'))
        {
            $destinationPath = public_path() . '/assets/img/';
            $request->file('user_photo')->move($destinationPath, $picture);
        }

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
