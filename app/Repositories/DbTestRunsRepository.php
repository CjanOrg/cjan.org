<?php namespace CJAN\Repositories;

use CJAN\Models\TestRun;
use CJAN\Models\Test;

class DbTestRunsRepository extends DbBaseRepository implements TestRunsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function findByVersionId($versionId)
	{
		$testRun = TestRun::
			where('project_version_id', $versionId)
			->with(['testsCount', 'javaVersion.javaVendor'])
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

}
