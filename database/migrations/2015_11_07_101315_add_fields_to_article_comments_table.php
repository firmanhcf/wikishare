<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToArticleCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_comments', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
            $table->integer('deleted_by')->unsigned()->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_comments', function (Blueprint $table) {
            $table->dropColumn('is_deleted');
            $table->dropColumn('deleted_by')->unsigned();
        });
	}

}
