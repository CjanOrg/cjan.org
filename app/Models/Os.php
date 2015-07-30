<?php namespace CJAN\Models;

class Os extends BaseModel {

	protected $table = 'oses';

	protected $fillable = ['version', 'name', 'os_name_id', 'os_arch_id'];

	protected static $_rules = array(
		"create" => array(
			'version' => 'required|min:1|max:255',
			'os_name_id' => 'required|numeric',
			'os_arch_id' => 'required|numeric'
		),
		"update" => array(
			'version' => 'required|min:1|max:255',
			'os_name_id' => 'required|numeric',
			'os_arch_id' => 'required|numeric'
		)
	);

	public function osName()
	{
	 	return $this->belongsTo('CJAN\Models\OsName');
	}

	public function osArch() 
	{
		return $this->belongsTo('CJAN\Models\OsArch');
	}

}
