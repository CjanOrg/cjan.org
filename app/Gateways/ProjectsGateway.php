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

	public function findById($id, $snapshotFilter, $versionFilter)
	{
		return $this->projectsRepository->findById($id, $snapshotFilter, $versionFilter);
	}

	public function findFeaturedProjects()
	{
		return $this->projectsRepository->findFeaturedProjects(/* limit */ 20);
	}

	public function countUserProjects($userId)
	{
		return $this->projectsRepository->countPerUser($userId);
	}

	public function findAllNoPagination($with = array())
	{
		return $this->projectsRepository->findAllNoPagination($with);
	}

}