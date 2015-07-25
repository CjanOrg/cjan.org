<?php namespace CJAN\Gateways;

use CJAN\Repositories\VersionsRepository;

class VersionsGateway {

	protected $versionsRepository;

	public function __construct(VersionsRepository $versionsRepository)
	{
		$this->versionsRepository = $versionsRepository;
	}

	public function findById($id)
	{
		return $this->versionsRepository->findById($id);
	}

}