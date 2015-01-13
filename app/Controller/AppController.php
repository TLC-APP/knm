<?php

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
//        'DebugKit.Toolbar',
        'Session',
        'RequestHandler',
        'Usermgmt.UserAuth', 'Paginator'
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
    public $uses = array('Course', 'Period');

    //Update trạng thái chờ hủy cho course khi hết hạng đăng ký và không đủ số lượng mở lớp
    protected function updateTrangThaiChoHuy() {
        $conditions = array('DATEDIFF(ADDDATE(Course.start,-14),CURDATE())<1', "Course.trang_thai" => COURSE_ENROLLING);
        $this->Course->updateAll(array('Course.trang_thai' => COURSE_WAIT_CANCEL), $conditions);
    }

    //Update trạng thái lớp hết hạn và đủ điều kiện mở lớp

    protected function updateCourseOpenable() {

        $conditions = array('DATEDIFF(ADDDATE(Course.start,-14),CURDATE())<1', "Course.trang_thai" => COURSE_ENROLLING, 'Course.enrolledno >=' => SO_SINH_VIEN_TOI_THIEU);
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
        if ($this->UserAuth->isLogged() && $this->action!='elfinder'&&$this->UserAuth->getGroupAlias() && !$this->request->is('ajax')) {

            $this->layout = $this->UserAuth->getGroupAlias();
        }else{
            if (!$this->UserAuth->isLogged()&&$this->request->action!='login'&&$this->request->action!='register') {
            $this->theme = 'Home';
        }
        }
    }

}
