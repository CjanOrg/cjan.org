<?php namespace CJAN\Repositories;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;

class DbProjectRepository extends DbBaseRepository implements ProjectRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	function findProjectsByLetter($letter)
	{
		$projectArtifactIdsWithLetter = ProjectArtifactId::
			where('letter', '=', $letter)
			->get();
		return $projectArtifactIdsWithLetter->toArray();
	}

}
