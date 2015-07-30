<?php namespace CJAN\Repositories;

use CJAN\Models\TestRun;

class DbTestRunsRepository extends DbBaseRepository implements TestRunsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	function findByVersionId($versionId)
	{
		$version = TestRun::
			where('project_version_id', $versionId)
			->with(['tests', 'javaVersion.javaVendor'])
			->get();
		return $version->toArray();
	}

}
