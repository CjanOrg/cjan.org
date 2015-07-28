<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CJAN\Models\User;
use CJAN\Models\Group;
use CJAN\Models\Status;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersAndGroupsTablesSeeder');
		$this->call('StatusesTableSeeder');
	}

}

class UsersAndGroupsTablesSeeder extends Seeder {

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

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tests');
		DB::table('test_results');
		DB::table('statuses')->delete();

		Status::create(
			[
				'id' => 1,
				'name' => 'Success'
			]
		);

		Status::create(
			[
				'id' => 2,
				'name' => 'Failure'
			]
		);

		Status::create(
			[
				'id' => 3,
				'name' => 'Skip'
			]
		);

		Status::create(
			[
				'id' => 4,
				'name' => 'Unknown'
			]
		);
	}

}

