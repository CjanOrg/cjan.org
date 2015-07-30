<?php namespace CJAN\Models;

class ProjectGroupId extends BaseModel {

	protected $table = 'project_group_ids';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:project_group_ids|required|min:1|max:255',
		),
		"update" => array(
			'name' => 'unique:project_group_ids|required|min:1|max:255',
		)
	);
	
	public function projectArtifactIds()
	{
		return $this->hasMany('CJAN\Models\ProjectArtifactId');
	}

}
