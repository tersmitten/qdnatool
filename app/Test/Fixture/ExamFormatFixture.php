<?php
App::uses('ExamFormat', 'Model');

/**
 * ExamFormatFixture
 *
 */
class ExamFormatFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => ExamFormat::TELEFORM,
			'name' => 'Teleform'
		),
		array(
			'id' => ExamFormat::BLACKBOARD,
			'name' => 'Blackboard'
		),
		array(
			'id' => ExamFormat::QMP,
			'name' => 'QMP'
		),
	);

}
