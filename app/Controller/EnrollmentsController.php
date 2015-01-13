<?php

App::uses('AppController', 'Controller');

/**
 * Enrollments Controller
 *
 * @property Enrollment $Enrollment
 * @property PaginatorComponent $Paginator
 */
class EnrollmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'LogUtil', 'ExcelReader.ExcelReader');

    //Đọc file lớp kỹ năng đưa vào CSDL
    public function update_pass() {

// Read Excel file. NOTE: only relative paths seem to work
        $read = $this->ExcelReader->Spreadsheet_Excel_Reader("files/Book2.xls");
        if (false === $read) {
            $this->Session->setFlash("No readable file chosen!", "default", array("class" => "alert alert-error"));
            return false;
        }

// Print all cells from sheet 0
        $data = $this->ExcelReader->sheets[0]['cells'];
        $n = count($data);
        /* data[1] la ten truong */
        //14639-(2000+2000+2000+2000+2000+2000+2000+639)
        $succ = 0;
        for ($i = 2; $i <= 639; $i++) {
            $pass = (!isset($data[$i][1])) ? NULL : $data[$i][1];
            //$fee = $data[$i][2];
            //$fee_amount = $data[$i][3];
            //$absence = $data[$i][4];
            $id = $data[$i][5];
            $row = array('Enrollment.pass' => $pass);

            if ($this->Enrollment->updateAll($row, array('Enrollment.id' => $id))) {
                $succ++;
            }
        }
        $this->set('success', $succ);
    }

    /* Hàm hiện thị trang cập nhật kết quả */

    public function manager_ket_qua($course_id) {

        $this->Enrollment->Course->id = $course_id;
        $course_name = $this->Enrollment->Course->field('name');
        if (!$this->Enrollment->Course->exists()) {
            throw new Exception('Không tồn tại lớp học cần cập nhật điểm');
        }
        if (empty($this->request->data['id'])) {

            $contain = array(
                /* 'Course' => array(
                  'Chapter' => array('fields' => array('id', 'name')),
                  'Teacher' => array('id', 'name'),
                  ), */
                'Student' => array('fields' => array('id', 'username', 'name'))
            );
            $sord = "asc";
            $page = 0;
            $limit = 10;
            $sidx = "Enrollment.student_id";
            $conditions = array('Enrollment.course_id' => $course_id);

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
            $count = $this->Enrollment->find('count', array('conditions' => $conditions));
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
            //debug($conditions);
            $rows = $this->Enrollment->find('all', array(
                'contain' => $contain,
                //'limit' => $limit, //int
                'page' => $page, //int
                'offset' => $offset, //int,
                'order' => array($sidx => $sord),
                'conditions' => $conditions
            ));
            $i = 0;
            foreach ($rows as $row) {
                $responce->rows[$i]['id'] = $row['Enrollment']['id'];
                $responce->rows[$i]['cell'] = array(
                    $row['Student']['username'],
                    $row['Student']['name'],
                    $row['Enrollment']['pass'],
                    $row['Enrollment']['absence'],
                    $row['Enrollment']['absence_reason'],
                    $row['Enrollment']['fee_paper_no'],
                );
                $i++;
            }

            $this->set('responce', $responce);
            if ($this->request->is('ajax')) {
                $this->render('manager_ket_qua');
            }
        }

        $this->set('course_name', $course_name);
    }

    /* Hàm thực hiện cập nhật kết quả đạt và không đạt */

    public function manager_danh_dau_dat() {

        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $id = $this->request->data['id'];
        }
        if (!empty($this->request->data['course_id'])) {
            $course_id = $this->request->data['course_id'];
        }
        //Update các dòng có trạng thái đã hủy
        try {
            /* Thuc hien update */
            $this->Enrollment->updateAll(array('Enrollment.pass' => 1), array('Enrollment.id' => $id));
            $this->Enrollment->updateAll(array('Enrollment.pass' => 0), array('NOT' => array('Enrollment.id' => $id), 'Enrollment.course_id' => $course_id));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /* Đánh dấu không đạt */

    public function manager_danh_dau_khong_dat() {
        $this->autoRender = false;
        if (!empty($this->request->data['id'])) {
            $id = $this->request->data['id'];
        }
        if (!empty($this->request->data['course_id'])) {
            $course_id = $this->request->data['course_id'];
        }
        //Update các dòng có trạng thái đã hủy
        try {
            /* Thuc hien update */
            $this->Enrollment->updateAll(array('Enrollment.pass' => 0), array('Enrollment.id' => $id));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function manager_danh_dau_vang() {

        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $id = $this->request->data['id'];
        }
        if (!empty($this->request->data['course_id'])) {
            $course_id = $this->request->data['course_id'];
        }
        //Update các dòng có trạng thái đã hủy
        try {
            /* Thuc hien update */
            $this->Enrollment->updateAll(array('Enrollment.absence' => 1), array('Enrollment.id' => $id));
            $this->Enrollment->updateAll(array('Enrollment.absence' => 0), array('NOT' => array('Enrollment.id' => $id), 'Enrollment.course_id' => $course_id));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Enrollment->recursive = 0;
        $this->set('enrollments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Enrollment->exists($id)) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
        $this->set('enrollment', $this->Enrollment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Enrollment->create();
            if ($this->Enrollment->save($this->request->data)) {
                return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
            }
        }
        $feeHanglings = $this->Enrollment->FeeHangling->find('list');
        $absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
        $absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
        $courses = $this->Enrollment->Course->find('list');
        $students = $this->Enrollment->Student->find('list');
        $this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Enrollment->exists($id)) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Enrollment->save($this->request->data)) {
                return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
            $this->request->data = $this->Enrollment->find('first', $options);
        }
        $feeHanglings = $this->Enrollment->FeeHangling->find('list');
        $absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
        $absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
        $courses = $this->Enrollment->Course->find('list');
        $students = $this->Enrollment->Student->find('list');
        $this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Enrollment->id = $id;
        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Enrollment->delete()) {
            return $this->flash(__('The enrollment has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The enrollment could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /**
     * manager_index method
     *
     * @return void
     */
    public function manager_index() {
        $this->Enrollment->recursive = 0;
        $this->set('enrollments', $this->Paginator->paginate());
    }

    /**
     * manager_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Enrollment->exists($id)) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
        $this->set('enrollment', $this->Enrollment->find('first', $options));
    }

    /**
     * manager_add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Enrollment->create();
            if ($this->Enrollment->save($this->request->data)) {
                return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
            }
        }
        $feeHanglings = $this->Enrollment->FeeHangling->find('list');
        $absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
        $absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
        $courses = $this->Enrollment->Course->find('list');
        $students = $this->Enrollment->Student->find('list');
        $this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
    }

    /**
     * manager_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Enrollment->exists($id)) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Enrollment->save($this->request->data)) {
                return $this->flash(__('The enrollment has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
            $this->request->data = $this->Enrollment->find('first', $options);
        }
        $feeHanglings = $this->Enrollment->FeeHangling->find('list');
        $absencePeriods = $this->Enrollment->AbsencePeriod->find('list');
        $absenceHandlings = $this->Enrollment->AbsenceHandling->find('list');
        $courses = $this->Enrollment->Course->find('list');
        $students = $this->Enrollment->Student->find('list');
        $this->set(compact('feeHanglings', 'absencePeriods', 'absenceHandlings', 'courses', 'students'));
    }

    /**
     * manager_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Enrollment->id = $id;
        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Enrollment->delete()) {
            return $this->flash(__('The enrollment has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The enrollment could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

//Hàm xử lý vắng $id là id của Enrollment
    public function manager_vang($id) {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $this->Enrollment->id = $id;

        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }

        $this->request->allowMethod('post');
        //$this->request->data['Enrollment']['fee'] = 1;
        $this->request->data['Enrollment']['absence'] = 1;
        $this->request->data['Enrollment']['absence_handling_id'] = $this->UserAuth->getUserId();

        if ($this->Enrollment->save($this->request->data)) {
            //$this->Session->setFlash('Đã thực hiện thành công thao tác', 'alert', array('class' => 'alert-success'));
            echo json_encode(array('success' => 1, 'id' => $this->Enrollment->id, 'ly_do_vang' => $this->Enrollment->field('absence_reason')));
            //$studentId = $this->Enrollment->field('student_id');
            //$this->redirect(array('manager' => false, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewStudent', $studentId));
        } else {
            //$this->Session->setFlash('Không thành công', 'alert', array('class' => 'alert-warning'));
            //$this->redirect(array('controller' => 'users', 'action' => 'viewStudent', $studentId));
            echo json_encode(array('success' => 0, 'message' => 'Lỗi'));
        }
    }

    //Hàm xử lý hủy vắng $id là id của Enrollment
    public function manager_huy_vang($id) {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->Enrollment->id = $id;

        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $this->request->allowMethod('post');
        //$this->request->data['Enrollment']['fee'] = 1;
        $this->request->data['Enrollment']['absence'] = 0;
        $this->request->data['Enrollment']['absence_reason'] = NULL;
        $this->request->data['Enrollment']['absence_handling_id'] = NULL;

        if ($this->Enrollment->save($this->request->data)) {
            echo json_encode(array('success' => 1, 'id' => $this->Enrollment->id));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Lỗi'));
        }
    }

    //Hàm xử lý đóng học phí $id là id của Enrollment
    public function manager_dong_hoc_phi($id) {
        $this->autoRender = false;
        $this->layout = 'ajax';

        $this->Enrollment->id = $id;

        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }

        $this->request->allowMethod('post');
        //$this->request->data['Enrollment']['fee'] = 1;
        $this->request->data['Enrollment']['fee'] = 1;
        $this->request->data['Enrollment']['fee_date'] = date('Y-m-d H:i:s', strtotime("now"));
        $this->request->data['Enrollment']['fee_hangling_id'] = $this->UserAuth->getUserId();
        $this->request->data['Enrollment']['fee_amount'] = HOCPHI;

        if ($this->Enrollment->save($this->request->data)) {
            //$this->Session->setFlash('Đã thực hiện thành công thao tác', 'alert', array('class' => 'alert-success'));
            echo json_encode(array('success' => 1, 'id' => $this->Enrollment->id, 'sobienlai' => $this->Enrollment->field('fee_paper_no')));
            //$studentId = $this->Enrollment->field('student_id');
            //$this->redirect(array('manager' => false, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewStudent', $studentId));
        } else {
            //$this->Session->setFlash('Không thành công', 'alert', array('class' => 'alert-warning'));
            //$this->redirect(array('controller' => 'users', 'action' => 'viewStudent', $studentId));
            echo json_encode(array('success' => 0, 'message' => 'Lỗi'));
        }
    }

    //Hàm xử lý đóng học phí $id là id của Enrollment
    public function manager_huy_dong_hoc_phi($id) {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->Enrollment->id = $id;

        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $this->request->data['Enrollment']['fee'] = 0;
        $this->request->data['Enrollment']['fee_paper_no'] = NULL;
        $this->request->data['Enrollment']['fee_date'] = NULL;
        $this->request->data['Enrollment']['fee_hangling_id'] = NULL;
        $this->request->data['Enrollment']['fee_amount'] = NULL;

        if ($this->Enrollment->save($this->request->data)) {
            echo json_encode(array('success' => 1, 'id' => $this->Enrollment->id));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Lỗi'));
        }
    }

    /* hàm hủy tham gia lớp phục vụ cho sinh viên
     * Chỉ hủy khi lớp vẫn trong hạn đăng ký
     *      */

    public function student_unenroll($id = null) {
        $this->Enrollment->id = $id;
        if (!$this->Enrollment->exists()) {
            throw new NotFoundException(__('Invalid enrollment'));
        }
        $course_id = $this->Enrollment->field('course_id');
        $this->Enrollment->Course->id = $course_id;
        $handangky = $this->Enrollment->Course->field('handangky');
        $course_name = $this->Enrollment->Course->field('name');
        if ($handangky < 1) {
            $this->Session->setFlash('Đã hết hạn hủy tham gia, bạn vui lòng liên hệ TT. Hỗ trợ -  Phát triển Dạy và Học để được trợ giúp', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Enrollment->delete()) {
            $options = array(
                'description' => $this->UserAuth->getUsername() . ' đã hủy đăng ký thành công lớp ' . $course_name
            );
            $this->LogUtil->log($options);
            $this->Session->setFlash('Đã hủy tham dự thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Hủy thất bại', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
    }

}
