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

	public function findById($id, $snapshotFilter, $versionFilter)
	{
		$project = ProjectArtifactId::
			where('id', $id)
			->with('projectGroupId')
			->with(array('projectVersions' => function($query) use ($snapshotFilter, $versionFilter)
			{
				if ($snapshotFilter === TRUE)
				{
					$query->where('snapshot', '=', !$snapshotFilter);
				}
				if (isset($versionFilter) && strcmp("", trim($versionFilter)) !== 0)
				{
					$query->where('name', '=', $versionFilter);
				}
			}))
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

	public function countPerUser($userId)
	{
		return ProjectArtifactId::
			join('project_versions', 'project_artifact_ids.id', '=', 'project_versions.project_artifact_id_id')
			->join('test_runs', 'project_versions.id', '=', 'test_runs.project_version_id')
			->where('test_runs.user_id', '=', $userId)
			->groupBy('project_artifact_ids.id')
			->get()
			->count();
	}

}
