<?php namespace CJAN\Http\Controllers;

use Log;
use Request;

class UploadController extends Controller {

	public function __construct()
	{

	}

	public function postResults()
	{
		Log::info(Request::all());
	}

}
