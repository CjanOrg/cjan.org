<?php namespace CJAN\Models;

class ProjectArtifactId extends BaseModel {

	protected $table = 'project_artifact_ids';

	protected $fillable = ['name', 'letter', 'project_group_id_id'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:project_artifact_ids|required|min:1|max:255',
			'project_group_id_id' => 'required|numeric'
		),
		"update" => array(
			'name' => 'unique:project_artifact_ids|required|min:1|max:255',
			'project_group_id_id' => 'required|numeric'
		)
	);
	
	public function projectGroupId()
	{
	 	return $this->belongsTo('CJAN\Models\ProjectGroupId');
	}

	public function projectVersions() 
	{
		return $this->hasMany('CJAN\Models\ProjectVersion');
	}

	public function projectReleaseVersions()
	{
		return $this->hasMany('CJAN\Models\ProjectVersion')->where('snapshot', '=', FALSE);
	}

	public function projectSnapshotVersions()
	{
		return $this->hasMany('CJAN\Models\ProjectVersion')->where('snapshot', '=', TRUE);
	}

}
