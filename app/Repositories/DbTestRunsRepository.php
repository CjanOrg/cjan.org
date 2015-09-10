<?php namespace CJAN\Repositories;

use CJAN\Models\TestRun;
use CJAN\Models\Test;

class DbTestRunsRepository extends DbBaseRepository implements TestRunsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function findByVersionId($versionId, $statusIds)
	{
		$testRun = TestRun::
			where('project_version_id', $versionId)
			->whereIn('status_id', $statusIds)
			->with(['testsCount', 'javaVersion.javaVendor', 'user'])
			->orderBy('status_id', 'desc')
			->get();
		return $testRun->toArray();
	}

	public function findById($id, $direction)
	{
		$testRun = TestRun::
			where('id', '=', $id)
			->with(['javaVersion.javaVendor', 'user'])
			->firstOrFail();
		$tests = Test::
			where('test_run_id', '=', $testRun['id'])
			->with(['status'])
			->orderBy('status_id', $direction)
			->paginate(36);

		$testRunArray = $testRun->toArray();
		$testRunArray['tests'] = $tests->toArray();

		return $testRunArray;
	}

	public function findByUserId($userId)
	{
		$testRuns = TestRun::
			where('user_id', '=', $userId)
			->with(['javaVersion.javaVendor', 'user', 'tests'])
			->paginate(12);

		return $testRuns->toArray();
	}

}
