<?php namespace CJAN\Models;

class Test extends BaseModel {

	protected $table = 'tests';

	protected $fillable = ['name', 'test_run_id', 'metadata', 'status_id'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'required|min:7|max:50',
			'test_run_id' => 'required|numeric',
			'status_id' => 'required|numeric',
		),
		"update" => array(
			'name' => 'required|min:7|max:50',
			'test_run_id' => 'required|numeric',
			'status_id' => 'required|numeric',
		)
	);
	
	public function status() 
	{
		return $this->belongsTo('CJAN\Models\Status');
	}

	public function testRun()
	{
		return $this->belongsTo('CJAN\Models\TestRun');
	}

}
