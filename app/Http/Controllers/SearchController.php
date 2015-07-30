<?php namespace CJAN\Http\Controllers;

class SearchController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('search');
	}

}
