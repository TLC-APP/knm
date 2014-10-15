<?php
App::uses('AppModel', 'Model');
/**
 * Enrollment Model
 *
 * @property FeeHangling $FeeHangling
 * @property AbsenceSession $AbsenceSession
 * @property AbsenceHandling $AbsenceHandling
 * @property Course $Course
 * @property Student $Student
 */
class Enrollment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'student_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FeeHangling' => array(
			'className' => 'User',
			'foreignKey' => 'fee_hangling_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AbsencePeriod' => array(
			'className' => 'Period',
			'foreignKey' => 'absence_period_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AbsenceHandling' => array(
			'className' => 'User',
			'foreignKey' => 'absence_handling_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Student' => array(
			'className' => 'User',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
