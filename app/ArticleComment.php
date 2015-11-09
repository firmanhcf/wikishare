<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model {

	protected $table = 'article_comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['article_id', 'user_id', 'comment', 'rating', 'is_deleted', 'deleted_by'];

	public function article(){
		return $this->belongsTo('App\Article', 'article_id');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

	public function userRating(){
        return $this->hasMany('App\ArticleCommentRating', 'comment_id');
    }

    public function deletedBy(){
		return $this->belongsTo('App\User', 'deleted_by');
	}

}
