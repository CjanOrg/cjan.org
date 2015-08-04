<?php namespace CJAN\Repositories;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;

class DbProjectsRepository extends DbBaseRepository implements ProjectsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	public function findProjectsByLetter($letter)
	{
		$projectArtifactIdsWithLetter = ProjectArtifactId::
			where('letter', '=', $letter)
			->with('projectGroupId')
			->paginate(12);
		return $projectArtifactIdsWithLetter->toArray();
	}

	public function findById($id)
	{
		$project = ProjectArtifactId::
			where('id', $id)
			->with('projectGroupId')
			->with('projectVersions')
			->first();
		return $project->toArray();
	}

	public function findFeaturedProjects($limit)
	{
		$projects = ProjectArtifactId::
			orderBy('created_at', 'desc')
			->with('projectGroupId')
			->limit($limit)
			->get();
		return $projects->toArray();
	}

}
