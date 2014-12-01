<?php

App::uses('AppModel', 'Model');

/**
 * Course Model
 *
 * @property Chapter $Chapter
 * @property Teacher $Teacher
 * @property Enrollment $Enrollment
 * @property Period $Period
 */
class Course extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $actsAs=array('Containable');
    public $displayField = 'name';
    public $virtualFields = array(
        'enrolledno' => "SELECT count(id) as Course__enrolledno 
        FROM  enrollments  as Enrollment 
         where Enrollment.course_id=Course.id",
        'handangky'=>'DATEDIFF(ADDDATE(Course.start,-14),CURDATE())'
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Lớp học này đã có'
            )
        ),
        
        'trang_thai' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'chapter_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'teacher_id' => array(
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
        'Chapter' => array(
            'className' => 'Chapter',
            'foreignKey' => 'chapter_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Teacher' => array(
            'className' => 'Usermgmt.User',
            'foreignKey' => 'teacher_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Enrollment' => array(
            'className' => 'Enrollment',
            'foreignKey' => 'course_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Period' => array(
            'className' => 'Period',
            'foreignKey' => 'course_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function makeCourseCode($start, $chapter_id) {
        $this->Chapter->id = $chapter_id;
        $chaptercode = $this->Chapter->field('code');
        /* kiểm tra trong ngày đó có lớp nào thuộc kỹ năng này ko */

        $startdate = new DateTime($start);
        $stt = 1;
        $checkname = $chaptercode . $startdate->format('dmy') . "-";
        if ($this->find('count', array('conditions' => array('Course.name like' => $checkname . '%')))) {
            $lastcourse = $this->find('first', array(
                'conditions' => array('Course.name like' => $checkname . '%'),
                'order' => array('Course.name' => 'ASC'),
                'recursive' => -1,
                'fields' => array('id', 'name')
            ));
            $stt = (int) substr($lastcourse['Course']['name'], -2) + 1;
        }
        //Kiểm tra là buổi 1 hay buổi 2
        $coursename = $chaptercode . $startdate->format('dmy') . '-0' . $stt;
        return $coursename;
    }

    public function getCourseIDByName($course_name) {
        $options = array('conditions' => array('Course.name' => $course_name));
        $course = null;
        if ($this->find('count', $options)) {
            $course = $this->find('first', array('conditions' => array('Course.name' => $course_name), 'recursive' => -1, 'fields' => 'id'));
        }
        return $course['Course']['id'];
    }
    
    //Lấy các khóa học thuộc 1 chapter
    

}
