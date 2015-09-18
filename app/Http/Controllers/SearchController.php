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
			Debugbar::info($result);
			$hits = $result['hits'];
			$total = $hits['total'];
		}
		catch (Exception $e)
		{
			Log::error('Search server error: ' . $e->getMessage());
		}

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
		$projectArtifactsIds = $this->projectsGateway->findAllNoPagination(array('projectGroupId'));
		Debugbar::info($projectArtifactsIds);

		foreach($projectArtifactsIds as $projectArtifactId)
		{
			$id = $projectArtifactId['id'];
			$groupId = $projectArtifactId['project_group_id']['name'];
			$artifactId = $projectArtifactId['name'];

			$params = array();
			$params['index'] = 'cjan_index';
			$params['type']  = 'artifact';
			$params['id']    = $id;

			$body = array(
						'groupid' => $groupId,
						'artifactid' => $artifactId,
						'source' => $projectArtifactId
					);

			Log::info("Indexing: " . var_export($body, TRUE));

			$params['body']  = $body;
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
