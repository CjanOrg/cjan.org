<?php namespace CJAN\Repositories;

interface ProjectsRepository {

	public function findProjectsByLetter($letter);

	public function findById($id, $snapshotFilter, $versionFilter);

	public function findFeaturedProjects($limit);

	public function countPerUser($userId);

}
