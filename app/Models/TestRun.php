<?php namespace CJAN\Models;

class TestRun extends BaseModel {

	protected $table = 'test_runs';

	protected $fillable = ['ip_address', 'locale', 'timezone', 'platform_encoding', 'user_id', 'java_version_id', 'project_version_id', 'os_id', 'status_id'];

	protected static $_rules = array(
		"create" => array(
			'ip_address' => 'required|min:7|max:50',
			'locale' => 'min:1|max:50',
			'timezone' => 'min:1|max:50',
			'platform_encoding' => 'min:1|max:50',
			'user_id' => 'required|numeric',
			'java_version_id' => 'required|numeric',
			'project_version_id' => 'required|numeric',
			'os_id' => 'required|numeric',
			'status_id' => 'required|numeric',
		),
		"update" => array(
			'ip_address' => 'required|min:7|max:50',
			'locale' => 'min:1|max:50',
			'timezone' => 'min:1|max:50',
			'platform_encoding' => 'min:1|max:50',
			'user_id' => 'required|numeric',
			'java_version_id' => 'required|numeric',
			'project_version_id' => 'required|numeric',
			'os_id' => 'required|numeric',
			'status_id' => 'required|numeric',
		)
	);

	public function user() 
	{
		return $this->belongsTo('CJAN\Models\User');
	}

	public function javaVersion()
	{
		return $this->belongsTo('CJAN\Models\JavaVersion');
	}

	public function projectVersion() 
	{
		return $this->belongsTo('CJAN\Models\ProjectVersion');
	}

	public function os() 
	{
		return $this->belongsTo('CJAN\Models\Os');
	}
	
	public function status() 
	{
		return $this->belongsTo('CJAN\Models\Status');
	}

	public function tests()
	{
		return $this->hasMany('CJAN\Models\Test');
	}

	public function testsCount()
	{
		return $this->tests()
			->selectRaw('test_run_id, count(*) as aggregate')
			->groupBy('test_run_id');
	}

}
