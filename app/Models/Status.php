<?php namespace CJAN\Models;

class Status extends BaseModel {

	protected $table = 'statuses';

	protected $fillable = ['id', 'name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:statuses|required|min:2|max:50'
		),
		"update" => array(
			'name' => 'unique:statuses|required|min:2|max:50'
		)
	);

}
