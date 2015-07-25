<?php namespace CJAN\Models;


class ProjectGroupId extends BaseModel {

	protected $table = 'project_group_ids';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:project_group_ids|required|min:2|max:255',
		),
		"update" => array(
			'name' => 'unique:project_group_ids|required|min:2|max:255',
		)
	);
	// public function projectStatus()
	// {
	// 	return $this->belongsTo('Nestor\\Model\\ProjectStatus', 'project_statuses_id', 'id');
	// }
	// public function testsuites()
	// {
	// 	return $this->hasMany('Nestor\\Model\\TestSuite', 'project_id');
	// }

}
