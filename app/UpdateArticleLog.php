<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateArticleLog extends Model {

	protected $table = 'update_article_log';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','article_id', 'count'];

	public function article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
