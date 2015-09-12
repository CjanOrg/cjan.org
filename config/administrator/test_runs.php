<?php
/**
 * Users model config
 */
return array(
	'title' => 'Test Runs',
	'single' => 'test run',
	'model' => 'CJAN\Models\TestRun',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'ip_address' => array(
			'title' => 'IP',
			'type' => 'text'
		),
		'locale' => array(
			'title' => 'Locale',
			'type' => 'text'
		),
		'timezone' => array(
			'title' => 'Time Zone',
			'type' => 'text'
		),
		'platform_encoding' => array(
			'title' => 'Platform Encoding',
			'type' => 'text'
		),
		'user_id' => array(
			'title' => 'User',
			'relationship' => 'user',
			'select' => '(:table).name'
		),
		'java_version_id' => array(
			'title' => 'Java Version',
			'relationship' => 'javaVersion',
			'select' => '(:table).name'
		),
		'project_version_id' => array(
			'title' => 'Project Version',
			'relationship' => 'projectVersion',
			'select' => '(:table).name'
		),
		'os_id' => array(
			'title' => 'Operating System',
			'relationship' => 'os',
			'select' => '(:table).name'
		),
		'tests' => array(
			'title' => 'Tests',
			'relationship' => 'tests',
			'select' => 'COUNT((:table).id)'
		)
	),
	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'ip_address' => array(
			'title' => 'IP',
			'type' => 'text'
		),
		'locale' => array(
			'title' => 'Locale',
			'type' => 'text'
		),
		'timezone' => array(
			'title' => 'Time Zone',
			'type' => 'text'
		),
		'platform_encoding' => array(
			'title' => 'Platform Encoding',
			'type' => 'text'
		)
	),
	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'ip_address' => array(
			'title' => 'IP',
			'type' => 'text'
		),
		'locale' => array(
			'title' => 'Locale',
			'type' => 'text'
		),
		'timezone' => array(
			'title' => 'Time Zone',
			'type' => 'text'
		),
		'platform_encoding' => array(
			'title' => 'Platform Encoding',
			'type' => 'text'
		),
		'project_artifact_id_id' => array(
			'title' => 'Project Artifact ID',
			'relationship' => 'projectArtifact',
			'select' => '(:table).name'
		)
	),
);