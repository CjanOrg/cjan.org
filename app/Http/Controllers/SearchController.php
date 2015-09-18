<?php namespace CJAN\Http\Controllers;

use Debugbar;
use Es;

use Exception;

use Auth;
use Log;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use CJAN\Gateways\ProjectsGateway;

class SearchController extends Controller {

	public function __construct(ProjectsGateway $projectsGateway)
	{
		$this->projectsGateway = $projectsGateway;
	}

	public function index(Request $request)
	{
		$q = $request->input('q');
		// FIXME: call ElasticSearch
		$searchParams['index'] = 'cjan_index';
		$searchParams['size'] = 12;
		$json = '
		{
			"query": {
			    "multi_match": {
			        "query":                "'.$q.'",
			        "type":                 "best_fields", 
			        "fields":               [ "artifactid^3", "groupid^2"],
			        "tie_breaker":          0.3,
			        "minimum_should_match": "30%" 
			    }
		    }
		}
		';
		$searchParams['body'] = $json;

		Debugbar::info($searchParams);
		$hits = array();
		try
		{
			$result = Es::search($searchParams);
			$hits = $result['hits'];
			$total = $hits['total'];
		}
		catch (Exception $e)
		{
			Log::error('Search server error: ' . $e->getMessage());
		}
		Debugbar::info($result);

		$projects = array();
		if (isset($hits['hits']))
		{
			foreach ($hits['hits'] as $hit)
			{
				$project = $hit['_source']['source'];
				$projects[] = $project;
			}
		}

		$data = array(
			'projects' => $projects,
			'q' => $q
		);

		return view('search', $data);
	}

	public function recreateSearchIndex()
	{
		$admin = FALSE;
		$user = Auth::user();
		if (NULL != $user)
		{
			$group = $user->groups()->where('name', '=', 'admin')->first();
			$admin = $group != NULL && ! empty($group->toArray());
		}

		if (!$admin)
		{
			Log::warning("Non admin user trying to recreate search index!!!");
			abort(401, "Not authorised");
		}
		$projectGroupIds = $this->projectsGateway->findAllNoPagination(array('projectGroupId'));
		Debugbar::info($projectGroupIds);

		foreach($projectGroupIds as $projectGroupId)
		{
			$id = $projectGroupId['id'];
			$groupId = $projectGroupId['project_group_id']['name'];
			$artifactId = $projectGroupId['name'];

			$params = array();
			$params['index'] = 'cjan_index';
			$params['type']  = 'artifact';
			$params['id']    = $id;
			$params['body']  = array(
				'groupid' => $groupId,
				'artifactid' => $artifactId,
				'source' => $projectGroupId
			);
			Log::info("Indexing into search server");
			$ret = Es::index($params);
			Debugbar::info($ret);
			if (isset($ret['created']) && $ret['created'] == TRUE)
			{
				Log::info('Document indexed');
			}
			else
			{
				Log::error('Failed to index document');
			}
		}

		return redirect('/')->with('message', 'Index recreated!');
	}

}
