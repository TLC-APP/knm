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

    
    public $actsAs=array('Containable');
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

    /* Hàm lấy số kỹ năng đã học của sinh viên
      tham số $loai_ky_nang_id: 1- tự chọn; 2-Bắt buộc
     *         
     */

    public function getEnrolledCourseNo($sinhvien_id, $courseId = array(), $pass = null) {
        $conditions = array();
        if (!is_null($pass)) {
            $conditions = Set::merge($conditions, array('Enrollment.pass' => $pass));
        }
        //Lấy các kn thuộc loại kỹ năng
        if (empty($courseId)) {
            $conditions = Set::merge($conditions, array('Enrollment.course_id' => $courseId));
        }
        $conditions = Set::merge($conditions, array('Enrollment.student_id' => $sinhvien_id));

        return $this->find('count', array('conditions' => $conditions));
    }

}
