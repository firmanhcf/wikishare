<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run()
	{

		\App\User::create([
			'name' => 'Admin User',
			'username' => 'admin_user',
			'email' => 'admin@wikishare.com',
			'password' => bcrypt('admin'),
			'admin' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Firman Hidayat',
			'username' => 'firmanhcf',
			'email' => 'firmanhcf@outlook.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Dwi Putra',
			'username' => 'dwiputra',
			'email' => 'firmanhidayat@outlook.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Reni Sitompul',
			'username' => 'renisitompul',
			'email' => 'firman.fattah@hotmail.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Windy Sinaga',
			'username' => 'windysinaga',
			'email' => 'fattahfirman@gmail.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		
	}

}
