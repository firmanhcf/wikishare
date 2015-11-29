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

    public function updateLog(){
        return $this->hasMany('App\UpdateArticleLog', 'article_id')->orderBy('updated_at', 'desc');
    }

    public function scopeCategory($query, $id){
        return $query -> where('category_id', '=', $id)
                      -> where('approval_status', '=', 'accepted');
    }

    public function scopeText($query, $q){
        return $query -> where('title', 'like', '%'.$q.'%')
        			  -> orWhere('content', 'like', '%'.$q.'%')
                      -> where('approval_status', '=', 'accepted');
    }

    public function scopeAuthor($query, $id){
        return $query -> where('user_id', '=', $id)
                      -> where('approval_status', '=', 'accepted');
    }

    public function comment(){
        return $this->hasMany('App\ArticleComment', 'article_id')->orderBy('created_at', 'asc');
    }

    public function userRating(){
        return $this->hasMany('App\ArticleRating', 'article_id');
    }
}
