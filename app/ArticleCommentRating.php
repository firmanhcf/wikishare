<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCommentRating extends Model {

	protected $table = 'article_comment_ratings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['comment_id', 'rater_id', 'rating'];

}
