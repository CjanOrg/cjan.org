<?php namespace CJAN\Repositories;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;
use CJAN\Models\Test;

class DbTestRepository extends DbBaseRepository implements TestRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function countPerUser($userId)
	{
		return Test::
			join('test_runs', 'test_runs.id', '=', 'tests.test_run_id')
			->where('test_runs.user_id', '=', $userId)
			->get()
			->count();
	}

}
