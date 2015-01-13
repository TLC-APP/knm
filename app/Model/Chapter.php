<?php

App::uses('AppModel', 'Model');

/**
 * Chapter Model
 *
 * @property ChapterType $ChapterType
 * @property Course $Course
 * @property Department $Department
 * @property User $User
 */
class Chapter extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $actsAs = array('Containable', 'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'image_dir'
                )
            )
    ));

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
        ),
        'code' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'chapter_type_id' => array(
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
        'ChapterType' => array(
            'className' => 'ChapterType',
            'foreignKey' => 'chapter_type_id',
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
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'chapter_id',
            'dependent' => false,
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

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Department' => array(
            'className' => 'Department',
            'joinTable' => 'departments_chapters',
            'foreignKey' => 'chapter_id',
            'associationForeignKey' => 'department_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'User' => array(
            'className' => 'User',
            'joinTable' => 'users_chapters',
            'foreignKey' => 'chapter_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    /* Hàm lấy id các kỹ năng học

     * $type là loại kỹ năng mặc định 1 là tự chọn, 2 bắt buộc, 3 không tổ chức học
     *      */

    public function getChapterId($type = KY_NANG_TU_CHON) {
        $chapter = $this->find('all', array('conditions' => array('Chapter.chapter_type_id' => $type), 'fields' => array('id'), 'recursive' => -1));
        if (!empty($chapter)) {
            return Set::classicExtract($chapter, "{n}.Chapter.id");
        }
        return null;
    }

}
