<?php
/**
 * Users model config
 */
return array(
	'title' => 'Project Versions',
	'single' => 'project version',
	'model' => 'CJAN\Models\ProjectVersion',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'snapshot' => array(
			'title' => 'Is snapshot?',
			'type' => 'bool'
		),
		'project_artifact_id_id' => array(
			'title' => 'Project Artifact ID',
			'relationship' => 'projectArtifact',
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
		'snapshot' => array(
			'title' => 'Is snapshot?',
			'type' => 'bool'
		),
		'projectArtifact' => array(
			'title' => 'Project Artifact ID',
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
		'snapshot' => array(
			'title' => 'Is snapshot?',
			'type' => 'bool'
		),
		'projectArtifact' => array(
			'title' => 'Project Artifact ID',
			'type' => 'relationship',
			'name_field' => 'name',
		),
	),
);