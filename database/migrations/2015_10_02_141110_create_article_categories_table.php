<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_categories');
	}

}
