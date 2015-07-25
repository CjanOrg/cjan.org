<?php
/**
 * Users model config
 */
return array(
	'title' => 'Project Artifact IDs',
	'single' => 'project artifact ID',
	'model' => 'CJAN\Models\ProjectArtifactId',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'project_group_id_id' => array(
			'title' => 'Project Group ID',
			'relationship' => 'projectGroupId',
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
			'name_field' => 'name'
		),
		'projectGroupId' => array(
			'title' => 'Project Group ID',
			'type' => 'relationship',
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
		),
		'projectGroupId' => array(
			'title' => 'Project Group ID',
			'type' => 'relationship',
			'name_field' => 'name',
		),
	),
);