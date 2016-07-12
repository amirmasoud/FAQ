<?php

return array(
	'title'  => 'Questions',
	'single' => 'Question',
	'model'  => App\Question::class,

	/**
	 * The display columns
	 */
	'columns' => array(
		'title' => array(
			'title' => 'Title',
		),
		'text' => array(
			'title' 		=> 'Text',
		),
		'id' =>  array(
			'title' => 'ID'
		),
		'answer' =>  array(
			'title' => 'answer'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id',
		'title' => array(
		    'title' => 'Title',
		    'type' 	=> 'text',
		),
		'text' => array(
		    'type' => 'textarea',
		    'title' => 'Text',
		),
	),

	/**
	 * The filterable fields
	 *
	 * @type array
	 */
	'filters' => array(
	    'title' => array(
	        'title' => 'Title',
	    ),
	    'created_time' => array(
	        'title' => 'Text',
	    ),
	),
	'form_width' => 600
);
