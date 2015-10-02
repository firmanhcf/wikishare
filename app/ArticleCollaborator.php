<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCollaborator extends Model {

	protected $table = 'article_collaborator';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','article_id'];


}
