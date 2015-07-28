<?php
/**
 * Users model config
 */
return array(
	'title' => 'Users',
	'single' => 'user',
	'model' => 'CJAN\Models\User',
	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name'
		),
		'email' => array(
			'title' => 'E-mail',
		),
		'groups' => array(
			'title' => 'Groups',
			'relationship' => 'groups',
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
		'email' => array(
			'title' => 'E-mail',
			'name_field' => 'email'
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
		'email' => array(
			'title' => 'E-mail',
			'type' => 'text',
		),
		'password' => array(
			'title' => 'Password',
			'type' => 'password',
			'name_field' => 'password',
		),
		'groups' => array(
			'title' => 'Groups',
			'type' => 'relationship',
			'name_field' => 'name'
		)
	),
);