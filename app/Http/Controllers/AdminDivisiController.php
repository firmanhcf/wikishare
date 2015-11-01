<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Division;

use Illuminate\Http\Request;

class AdminDivisiController extends Controller {

	public function __construct()
	{

		$this->middleware('auth');
	}

	public function index()
	{
		$divisions = \App\Division::get();
		return view('admin.division.index', compact('divisions'));
	}

	public function store(Request $request)
	{
		$this->validate($request, 
			['nama' => 'required'], 
			['required' => 'Silahkan masukkan :attribute divisi']);

		$divisi = new Division();
		$divisi -> name = $request -> nama;

		if($divisi->save()){
			return redirect()
			->back()
			->with('success', 'Divisi baru telah disimpan.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat menyimpan divisi baru, silahkan coba kembali beberapa saat lagi.',
			]);	
	}

	public function destroy($id)
	{
		$allMembers = \App\User::where('division_id','=', $id)
									-> update(['division_id'=>1]);
		$div = \App\Division::destroy($id);
		return redirect()
			->back()
			->with('success', 'Divisi berhasil dihapus');
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, 
			['nama' => 'required'], 
			['required' => 'Silahkan masukkan :attribute divisi']);

		$div = Division::findOrFail($id);
		$div -> name = $request -> nama;

		if($div->save()){
			return redirect()
			->back()
			->with('success', 'Divisi telah diperbarui.');
		}

		return redirect()
			->back()
			->withErrors([
				'err_msg' => 'Terjadi kesalahan saat memperbarui divisi, silahkan coba kembali beberapa saat lagi.',
			]);
	}

}
