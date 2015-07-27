<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CJAN\Models\User;
use CJAN\Models\Group;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		DB::table('groups')->delete();

		$adminGroup = Group::create(
			[
				'name' => 'admin'
			]
		);

		$adminUser = User::create(
			[
				'name' => 'kinow',
				'access_token' => 'kinowkinowkinow',
				'email' => 'brunodepaulak@yahoo.com.br',
				'password' => Hash::make('kinowkinow')
			]
		);

		$adminGroup->users()->attach($adminUser->id);

	}

}

