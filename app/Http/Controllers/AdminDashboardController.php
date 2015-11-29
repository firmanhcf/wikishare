<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Banner;
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

	public function addBanner(Request $request){
		$banner = new Banner();
		$banner->sequence = 1;

		$picture = "";

        if($request->hasFile('banner_photo'))
        {
            $file = $request->file('banner_photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
            $banner->photo = $picture;

        }

        if($request->hasFile('banner_photo'))
        {
            $destinationPath = public_path() . '/assets/img/';
            $request->file('banner_photo')->move($destinationPath, $picture);
        }

		if($banner->save()){
            return redirect()
			->back()
			->with('success', 'Banner telah ditambah');
        };
	}

	public function updateBanner(Request $request, $id){
		$banner = Banner::findOrFail($id);
		$picture = $banner->photo;

        if($request->hasFile('banner_photo'))
        {
            $file = $request->file('banner_photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
            $banner->photo = $picture;

        }

        if($request->hasFile('banner_photo'))
        {
            $destinationPath = public_path() . '/assets/img/';
            $request->file('banner_photo')->move($destinationPath, $picture);
        }

		if($banner->save()){
            return redirect()
			->back()
			->with('success', 'Banner telah diperbarui');
        };
	}

	public function deleteBanner($id){
		$destroy = Banner::destroy($id);
		return redirect()
			->back()
			->with('success', 'Banner telah dihapus');
	}

	public function blogSettings(){
		$static = Banner::where('sequence', '=', 0)->first();
		$banners = Banner::where('sequence', '!=', 0)->get();
		return view('admin.settings.blog', compact('static', 'banners'));
	}

	public function blogStaticImage(Request $request){
		$banner = Banner::where('sequence', '=', 0)->first();
		$picture = $banner->photo;

        if($request->hasFile('static_photo'))
        {
            $file = $request->file('static_photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
            $banner->photo = $picture;

        }

        if($request->hasFile('static_photo'))
        {
            $destinationPath = public_path() . '/assets/img/';
            $request->file('static_photo')->move($destinationPath, $picture);
        }

		if($banner->save()){
            return redirect()
			->back()
			->with('success', 'Gambar statis telah diperbarui');
        };
	}

}
