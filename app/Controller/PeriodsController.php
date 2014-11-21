<?php

App::uses('AppController', 'Controller');

/**
 * Periods Controller
 *
 * @property Period $Period
 * @property PaginatorComponent $Paginator
 */
class PeriodsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Period->recursive = 0;
        $this->set('periods', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
        $this->set('period', $this->Period->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                return $this->flash(__('The period has been saved.'), array('action' => 'index'));
            }
        }
        $courses = $this->Period->Course->find('list');
        $rooms = $this->Period->Room->find('list');
        $this->set(compact('courses', 'rooms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Period->save($this->request->data)) {
                return $this->flash(__('The period has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
            $this->request->data = $this->Period->find('first', $options);
        }
        $courses = $this->Period->Course->find('list');
        $rooms = $this->Period->Room->find('list');
        $this->set(compact('courses', 'rooms'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Period->id = $id;
        if (!$this->Period->exists()) {
            throw new NotFoundException(__('Invalid period'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Period->delete()) {
            return $this->flash(__('The period has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The period could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /**
     * Liệt kê danh sách các buổi học đã tạo từ start đến end
     *
     * @return void
     */
    public function managerIndex() {
        $this->layout = 'ajax';
        $conditions = array();
        $courseConditions = array();
        if (!empty($this->request->query)) {
            $start = $this->request->query['start'];
            $end = $this->request->query['end'];
            $conditions = array('Period.start <=' => $start, 'Period.start <=' => $end);
        }
        /* Lọc lấy khóa học theo giảng viên */
        if (!empty($this->request->query['teacher_id'])) {
            $courseConditions = Set::merge($courseConditions, array('Course.teacher_id' => $this->request->query['teacher_id']));
        }
        /* Lọc lấy khóa học theo chuyên đề */
        if (!empty($this->request->query['chapter_id'])) {
            //$courseConditions = Set::merge($courseConditions,array('Course.date <=' => $start, 'Course.date <=' => $end));
            $courseConditions = Set::merge($courseConditions, array('Course.chapter_id' => $this->request->query['chapter_id']));
            $courses = $this->Period->Course->find('all', array('conditions' => $courseConditions, 'recursive' => -1, 'fields' => array('id')));
            $courseIds = Set::classicExtract($courses, '{n}.Course.id');
            $conditions = Set::merge($conditions, array('Period.course_id' => $courseIds));
        }
        /* Lọc lấy khóa học theo trạng thái */
        if (!empty($this->request->query['trang_thai'])) {
            $courseConditions = Set::merge($courseConditions, array('Course.trang_thai' => $this->request->query['trang_thai']));
            $courses = $this->Period->Course->find('all', array('conditions' => $courseConditions, 'recursive' => -1, 'fields' => array('id')));
            $courseIds = Set::classicExtract($courses, '{n}.Course.id');
            $conditions = Set::merge($conditions, array('Period.course_id' => $courseIds));
        }
        $periods = $this->Period->find('all', array('conditions' => $conditions, 'contain' => array('Room', 'Course' => array('Chapter' => array('fields' => 'name'), 'Teacher' => array('fields' => array('name'))))));
        $this->set('periods', $periods);
    }

    /**
     * manager_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
        $this->set('period', $this->Period->find('first', $options));
    }

    /**
     * manager_add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                return $this->flash(__('The period has been saved.'), array('action' => 'index'));
            }
        }
        $courses = $this->Period->Course->find('list');
        $rooms = $this->Period->Room->find('list');
        $this->set(compact('courses', 'rooms'));
    }

    /**
     * manager_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Period->exists($id)) {
            throw new NotFoundException(__('Invalid period'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Period->save($this->request->data)) {
                return $this->flash(__('The period has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Period.' . $this->Period->primaryKey => $id));
            $this->request->data = $this->Period->find('first', $options);
        }
        $courses = $this->Period->Course->find('list');
        $rooms = $this->Period->Room->find('list');
        $this->set(compact('courses', 'rooms'));
    }

    /**
     * manager_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Period->id = $id;
        if (!$this->Period->exists()) {
            throw new NotFoundException(__('Invalid period'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Period->delete()) {
            return $this->flash(__('The period has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The period could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    public function searchByCourseName() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $course_name = (!empty($this->request->query['course_name'])) ? $this->request->query['course_name'] : null;
        $course_id = $this->Period->Course->getCourseIDByName($course_name);
        if ($course_id) {
            $periods = $this->Period->find('first', array('order' => array('Period.name' => 'ASC'), 'conditions' => array('Period.course_id' => $course_id), 'recursive' => -1));
            if (empty($periods)) {
                echo json_encode(array('isFound' => 0));
                exit;
            } else {
                $date = $periods['Period']['start'];

                echo json_encode((array('isFound' => 1, 'date' => $date, 'id' => $periods['Period']['id'])));
                exit;
            }
        }
        echo json_encode(array('isFound' => 0));
        exit;
    }

    /* Liệt kê danh sách các buổi dạy cho giảng viên (show thời khóa biểu) */

    public function teacherIndex() {
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $conditions = array();
            $courseConditions = array();
            if (!empty($this->request->query)) {
                $start = $this->request->query['start'];
                $end = $this->request->query['end'];
                $conditions = array('Period.start <=' => $start, 'Period.start <=' => $end);
            }
            /* Lọc lấy khóa học theo giảng viên */

            $courseConditions = Set::merge($courseConditions, array('Course.teacher_id' => $this->UserAuth->getUserId()));

            /* Lọc lấy khóa học theo chuyên đề */
            if (!empty($this->request->query['chapter_id'])) {
                $courseConditions = Set::merge($courseConditions, array('Course.chapter_id' => $this->request->query['chapter_id']));
                $courses = $this->Period->Course->find('all', array('conditions' => $courseConditions, 'recursive' => -1, 'fields' => array('id')));
                $courseIds = Set::classicExtract($courses, '{n}.Course.id');
                $conditions = Set::merge($conditions, array('Period.course_id' => $courseIds));
            }
            /* Lọc lấy khóa học theo trạng thái */
            if (!empty($this->request->query['trang_thai'])) {
                $courseConditions = Set::merge($courseConditions, array('Course.trang_thai' => $this->request->query['trang_thai']));
                $courses = $this->Period->Course->find('all', array('conditions' => $courseConditions, 'recursive' => -1, 'fields' => array('id')));
                $courseIds = Set::classicExtract($courses, '{n}.Course.id');
                $conditions = Set::merge($conditions, array('Period.course_id' => $courseIds));
            }
            $periods = $this->Period->find('all', array('conditions' => $conditions, 'contain' => array('Room', 'Course' => array('Chapter' => array('fields' => 'name'), 'Teacher' => array('fields' => array('name'))))));
            $this->set('periods', $periods);
        }
    }

}
