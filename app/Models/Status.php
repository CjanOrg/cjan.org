<?php namespace CJAN\Models;

class Status extends BaseModel {

	const SUCCESS = 1;
	const FAILURE = 2;
	const SKIP = 3;
	const UNKNOWN = 4;

	protected $table = 'statuses';

	protected $fillable = ['id', 'name'];

	protected static $_rules = array(
		"create" => array(
			'name' => 'unique:statuses|required|min:1|max:50'
		),
		"update" => array(
			'name' => 'unique:statuses|required|min:1|max:50'
		)
	);

	// FIXME: check Eloquent doc, no need to fetch from DB
	public static function getStatus($id)
	{
		switch ((int) $id)
		{
			case self::SUCCESS:
				return Status::where('id', '=', self::SUCCESS)->firstOrFail();
			case self::FAILURE:
				return Status::where('id', '=', self::FAILURE)->firstOrFail();
			case self::SKIP:
				return Status::where('id', '=', self::SKIP)->firstOrFail();
			default:
				return Status::where('id', '=', self::UNKNOWN)->firstOrFail();
		}
	}

	public static function getStatusId($name)
	{
		if (strcmp('SUCCESS', $name) === 0)
		{
			return self::SUCCESS;
		}
		if (strcmp('FAILURE', $name) === 0)
		{
			return self::FAILURE;
		}
		if (strcmp('SKIP', $name) === 0)
		{
			return self::SKIP;
		}
		return self::UNKNOWN;
	}

}
