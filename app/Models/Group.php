<?php namespace CJAN\Models;

class Group extends BaseModel {

	protected $table = 'groups';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:groups|required|min:2|max:50',
		),
		"update" => array(
			'name' => 'unique:groups|required|min:2|max:50',
		)
	);
	
	public function users()
	{
		return $this->belongsToMany('CJAN\Models\User', 'users_groups')->withTimestamps();
	}

}
