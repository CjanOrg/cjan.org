<?php namespace CJAN\Repositories;

use CJAN\Models\Status;

class DbStatusRepository extends DbBaseRepository implements StatusRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function findAll()
	{
		return Status::
			all()
			->toArray();
	}

}
