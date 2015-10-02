<?php

use Illuminate\Database\Seeder;

class ArticleCategoryTableSeeder extends Seeder {

	public function run()
	{

		\App\ArticleCategory::create([
			'name' => 'Umum'
		]);

		\App\ArticleCategory::create([
			'name' => 'Lain-lain'
		]);
	}

}
