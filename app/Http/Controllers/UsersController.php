<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Auth;
use App;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\UsersGateway;
use CJAN\Gateways\ProjectsGateway;
use CJAN\Gateways\TestsGateway;
use CJAN\Gateways\TestRunsGateway;

class UsersController extends Controller {

	protected $usersGateway;
	protected $projectsGateway;
	protected $testsGateway;

	public function __construct(UsersGateway $usersGateway, ProjectsGateway $projectsGateway, TestsGateway $testsGateway,
		TestRunsGateway $testRunsGateway)
	{
		$this->usersGateway = $usersGateway;
		$this->projectsGateway = $projectsGateway;
		$this->testsGateway = $testsGateway;
		$this->testRunsGateway = $testRunsGateway;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		
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
	public function show($id, Request $request)
	{
		// using theuser so we don't confuse with a session-logged-in user
		$theuser = $this->usersGateway->findByUserName($id);
		Debugbar::info($theuser);
		$projectsCount = $this->projectsGateway->countUserProjects($theuser['id']);
		$testsCount = $this->testsGateway->countUserTests($theuser['id']);
		$data = array(
			'id' => $id,
			'theuser' => $theuser,
			'projects_count' => $projectsCount,
			'tests_count' => $testsCount
		);
		return view('user', $data);
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

	public function showTests($userId)
	{
		$user = Auth::user();
		// using theuser so we don't confuse with a session-logged-in user
		$theuser = $this->usersGateway->findByUserName($userId);
		Debugbar::info($theuser);
		$testRuns = $this->testRunsGateway->findByUserId($theuser['id']);
		Debugbar::info($testRuns);
		
		$paginator = new LengthAwarePaginator(
			$testRuns['data'], 
			$testRuns['total'], 
			$testRuns['per_page'], 
			Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]);

		$data = array(
			'user_id' => $userId,
			'theuser' => $theuser,
			'projects_count' => 0,
			'tests_count' => 0,
			'test_runs' => $testRuns['data'],
			'paginator' => $paginator
		);
		return view('test_runs_by_user', $data);
	}

	public function confirmDeleteTestRun($userId, $testRunId)
	{
		$user = Auth::user();
		$theuser = $this->usersGateway->findByUserName($userId);
		$testRun = $this->testRunsGateway->findById($testRunId, 3, self::ASC);

		if ($testRun['user_id'] != $user['id'])
		{
			App::abort(403, 'Unauthorized action.');
		}
		$data = array(
			'user_id' => $userId,
			'test_run_id' => $testRunId,
			'theuser' => $theuser,
			'test_run' => $testRun
		);
		return view('confirm_delete_user_test_run', $data);
	}

}
