<?php namespace CJAN\Gateways;

use CJAN\Repositories\ProjectRepository;

class ProjectGateway {

	protected $projectRepository;

	public function __construct(ProjectRepository $projectRepository)
	{
		$this->projectRepository = $projectRepository;
	}

	public function findProjectsByLetter($letter)
	{
		return array();
	}

}