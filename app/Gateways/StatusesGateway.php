<?php namespace CJAN\Gateways;

use CJAN\Repositories\StatusRepository;

class StatusesGateway {

	protected $statusRepository;

	public function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;
	}

	public function findAll()
	{
		return $this->statusRepository->findAll();
	}

}