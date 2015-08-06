<?php namespace CJAN\Repositories;

use CJAN\Models\TestRun;

class DbTestRunsRepository extends DbBaseRepository implements TestRunsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function findByVersionId($versionId)
	{
		$testRun = TestRun::
			where('project_version_id', $versionId)
			->with(['tests.status', 'javaVersion.javaVendor'])
			->get();
		return $testRun->toArray();
	}

	public function findById($id)
	{
		$testRun = TestRun::
			where('id', '=', $id)
			->with(['tests.status', 'javaVersion.javaVendor', 'user'])
			->firstOrFail();
		return $testRun->toArray();
	}

}
