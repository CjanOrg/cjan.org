<?php namespace CJAN\Http\Controllers;

use Es;

class SearchController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		// FIXME: call ElasticSearch
		return view('search');
	}

}
