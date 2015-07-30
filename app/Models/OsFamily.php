<?php namespace CJAN\Models;

class OsFamily extends BaseModel {

	protected $table = 'os_families';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:os_families|required|min:1|max:255',
		),
		"update" => array(
			'name' => 'unique:os_families|required|min:1|max:255',
		)
	);

	public function osNames()
	{
		return $this->hasMany('CJAN\Models\OsName');
	}

}
