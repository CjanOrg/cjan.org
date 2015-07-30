<?php namespace CJAN\Models;

class OsName extends BaseModel {

	protected $table = 'os_names';

	protected $fillable = ['name', 'os_family_id'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:os_names|required|min:1|max:255',
			'os_family_id' => 'required|numeric'
		),
		"update" => array(
			'name' => 'unique:os_names|required|min:1|max:255',
			'os_family_id' => 'required|numeric'
		)
	);

	public function osFamily()
	{
	 	return $this->belongsTo('CJAN\Models\OsFamily');
	}

	public function oses() 
	{
		return $this->hasMany('CJAN\Models\Os');
	}

}
