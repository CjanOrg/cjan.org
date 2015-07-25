<?php namespace CJAN\Repositories;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;

class DbProjectsRepository extends DbBaseRepository implements ProjectsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	function findProjectsByLetter($letter)
	{
		$projectArtifactIdsWithLetter = ProjectArtifactId::
			where('letter', '=', $letter)
			->with('projectGroupId')
			->paginate(12);
		return $projectArtifactIdsWithLetter->toArray();
	}

	function findById($id)
	{
		$project = ProjectArtifactId::
			where('id', $id)
			->with('projectGroupId')
			->with('projectVersions')
			->first();
		return $project->toArray();
	}

}
