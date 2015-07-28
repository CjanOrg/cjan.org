<?php namespace CJAN\Http\Controllers;

use Log;

class UploadController extends Controller {

	public function __construct()
	{

	}

	public function postResults()
	{
		Log::info(Request::all());
	}

}
