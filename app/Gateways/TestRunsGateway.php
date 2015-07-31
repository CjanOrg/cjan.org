<?php namespace CJAN\Gateways;

use CJAN\Repositories\TestRunsRepository;

class TestRunsGateway {

	protected $testRunsRepository;

	public function __construct(TestRunsRepository $testRunsRepository)
	{
		$this->testRunsRepository = $testRunsRepository;
	}

	public function findByVersionId($versionId)
	{
		return $this->testRunsRepository->findByVersionId($versionId);
	}

	public function findById($id)
	{
		return $this->testRunsRepository->findById($id);
	}

}