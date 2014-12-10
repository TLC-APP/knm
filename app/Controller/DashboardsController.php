<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardsController
 * @author NguyenThai
 */
class DashboardsController extends AppController {

    public $uses = array('User', 'Course', 'Enrollment');

    public function home() {
        $this->theme = 'Home';
        if ($this->UserAuth->isLogged()) {

            $this->redirect("/{$this->UserAuth->getGroupAlias()}/dashboards/home");
        }
        /*
          if ($this->RequestHandler->isMobile()) {
          $this->render('home_mobile');
          }
         * 
         */
    }

    public function student_home() {
        //Kỹ năng đã tham gia
        $student_id = $this->UserAuth->getUserId();

        $contain = array('Student' => array('fields' => array('id', 'name')), 'Course' => array(
                'Chapter' => array('ChapterType', 'fields' => array('id', 'name')), 'fields' => array('id', 'name','trang_thai','handangky')));

        $enrollments = $this->Enrollment->find('all', array(
            'conditions' => array(
                'Enrollment.student_id' => $student_id
            ),
            'contain' => $contain)
                );
        $this->set('enrollments', $enrollments);
    }

    public function teacher_home() {
        
    }

    public function manager_home() {
        
    }

    public function admin_home() {
        
    }

    public function contact() {
        $this->theme = 'Home';
    }

    public function help() {
        $this->theme = 'Home';
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
