<?php namespace CJAN\Http\Controllers;

use Debugbar;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\VersionsGateway;
use CJAN\Gateways\ProjectsGateway;

use Illuminate\Http\Request;

class VersionsController extends Controller {

	protected $versionsGateway;
	protected $projectsGateway;

	public function __construct(VersionsGateway $versionsGateway, ProjectsGateway $projectsGateway)
	{
		$this->versionsGateway = $versionsGateway;
		$this->projectsGateway = $projectsGateway;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function show($projectId, $id)
	{
		$version = $this->versionsGateway->findById($id);
		Debugbar::info($version);
		$project = $this->projectsGateway->findById($projectId);
		Debugbar::info($project);
		$data = array(
			'id' => $id,
			'version' => $version,
			'project' => $project
		);
		return view('version', $data);
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
