<?php namespace CJAN\Gateways;

use CJAN\Repositories\ProjectsRepository;

class ProjectsGateway {

	protected $projectsRepository;

	public function __construct(ProjectsRepository $projectsRepository)
	{
		$this->projectsRepository = $projectsRepository;
	}

	public function findProjectsByLetter($letter)
	{
		$letter = $letter[0];
		return $this->projectsRepository->findProjectsByLetter($letter);
	}

	public function findById($id)
	{
		return $this->projectsRepository->findById($id);
	}

	public function findFeaturedProjects()
	{
		return $this->projectsRepository->findFeaturedProjects(/* limit */ 20);
	}

}