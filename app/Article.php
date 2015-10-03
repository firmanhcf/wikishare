<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'slug', 'content', 'article_status', 'approval_status','user_id','category_id'];

	public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}