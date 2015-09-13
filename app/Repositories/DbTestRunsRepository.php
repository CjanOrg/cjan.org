<?php namespace CJAN\Repositories;

use DB;

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
			select('test_runs.*')
			->join(DB::raw(
				"(SELECT tr.*, max(tr.updated_at) max_updated_at " .
    			"from test_runs tr " .
    			"GROUP BY " .
    			"tr.user_id, " .
				"tr.java_version_id, " .
				"tr.timezone, " .
				"tr.locale, " .
				"tr.platform_encoding, ".
				"tr.status_id) tr "
			), function($join) {
				$join->on('test_runs.updated_at', '=', 'tr.max_updated_at');
				$join->on('test_runs.user_id', '=', 'tr.user_id');
				$join->on('test_runs.java_version_id', '=', 'tr.java_version_id');
				$join->on('test_runs.timezone', '=', 'tr.timezone');
				$join->on('test_runs.locale', '=', 'tr.locale');
				$join->on('test_runs.platform_encoding', '=', 'tr.platform_encoding');
			})
			->where('test_runs.project_version_id', $versionId)
			->whereIn('test_runs.status_id', $statusIds)
			->with(['testsCount', 'javaVersion.javaVendor', 'user'])
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
			->with(['javaVersion.javaVendor', 'user', 'tests', 'projectVersion.projectArtifact'])
			->orderBy('created_at', 'DESC')
			->paginate(12);

		return $testRuns->toArray();
	}

	public function deleteById($id)
	{
		TestRun::destroy($id);
	}

}
