<?php namespace CJAN\Models;

class OsArch extends BaseModel {

	protected $table = 'os_archs';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:os_names|required|min:1|max:255',
		),
		"update" => array(
			'name' => 'unique:os_names|required|min:1|max:255',
		)
	);

	public function oses() 
	{
		return $this->hasMany('CJAN\Models\Os');
	}

}
