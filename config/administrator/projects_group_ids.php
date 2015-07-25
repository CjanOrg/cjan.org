<?php
/**
 * Users model config
 */
return array(
	'title' => 'Project Group IDs',
	'single' => 'Project Group ID',
	'model' => 'CJAN\Models\ProjectGroupId',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name'
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
		)
	),
	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		)
	),
);