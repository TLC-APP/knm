<?php

App::uses('UserMgmtAppModel', 'Usermgmt.Model');
App::uses('CakeEmail', 'Network/Email');

class User extends UserMgmtAppModel {

    public $virtualFields = array(
        'name' => 'CONCAT(last_name, " ", first_name)'
    );
    public $displayField = 'name';

    public $actsAs=array('Containable');
    /**
     * This model belongs to following models
     *
     * @var array
     */
    var $belongsTo = array(
        'Usermgmt.UserGroup',
        'Province' => array(
            'className' => 'Province',
            'foreignKey' => 'bornplace',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Classroom' => array(
            'className' => 'Classroom',
            'foreignKey' => 'classroom_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * This model has following models
     *
     * @var array
     */
    var $hasMany = array(
        'LoginToken' => array('className' => 'Usermgmt.LoginToken', 'limit' => 1),
        'Enrollment' => array(
            'className' => 'Enrollment',
            'foreignKey' => 'student_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'TeachingPlan' => array(
            'className' => 'TeachingPlan',
            'foreignKey' => 'teacher_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public $hasAndBelongsToMany = array(
        'Chapter' => array(
            'className' => 'Chapter',
            'joinTable' => 'users_chapters',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'chapter_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
    ));

    /**
     * model validation array
     *
     * @var array
     */
    var $validate = array();

    /**
     * UsetAuth component object
     *
     * @var object
     */
    var
            $userAuth;

    /**
     * model validation array
     *
     * @var array
     */
    function LoginValidate() {
        $validate1 = array(
            'email' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập username')
            ),
            'password' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập password')
            )
        );
        $this->validate = $validate1;
        return $this->validates();
    }

    /**
     * model validation array
     *
     * @var array
     */
    function RegisterValidate() {
        $validate1 = array(
            /* "user_group_id" => array(
              'rule' => array('comparison', '!=', 0),
              'message' => 'Chưa chọn nhóm'), */
            'username' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập mã số sinh viên',
                    'last' => true,
                    'on' => 'create'
                    ),
                'mustUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'MSSV này đã tồn tại',
                    'last' => true,
                    'on' => 'create'
                    )
            ),
            'first_name' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập tên')
            ),
            'last_name' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'on' => 'create',
                    'message' => 'Vui lòng nhập họ lót')
            ),
            'email' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập email',
                    'last' => true),
                'mustBeEmail' => array(
                    'rule' => array('email'),
                    'message' => 'Vui lòng nhập địa chỉ email đúng định dạng',
                    'last' => true),
                'mustUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'Email này đã đăng ký rồi',
                    
                )
            ),
            'oldpassword' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Nhập password cũ',
                    'last' => true,
                    ),
                'mustMatch' => array(
                    'rule' => array('verifyOldPass'),
                    'message' => 'Nhập chính xác password cũ'),
            ),
            'password' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Vui lòng nhập password',
                    'on' => 'create',
                    'last' => true),
                'mustBeLonger' => array(
                    'rule' => array('minLength', 6),
                    'message' => 'Password có ít nhất 5 ký tự',
                    'on' => 'create',
                    'last' => true),
                'mustMatch' => array(
                    'rule' => array('verifies'),
                    'message' => 'Password chưa giống nhau'),
            //'on' => 'create'
            ),
            'captcha' => array(
                'mustMatch' => array(
                    'rule' => array('recaptchaValidate'),
                    'message' => ''),
            )
        );
        $this->validate = $validate1;
        return $this->validates();
    }

    /**
     * Used to validate captcha
     *
     * @access public
     * @return boolean
     */
    public function recaptchaValidate() {
        App::import("Vendor", "Usermgmt.recaptcha/recaptchalib");
        $recaptcha_challenge_field = (isset($_POST['recaptcha_challenge_field'])) ? $_POST['recaptcha_challenge_field'] : "";
        $recaptcha_response_field = (isset($_POST['recaptcha_response_field'])) ? $_POST['recaptcha_response_field'] : "";

        $resp = recaptcha_check_answer(
                PRIVATE_KEY_FROM_RECAPTCHA, $_SERVER['REMOTE_ADDR'], $recaptcha_challenge_field, $recaptcha_response_field);
        $error = $resp->error;
        if (!$resp->is_valid) {
            $this->validationErrors['captcha'][0] = $error;
        }

        return true;
    }

    /**
     * Used to match passwords
     *
     * @access public
     * @return boolean
     */
    public function verifies() {
        return ($this->data['User']['password'] === $this->data['User']['cpassword']);
    }

    /**
     * Used to match old password
     *
     * @access public
     * @return boolean
     */
    public function verifyOldPass() {
        $userId = $this->userAuth->getUserId();
        $user = $this->findById($userId);
        $oldpass = $this->userAuth->makePassword($this->data['User']['oldpassword'], $user['User']['salt']);
        return($user['User']['password'] === $oldpass);
    }

    /**
     * Used to send registration mail to user
     *
     * @access public
     * @param array $user user detail array
     * @return void
     */
    public function sendRegistrationMail($user) {
        // send email to newly created user
        $userId = $user['User']['id'];
        $email = new CakeEmail();
        $email->config('gmail');
        //$fromConfig = EMAIL_FROM_ADDRESS;
        //$fromNameConfig = EMAIL_FROM_NAME;
        //$email->from(array($fromConfig => $fromNameConfig));
        //$email->sender(array($fromConfig => $fromNameConfig));
        $email->to($user['User']['email']);
        $email->subject('Trung tâm Hỗ trợ - Phát triển Dạy và Học - Xác nhận đăng ký tài khoản đăng ký kỹ năng mềm.');
        //$email->transport('Debug');
        $body = "Chào mừng " . $user['User']['first_name'] . ",Bạn đã đăng ký tại khoản tại  " . Router::url('/', true) . SITE_URL . " \n\n Thanks,\n" . EMAIL_FROM_NAME;
        try {
            $result = $email->send($body);
        } catch (Exception $ex) {
            // we could not send the email, ignore it

            $result = "Không thể gửi email thông báo đăng ký cho user có userid-" . $userId . ' lỗi:' . $ex->getTrace();
        }
        $this->log($result, LOG_DEBUG);
    }

    /**
     * Used to send email verification mail to user
     *
     * @access public
     * @param array $user user detail array
     * @return void
     */
    public function sendVerificationMail($user) {
        $userId = $user['User']['id'];
        $email = new CakeEmail();
        $email->config('gmail');
        //$fromConfig = EMAIL_FROM_ADDRESS;
        //$fromNameConfig = EMAIL_FROM_NAME;
        //$email->from(array($fromConfig => $fromNameConfig));
        //$email->sender(array($fromConfig => $fromNameConfig));
        $email->to($user ['User']['email']);
        $email->subject('Email Verification Mail');
        $activate_key = $this->getActivationKey($user['User']['password']);
        $link = Router::url("/userVerification?ident=$userId&activate=$activate_key", true);
        $body = "Hi " . $user['User']['first_name'] . ", Vui lòng click vào link bên dưới để hoàn tất đăng ký \n\n " . $link;
        try {
            $result = $email->send($body);
        } catch (
        Exception $ex) {
            // we could not send the email, ignore it
            $result = "Không thể gửi email xác nhận cho user có userid-" . $userId;
        }
        $this->log($result, LOG_DEBUG);
    }

    /**
     * Used to generate activation key
     *
     * @access public
     * @param string $password user password
     * @return hash
     */
    public function getActivationKey($password) {
        $salt = Configure::read("Security.salt");
        return md5(md5($password) . $salt);
    }

    /**
     * Used to send forgot password mail to user
     *
     * @access public
     * @param array $user user detail
     * @return void
     */
    public function forgotPassword($user) {
        $userId = $user['User']['id'];
        $email = new CakeEmail();
        $email->config('gmail');
        $email->to($user['User']['email']);
        $email->subject(EMAIL_FROM_NAME . ': Yêu cầu thay đổi password từ TLC/TrangQuản lý kỹ năng mềm');
        $activate_key = $this->getActivationKey($user ['User']['password']);
        $link = Router::url("/activatePassword?ident=$userId&activate=$activate_key", true);
        $body = "Xin chào " . $user['User']['first_name'] . ", Để có thể đăng nhập bạn đã yêu cầu đổi password thông qua email " . EMAIL_FROM_NAME . ". 
            Vui lòng click vào link bên dưới để reset lại password :

" . $link . "

Nếu liên kết không hoạt động, bạn thử copy và dán nó vào trình duyệt nhé
.Hãy chọn password bạn có thể dễ nhớ và bảo mật bạn nhé.

Thanks,\n" .
                EMAIL_FROM_NAME;
        try {
            $result = $email->send($body);
        } catch (Exception $ex) {
            // we could not send the email, ignore it

            $result = "Could not send forgot password email to userid-" . $userId;
        }
        $this->log($result, LOG_DEBUG);
    }

    /**
     * Used to mark cookie used
     *
     * @access public
     * @param string $type
     * @param string $credentials
     * @return array
     */
    public function authsomeLogin($type, $credentials = array()) {
        switch ($type) {
            case 'guest':
                // You can return any non-null value here, if you don't
                // have a guest account, just return an empty array
                return array();
            case 'cookie':
                $loginToken = false;
                if (strpos($credentials['token'], ":") !== false) {
                    list( $token, $userId) = split(':', $credentials['token']);
                    $duration = $credentials['duration'];

                    $loginToken = $this->LoginToken->find('first', array(
                        'conditions' => array(
                            'user_id' => $userId,
                            'token' => $token,
                            'duration' => $duration,
                            'used' => false,
                            'expires <=' => date('Y-m-d H:i:s', strtotime($duration)),
                        ),
                        'contain' => false
                    ));
                }
                if (!$loginToken) {
                    return false;
                }
                $loginToken['LoginToken']['used'] = true;
                $this->LoginToken->save($loginToken);

                $conditions = array(
                    'User.id' => $loginToken['LoginToken']['user_id']
                );

                break;
            default:
                return array();
        }
        return $this->find('first', compact('conditions'));
    }

    /**
     * Used to generate cookie token
     *
     * @access public
     * @param integer $userId user id
     * @param string $duration cookie persist life time
     * @return string
     */
    public function authsomePersist($userId, $duration) {
        $token = md5(uniqid(mt_rand(), true));
        $this->LoginToken->create(array(
            'user_id' => $userId,
            'token' => $token,
            'duration' => $duration,
            'expires' => date('Y-m-d H:i:s', strtotime($duration)),
        ));
        $this->LoginToken->save();
        return "${token}:${userId}";
    }

    /**
     * Used to get name by user id
     *
     * @access public
     * @param integer $userId user id
     * @return string
     */
    public function getNameById($userId) {
        $res = $this->findById($userId);
        $name = (!empty($res)) ? ($res['User']['first_name'] . ' ' . $res['User']['last_name']) :
                '';
        return $name;
    }

    /**
     * Used to check users by group id
     *
     * @access public
     * @param integer $groupId user id
     * @return boolean
     */
    public function isUserAssociatedWithGroup($groupId) {
        $res = $this->find('count', array('conditions' => array('User.user_group_id' => $groupId)));
        if (!empty($res)) {
            return true;
        }
        return false;
    }

}
