<?php namespace CJAN\Repositories;

use CJAN\Models\User;
use CJAN\Models\Test;

class DbUserRepository implements UserRepository {

	public function findByUsername($username)
	{
		return User::
			where('name', '=', $username)
			->first()
			->toArray();
	}

}
