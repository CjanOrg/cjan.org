<?php
/**
 * Users model config
 */
return array(
	'title' => 'Tests',
	'single' => 'test',
	'model' => 'CJAN\Models\Test',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
			'type' => 'text'
		),
		'metadata' => array(
			'title' => 'Metadata',
			'type' => 'text'
		),
		'test_run_id' => array(
			'title' => 'Test Run',
			'relationship' => 'testRun',
			'select' => '(:table).id'
		),
		'status_id' => array(
			'title' => 'Status',
			'relationship' => 'status',
			'select' => '(:table).name'
		)
	),
	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Name',
			'type' => 'text'
		),
		'metadata' => array(
			'title' => 'Metadata',
			'type' => 'text'
		),
		'testRun' => array(
			'title' => 'Test Run',
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
		'name' => array(
			'title' => 'Name',
			'type' => 'text'
		),
		'metadata' => array(
			'title' => 'Metadata',
			'type' => 'text'
		),
		'testRun' => array(
			'title' => 'Test Run',
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