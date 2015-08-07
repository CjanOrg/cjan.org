<?php namespace CJAN\Models;

class ProjectVersion extends BaseModel {

	protected $table = 'project_versions';

	protected $fillable = ['name', 'snapshot', 'project_artifact_id_id'];

	public function projectArtifact()
	{
		return $this->belongsTo('CJAN\Models\ProjectArtifactId', 'project_artifact_id_id');
	}

	public static function isSnapshot($name)
	{
		$snapshot = FALSE;
		if ($name && strcmp(trim($name), "") !== 0)
		{
			$snapshot = strpos(strtolower($name), 'snapshot') !== FALSE;
		}
		return $snapshot;
	}

}
