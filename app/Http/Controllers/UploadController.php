<?php namespace CJAN\Http\Controllers;

use DB;
use Exception;
use Log;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;

class UploadController extends Controller {

	public function __construct()
	{

	}

	public function postResults(Request $request)
	{
		// FIXME: add access token and
		// abort(403, 'Unauthorized action.');
		$json = $request->input('json');
		if ($json && strlen(trim($json)) > 0)
		{
			Log::debug(sprintf("JSON upload: %s", $json));

			$jsonObject = json_decode($json);

			try {
				$groupId = $jsonObject->groupId;
				$artifactId = $jsonObject->artifactId;
				$version = $jsonObject->version;

				$envProps = $jsonObject->envProps;
				$status = $jsonObject->status;

				$tests = $jsonObject->tests;

				// FIXME: validate

				DB::beginTransaction();

				$projectGroupid = ProjectGroupId::firstOrCreate(['name' => $groupId]);
				$projectArtifactId = ProjectArtifactId::firstOrCreate(['project_group_id_id' => $projectGroupid->id, 'name' => $artifactId, 'letter' => $artifactId[0]]);
				$version = ProjectVersion::firstOrCreate(['project_artifact_id_id' => $projectArtifactId->id, 'name' => $version]);



				DB::commit();

				return (new Response(array('test_run' => 1), 200))
	              ->header('Content-Type', 'application/json');
	        } catch (Exception $e) {
	        	DB::rollback();
	        	Log::warning("Rolling back transaction: " . $e->getMessage());
	        	return (new Response(array('error' => $e->getMessage()), 500))
	              ->header('Content-Type', 'application/json');
	        }
		}

		abort(500, "Invalid upload request");
	}

}
