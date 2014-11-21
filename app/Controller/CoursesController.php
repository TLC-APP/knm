<?php

App::uses('AppController', 'Controller');

/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');

    public $helpers = array('Pdf');

    public function pdf() {

    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Course->recursive = 0;
        $this->set('courses', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $contain = array(
            'Chapter',
            'Teacher' => array('fields' => array('id', 'name')),
            'Enrollment', 'Period' => array('Room'));
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id), 'contain' => $contain);
        //debug($options);
        $this->pdfConfig = array(
            'orientation' => 'portrait',
            'filename' => 'Course_' . $id
        );
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!empty($this->request->data)) {
            if ($this->request->is('ajax')) {
                $this->layout = 'ajax';
                $this->autoRender = false;
                $addnextperiod = $this->request->data['Course']['addnextperiod'];
                $period = $this->request->data['Course']['period'];
                $chapter_id = $this->request->data['Course']['chapter_id'];
                $start = $this->request->data['start'];
                $name = $this->request->data['name'];
                $room_id = $this->request->data['Period']['room_id'];
//Dữ liệu course
//Tính toán name(mã số course)=code của chapter+ngay+thang+ 2 so cuoi cua nam+-+0+$name
                $this->Course->Chapter->id = $chapter_id;

                if ($this->Course->Chapter->exists()) {
                    $chaptercode = $this->Course->Chapter->field('code');
                    $startdate = new DateTime($start);
                    $day = $startdate->format('d') + 1;
                    $month = $startdate->format('m');
                    $year = $startdate->format('y');
                    $coursename = $chaptercode . $day . $month . $year . '-0' . $name;
                    $this->Course->create();
                    $coursedata = array('name' => $coursename, 'chapter_id' => $chapter_id);
                    if ($this->Course->save($coursedata)) {
                        $course_id = $this->Course->id;
//tạo đồng loạt 2 buổi
                        if ($addnextperiod = 'Y') {
                            $periodstarttime = SANG_START;
                            $periodendtime = SANG_END;

                            if ($period == 'C') {
                                $periodstarttime = CHIEU_START;
                                $periodendtime = CHIEU_END;
                            }
                            if ($period == 'T') {
                                $periodstarttime = TOI_START;
                                $periodendtime = TOI_END;
                            }
//period1
                            $period1start = $start . ' ' . $periodstarttime;
                            $period1end = $start . ' ' . $periodendtime;
                            $period2 = $startdate->modify('+7 day');
                            $period2start = $period2->format('Y-m-d') . ' ' . $periodstarttime;
                            $period2end = $period2->format('Y-m-d') . ' ' . $periodendtime;
                            $period1_data = array(
                                'course_id' => $course_id,
                                'name' => 'Buổi 1',
                                'start' => $period1start,
                                'end' => $period1end,
                                'room_id' => $room_id
                            );
                            $period2_data = array(
                                'course_id' => $course_id,
                                'name' => 'Buổi 2',
                                'start' => $period2start,
                                'end' => $period2end,
                                'room_id' => $room_id
                            );
                            $this->Course->Period->create();
                            $this->Course->Period->save($period1_data);
                            $this->Course->Period->create();
                            $this->Course->Period->save($period2_data);
                        } else {
                            
                        }
                    }
                } else {
                    $this->response->statusCode(503);
                    echo 'Không tồn tại kỹ năng này!';
                }
            }
        }
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                return $this->flash(__('The course has been saved.'), array('action' => 'index'));
            }
        }
        $rooms = $this->Course->Period->Room->find('list');
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list', array('fields' => array('id', 'name')));
        $this->set(compact('chapters', 'teachers', 'rooms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Course->save($this->request->data)) {
                return $this->flash(__('The course has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
//$this->request->allowMethod('post', 'delete');
        if ($this->Course->delete()) {

            return $this->Session->setFlash(__('The course is deleted. Please, try again.'));
            $this->redirect(array('action' => 'index'));
        } else {

            return $this->Session->setFlash(__('The course could not be deleted. Please, try again.'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function ajax_delete($id = null) {
        $this->layout = 'ajax';
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            $response = (array('success' => 0, 'message' => 'Không tồn tại khóa học này'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Course->delete()) {
            $response = (array('success' => 1));
        } else {
            $response = (array('success' => 0, 'message' => 'Xóa không thành công'));
        }
        $this->set('response', $response);
    }

    /**
     * manager_index method
     *
     * @return void
     */
    public function manager_index() {
        $this->Course->recursive = 0;
        $this->set('courses', $this->Paginator->paginate());
    }

    /**
     * manager_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * manager_add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                return $this->flash(__('The course has been saved.'), array('action' => 'index'));
            }
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /**
     * manager_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Course->save($this->request->data)) {
                return $this->flash(__('The course has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /**
     * manager_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {

        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Course->delete()) {
            return $this->flash(__('The course has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The course could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /* Hàm nhận yêu cầu tạo lớp kỹ năng mềm khi quản lý click vào 1 lớp trong thông tin đăng ký,
     *      
     *  và hiển thị form thêm lớp
     * 
     *      */

    public function managerAddCourseForm($teacher_id) {
        $this->layout = 'ajax';
        $this->Course->Teacher->id = $teacher_id;
        if (!$this->Course->Teacher->exists()) {
            return $this->response->statusCode(404);
        }
        $start = $this->request->data['start'];
        $startdate = new DateTime($start);
        $start2 = $startdate->modify('+7 day');
        $giang_day = $this->Course->Teacher->find('first', array('conditions' => array('id' => $teacher_id), 'contain' => array('Chapter' => array('fields' => array('id', 'name'))), 'fields' => array('id')));
        $res = Set::classicExtract($giang_day['Chapter'], "{n}.id");
        $chapters = $this->Course->Teacher->Chapter->find('list', array('conditions' => array('id' => $res)));
        $rooms = $this->Course->Period->Room->find('list');
        $this->set('start2', $start2->format('Y-m-d H:i:s'));
        $this->set(compact('start', 'chapters', 'rooms', 'teacher_id'));
    }

    public function managerAddCourse() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            $chapter_id = $this->request->data['Course']['chapter_id'];
            $start = $this->request->data['Course']['start'];
            //$name = $this->request->data['Course']['name'];
            $this->request->data['Period'][1]['room_id'] = $this->request->data['Period'][0]['room_id'];
//Tạo tên lớp
            $coursename = $this->Course->makeCourseCode($start, $chapter_id);
            $this->request->data['Course']['name'] = $coursename;
//Lưu khóa học
            $this->Course->create();
//$this->Course->Period[0]['start']=
            unset($this->Course->Period->validate['course_id']);
            if ($this->Course->saveAssociated($this->request->data)) {
                echo 'Thành công';
            } else {
                echo 'không thành công';
            }
//Lưu 2 buổi học
        }
    }

    /* Hàm show thời khóa biểu của giảng viên */

    public function course_pdf_export($course_id = null) {
        if (!$this->Course->exists($course_id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        //debug($this->Course->read(null, $course_id));die;
        $this->set('course', $this->Course->find('first', array(
            'conditions'=>array('Course.id'=>$course_id),
            'contain'=>array('Chapter','Teacher','Period'=>array('Room'),'Enrollment'=>array('Student'))
            )));
    }

}
