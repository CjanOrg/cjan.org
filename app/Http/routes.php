<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('getting-started', 'GettingStartedController@index');

Route::get('projects/search', 'SearchController@index');

Route::resource('projects', 'ProjectsController');
Route::resource('projects/{projectId}/versions', 'VersionsController');
Route::resource('projects/{projectId}/versions/{versionId}/testruns', 'TestRunsController');

Route::resource('u', 'UsersController');

// Test runs and tests 
Route::get('u/{user}/tests', 'UsersController@showTests');
Route::get('u/{user}/tests/{testId}/delete', 'UsersController@confirmDeleteTestRun');
Route::post('u/{user}/tests/{testId}/delete', 'UsersController@deleteTestRun');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'upload' => 'UploadController',
]);
