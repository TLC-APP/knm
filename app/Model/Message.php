<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property CreatedUser $CreatedUser
 * @property ReceiveUser $ReceiveUser
 * @property UserGroup $UserGroup
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $actsAs=array('Containable');
        /**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CreatedUser' => array(
			'className' => 'User',
			'foreignKey' => 'created_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ReceiveUser' => array(
			'className' => 'User',
			'foreignKey' => 'receive_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'user_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
