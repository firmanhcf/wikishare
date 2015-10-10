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

}
