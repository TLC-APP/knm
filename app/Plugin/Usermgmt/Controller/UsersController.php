<?php

App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UsersController extends UserMgmtAppController {

    /**
     * This controller uses following models
     *
     * @var array
     */
    public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');
    public $components = array('Paginator');

    /**
     * Called before the controller action.  You can use this method to configure and customize components
     * or perform logic that needs to happen before each controller action.
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->User->userAuth = $this->UserAuth;
    }

    /**
     * Used to display all users by Admin
     * @access public
     * @return array
     */
    public function index() {
        $this->User->unbindModel(array('hasMany' => array('LoginToken')));
        //$users = $this->User->find('all', array('order' => 'User.id desc'));
        /* Kiểm tra có yêu cầu filter ko */
        $conditions = array();
        if (isset($this->request->data['User']['username']) && !empty($this->request->data['User']['username'])) {
            $conditions = Set::merge($conditions, array('User.username like' => '%' . $this->request->data['User']['username'] . '%'));
        }
        if (isset($this->request->data['User']['first_name']) && !empty($this->request->data['User']['first_name'])) {
            $conditions = Set::merge($conditions, array('User.first_name like' => '%' . $this->request->data['User']['first_name'] . '%'));
        }
        if (isset($this->request->data['User']['last_name']) && !empty($this->request->data['User']['last_name'])) {
            $conditions = Set::merge($conditions, array('User.last_name like' => '%' . $this->request->data['User']['last_name'] . '%'));
        }

        if (isset($this->request->data['User']['classroom_id']) && !empty($this->request->data['User']['classroom_id'])) {
            $conditions = Set::merge($conditions, array('User.classroom_id' => $this->request->data['User']['classroom_id']));
        }

        if (isset($this->request->data['User']['department_id']) && !empty($this->request->data['User']['department_id'])) {
            $conditions = Set::merge($conditions, array('User.department_id' => $this->request->data['User']['department_id']));
        }
        if (isset($this->request->data['User']['user_group_id']) && !empty($this->request->data['User']['user_group_id'])) {
            $conditions = Set::merge($conditions, array('User.user_group_id' => $this->request->data['User']['user_group_id']));
        }
        $this->Paginator->settings = array('conditions' => $conditions);
        $users = $this->Paginator->paginate();
        $this->set('users', $users);
        if ($this->request->is('ajax')) {
            $this->viewPath.='/ajax';
        } else {
            $userGroups = $this->UserGroup->getGroups();
            $departments = $this->User->Department->find('list');
            $classrooms = $this->User->Classroom->find('list');
            $this->set(compact('userGroups', 'departments', 'classrooms'));
        }
    }

//Hàm liệt kê danh sách sinh viên
    public function manager_student_index() {
        $this->User->unbindModel(array('hasMany' => array('LoginToken')));
        $conditions = array('User.user_group_id' => 2);
        $this->Paginator->settings = array('conditions' => $conditions);
        $users = $this->Paginator->paginate();
        $this->set('users', $users);
        if ($this->request->is('ajax')) {
            $this->viewPath.='/ajax';
        } else {
            $userGroups = $this->UserGroup->getGroups();
            $departments = $this->User->Department->find('list');
            $classrooms = $this->User->Classroom->find('list');
            $this->set(compact('userGroups', 'departments', 'classrooms'));
        }
    }

    /**
     * Used to display detail of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return array
     */
    public function viewUser($userId = null) {
        if (!empty($userId)) {
            $user = $this->User->read(null, $userId);
            debug($user);
            die;
            $this->set('user', $user);
        } else {
            $this->redirect('/allUsers');
        }
    }

    public function myprofile() {
        $this->autoRender = false;
        $this->redirect(array('action' => $this->UserAuth->getGroupAlias() . 'profile'));
    }

    public function editUser($id) {
        $this->autoRender = false;
        $this->redirect(array('action' => $this->UserAuth->getGroupAlias() . 'EditUser', $id));
    }

    /**
     * Used to display detail of user by user
     *
     * @access public
     * @return array
     */
    public function studentprofile() {
        $userId = $this->UserAuth->getUserId();
        $contain = array('Province', 'Classroom' => array('Department' => array('fields' => array('Department.id', 'Department.name'))), 'UserGroup');
        //$fields=array('department_id','user_group_id','id','name','borndate','bornplace','sex','email','phone','classroom_id','username','last_login','created');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userId), 'contain' => $contain));
        $this->set('user', $user);
    }

    /**
     * Used to display detail of user by user
     *
     * @access public
     * @return array
     */
    public function teacherprofile() {
        $userId = $this->UserAuth->getUserId();
        $contain = array('Department', 'UserGroup');
        //$fields=array('department_id','user_group_id','id','name','borndate','bornplace','sex','email','phone','classroom_id','username','last_login','created');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userId), 'contain' => $contain));
        $this->set('user', $user);
    }

    /* Cập nhật thông tin người dùng cho manager */

    public function managerEditUser($userId = null) {
        $departments = $this->User->Department->find('list');
        $chapters = $this->User->Chapter->find('list');
        $this->set(compact('departments', 'chapters'));
        $this->User->id = $userId;
        if (!$this->User->exists()) {
            throw new Exception('Lỗi không tồn tại người dùng');
        }
        if ($this->UserAuth->getUserId() != $userId && ($this->UserAuth->getGroupAlias() != 'admin' && $this->UserAuth->getGroupAlias() != 'manager')) {
            $this->redirect('accessDenied');
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Đã cập nhật thông tin thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('manager' => true, 'action' => 'teacher_index'));
            } else {
                $this->Session->setFlash(__('Validate không thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $user = $this->User->read(null, $userId);
            $this->request->data = null;
            if (!empty($user)) {
                $user['User']['password'] = '';
                $this->request->data = $user;
            }
        }
    }

    /* Quản lý cập nhật kỹ năng có thể giảng dạy của giảng viên */


    /* Hiển thị danh sách các giảng viên cho quản lý */

    /**
     * Used to logged in the site
     *
     * @access public
     * @return void
     */
    public function login() {
        $this->layout = 'login';
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['username'];
                $password = $this->data['User']['password'];
                $username = $email;
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        /* Kiểm tra tài khoản login thông qua ldap */
                        App::uses('ldap', 'Lib');
                        $ldap = new ldap();
                        if ($ldap->auth($username, $password)) {
                            /* Xử lý lưu giảng viên ở đây */
                            $ldap_user = $ldap->getInfo($username, $password);

                            $parts = explode(" ", $ldap_user['name']);
                            $first_name = array_pop($parts);
                            $salt = $this->UserAuth->makeSalt();
                            $ip = '';
                            if (isset($_SERVER['REMOTE_ADDR'])) {
                                $ip = $_SERVER['REMOTE_ADDR'];
                            }
                            $this->request->data['User']['username'] = $username;
                            $this->request->data['User']['password'] = $this->UserAuth->makePassword($password, $salt);
                            $this->request->data['User']['salt'] = $salt;
                            $this->request->data['User']['first_name'] = $first_name;
                            $this->request->data['User']['last_name'] = rtrim($ldap_user['name'], $first_name);
                            $this->request->data['User']['email'] = $ldap_user['email'];
                            $this->request->data['User']['email_verified'] = 1;
                            $this->request->data['User']['active'] = 1;
                            $this->request->data['User']['user_group_id'] = TEACHER_GROUP_ID;
                            $this->request->data['User']['ip_address'] = $ip;
                            $this->User->save($this->request->data, false);
                            $userId = $this->User->getLastInsertID();
                            $user = $this->User->findById($userId);
                            /* Kết thúc lưu giảng viên */
                        } else {
                            $this->Session->setFlash('Tài khoản đăng nhập chưa đúng', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                            return;
                        }
                        /* kết thúc chứng thực ldap */
                    }
                }
                // check for inactive account
                if ($user['User']['id'] != 1 and $user['User']['active'] == 0) {
                    $this->Session->setFlash('Tài khoản chưa được kích hoạt, vui lòng liên hệ Trung tâm Hỗ trợ - Phát triển Dạy và Học', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
                // check for verified account
                if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
                    $this->Session->setFlash('Bạn cần xác nhận Email trước khi đăng nhập', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
                if (empty($user['User']['salt'])) {
                    $hashed = md5($password);
                } else {
                    $hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
                }
                if ($user['User']['password'] === $hashed) {
                    if (empty($user['User']['salt'])) {
                        $salt = $this->UserAuth->makeSalt();
                        $user['User']['salt'] = $salt;
                        $user['User']['password'] = $this->UserAuth->makePassword($password, $salt);
                        $this->User->save($user, false);
                    }
                    $this->UserAuth->login($user);
                    $this->User->id = $this->UserAuth->getUserId();
                    $this->User->saveField('last_login', date("Y-m-d H:i:s"));
                    $remember = (!empty($this->data['User']['remember']));
                    if ($remember) {
                        $this->UserAuth->persist('2 weeks');
                    }

                    $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
                    $this->Session->delete('Usermgmt.OriginAfterLogin');
                    $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;

                    $this->redirect($redirect);
                } else {
                    $this->Session->setFlash('Tài khoản đăng nhập chưa đúng!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
            }
        }
        $bornplaces = $this->User->Province->find('list');
        $classrooms = $this->User->Classroom->find('list');
        $this->set(compact('bornplaces', 'classrooms'));
    }

    /**
     * Used to logged out from the site
     *
     * @access public
     * @return void
     */
    public function logout() {
        $this->UserAuth->logout();
        $this->Session->setFlash('Đăng xuất thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        $this->redirect(LOGOUT_REDIRECT_URL);
    }

    private function covertDateString($time, $format = 'd/m/Y') {
        $date = DateTime::createFromFormat($format, $time);
        if ($date) {
            return array(
                'day' => $date->format('d'),
                'month' => $date->format('m'),
                'year' => $date->format('Y')
            );
        }
        return null;
    }

    /**
     * Used to register on the site
     *
     * @access public
     * @return void
     */
    public function register() {
        $this->layout = 'login';
        $bornplaces = $this->User->Province->find('list');
        $classrooms = $this->User->Classroom->find('list');
        $this->set(compact('bornplaces', 'classrooms'));
        //die;
        //Kiểm tra user đã đăng nhập chưa ?
        $userId = $this->UserAuth->getUserId();
        if ($userId) {
            $this->redirect("/dashboard");
        }
        if (SITE_REGISTRATION) {

            $userGroups = $this->UserGroup->getGroupsForRegistration();
            $this->set('userGroups', $userGroups);
            if ($this->request->isPost()) {

                $this->request->data['User']['borndate'] = $this->covertDateString($this->request->data['User']['borndate'], 'Y-m-d');
                if (USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
                    $this->request->data['User']['captcha'] = (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
                }
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    if (!isset($this->data['User']['user_group_id'])) {
                        $this->request->data['User']['user_group_id'] = DEFAULT_GROUP_ID;
                    } elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
                        $this->Session->setFlash(__('Please select correct register as'));
                        return;
                    }
                    $this->request->data['User']['active'] = 1;
                    if (!EMAIL_VERIFICATION) {
                        $this->request->data['User']['email_verified'] = 1;
                    }
                    $ip = '';
                    if (isset($_SERVER['REMOTE_ADDR'])) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $this->request->data['User']['ip_address'] = $ip;
                    $salt = $this->UserAuth->makeSalt();
                    $this->request->data['User']['salt'] = $salt;
                    $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                    $this->User->save($this->request->data, false);
                    $userId = $this->User->getLastInsertID();
                    $user = $this->User->findById($userId);
                    if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
                        $this->User->sendRegistrationMail($user);
                    }
                    if (EMAIL_VERIFICATION) {
                        $this->User->sendVerificationMail($user);
                    }
                    if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
                        $this->UserAuth->login($user);
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Vui lòng kiểm tra email và hoàn tất đăng ký', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                        $this->redirect('/login');
                    }
                }
            }
        } else {
            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
            $this->redirect('/login');
        }
    }

    /**
     * Used to change the password by user
     *
     * @access public
     * @return void
     */
    public function changePassword() {
        $userId = $this->UserAuth->getUserId();
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $user = array();
                $user['User']['id'] = $userId;
                $salt = $this->UserAuth->makeSalt();
                $user['User']['salt'] = $salt;
                $user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                $this->User->save($user, false);
                $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                $this->Session->setFlash(__('Đổi password thành công.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/dashboard/home');
            }
        }
    }

    /**
     * Used to change the user password by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function changeUserPassword($userId = null) {
        if (!empty($userId)) {
            $name = $this->User->getNameById($userId);
            $this->set('name', $name);
            if ($this->request->isPost()) {
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    $user = array();
                    $user['User']['id'] = $userId;
                    $salt = $this->UserAuth->makeSalt();
                    $user['User']['salt'] = $salt;
                    $user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                    $this->User->save($user, false);
                    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                    $this->Session->setFlash(__('Password for %s changed successfully', $name), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    $this->redirect('/allUsers');
                }
            }
        } else {
            $this->redirect('/allUsers');
        }
    }

    //Hàm này dùng để đổi chuyển password từ password=>md5(password.md5(salt)) sinh viên
    public function convertPassword() {
        $success = 0;
        $students = $this->User->find('all', array('conditions' => array('user_group_id' => 2), 'recursive' => -1, 'fields' => array('id', 'password')));
        //debug($students);die;
        if (!empty($students)) {
            foreach ($students as $student) {
                $user['User']['id'] = $student['User']['id'];
                $oldpassword = $student['User']['password'];
                $salt = $this->UserAuth->makeSalt();
                $user['User']['salt'] = $salt;
                $user['User']['password'] = $this->UserAuth->makePassword2($oldpassword, $salt);
                if ($this->User->save($user, false)) {
                    $success++;
                }
            }
        }
        $this->Session->setFlash('Đã chuyển đổi password thành công cho ' + $success . ' sinh viên');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Used to add user on the site by Admin
     *
     * @access public
     * @return void
     */
    public function addUser() {
        $userGroups = $this->UserGroup->getGroups();
        $departments = $this->User->Department->find('list');
        $this->set(compact('userGroups', 'departments'));
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->request->data['User']['email_verified'] = 1;
                $this->request->data['User']['active'] = 1;
                $salt = $this->UserAuth->makeSalt();
                $this->request->data['User']['salt'] = $salt;
                $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                $this->User->save($this->request->data, false);
                $this->Session->setFlash('Đã thêm user mới thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/addUser');
            }
        }
    }

//quản lý Thêm sinh viên
    public function manager_add_teacher() {
        $userGroups = $this->UserGroup->getGroups();
        $chapters = $this->User->Chapter->find('list');
        $departments = $this->User->Department->find('list');
        $this->set(compact('userGroups', 'departments', 'chapters'));
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->request->data['User']['email_verified'] = 1;
                $this->request->data['User']['active'] = 1;
                $salt = $this->UserAuth->makeSalt();
                $this->request->data['User']['salt'] = $salt;
                $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                $this->User->save($this->request->data, false);
                $this->Session->setFlash('Đã thêm user mới thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/them-giang-vien');
            }
        }
    }

    /**
     * Used to edit user on the site by student
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function studentedit($userId = null) {
        $bornplaces = $this->User->Province->find('list');
        $classrooms = $this->User->Classroom->find('list');
        $this->set(compact('bornplaces', 'classrooms'));
        $this->User->id = $userId;
        if (!$this->User->exists()) {
            throw new Exception('Lỗi không tồn tại người dùng');
        }
        if ($this->UserAuth->getUserId() != $userId && ($this->UserAuth->getGroupAlias() != 'admin' || $this->UserAuth->getGroupAlias() != 'manager')) {
            $this->redirect('accessDenied');
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['borndate'] = $this->covertDateString($this->request->data['User']['borndate'], 'Y-m-d');
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Đã cập nhật thông tin thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                if ($this->UserAuth->getGroupAlias() == 'admin') {
                    $this->redirect('/allUsers');
                }
                $this->redirect(array('action' => 'myprofile'));
            } else {
                $this->Session->setFlash(__('Validate không thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $user = $this->User->read(null, $userId);
            $this->request->data = null;
            if (!empty($user)) {
                $user['User']['password'] = '';
                $this->request->data = $user;
            }
        }
    }

    /**
     * Used to edit user on the site by student
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function teacheredit($userId = null) {
        $departments = $this->User->Department->find('list');
        $this->set(compact('departments'));
        $this->User->id = $userId;
        if (!$this->User->exists()) {
            throw new Exception('Lỗi không tồn tại người dùng');
        }
        if ($this->UserAuth->getUserId() != $userId && ($this->UserAuth->getGroupAlias() != 'admin' || $this->UserAuth->getGroupAlias() != 'manager')) {
            $this->redirect('accessDenied');
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Đã cập nhật thông tin thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                if ($this->UserAuth->getGroupAlias() == 'admin') {
                    $this->redirect('/allUsers');
                }
                $this->redirect(array('action' => 'myprofile'));
            } else {
                $this->Session->setFlash(__('Validate không thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $user = $this->User->read(null, $userId);
            $this->request->data = null;
            if (!empty($user)) {
                $user['User']['password'] = '';
                $this->request->data = $user;
            }
        }
    }

    /**
     * Used to delete the user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function deleteUser($userId = null) {
        if (!empty($userId)) {
            if ($this->request->isPost()) {
                if ($this->User->delete($userId, false)) {
                    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                    $this->Session->setFlash(__('User is successfully deleted'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
            }
            $this->redirect('/allUsers');
        } else {
            $this->redirect('/allUsers');
        }
    }

    /**
     * Used to show dashboard of the user
     *
     * @access public
     * @return array
     */
    public function dashboard() {
        $userId = $this->UserAuth->getUserId();
        $user = $this->User->findById($userId);
        $this->set('user', $user);
    }

    /**
     * Used to activate or deactivate user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @param integer $active active or inactive
     * @return void
     */
    public function makeActiveInactive($userId = null, $active = 0) {
        if (!empty($userId)) {
            $user = array();
            $user['User']['id'] = $userId;
            $user['User']['active'] = ($active) ? 1 : 0;
            $this->User->save($user, false);
            if ($active) {
                $this->Session->setFlash(__('User is successfully activated'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            } else {
                $this->Session->setFlash(__('User is successfully deactivated'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        }
        $this->redirect('/allUsers');
    }

    /**
     * Used to verify email of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function verifyEmail($userId = null) {
        if (!empty($userId)) {
            $user = array();
            $user['User']['id'] = $userId;
            $user['User']['email_verified'] = 1;
            $this->User->save($user, false);
            $this->Session->setFlash(__('Đã xác nhận email của người dùng'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        }
        $this->redirect('/allUsers');
    }

    /**
     * Used to show access denied page if user want to view the page without permission
     *
     * @access public
     * @return void
     */
    public function accessDenied() {
        
    }

    /**
     * Used to verify user's email address
     *
     * @access public
     * @return void
     */
    public function userVerification() {
        if (isset($_GET['ident']) && isset($_GET['activate'])) {
            $userId = $_GET['ident'];
            $activateKey = $_GET['activate'];
            $user = $this->User->read(null, $userId);
            if (!empty($user)) {
                if (!$user['User']['email_verified']) {
                    $password = $user['User']['password'];
                    $theKey = $this->User->getActivationKey($password);
                    if ($activateKey == $theKey) {
                        $user['User']['email_verified'] = 1;
                        $this->User->save($user, false);
                        if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
                            $this->User->sendRegistrationMail($user);
                        }
                        $this->Session->setFlash(__('Chúc mừng, tài khoản của bạn đã được kích hoạt'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    }
                } else {
                    $this->Session->setFlash(__('Thank you, your account is already activated'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
            } else {
                $this->Session->setFlash(__('Sorry something went wrong, please click on the link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $this->Session->setFlash(__('Sorry something went wrong, please click on the link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        $this->redirect('/login');
    }

    /**
     * Used to send forgot password email to user
     *
     * @access public
     * @return void
     */
    public function forgotPassword() {
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['email'];
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        $this->Session->setFlash(__('Email hoặc username chưa đúng'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                        return;
                    }
                }
// check for inactive account
                if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
                    $this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return;
                }
                $this->User->forgotPassword($user);
                $this->Session->setFlash(__('Vui lòng kiểm tra email để thay đổi password'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/login');
            }
        }
    }

    /**
     *  Used to reset password when user comes on the by clicking the password reset link from their email.
     *
     * @access public
     * @return void
     */
    public function activatePassword() {
        if ($this->request->isPost()) {
            if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
                $this->set('ident', $this->data['User']['ident']);
                $this->set('activate', $this->data['User']['activate']);
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    $userId = $this->data['User']['ident'];
                    $activateKey = $this->data['User']['activate'];
                    $user = $this->User->read(null, $userId);
                    if (!empty($user)) {
                        $password = $user['User']['password'];
                        $thekey = $this->User->getActivationKey($password);
                        if ($thekey == $activateKey) {
                            $user['User']['password'] = $this->data['User']['password'];
                            $salt = $this->UserAuth->makeSalt();
                            $user['User']['salt'] = $salt;
                            $user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
                            $this->User->save($user, false);
                            $this->Session->setFlash(__('Đã thay đổi password thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                            $this->redirect('/login');
                        } else {
                            $this->Session->setFlash(__('Something went wrong, please send password reset link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                        }
                    } else {
                        $this->Session->setFlash(__('Something went wrong, please click again on the link in email'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Something went wrong, please click again on the link in email'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            if (isset($_GET['ident']) && isset($_GET['activate'])) {
                $this->set('ident', $_GET['ident']);
                $this->set('activate', $_GET['activate']);
            }
        }
    }

    /**
     * Used to send email verification mail to user
     *
     * @access public
     * @return void
     */
    public function emailVerification() {
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['email'];
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        $this->Session->setFlash(__('Incorrect Email/Username'));
                        return;
                    }
                }
                if ($user['User']['email_verified'] == 0) {
                    $this->User->sendVerificationMail($user);
                    $this->Session->setFlash(__('Vui lòng check mail để xác nhận email đăng ký'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                } else {
                    $this->Session->setFlash(__('Email của bạn đã được xác nhận'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
                $this->redirect('/login');
            }
        }
    }

    /* Liệt kê danh sách giảng viên cho nhân viên quản lý */

    public function manager_teacher_index() {
        $this->User->unbindModel(array('hasMany' => array('LoginToken')));
        $conditions = array('User.user_group_id' => TEACHER_GROUP_ID);
        $this->Paginator->settings = array('conditions' => $conditions);
        $users = $this->Paginator->paginate();
        $this->set('users', $users);
    }

    public function manager_student_view($id) {
        $this->User->unbindModel(array('hasMany' => array('LoginToken')));
        
        $contain = array('Province', 'Classroom' => array('Department' => array('fields' => array('Department.id', 'Department.name'))), 'UserGroup');
        //$fields=array('department_id','user_group_id','id','name','borndate','bornplace','sex','email','phone','classroom_id','username','last_login','created');
        $user = $this->User->find('first', array('conditions' => array('User.id' => $id), 'contain' => $contain));
        $this->set('user', $user);
    }

    public function updatePassword() {
        
    }

}
