<?php

App::uses('AppController', 'Controller');

/**
 * TeachingPlans Controller
 *
 * @property TeachingPlan $TeachingPlan
 * @property PaginatorComponent $Paginator
 */
class TeachingPlansController extends AppController {

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
    public function teacherindex() {

        $conditions = array();
        if (!empty($this->request->query)) {
            $start = $this->request->query['start'];
            $end = $this->request->query['end'];
            $conditions = array('TeachingPlan.date <=' => $start, 'TeachingPlan.date <=' => $end);
            //'TeachingPlan.teacher_id' => $this->UserAuth->getUserId()
            $conditions = Set::merge($conditions, array('TeachingPlan.teacher_id' => $this->UserAuth->getUserId()));
        }

        $this->TeachingPlan->recursive = 0;
        $teachingPlans = $this->TeachingPlan->find('all', array('conditions' => $conditions, 'recursive' => -1));
        if ($this->RequestHandler->isAjax()) {
            $this->autoRender = false;
            $this->layout = 'ajax';
            $this->set('teachingPlans', $teachingPlans);
            $this->render('teaching_plan_event');
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
        if (!$this->TeachingPlan->exists($id)) {
            throw new NotFoundException(__('Invalid teaching plan'));
        }
        $options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
        $this->set('teachingPlan', $this->TeachingPlan->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!$this->TeachingPlan->Teacher->duocPhanCong($this->UserAuth->getUserId())) {
            $this->Session->setFlash('Hệ thống thấy rằng bạn chưa được phân công giảng dạy. Vui lòng liên hệ Trung tâm HT-PT Dạy và Học để xử lý', 'alert', array('class' => 'alert-warning'));
            $this->redirect('/');
        }
        if (!empty($this->request->data)) {
            $this->TeachingPlan->create();
            $date = $this->request->data['start'];
            unset($this->request->data['start']);
            $teacher_id = $this->UserAuth->getUserId();
            $session = $this->request->data['TeachingPlan']['session'];
            $this->request->data['TeachingPlan']['teacher_id'] = $teacher_id;
            /* Tạo thêm các buổi còn lại */
            $row1 = $this->request->data;
            $row2 = $row1;
            if ($session == 'S') {/* Buổi sáng */
                $date1 = date('Y-m-d H:i:s', strtotime($date . ' +7 hours'));
                $date2 = date('Y-m-d H:i:s', strtotime($date . ' +7 days 7 hours'));
                /* Nếu buổi 1 đã có thì báo lỗi */
                if ($this->TeachingPlan->isExist($date1, $session, $teacher_id)) {
                    $formatDate = new DateTime($date1);
                    echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký rồi!'));
                    exit;
                }
                /* Nếu buổi 2 đã có thì báo lỗi */
                if ($this->TeachingPlan->isExist($date2, $session, $teacher_id)) {
                    $formatDate = new DateTime($date2);
                    echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi sáng rồi!'));
                    exit;
                }
                $row1['TeachingPlan']['date'] = $date1;
                $row2['TeachingPlan']['date'] = $date2;
                $row1['TeachingPlan']['name'] = 1;
                $row2['TeachingPlan']['name'] = 2;
                $data = array($row1, $row2);
            } else {
                if ($session == 'C') {/* Buổi chiều */
                    $date1 = date('Y-m-d H:i:s', strtotime($date . ' +13 hours'));
                    $date2 = date('Y-m-d H:i:s', strtotime($date . ' +7 days 13 hours'));

                    if ($this->TeachingPlan->isExist($date1, $session, $teacher_id)) {
                        $formatDate = new DateTime($date1);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }

                    if ($this->TeachingPlan->isExist($date2, $session, $teacher_id)) {
                        $formatDate = new DateTime($date2);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }

                    $row1['TeachingPlan']['date'] = $date1;
                    $row2['TeachingPlan']['date'] = $date2;
                    $row1['TeachingPlan']['name'] = 1;
                    $row2['TeachingPlan']['name'] = 2;
                    $data = array($row1, $row2);
                } else {/* Cả 2 buổi */
                    $row1s = $row2s = $row1c = $row2c = $row1;
                    $date1s = date('Y-m-d H:i:s', strtotime($date . ' +7 hours'));
                    $date2s = date('Y-m-d H:i:s', strtotime($date . ' +7 days 7 hours'));
                    if ($this->TeachingPlan->isExist($date1s, 'S', $teacher_id)) {
                        $formatDate = new DateTime($date1s);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }
                    if ($this->TeachingPlan->isExist($date2s, 'S', $teacher_id)) {
                        $formatDate = new DateTime($date2s);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }
                    $date1c = date('Y-m-d H:i:s', strtotime($date . ' +13 hours'));
                    $date2c = date('Y-m-d H:i:s', strtotime($date . ' +7 days 13 hours'));
                    if ($this->TeachingPlan->isExist($date1c, 'C', $teacher_id)) {
                        $formatDate = new DateTime($date1c);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));

                        exit;
                    }
                    if ($this->TeachingPlan->isExist($date2c, 'C', $teacher_id)) {
                        $formatDate = new DateTime($date2c);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));

                        exit;
                    }

                    $row1s['TeachingPlan']['date'] = $date1s;
                    $row2s['TeachingPlan']['date'] = $date2s;
                    $row1s['TeachingPlan']['name'] = 1;
                    $row2s['TeachingPlan']['name'] = 2;
                    $row1s['TeachingPlan']['session'] = 'S';
                    $row2s['TeachingPlan']['session'] = 'S';
                    $row1c['TeachingPlan']['date'] = $date1c;
                    $row2c['TeachingPlan']['date'] = $date2c;
                    $row1c['TeachingPlan']['name'] = 1;
                    $row2c['TeachingPlan']['name'] = 2;
                    $row1c['TeachingPlan']['session'] = 'C';
                    $row2c['TeachingPlan']['session'] = 'C';
                    $data = array($row1s, $row2s, $row1c, $row2c);
                }
            }
            try {
                $this->TeachingPlan->saveMany($data);
                echo json_encode(array('success' => 1));
                exit;
            } catch (Exception $exc) {
                echo json_encode(array('success' => 0, 'message' => $exc->getTraceAsString()));
                exit;
            }
        }
    }

    /*Quan ly them ke hoach day cho giang vien*/
    
    public function manager_add() {
        $teachers=$this->TeachingPlan->Teacher->find('list',array('conditions'=>array('Teacher.user_group_id'=>TEACHER_GROUP_ID)));
        $this->set('teachers',$teachers);
        if (!empty($this->request->data)) {
            $this->TeachingPlan->create();
            $date = $this->request->data['start'];
            unset($this->request->data['start']);
            //$teacher_id = $this->UserAuth->getUserId();
            $session = $this->request->data['TeachingPlan']['session'];
            $teacher_id=$this->request->data['TeachingPlan']['teacher_id'];
            /* Tạo thêm các buổi còn lại */
            $row1 = $this->request->data;
            $row2 = $row1;
            if ($session == 'S') {/* Buổi sáng */
                $date1 = date('Y-m-d H:i:s', strtotime($date . ' +7 hours'));
                $date2 = date('Y-m-d H:i:s', strtotime($date . ' +7 days 7 hours'));
                /* Nếu buổi 1 đã có thì báo lỗi */
                if ($this->TeachingPlan->isExist($date1, $session, $teacher_id)) {
                    $formatDate = new DateTime($date1);
                    echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký rồi!'));
                    exit;
                }
                /* Nếu buổi 2 đã có thì báo lỗi */
                if ($this->TeachingPlan->isExist($date2, $session, $teacher_id)) {
                    $formatDate = new DateTime($date2);
                    echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi sáng rồi!'));
                    exit;
                }
                $row1['TeachingPlan']['date'] = $date1;
                $row2['TeachingPlan']['date'] = $date2;
                $row1['TeachingPlan']['name'] = 1;
                $row2['TeachingPlan']['name'] = 2;
                $data = array($row1, $row2);
            } else {
                if ($session == 'C') {/* Buổi chiều */
                    $date1 = date('Y-m-d H:i:s', strtotime($date . ' +13 hours'));
                    $date2 = date('Y-m-d H:i:s', strtotime($date . ' +7 days 13 hours'));

                    if ($this->TeachingPlan->isExist($date1, $session, $teacher_id)) {
                        $formatDate = new DateTime($date1);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }

                    if ($this->TeachingPlan->isExist($date2, $session, $teacher_id)) {
                        $formatDate = new DateTime($date2);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }

                    $row1['TeachingPlan']['date'] = $date1;
                    $row2['TeachingPlan']['date'] = $date2;
                    $row1['TeachingPlan']['name'] = 1;
                    $row2['TeachingPlan']['name'] = 2;
                    $data = array($row1, $row2);
                } else {/* Cả 2 buổi */
                    $row1s = $row2s = $row1c = $row2c = $row1;
                    $date1s = date('Y-m-d H:i:s', strtotime($date . ' +7 hours'));
                    $date2s = date('Y-m-d H:i:s', strtotime($date . ' +7 days 7 hours'));
                    if ($this->TeachingPlan->isExist($date1s, 'S', $teacher_id)) {
                        $formatDate = new DateTime($date1s);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }
                    if ($this->TeachingPlan->isExist($date2s, 'S', $teacher_id)) {
                        $formatDate = new DateTime($date2s);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi sáng ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));
                        exit;
                    }
                    $date1c = date('Y-m-d H:i:s', strtotime($date . ' +13 hours'));
                    $date2c = date('Y-m-d H:i:s', strtotime($date . ' +7 days 13 hours'));
                    if ($this->TeachingPlan->isExist($date1c, 'C', $teacher_id)) {
                        $formatDate = new DateTime($date1c);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));

                        exit;
                    }
                    if ($this->TeachingPlan->isExist($date2c, 'C', $teacher_id)) {
                        $formatDate = new DateTime($date2c);
                        echo json_encode(array('success' => 0, 'message' => 'Buổi chiều ngày ' . $formatDate->format('d/m/Y') . ' đã đăng ký buổi này rồi!'));

                        exit;
                    }

                    $row1s['TeachingPlan']['date'] = $date1s;
                    $row2s['TeachingPlan']['date'] = $date2s;
                    $row1s['TeachingPlan']['name'] = 1;
                    $row2s['TeachingPlan']['name'] = 2;
                    $row1s['TeachingPlan']['session'] = 'S';
                    $row2s['TeachingPlan']['session'] = 'S';
                    $row1c['TeachingPlan']['date'] = $date1c;
                    $row2c['TeachingPlan']['date'] = $date2c;
                    $row1c['TeachingPlan']['name'] = 1;
                    $row2c['TeachingPlan']['name'] = 2;
                    $row1c['TeachingPlan']['session'] = 'C';
                    $row2c['TeachingPlan']['session'] = 'C';
                    $data = array($row1s, $row2s, $row1c, $row2c);
                }
            }
            try {
                $this->TeachingPlan->saveMany($data);
                echo json_encode(array('success' => 1));
                exit;
            } catch (Exception $exc) {
                echo json_encode(array('success' => 0, 'message' => $exc->getTraceAsString()));
                exit;
            }
        }
    }
    
    /*Hàm lấy danh sac kế hoạch show ra cho manager lúc lập kế hoạch cho giảng viên*/
    public function manager_index() {

        $conditions = array();
        if (!empty($this->request->query)) {
            $start = $this->request->query['start'];
            $end = $this->request->query['end'];
            $conditions = array('TeachingPlan.date <=' => $start, 'TeachingPlan.date <=' => $end);
            }

        $this->TeachingPlan->recursive = 0;
        $teachingPlans = $this->TeachingPlan->find('all', array('conditions' => $conditions, 'recursive' => -1));
        if ($this->RequestHandler->isAjax()) {
            $this->autoRender = false;
            $this->layout = 'ajax';
            $this->set('teachingPlans', $teachingPlans);
            $this->render('teaching_plan_event');
        }
    }
    
    /*Hàm thực hiện xóa kế hoạch trong lúc lập kế hoạch cho giảng viên*/
    
    public function manager_delete($id = null) {
        $this->autoRender = false;
        $this->TeachingPlan->id = $id;
        $date = $this->TeachingPlan->field('date');
        $session = $this->TeachingPlan->field('session');

        $date_1 = date('Y-m-d H:i:s', strtotime($date . ' +7 days'));
        $date_2 = date('Y-m-d H:i:s', strtotime($date . ' -7 days'));

        $teacher_id = $this->TeachingPlan->field('teacher_id');
        $this->request->allowMethod('post', 'delete');
        if ($this->TeachingPlan->deleteAll(array('OR' => array(
                        array('TeachingPlan.id' => $id),
                        array('TeachingPlan.date' => $date_1, 'TeachingPlan.session' => $session, 'TeachingPlan.teacher_id' => $teacher_id),
                        array('TeachingPlan.date' => $date_2, 'TeachingPlan.session' => $session, 'TeachingPlan.teacher_id' => $teacher_id)
            )))) {
            echo json_encode(array('success' => 1, 'id' => $id));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Xóa không thành công'));
        }
    }
    
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->TeachingPlan->exists($id)) {
            throw new NotFoundException(__('Invalid teaching plan'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->TeachingPlan->save($this->request->data)) {
                return $this->flash(__('The teaching plan has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('TeachingPlan.' . $this->TeachingPlan->primaryKey => $id));
            $this->request->data = $this->TeachingPlan->find('first', $options);
        }
        $teachers = $this->TeachingPlan->Teacher->find('list');
        $this->set(compact('teachers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function teacherdelete($id = null) {
        $this->autoRender = false;
        $this->TeachingPlan->id = $id;
        $date = $this->TeachingPlan->field('date');
        $session = $this->TeachingPlan->field('session');

        $date_1 = date('Y-m-d H:i:s', strtotime($date . ' +7 days'));
        $date_2 = date('Y-m-d H:i:s', strtotime($date . ' -7 days'));

        $teacher_id = $this->TeachingPlan->field('teacher_id');
        $this->request->allowMethod('post', 'delete');
        if ($this->TeachingPlan->deleteAll(array('OR' => array(
                        array('TeachingPlan.id' => $id),
                        array('TeachingPlan.date' => $date_1, 'TeachingPlan.session' => $session, 'TeachingPlan.teacher_id' => $teacher_id),
                        array('TeachingPlan.date' => $date_2, 'TeachingPlan.session' => $session, 'TeachingPlan.teacher_id' => $teacher_id)
            )))) {
            echo json_encode(array('success' => 1, 'id' => $id));
        } else {
            echo json_encode(array('success' => 0, 'message' => 'Xóa không thành công'));
        }
    }

    /**
     * teacher_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->TeachingPlan->id = $id;
        if (!$this->TeachingPlan->exists()) {
            throw new NotFoundException(__('Invalid teaching plan'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->TeachingPlan->delete()) {
            return $this->flash(__('The teaching plan has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The teaching plan could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /* Hàm lấy thông tin đăng ký lịch dạy của giảng viên */

    public function managerTeachingPlanInfo($date) {
        $this->layout = 'ajax';
        App::uses('CakeTime', 'Utility');

        $conditions = array(CakeTime::dayAsSql($date, 'TeachingPlan.date'));
        $teachingPlans = $this->TeachingPlan->find('all', array('conditions' => $conditions));
        $this->set(compact('teachingPlans'));
    }

    /* Hàm lấy thông tin đăng ký lịch dạy của giảng viên */

    public function managerindex() {

        $conditions = array();
        if (!empty($this->request->query)) {
            $start = $this->request->query['start'];
            $end = $this->request->query['end'];

            $conditions = array('TeachingPlan.date <=' => $start, 'TeachingPlan.date <=' => $end);

            /* Xử lý bộ lọc */
            /* Lọc buổi */
            if (!empty($this->request->query['session'])) {
                $conditions = Set::merge($conditions, array('TeachingPlan.session' => $this->request->query['session']));
            }
            /* Lọc giảng viên */
            if (!empty($this->request->query['teacher_id'])) {
                $conditions = Set::merge($conditions, array('TeachingPlan.teacher_id' => $this->request->query['teacher_id']));
            }
            
            //$course_conditions = array('Course.start<=' => $start, 'Course.start <=' => $end);

            if (!$this->UserAuth->getGroupId() == MANAGER_GROUP_ID || !$this->UserAuth->getGroupId() == ADMIN_GROUP_ID) {
                $conditions = Set::merge($conditions, array('TeachingPlan.teacher_id' => $this->UserAuth->getUserId()));
                $course_conditions = Set::merge($course_conditions, array('Course.teacher_id' => $this->UserAuth->getUserId()));
            }
        }


        //$startDateTime=new DateTime($start);
        $period_conditions = array('Period.start <=' => $start, 'Period.start <=' => $end);
        $this->loadModel('Period');
        
        $periods = $this->Period->find('all', array('conditions' => $period_conditions, 'contain' => array('Course' => array('Teacher' => array('fields' => array('id'))))));
        
        $teachingPlans = $this->TeachingPlan->find('all', array('conditions' => $conditions,
            'contain' => array('Teacher' => array('fields' => array('id', 'first_name', 'last_name'), 'Chapter'))));
        if ($this->RequestHandler->isAjax()) {
            $this->autoRender = false;
            $this->layout = 'ajax';
            $this->set(compact('teachingPlans', 'periods'));
            $this->render('manager_plan_event');
        }
    }

}
