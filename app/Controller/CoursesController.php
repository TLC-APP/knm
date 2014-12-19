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
    public $components = array('Paginator', 'RequestHandler', 'ExcelReader.ExcelReader');
    public $helpers = array('Js', 'Pdf');

    public function pdf() {
        
    }

    /* Hàm lấy danh sách các lớp đã hết hạn */

    public function manager_lop_het_han($openable = null) {
        $contain = array('Chapter' => array('fields' => array('id', 'name')), 'Teacher' => array('id', 'name'));
        $conditions = array(
            'Course.trang_thai' => COURSE_WAIT_CANCEL
        );
        if ($openable) {
            $conditions = array(
                'Course.trang_thai' => COURSE_OPENABLE
            );
        }
        $sord = "asc";
        $page = 0;
        $limit = 10;
        $sidx = "Course.name";
        if (!empty($this->request->query)) {
            $page = $this->request->query['page']; // get the requested page
            $limit = $this->request->query['rows']; // get how many rows we want to have into the grid
            if (!empty($this->request->query['sidx'])) {
                $sidx = $this->request->query['sidx'];
            }// get index row - i.e. user click to sort
            if (!empty($this->request->query['sord'])) {
                $sord = $this->request->query['sord']; // get the direction
            }
        }
        $count = $this->Course->find('count', $conditions);
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $offset = $limit * $page - $limit; // do not put $limit*($page - 1)

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        $rows = $this->Course->find('all', array(
            'contain' => $contain,
            'limit' => $limit, //int
            'page' => $page, //int
            'offset' => $offset, //int,
            'order' => array($sidx => $sord),
            'conditions' => $conditions
        ));
        $i = 0;
        //debug($rows);die;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['Course']['id'];
            $responce->rows[$i]['cell'] = array(
                $row['Course']['id'],
                $row['Course']['name'],
                $row['Chapter']['name'],
                $row['Course']['start'],
                $row['Teacher']['name'],
                $row['Course']['enrolledno'],
                $row['Course']['trang_thai'],
            );
            $i++;
        }

        $this->set('responce', $responce);
        if ($this->request->is('ajax')) {
            $this->render('manager_lop_het_han');
        }
    }

//Đọc file lớp kỹ năng đưa vào CSDL
    public function admin_import_lopkynang() {
// Read Excel file. NOTE: only relative paths seem to work
        $read = $this->ExcelReader->Spreadsheet_Excel_Reader("files/lopkynang1.xls");
        if (false === $read) {
            $this->Session->setFlash("No readable file chosen!", "default", array("class" => "alert alert-error"));
            return false;
        }

// Print all cells from sheet 0
        $data = $this->ExcelReader->sheets[0]['cells'];
        $n = count($data);
        /* data[1] la ten truong */

        $courses = array();
        for ($i = 2; $i <= $n - 1; $i++) {
            $course['Course']['name'] = $data[$i][1];
            $course['Course']['chapter_id'] = $data[$i][2];
            $course['Period'][0]['start'] = date('Y-m-d H:i:s', strtotime($data[$i][3]));
            $course['Period'][1]['start'] = date('Y-m-d H:i:s', strtotime($data[$i][4]));
            $course['Period'][0]['name'] = 'Buổi 1';
            $course['Period'][1]['name'] = 'Buổi 2';
            $course['Period'][0]['room_id'] = $data[$i][5];
            $course['Period'][1]['room_id'] = $data[$i][5];
            $course['Course']['teacher_id'] = $data[$i][6];
            $course['Course']['start'] = date('Y-m-d', strtotime($data[$i][7]));
            $course['Course']['trang_thai'] = $data[$i][8];
            array_push($courses, $course);
        }

//debug($courses);
//die;
        try {
            $this->Course->create();
            if ($this->Course->saveAll($courses, array('validate' => false, 'deep' => true))) {
                $this->Session->setFlash('Import thành công');
            }
        } catch (Exception $exc) {
            $this->Session->setFlash('Import không thành công');
            $this->log($exc->getTraceAsString());
        }
    }

    /* Hàm nhận yêu cầu và điều hướng */

    public function index() {


        if (!$this->UserAuth->isLogged()) {
            $this->theme = 'Home';
            $conditions = Set::merge($conditions, array('Course.trang_thai' => COURSE_ENROLLING));
            $this->redirect(array('action' => 'guest_index'));
        }
        $this->redirect(array('action' => 'index', $this->UserAuth->getGroupAlias() => true));
    }

    /**
     * index method
     *
     * @return void
     */
    public function guest_index() {
        /* Lấy filter */
        $conditions = array();
        /* Bộ lọc */
//Năm tháng
        if (!empty($this->request->data['Course']['year']['year'])) {
            $year = $this->request->data['Course']['year']['year'];
            if ($this->request->data['Course']['month']['month']) {
                $month = $this->request->data['Course']['month']['month'];
                $conditions = Set::merge($conditions, array("Course.start>=' $year-$month-01'", "Course.start<='$year-$month-31'"));
            } else {
                $conditions = Set::merge($conditions, array("Course.start>= '$year-01-01'", "Course.start<='$year-12-31'"));
            }
        }
//Kỹ năng
        if (!empty($this->request->data['Course']['chapter_id'])) {
            $conditions = Set::merge($conditions, array('Course.chapter_id' => $this->request->data['Course']['chapter_id']));
        }
//Giảng viên
        if (!empty($this->request->data['Course']['teacher_id'])) {
            $conditions = Set::merge($conditions, array('Course.teacher_id' => $this->request->data['Course']['teacher_id']));
        }
//Tên lớp

        if (!empty($this->request->data['Course']['name'])) {
            $conditions = Set::merge($conditions, array('Course.name like' => '%' . $this->request->data['Course']['name'] . '%'));
        }
        $contain = array(
            'Chapter',
            'Teacher' => array('fields' => array('id', 'name')),
            'Enrollment', 'Period' => array('Room'));
        $settings = array('conditions' => $conditions, 'contain' => $contain);
        /* Hết đoạn filter */
        $this->Paginator->settings = $settings;
        $this->set('courses', $this->Paginator->paginate());
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath = $this->viewPath . '/ajax';
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list', array('fields' => array('id', 'name')));
        $this->set(compact('chapters', 'teachers'));
    }

    /**
     * manager_index method
     *
     * @return void
     */
    public function manager_index() {
        /* Lấy filter */
        $conditions = array();
        /* Bộ lọc */
//Năm tháng
        if (!empty($this->request->data['Course']['year']['year'])) {
            $year = $this->request->data['Course']['year']['year'];
            if ($this->request->data['Course']['month']['month']) {
                $month = $this->request->data['Course']['month']['month'];
                $conditions = Set::merge($conditions, array("Course.start>=' $year-$month-01'", "Course.start<='$year-$month-31'"));
            } else {
                $conditions = Set::merge($conditions, array("Course.start>= '$year-01-01'", "Course.start<='$year-12-31'"));
            }
        }
//Kỹ năng
        if (!empty($this->request->data['Course']['chapter_id'])) {
            $conditions = Set::merge($conditions, array('Course.chapter_id' => $this->request->data['Course']['chapter_id']));
        }
//Giảng viên
        if (!empty($this->request->data['Course']['teacher_id'])) {
            $conditions = Set::merge($conditions, array('Course.teacher_id' => $this->request->data['Course']['teacher_id']));
        }
//Tên lớp

        if (!empty($this->request->data['Course']['name'])) {
            $conditions = Set::merge($conditions, array('Course.name like' => '%' . $this->request->data['Course']['name'] . '%'));
        }
        //trang thai
        if (!empty($this->request->data['Course']['trang_thai'])) {
            $conditions = Set::merge($conditions, array('Course.trang_thai ' => $this->request->data['Course']['trang_thai']));
        }

        $contain = array(
            'Chapter',
            'Teacher' => array('fields' => array('id', 'name')),
            'Enrollment', 'Period' => array('Room'));
        $settings = array('conditions' => $conditions, 'contain' => $contain);
        /* Hết đoạn filter */
        $this->Paginator->settings = $settings;
        $this->set('courses', $this->Paginator->paginate());
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath = $this->viewPath . '/ajax';
        } else {
            $chapters = $this->Course->Chapter->find('list');
            $teachers = $this->Course->Teacher->find('list', array('conditions' => array('Teacher.user_group_id' => TEACHER_GROUP_ID), 'fields' => array('id', 'name')));
            $this->set(compact('chapters', 'teachers'));
        }
    }

    /* Hàm liệt kê danh sách các khóa học sinh viên chưa học đế sv đăng ký */

    public function student_index() {
        $studentid = $this->UserAuth->getUserId();

        /* Lấy filter */
        $conditions = array('Course.trang_thai' => COURSE_ENROLLING);
        /* Bộ lọc */

//Kỹ năng
        if (!empty($this->request->data['Course']['chapter_id'])) {
            $conditions = Set::merge($conditions, array('Course.chapter_id' => $this->request->data['Course']['chapter_id']));
        }
//Giảng viên
        if (!empty($this->request->data['Course']['teacher_id'])) {
            $conditions = Set::merge($conditions, array('Course.teacher_id' => $this->request->data['Course']['teacher_id']));
        }
//Tên lớp

        if (!empty($this->request->data['Course']['name'])) {
            $conditions = Set::merge($conditions, array('Course.name like' => '%' . trim($this->request->data['Course']['name']) . '%'));
        }
        $contain = array(
            'Chapter',
            'Teacher' => array('fields' => array('id', 'name')),
            'Enrollment',
            'Period' => array('Room')
        );

        $kndat = $this->Course->Enrollment->find('all', array(
            'fields' => array('id', 'course_id'),
            'conditions' => array(
                'Enrollment.student_id' => $studentid,
                'OR' => array('Enrollment.pass' => 1, 'Enrollment.pass is null')), 'recursive' => -1)
        );

        $coursedatIds = $this->Course->find('all', array(
            'conditions' => array('Course.id' => Set::classicExtract($kndat, '{n}.Enrollment.course_id')),
            'recursive' => -1,
            'fields' => array('id', 'chapter_id')
        ));
        $chapter_dat = Set::classicExtract($coursedatIds, '{n}.Course.chapter_id');
        $conditions = Set::merge($conditions, array('NOT' => array('Course.chapter_id' => $chapter_dat)));

        //$conditions = Set::merge($conditions, array('NOT' => array('Course.chapter_id' => $lop_kn_da_dang_ky)));

        $settings = array('conditions' => $conditions, 'contain' => $contain);
        /* Hết đoạn filter */
        $this->Paginator->settings = $settings;
        $this->set('courses', $this->Paginator->paginate());
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath = $this->viewPath . '/ajax';
        } else {
            $chapters = $this->Course->Chapter->find('list', array('conditions' => array('NOT' => array('Chapter.id' => $chapter_dat))));
            $teachers = $this->Course->Teacher->find('list', array('conditions' => array('Teacher.user_group_id' => TEACHER_GROUP_ID), 'fields' => array('id', 'name')));
            $this->set(compact('chapters', 'teachers'));
        }
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

    /* Hàm hiển thị thông tin lớp học cho sinh viên */

    public function student_view($id = null) {
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
        $contain = array('Chapter', 'Period' => array('Room'), 'Teacher' => array('fields' => array('id', 'name')), 'Enrollment' => array('Student' => array('fields' => array('id', 'name'))));
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id), 'contain' => $contain);
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
                    'conditions' => array('Course.id' => $course_id),
                    'contain' => array('Chapter', 'Teacher', 'Period' => array('Room'), 'Enrollment' => array('Student' => array('Classroom')))
        )));
    }

    /* Hàm đăng ký tham gia
     * 
     */

    public function student_enroll($course_id) {
        $this->Course->id = $course_id;
        if (!$this->Course->exists()) {
            throw new Exception('Không tồn tại lớp kỹ năng');
        }
        $studentid = $this->UserAuth->getUserId();
        /* Kiểm tra đã đóng học phí các kỹ năng chưa đạt chưa */
        $soknchuadat = $this->Course->Enrollment->find('count', array('conditions' => array('Enrollment.student_id' => $studentid, 'Enrollment.pass' => 0, 'Enrollment.fee' => 0)));
        if ($soknchuadat > 0) {
            $this->Session->setFlash('Bạn cần đóng học phí các kỹ năng chưa đạt để đăng ký các kỹ năng khác.', 'alert', array('class' => 'alert-warning'));
            $this->redirect(array('action' => 'index'));
        }

//Kiểm tra Còn chổ trống để đăng ký không
        $siso = $this->Course->field('si_so');
        $da_dk = $this->Course->field('enrolledno');

//Kiểm tra trạng thái lớp
        if ($this->Course->field('handangky') < 1) {
            $this->Session->setFlash('Lớp đã hết hạn đăng ký', 'alert', array('class' => 'alert-warning'));
            $this->redirect(array('action' => 'index'));
        }
        if ($siso < $da_dk + 1) {
            $this->Session->setFlash('Lớp đã hết chỗ trống', 'alert', array('class' => 'alert-warning'));
            $this->redirect(array('action' => 'index'));
        }

//Kiểm tra đã đăng ký chưa
        $da_dang_ky = $this->Course->Enrollment->find('count', array('conditions' => array(
                'Enrollment.student_id' => $studentid,
                'Enrollment.course_id' => $course_id)
        ));
        if ($da_dang_ky) {
            $this->Session->setFlash('Bạn đã đăng ký kỹ năng này rồi.', 'alert', array('class' => 'alert-warning'));
            $this->redirect(array('action' => 'index'));
        }
//Nếu đã học đủ 5 kỹ năng muốn học thêm kỹ năng khác
        $sokndat = $this->Course->Enrollment->find('count', array('conditions' => array('Enrollment.student_id' => $studentid, 'Enrollment.pass' => 1)));

        if (($sokndat + 1) > 5) {
            $this->Session->setFlash('Bạn đã hoàn thành đủ 05 kỹ năng, để tham gia các kỹ năng khác bạn vui lòng liên hệ Trung tâm HTPT Dạy và Học');
            $this->redirect(array('action' => 'index'));
        }
//Nếu học hơn 3 kỹ năng tự chọn cũng phải đóng học phí
//Kỹ năng tính đăng ký
        $kn_dang_ky = $this->Course->field('chapter_id');
//lấy id các chapter tự chọn
        $kn_tu_chon_id = $this->Course->Chapter->getChapterId(KY_NANG_TU_CHON);

        if (in_array($kn_dang_ky, $kn_tu_chon_id)) {
//Lấy course_id các lớp đã đăng ký
            $lop_kn_da_dang_ky = array();
            $lop_kn_da_dang_ky = $this->Course->Enrollment->find('all', array('conditions' => array('Enrollment.student_id' => $studentid, 'OR' => array('Enrollment.pass is NULL', 'Enrollment.pass' => 1)), 'recursive' => -1));
            if (!empty($lop_kn_da_dang_ky)) {
                $lop_kn_da_dang_ky = Set::classicExtract($lop_kn_da_dang_ky, '{n}.Enrollment.course_id');
            }
//lấy các lớp học tự chọn trong cac lop da tham du
            $so_kn_tu_chon_da_hoc = $this->Course->find('count', array(
                'conditions' => array(
                    'Course.chapter_id' => $kn_tu_chon_id,
                    'Course.id' => $lop_kn_da_dang_ky,
                //'Course.trang_thai' => COURSE_OPEN
            )));
            if ($so_kn_tu_chon_da_hoc > 2) {
                $this->Session->setFlash('Bạn chỉ cần 01 kỹ năng tự chọn nữa thôi. Để đăng ký kỹ năng khác, bạn phải hủy kỹ năng đã đăng ký trước đó', 'alert', array('class' => 'alert-warning'));
                $this->redirect(array('action' => 'index'));
            }
        }
//Lưu dữ liệu đăng ký
        $data = array('course_id' => $course_id, 'student_id' => $studentid);

        $this->Course->Enrollment->create();
        if ($this->Course->Enrollment->save($data)) {
            $this->Session->setFlash('Đăng ký thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            $this->redirect(array('controller' => 'dashboards', 'action' => 'home', 'student' => true));
        } else {
            $this->Session->setFlash('Đăng ký thất bại');
            $this->redirect(array('action' => 'index', 'student' => true));
        }
    }

    /* Hàm hủy đăng ký khóa học cho sinh viên */
}
