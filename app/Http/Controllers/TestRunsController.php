<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Auth;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\VersionsGateway;
use CJAN\Gateways\ProjectsGateway;
use CJAN\Gateways\TestRunsGateway;

use Illuminate\Http\Request;

class TestRunsController extends Controller {

	protected $versionsGateway;
	protected $projectsGateway;

	public function __construct(VersionsGateway $versionsGateway, ProjectsGateway $projectsGateway, 
		TestRunsGateway $testRunsGateway)
	{
		$this->versionsGateway = $versionsGateway;
		$this->projectsGateway = $projectsGateway;
		$this->testRunsGateway = $testRunsGateway;
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
	public function show($projectId, $versionId, $id)
	{
		$version = $this->versionsGateway->findById($versionId);
		$project = $version['project_artifact'];
		Debugbar::info($version);
		// $testRuns = $this->testRunsGateway->findByVersionId($version['id']);
		// Debugbar::info($testRuns);

		$testRun = $this->testRunsGateway->findById($id);
		Debugbar::info($testRun);
		$letter = strtoupper($project['name'][0]);
		$user = $testRun['user'];
		$data = array(
			'projectId' => $projectId,
			'versionId' => $versionId,
			'version' => $version,
			'project' => $project,
			'id' => $id,
			'testRun' => $testRun,
			'letter' => $letter,
			'user' => $user
		);
		return view('test_run', $data);
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
