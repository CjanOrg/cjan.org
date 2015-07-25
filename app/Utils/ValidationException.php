<?php namespace CJAN\Utils;

use Illuminate\Support\MessageBag;

use Exception;

class ValidationException extends Exception {

	private $errors;

	public function __construct(MessageBag $errors)
	{
		$this->errors = $errors;
		parent::__construct(null);
	}

	public function getErrors()
	{
		return $this->errors;
	}

}
