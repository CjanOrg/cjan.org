<?php namespace CJAN\Gateways;

class ProjectGateway {

	protected $projectRepository;

	public __construct(ProjectRepository $projectRepository)
	{
		$this->projectRepository = $projectRepository;
	}

	public function findProjectsByLetter($letter)
	{
		return array();
	}

}