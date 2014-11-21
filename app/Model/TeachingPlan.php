<?php

App::uses('AppModel', 'Model');

/**
 * TeachingPlan Model
 *
 * @property Teacher $Teacher
 */
class TeachingPlan extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Teacher' => array(
            'className' => 'Usermgmt.User',
            'foreignKey' => 'teacher_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    public $actsAs=array('Containable');

    public function isExist($date, $session, $teacher_id) {
        $conditions = array('TeachingPlan.date' => $date, 'TeachingPlan.session' => $session, 'TeachingPlan.teacher_id' => $teacher_id);
        return $this->find('count', array('conditions' => $conditions));
    }

}
