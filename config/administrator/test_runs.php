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
			'title' => 'Operating System ID',
			'relationship' => 'os',
			'select' => '(:table).id'
		),
		'status_id' => array(
			'title' => 'Status',
			'relationship' => 'status',
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
		),
		'user' => array(
			'title' => 'User',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'javaVersion' => array(
			'title' => 'Java Version',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'projectVersion' => array(
			'title' => 'Project Version',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'os' => array(
			'title' => 'Operating System ID',
			'type' => 'relationship',
			'name_field' => 'id'
		),
		'status' => array(
			'title' => 'Status',
			'type' => 'relationship',
			'name_field' => 'name'
		),
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
		'projectVersion' => array(
			'title' => 'Project Version',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'user' => array(
			'title' => 'Project Artifact ID',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'javaVersion' => array(
			'title' => 'Java Version',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'projectVersion' => array(
			'title' => 'Project Version',
			'type' => 'relationship',
			'name_field' => 'name'
		),
		'os' => array(
			'title' => 'Operating System ID',
			'type' => 'relationship',
			'name_field' => 'id'
		),
		'status' => array(
			'title' => 'Status',
			'type' => 'relationship',
			'name_field' => 'name'
		)
	),
);