<?php namespace CJAN\Repositories;

use CJAN\Models\ProjectVersion;

class DbVersionsRepository extends DbBaseRepository implements VersionsRepository {

	public function __construct()
	{
		parent::__construct(NULL);
	}

	function findById($id)
	{
		$version = ProjectVersion::
			where('id', $id)
			->with(['projectArtifact', 'projectArtifact.projectGroupId'])
			->first();
		return $version->toArray();
	}

}
