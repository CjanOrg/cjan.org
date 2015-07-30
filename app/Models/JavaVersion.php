<?php namespace CJAN\Models;

class JavaVersion extends BaseModel {

	protected $table = 'os_archs';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:os_archs|required|min:1|max:255',
		),
		"update" => array(
			'name' => 'unique:os_archs|required|min:1|max:255',
		)
	);

	public function javaVendor() 
	{
		return $this->belongsTo('CJAN\Models\JavaVedor');
	}

}
