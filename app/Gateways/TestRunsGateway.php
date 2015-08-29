<?php namespace CJAN\Gateways;

use CJAN\Repositories\TestRunsRepository;

use CJAN\Http\Controllers\Controller;

class TestRunsGateway {

	protected $testRunsRepository;

	public function __construct(TestRunsRepository $testRunsRepository)
	{
		$this->testRunsRepository = $testRunsRepository;
	}

	public function findByVersionId($versionId, $statusIds)
	{
		return $this->testRunsRepository->findByVersionId($versionId, $statusIds);
	}

	public function findById($id, $o, $w)
	{
		// $o is not used at the moment, as we are sorting only by status for now. Thus it is
		// not passed to the repository yet.

		$direction = 'ASC';
		if ($w === Controller::DESC)
		{
			$direction = 'DESC';
		}
		return $this->testRunsRepository->findById($id, $direction);
	}

}