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
		'letter' => array(
			'title' => 'Letter',
			'type' => 'text'
		),
		'project_group_id_id' => array(
			'title' => 'Project Group ID',
			'relationship' => 'projectGroupId',
			'select' => '(:table).name'
		),
		'projectVersions' => array(
			'relationship' => 'projectVersions',
			'title' => 'Project Artifact Versions',
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
		'letter' => array(
			'title' => 'Letter',
			'type' => 'text'
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
		'letter' => array(
			'title' => 'Letter',
			'type' => 'text'
		),
		'projectGroupId' => array(
			'title' => 'Project Group ID',
			'type' => 'relationship',
			'name_field' => 'name',
		),
	),
);