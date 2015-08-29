<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Auth;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\VersionsGateway;
use CJAN\Gateways\ProjectsGateway;
use CJAN\Gateways\TestRunsGateway;
use CJAN\Gateways\StatusesGateway;

use Illuminate\Http\Request;

class VersionsController extends Controller {

	protected $versionsGateway;
	protected $projectsGateway;
	protected $testRunsGateway;
	protected $statusesGateway;

	public function __construct(VersionsGateway $versionsGateway, ProjectsGateway $projectsGateway, 
		TestRunsGateway $testRunsGateway, StatusesGateway $statusesGateway)
	{
		$this->versionsGateway = $versionsGateway;
		$this->projectsGateway = $projectsGateway;
		$this->testRunsGateway = $testRunsGateway;
		$this->statusesGateway = $statusesGateway;
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
	public function show($projectId, $id, Request $request)
	{
		$statusIdFilter = $request->input('status_filter', NULL);
		$statusFilter = array();
		// $versionFilter = $request->input('version_filter', NULL);
		// if (strcmp($snapshotFilter, 'on') == 0)
		// {
		// 	$snapshotFilter = TRUE;
		// }
		$version = $this->versionsGateway->findById($id);
		Debugbar::info($version);
		$project = $version['project_artifact'];	
		Debugbar::info($project);
		$statuses = $this->statusesGateway->findAll();
		if (NULL === $statusIdFilter || !$statusIdFilter)
		{
			foreach ($statuses as $status)
			{
				$statusFilter[] = $status['id'];
			}
		}
		else
		{
			$statusFilter = array($statusIdFilter);
		}
		$testRuns = $this->testRunsGateway->findByVersionId($version['id'], $statusFilter);
		Debugbar::info($testRuns);
		$letter = strtoupper($project['name'][0]);
		$data = array(
			'id' => $id,
			'version' => $version,
			'project' => $project,
			'testRuns' => $testRuns,
			'letter' => $letter,
			'statusFilter' => $statusIdFilter,
			'statuses' => $statuses
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
