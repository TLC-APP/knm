<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardsController
 * @author NguyenThai
 */
class DashboardsController extends AppController {

    public function home() {
        $this->theme='Home';
        if ($this->UserAuth->isLogged()) {

            $this->redirect("/{$this->UserAuth->getGroupAlias()}/dashboards/home");
        }
        if ($this->RequestHandler->isMobile()) {
            $this->render('home_mobile');
        }
    }

    public function student_home() {
        
    }

    public function teacher_home() {
        
    }

    public function manager_home() {
        
    }

    public function admin_home() {
        
    }

    public function contact() {
        
    }

    public function help() {
        
    }

    public function sendmail(){
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
