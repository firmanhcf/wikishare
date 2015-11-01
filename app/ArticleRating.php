<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleRating extends Model {

	protected $table = 'article_ratings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['article_id', 'rater_id', 'rating'];

}
