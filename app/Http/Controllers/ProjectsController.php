<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use CJAN\Http\Requests;
use CJAN\Http\Controllers\Controller;

use CJAN\Gateways\ProjectsGateway;

class ProjectsController extends Controller {

	protected $projectsGateway;

	public function __construct(ProjectsGateway $projectsGateway)
	{
		$this->projectsGateway = $projectsGateway;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$letter = $request->input('letter');
		if (!isset($letter) || !$letter) {
			$projects = $this->projectsGateway->findFeaturedProjects();
			Debugbar::info($projects);
			$data = array(
				'letter' => strtoupper($letter),
				'projects' => $projects
			);
			return view('projects', $data);
		}
		$projects = $this->projectsGateway->findProjectsByLetter($letter);
		$paginator = new LengthAwarePaginator(
			$projects['data'], 
			$projects['total'], 
			$projects['per_page'], 
			Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]);
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
	public function show($id, Request $request)
	{
		$snapshotFilter = $request->input('snapshot_filter', FALSE);
		$versionFilter = $request->input('version_filter', NULL);
		if (strcmp($snapshotFilter, 'on') == 0)
		{
			$snapshotFilter = TRUE;
		}
		$project = $this->projectsGateway->findById($id, $snapshotFilter, $versionFilter);
		Debugbar::info($project);
		$data = array(
			'id' => $id,
			'letter' => strtoupper($project['name'][0]),
			'project' => $project,
			'snapshot_filter' => $snapshotFilter,
			'version_filter' => $versionFilter
		);
		return view('project', $data);
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
