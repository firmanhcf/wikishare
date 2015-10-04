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
			'name' => 'Firman',
			'username' => 'firmanhcf',
			'email' => 'firmanhcf@outlook.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Hidayat',
			'username' => 'hidayat',
			'email' => 'firmanhidayat@outlook.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Choirul',
			'username' => 'choirul',
			'email' => 'firman.fattah@hotmail.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Fattah',
			'username' => 'fattah',
			'email' => 'fattahfirman@gmail.com',
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		
	}

}
