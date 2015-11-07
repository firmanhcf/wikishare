<?php

use Illuminate\Database\Seeder;

class ArticleCategoryTableSeeder extends Seeder {

	public function run()
	{

		\App\ArticleCategory::create([
			'name' => 'Arsitektur',
			'slug' => 'arsitektur'
		]);

		\App\ArticleCategory::create([
			'name' => 'Bisnis',
			'slug' => 'bisnis'
		]);

		\App\ArticleCategory::create([
			'name' => 'Hiburan',
			'slug' => 'hiburan'
		]);

		\App\ArticleCategory::create([
			'name' => 'Ide',
			'slug' => 'ide'
		]);

		\App\ArticleCategory::create([
			'name' => 'Lain-lain',
			'slug' => 'lain-lain'
		]);

		\App\ArticleCategory::create([
			'name' => 'Umum',
			'slug' => 'umum'
		]);

		\App\Division::create([
			'name' => 'Manajemen'
		]);

		\App\Division::create([
			'name' => 'IT'
		]);

		\App\Division::create([
			'name' => 'R&D'
		]);

		\App\Division::create([
			'name' => 'Produksi'
		]);
	}

}
