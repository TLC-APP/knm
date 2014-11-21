<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'RequestHandler',
        'Usermgmt.UserAuth',
    );
    public $helpers = array
        ('Session',
        'Js',
        'Usermgmt.UserAuth',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator')
    );
    public $theme = "Ace";
    //public $layout = "teacher";
    public $uses = array('Course', 'Period');

    //Update trạng thái chờ hủy cho course khi hết hạng đăng ký và không đủ số lượng mở lớp
    protected function updateTrangThaiChoHuy() {

        $conditions = array('DATEDIFF(CURDATE(),Course.start)>' . HAN_DANG_KY, "Course.trang_thai" => COURSE_ENROLLING);
        $this->Course->updateAll(array('Course.trang_thai' => COURSE_WAIT_CANCEL), $conditions);
    }

    //Update trạng thái lớp hết hạn và đủ điều kiện mở lớp

    protected function updateCourseOpenable() {

        $conditions = array('DATEDIFF(CURDATE(),Course.start)>' . HAN_DANG_KY, "Course.trang_thai" => COURSE_ENROLLING, 'Course.enrolledno >=' => SO_SINH_VIEN_TOI_THIEU);
        $count = $this->Course->find('count', array('conditions' => $conditions));
        if ($count > 0) {
            if (TU_DONG_MO_LOP) {
                $this->Course->updateAll(array('Course.trang_thai' => COURSE_OPEN), $conditions);
            } else {
                $this->Course->updateAll(array('Course.trang_thai' => COURSE_OPEN), $conditions);
            }
        }
    }

    private function userAuth() {
        $this->UserAuth->beforeFilter($this);
    }

    function beforeFilter() {
        $this->updateCourseOpenable();
        $this->updateTrangThaiChoHuy();
        parent::beforeFilter();
        $this->userAuth();
    }

    public function beforeRender() {
        parent::beforeRender();
        if ($this->UserAuth->isLogged() && $this->UserAuth->getGroupAlias() && !$this->request->is('ajax')) {

            $this->layout = $this->UserAuth->getGroupAlias();
        }
    }

}
