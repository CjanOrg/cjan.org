<?php
/**
 * Users model config
 */
return array(
	'title' => 'Groups',
	'single' => 'group',
	'model' => 'CJAN\Models\Group',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name'
		),
		'users' => array(
			'title' => 'Users',
			'relationship' => 'users',
			'select' => 'COUNT((:table).id)'
		)
	),
	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Name',
			'name_field' => 'name'
		),
	),
	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'users' => array(
			'title' => 'Users',
			'type' => 'relationship',
			'name_field' => 'name'
		),
	),
);