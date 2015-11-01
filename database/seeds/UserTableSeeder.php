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
			'division_id' => 0,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Firman Hidayat',
			'username' => 'firmanhcf',
			'email' => 'firmanhcf@outlook.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 2,
			'division_id' => 2,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Dwi Putra',
			'username' => 'dwiputra',
			'email' => 'firmanhidayat@outlook.com',
			'admin' => 0,
			'division_id' => 2,
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Reni Sitompul',
			'username' => 'renisitompul',
			'email' => 'firman.fattah@hotmail.com',
			'admin' => 3,
			'division_id' => 2,
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Windy Sinaga',
			'username' => 'windysinaga',
			'email' => 'fattahfirman@gmail.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 0,
			'division_id' => 1,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Dewi Ayu',
			'username' => 'dewiayu',
			'email' => 'dewiayu@wikishare.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 0,
			'division_id' => 2,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Eviana',
			'username' => 'eviana',
			'email' => 'eviana@outlook.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 0,
			'division_id' => 3,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Fardani',
			'username' => 'fardani',
			'email' => 'fardani.a.a@outlook.com',
			'admin' => 0,
			'division_id' => 1,
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Diantika',
			'username' => 'diantika',
			'email' => 'dedeantika@hotmail.com',
			'admin' => 0,
			'division_id' => 2,
			'password' => bcrypt('wiki1234'),
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Soniya',
			'username' => 'soniya',
			'email' => 'soniya.m@gmail.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 0,
			'division_id' => 3,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);

		\App\User::create([
			'name' => 'Rani Putri',
			'username' => 'rani.p',
			'email' => 'rani.p@gmail.com',
			'password' => bcrypt('wiki1234'),
			'admin' => 3,
			'division_id' => 3,
			'confirmation_code' => md5(microtime() . env('APP_KEY')),
		]);
	}

}
