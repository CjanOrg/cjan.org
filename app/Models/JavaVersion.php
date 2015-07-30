<?php namespace CJAN\Models;

class JavaVersion extends BaseModel {

	protected $table = 'java_versions';

	protected $fillable = ['name', 'java_vendor_id'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:java_versions|required|min:1|max:255',
			'java_vendor_id' => 'required|numeric'
		),
		"update" => array(
			'name' => 'unique:java_versions|required|min:1|max:255',
			'java_vendor_id' => 'required|numeric'
		)
	);

	public function javaVendor() 
	{
		return $this->belongsTo('CJAN\Models\JavaVendor');
	}

}
