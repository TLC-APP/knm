<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
            <div class="center">
                <h1>
                    <span class="red">Ứng dụng quản lý</span><br/>
                    <span class="white" id="id-text2">Kỹ năng mềm Sinh viên</span>
                </h1>
                <h4 class="blue" id="id-company-text">© Trung tâm Hỗ trợ - Phát triển Dạy & Học</h4>
            </div>

            <div class="space-6"></div>

            <div class="position-relative">
                <?php echo $this->Html->css('select2-bootstrap'); ?>
                <?php echo $this->Html->css('select2'); ?>
                <?php echo $this->Html->script('select2.min'); ?>



                <div id="signup-box" class="signup-box visible widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header green lighter bigger">
                                <i class="ace-icon fa fa-users blue"></i>
                                Đăng ký tài khoản mới
                            </h4>
                            <div class="space-6"></div>
                            <p> Nhập các thông tin bên dưới: </p>
                            <?php
                            echo $this->Form->create('User', array('action' => 'register', 'inputDefaults' => array(
                                    'id' => 'register-form',
                                    'div' => 'form-group',
                                    'label' => false,
                                    'wrapInput' => false,
                                    'class' => 'form-control'
                            )));
                            ?>
                            <fieldset>

                                <?php
                                echo $this->Form->input('username', array(
                                    "placeholder" => "Mã số sinh viên", 'required',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-user"></i>
                        </span>'));
                                echo $this->Form->input('last_name', array(
                                    "placeholder" => "Họ lót (ví dụ Nguyễn Văn) ",
                                    'required',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-user"></i>
                        </span>'));
                                echo $this->Form->input('first_name', array(
                                    "placeholder" => "Tên (ví dụ Toàn)",
                                    'required',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-user"></i>
                        </span>'));
                                echo $this->Form->input('email', array(
                                    "type" => 'email',
                                    'required',
                                    "placeholder" => "Email",
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-envelope"></i>
                        </span>'));
                                echo $this->Form->input('phone', array(
                                    "placeholder" => "Số điện thoại",
                                    'required',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-phone"></i>
                        </span>'));

                                echo $this->Form->input('borndate', array(
                                    'placeholder' => 'Ngày sinh (dd-mm-yyyy)',
                                    'required', 'type' => 'text',
                                    'class' => 'date-picker form-control',
                                    'data-date-format' => "dd-mm-yyyy",
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-calendar"></i>
                        </span>'
                                ));
                                echo $this->Form->input('bornplace', array(
                                    'placeholder' => '-- Chọn nơi sinh --',
                                    'options' => $bornplaces,
                                    'required',
                                ));
                                echo $this->Form->input('sex', array('empty' => '-- Chọn giới tính --', 'required', 'options' => array('M' => 'Nam', 'F' => 'Nữ')));


                                //echo $this->Form->input('department_id', array('id'=>'department_id','empty' => '-- Khoa --'));
                                echo $this->Form->input('classroom_id', array("label" => false));

                                echo $this->Form->input('password', array(
                                    "placeholder" => "Password", 'required',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-lock"></i>
                        </span>'));
                                echo $this->Form->input('cpassword', array(
                                    "placeholder" => "Nhập lại password",
                                    'type' => 'password',
                                    'before' => '<label class="block clearfix">
                        <span class="block input-icon input-icon-right">',
                                    'after' => '<i class="ace-icon fa fa-retweet"></i>
                        </span>'));
                                ?>

                                <?php if (USE_RECAPTCHA && PRIVATE_KEY_FROM_RECAPTCHA != "" && PUBLIC_KEY_FROM_RECAPTCHA != "") { ?>
                                    <div>
                                        <div class="umstyle4" style="margin-left:45px"><?php echo $this->UserAuth->showCaptcha(isset($this->validationErrors['User']['captcha'][0]) ? $this->validationErrors['User']['captcha'][0] : ""); ?></div>
                                        <div style="clear:both"></div>
                                    </div>
                                <?php } ?>
                                <label class="block">
                                    <input type="checkbox" class="ace">
                                    <span class="lbl">
                                        Tôi đồng ý với
                                        <a href="#"> Chính sách sử dụng</a>
                                    </span>
                                </label>

                                <div class="space-24"></div>

                                <div class="clearfix">
                                    <button type="reset" class="width-30 pull-left btn btn-sm">
                                        <i class="ace-icon fa fa-refresh"></i>
                                        <span class="bigger-110">Reset</span>
                                    </button>

                                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                        <span class="bigger-110">Đăng ký</span>

                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                            <?php $this->Form->end(); ?>

                        </div>

                        <div class="toolbar center">
                            <a href="/knm/login"  class="back-to-login-link">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Trở lại trang đăng nhập
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div>
                <script>
                    $(function() {

                        $('#UserClassroomId').select2({'placeholder': '-- Chọn lớp --'});
                        $('#UserBornplace').select2({'placeholder': '-- Chọn nơi sinh --'});
                    });
                </script>
            </div><!-- /.position-relative -->
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->