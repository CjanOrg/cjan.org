<?php
/**
 * Users model config
 */
return array(
	'title' => 'Users',
	'single' => 'user',
	'model' => 'CJAN\User',
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
			'select' => 'COUNT((:table).id)',
		),
		'password' => array(
			'title' => 'Password',
			'sort_field' => 'birth_date',
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
		'email' => array(
			'title' => 'E-mail',
			'type' => 'text',
		),
		'password' => array(
			'title' => 'Password',
			'type' => 'password',
			'name_field' => 'password',
		),
	),
);