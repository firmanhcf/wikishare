<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class AdminMemberController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = \App\User::where('admin','=', 0)->orWhere('admin','=', 2)->orWhere('admin','=', 3)->get();
		$divisions = \App\Division::get();
		return view('admin.member.index', compact('members', 'divisions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'alamat_email' => 'required|email|unique:users,email',
			'username' => 'required|min:3|max:20|alpha_num|unique:users,username'
		],[
			'required' => 'Silahkan masukkan :attribute member baru Anda',
			'email' => 'format email harus benar, contoh: nama@domain.com',
			'min' => 'Kolom :attribute minimal terdiri atas :min karakter',
			'max' => 'Kolom :attribute maksimal terdiri atas :max karakter',
			'alpha_num' => ':attribute harus alpha numeric',
			'unique' => ':attribute ini sudah pernah digunakan, masukkan :attribute yang lain'
		]);

		$newPwd = str_random(6);

		$newUser = new User();
		$newUser -> name = $request -> nama;
		$newUser -> username = $request -> username;
		$newUser -> email = $request -> alamat_email;
		$newUser -> password = bcrypt($newPwd);
		$newUser -> confirmation_code = md5(microtime() . env('APP_KEY'));
		$newUser -> admin = $request -> admin;
		$newUser -> division_id = $request -> division_id;

		if($newUser -> save()){
			//Send Email
			\Mail::send('emails.new_user', [
				'username' => $newUser -> username,
				'newPwd' => $newPwd
			], function($message) use($newUser)
			{
				$message->from('no-reply@share2gather.com', 'Share2gather');
			    $message->to($newUser -> email, $newUser -> username)->subject('Selamat Datang di Share2gather!');
			});

			return redirect()
			->back()
			->with('success', 'Member baru berhasil ditambahkan, informasi username dan password dikirimkan ke alamat email.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menambahkan member, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function password($id)
	{
		$newPwd = str_random(6);
		$newUser = User::findOrFail($id);
		$newUser -> password = bcrypt($newPwd);

		if($newUser -> save()){
			//Send Email
			\Mail::send('emails.reset_password', [
				'username' => $newUser -> username,
				'newPwd' => $newPwd
			], function($message) use($newUser)
			{
				$message->from('no-reply@share2gather.com', 'Share2gather');
			    $message->to($newUser -> email, $newUser -> username)->subject('Anda memiliki password baru!');
			});

			return redirect()
			->back()
			->with('success', 'Reset password berhasil, informasi password baru dikirimkan ke alamat email member.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat melakukan reset password, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$divisions = \App\Division::get();
		return view('admin.member.create_edit', compact('user', 'divisions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
	        'email' => 'required|email'
	    ],
	    [
	    	'required' => 'Silahkan masukkan :attribute Anda',
	    	'email' => 'Masukkan format email dengan benar, contoh: namasaya@vendor.com'
	    ]);

		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->admin = $request->admin;
		$user->division_id = $request->division_id;

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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function block($id)
	{
		$newUser = User::findOrFail($id);
		$newUser -> active = false;

		if($newUser -> save()){
			
			return redirect()
			->back()
			->with('success', 'Memblokir member berhasil.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat memblokir member, silahkan coba kembali beberapa saat lagi.',
			]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function unblock($id)
	{
		$newUser = User::findOrFail($id);
		$newUser -> active = true;

		if($newUser -> save()){
			
			return redirect()
			->back()
			->with('success', 'Mengaktifkan member berhasil.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat mengaktifkan member, silahkan coba kembali beberapa saat lagi.',
			]);
	}

}
