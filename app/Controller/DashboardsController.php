<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardsController
 * @author NguyenThai
 */
class DashboardsController extends AppController {

    public $uses = array('User', 'Course', 'Enrollment', 'Chapter', 'Cert');

    public function home() {
        $this->theme = 'Home';
        if ($this->UserAuth->isLogged()) {

            $this->redirect("/{$this->UserAuth->getGroupAlias()}/dashboards/home");
        }
        
    }

    public function student_home() {
        //Kỹ năng đã tham gia
        $student_id = $this->UserAuth->getUserId();

        $contain = array('Student' => array('fields' => array('id', 'name')), 'Course' => array(
                'Period' => array('Room'),
                'Chapter' => array('ChapterType', 'fields' => array('id', 'name')), 'fields' => array('id', 'name', 'trang_thai', 'handangky')));

        $enrollments = $this->Enrollment->find('all', array(
            'conditions' => array(
                'Enrollment.student_id' => $student_id
            ),
            'contain' => $contain)
        );

        /* Kiem tra sinh vien co du dieu kien cap chung nhan */

        //Check da hoan thanh cac ky nang bb chua
        $knbatbuot = $this->Chapter->getChapterId(KY_NANG_BAT_BUOC);
        if (is_null($knbatbuot)) {
            $knbatbuot = array();
        }

        $lop_kn_dat = $this->Course->Enrollment->find('all', array(
            'conditions' => array(
                'Enrollment.student_id' => $student_id,
                'Enrollment.pass' => 1), 'recursive' => -1
        ));


        $lop_kn_dat = Set::classicExtract($lop_kn_dat, '{n}.Enrollment.course_id');

        $course_da_hoc = $this->Course->find('all', array('conditions' => array('Course.id' => $lop_kn_dat), 'recursive' => -1));

        $chapter_dat = Set::classicExtract($course_da_hoc, '{n}.Course.chapter_id');
        if (is_null($chapter_dat)) {
            $chapter_dat = array();
        }
        $result = array_intersect($knbatbuot, $chapter_dat);
        $message = "";
        if (!array_diff($knbatbuot, $result)) {
            //Đã đủ kỹ năng bắt buộc
            //check da hoan thanh cac ky nang tự chọn chua
            if (count($chapter_dat) > 4) {
                //Đã đủ dk nhan cn
                //Kiểm tra xem đã yêu cầu chứng nhận chưa
                $yeu_cau_cn = $this->Cert->find('count', array('conditions' => array('Cert.student_id' => $student_id), 'recursive' => -1));
                if ($yeu_cau_cn > 0) {
                    $chung_nhan_da_co = $this->Cert->find('count', array('conditions' => array('Cert.student_id' => $student_id, 'Cert.da_in' => 1), 'recursive' => -1));
                    if ($chung_nhan_da_co) {
                        //CN da co va da duoc in
                        $message = "Đã có chứng nhận, Bạn vui lòng liên hệ TT Hỗ trợ - Phát triển Dạy và Học để nhận";
                    } else {
                        //Yeu cau dang duoc xu ly
                        $message = "Yêu cầu chứng nhận đang được xử lý";
                    }
                } else {
                    //message la ban da du deu kien nhan chung nhan
                    $message = 'Bạn đã đủ điều kiện cấp chứng nhận. <a href="/knm/student/certs/request"> click vào đây</a> để thực hiện';
                }
            } else {
                //Chua du dieu kien cap cn
                $message = "Bạn phải hoàn thành 2 kỹ năng bắt buộc và 03 kỹ năng tự chọn";
            }
        } else {
            //chua hoan thanh ky nang bat buoc
            $message = 'Bạn chưa tham gia đủ ' . count($knbatbuot) . ' kỹ năng bắt buộc';
        }


        $this->set(compact('enrollments', 'message'));
    }

    public function teacher_home() {
        $this->redirect(array('controller' => 'periods', 'action' => 'index', 'teacher' => true));
    }

    /* Hiển thị danh sách các lớp kỹ năng có thể mở */
    /* Hiển thị danh sách các lớp kỹ năng có chờ hủy */

    public function manager_home() {
        $contain = array('Chapter' => array('fields' => array('id', 'name')), 'Teacher' => array('id', 'name'));
        $lopchohuy = $this->Course->find('all', array(
            'conditions' => array(
                'Course.trang_thai' => COURSE_WAIT_CANCEL
            ),
            'contain' => $contain
        ));
        $lopcothemo = $this->Course->find('all', array(
            'conditions' => array(
                'Course.trang_thai' => COURSE_OPENABLE
            ),
            'contain' => $contain
        ));

        $this->set(compact('lopchohuy', 'lopcothemo'));
    }

    public function admin_home() {
        
    }

    public function contact() {
        
    }

    public function help() {
        
    }

    public function sendmail() {
        $email = new CakeEmail();
        $email->config('gmail');
        $email->to('thaitoan2210@gmail.com');
        $email->subject('Email Verification Mail');
        try {
            $email->send('Nội dung email');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
