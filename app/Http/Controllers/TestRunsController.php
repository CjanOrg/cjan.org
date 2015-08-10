<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Auth;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\VersionsGateway;
use CJAN\Gateways\ProjectsGateway;
use CJAN\Gateways\TestRunsGateway;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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
	public function show($projectId, $versionId, $id, Request $request)
	{
		$w = $request->input('w', /*default*/ self::ASC);
		if (!$w || strcmp("", trim($w)) === 0 ||  !in_array(trim($w), [self::ASC, self::DESC]) || strcmp(sprintf("%d", self::DESC), trim($w)) === 0)
		{
			$w = self::ASC;
		}
		else
		{
			$w = self::DESC;
		}

		//$o = $request->input('o', /* only option*/ 3);
		$o = 3;

		$version = $this->versionsGateway->findById($versionId);
		$project = $version['project_artifact'];
		Debugbar::info($version);
		// $testRuns = $this->testRunsGateway->findByVersionId($version['id']);
		// Debugbar::info($testRuns);

		$testRun = $this->testRunsGateway->findById($id, $o, $w);
		Debugbar::info($testRun);
		$tests = $testRun['tests'];
		Debugbar::info($tests);
		$paginator = new LengthAwarePaginator(
			$tests['data'], 
			$tests['total'], 
			$tests['per_page'], 
			Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath(), 'query' => ["o" => $o, "w" => $w]]);
		Debugbar::info($paginator);
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
			'user' => $user,
			'tests' => $tests['data'],
			'paginator' => $paginator,
			'w' => $w
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
