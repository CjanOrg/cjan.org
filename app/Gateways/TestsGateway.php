<?php namespace CJAN\Gateways;

use CJAN\Repositories\TestRepository;

class TestsGateway {

	protected $testsRepository;

	public function __construct(TestRepository $testsRepository)
	{
		$this->testsRepository = $testsRepository;
	}

	public function countUserTests($userId)
	{
		return $this->testsRepository->countPerUser($userId);
	}

}