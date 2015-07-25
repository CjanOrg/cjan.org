<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Illuminate\Pagination\Paginator;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\ProjectGateway;

use Illuminate\Http\Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(ProjectGateway $projectGateway, Request $request)
	{
		$letter = $request->input('letter');
		if (!isset($letter) || !$letter) {
			return view('projects');
		}
		$projects = $projectGateway->findProjectsByLetter($letter);
		$paginator = new Paginator($projects['data'], $projects['total'], $projects['per_page']);
		$args['paginator'] = $paginator;
		Debugbar::info($projects);
		$data = array(
			'letter' => strtoupper($letter),
			'projects' => $projects['data'],
			'paginator' => $paginator
		);
		return view('projects_by_letter', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
