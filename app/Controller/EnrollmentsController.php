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
    public $components = array('Paginator');

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
        
        if ($handangky < 1) {
            $this->Session->setFlash('Đã hết hạn hủy tham gia, bạn vui lòng liên hệ TT. Hỗ trợ -  Phát triển Dạy và Học để được trợ giúp', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Enrollment->delete()) {
            $this->Session->setFlash('Đã hủy tham dự thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Hủy thất bại', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
    }

}
