<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Featured Projects
Breadcrumbs::register('getting-started', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Getting Started', url('/getting-started/'));
});

// Featured Projects
Breadcrumbs::register('featured-projects', function($breadcrumbs)
{
	$breadcrumbs->parent('home');
    $breadcrumbs->push('Projects', url('/projects/'));
});

// Project by letter
Breadcrumbs::register('projects-by-letter', function($breadcrumbs, $letter)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Projects', url('/projects/'));
    $breadcrumbs->push($letter, url('/projects?letter=' . $letter));
});

// Project
Breadcrumbs::register('project', function($breadcrumbs, $letter, $project)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Projects', url('/projects/'));
    $breadcrumbs->push($letter, url('/projects?letter=' . $letter));
    $breadcrumbs->push($project['name'], url('/projects/' . $project['id']));
});

// Version
Breadcrumbs::register('version', function($breadcrumbs, $letter, $project, $version)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Projects', url('/projects/'));
    $breadcrumbs->push($letter, url('/projects?letter=' . $letter));
    $breadcrumbs->push($project['name'], url('/projects/' . $project['id']));
    $breadcrumbs->push($version['name'], url('/projects/' . $project['id'] . '/versions/' . $version['id']));
});

// Test Run
Breadcrumbs::register('test-run', function($breadcrumbs, $letter, $project, $version, $testRun)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Projects', url('/projects/'));
    $breadcrumbs->push($letter, url('/projects?letter=' . $letter));
    $breadcrumbs->push($project['name'], url('/projects/' . $project['id']));
    $breadcrumbs->push($version['name'], url('/projects/' . $project['id'] . '/versions/' . $version['id']));
    $breadcrumbs->push('Test Run ' . $testRun['id'], url('/projects/' . $project['id'] . '/versions/' . $version['id'] . '/testruns/' . $testRun['id']));
});

// User
Breadcrumbs::register('user', function($breadcrumbs, $username)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(sprintf('User [%s]', $username));
});

// Test Runs by User
Breadcrumbs::register('test-runs-user', function($breadcrumbs, $username) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(sprintf('User [%s]', $username), url('/u/' . $username));
    $breadcrumbs->push(sprintf('Tests'));
});

// Confirm delete test runs by user
Breadcrumbs::register('test-runs-user-confirm', function($breadcrumbs, $username, $testRunId) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(sprintf('User [%s]', $username), url('/u/' . $username));
    $breadcrumbs->push(sprintf('Test', $username), url('/u/' . $username . '/tests/'));
    $breadcrumbs->push(sprintf('Delete'));
});
