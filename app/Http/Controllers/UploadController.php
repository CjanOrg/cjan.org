<?php namespace CJAN\Http\Controllers;

use DB;
use Exception;
use Log;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use CJAN\Models\ProjectGroupId;
use CJAN\Models\ProjectArtifactId;
use CJAN\Models\ProjectVersion;
use CJAN\Models\JavaVendor;
use CJAN\Models\JavaVersion;
use CJAN\Models\OsFamily;
use CJAN\Models\OsName;
use CJAN\Models\Os;
use CJAN\Models\OsArch;
use CJAN\Models\Status;
use CJAN\Models\TestRun;
use CJAN\Models\Test;
use CJAN\Models\User;

class UploadController extends Controller {

	public function __construct()
	{

	}

	public function postResults(Request $request)
	{
		$json = $request->input('json');
		$ip = $request->ip();

		$token = $request->header('x-access-token', NULL);
		$user = User::where('access_token', '=', $token)->first();
		if (NULL == $user)
		{
			//abort(403, 'Unauthorized action.');
			Log::warning(sprintf("Invalid access token from %s - %s", $ip, $token));
			return (new Response(array('message' => 'CJAN.org says: Invalid API key, sorry.'), 403))
	            	->header('Content-Type', 'application/json');
		}

		//Log::debug(array('ip' => $ip, 'json' => $json, 'user_id' => $user->id));

		if ($json && strlen(trim($json)) > 0)
		{
			//Log::debug(sprintf("JSON upload: %s", $json));

			$jsonObject = json_decode($json);

			try {
				$groupIdParam = $jsonObject->groupId;
				$artifactIdParam = $jsonObject->artifactId;
				$versionParam = $jsonObject->version;

				$envProps = $jsonObject->envProps;
				$javaVendorParam = $envProps->javaVendor;
				$javaVersionParam = $envProps->javaVersion;
				$osFamilyNameParam = $envProps->osFamily;
				$osNameParam = $envProps->osName;
				$osArchParam = $envProps->osArch;
				$osVersionParam = $envProps->osVersion;

				$localeParam = $envProps->locale;
				$timezoneParam = $envProps->timezone;
				$platformEncodingParam = $envProps->platformEncoding;

				$statusParam = $jsonObject->status;

				$tests = $jsonObject->tests;

				// FIXME: validate

				Log::debug('Creating DB transaction');
				DB::beginTransaction();

				$statusId = Status::getStatusId($statusParam);
				Log::debug(sprintf('General status: %s <- %s', $statusId, $statusParam));

				$projectGroupId = ProjectGroupId::firstOrCreate(['name' => $groupIdParam]);
				$projectArtifactId = ProjectArtifactId::firstOrCreate(['project_group_id_id' => $projectGroupId->id, 'name' => $artifactIdParam, 'letter' => $artifactIdParam[0]]);

				$snapshot = ProjectVersion::isSnapshot($versionParam);
				$version = ProjectVersion::firstOrCreate(['project_artifact_id_id' => $projectArtifactId->id, 'name' => $versionParam, 'snapshot' => $snapshot]);

				Log::debug(sprintf('[%d]:[%d]:[%d]', $projectGroupId->id, $projectArtifactId->id, $versionParam));

				$javaVendor = JavaVendor::firstOrCreate(['name' => $javaVendorParam]);
				$javaVersion = JavaVersion::firstOrCreate(['name' => $javaVersionParam, 'java_vendor_id' => $javaVendor->id]);
				Log::debug("Java env settings recorded!");
				$osFamily = OsFamily::firstOrCreate(['name' => $osFamilyNameParam]);
				$osName = OsName::firstOrCreate(['name' => $osNameParam, 'os_family_id' => $osFamily->id]);
				$osArch = OsArch::firstOrCreate(['name' => $osArchParam]);
				$os = Os::firstOrCreate(['version' => $osVersionParam, 'os_name_id' => $osName->id, 'os_arch_id' => $osArch->id]);
				Log::debug("OS env settings recorded!");

				Log::debug(array(
					'javaVendor' => $javaVendor->id,
					'javaVersion' => $javaVersion->id,
					'osFamily' => $osFamily->id,
					'osName' => $osName->id,
					'osArch' => $osArch->id,
					'os' => $os->id
				));

				$testRun = TestRun::create(
					[
						'ip_address' => $ip,
						'locale' => $localeParam,
						'timezone' => $timezoneParam,
						'platform_encoding' => $platformEncodingParam,
						'user_id' => $user->id,
						'java_version_id' => $javaVersion->id,
						'project_version_id' => $version->id,
						'os_id' => $os->id,
						'status_id' => $statusId
					]
				);

				Log::info(sprintf('New test run [%d] created. [%s]:[%s]:[%s]', $testRun->id, $groupIdParam, $artifactIdParam, $versionParam));

				$testArray = $this->createTestArray($testRun->id, $jsonObject->tests);
				Log::debug(sprintf('Bulk inserting %d tests...', count($testArray)));

				Test::insert($testArray);

				Log::debug('All good!!! Commiting transaction.');

				DB::commit();

				return (new Response(array(
						//'test_run' => $testRun->id,
						'message' => 'CJAN.org says: Tests uploaded and stored in CJAN.org successfully! Thank you!'
					), 200))
	            	->header('Content-Type', 'application/json');
	        } catch (Exception $e) {
	        	DB::rollback();
	        	Log::error((string) $e);
	        	Log::warning("Rolling back transaction: " . $e->getMessage());
	        	return (
	        		new Response(
	        			array(
	        				'message' => sprintf('CJAN.org says: Server internal error: %s', $e->getMessage())
	        			), 
	        		500)
	        	)
	              ->header('Content-Type', 'application/json');
	        }
		}

		abort(500, "Invalid upload request");
	}

	private function createTestArray($testRunId, $tests)
	{
		$testsArray = array();

		foreach ($tests as $test)
		{
			$dt = date('Y-m-d H:i:s');
			$testsArray[] = array(
				'name' => $test->name,
				'test_run_id' => $testRunId,
				'status_id' => Status::getStatusId($test->status),
				'metadata' => $test->metadata,
				'created_at'=> $dt,
        		'updated_at'=> $dt
			);
		}

		return $testsArray;
	}

}
