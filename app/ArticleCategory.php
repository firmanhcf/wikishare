<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model {

	protected $table = 'article_categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'slug'];

	public function article(){
		return $this->hasMany('App\Article', 'category_id')
					->where('articles.approval_status','=','accepted');
	}
}
