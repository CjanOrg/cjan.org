<?php namespace CJAN\Models;

class JavaVendor extends BaseModel {

	protected $table = 'java_vendors';

	protected $fillable = ['name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:java_vendors|required|min:1|max:255',
		),
		"update" => array(
			'name' => 'unique:java_vendors|required|min:1|max:255',
		)
	);

	public function javaVersions() 
	{
		return $this->hasMany('CJAN\Models\JavaVersion');
	}

}
