<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_comment_ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('comment_id')->unsigned();
			$table->integer('rater_id')->unsigned();
			$table->double('rating')->default(0.0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_comment_ratings');
	}

}
