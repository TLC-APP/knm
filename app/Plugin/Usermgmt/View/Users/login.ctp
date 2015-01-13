
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
                <div id="login-box" class="login-box visible widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header blue lighter bigger">
                                <i class="ace-icon fa fa-coffee green"></i>
                                Vui lòng đăng nhập hệ thống
                            </h4>
                            <div class="space-6"></div>
                            <?php echo $this->Session->flash(); ?>
                            <?php echo $this->Session->flash('auth'); ?>
                            <form action="<?php echo SUB_DIR ?>/users/login" method="post" id="login-form">
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input name="data[User][username]" id="UserUsername" type="text" class="form-control" placeholder="Username">
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input name="data[User][password]" type="password" class="form-control" placeholder="Password">
                                            <i class="ace-icon fa fa-lock"></i>
                                        </span>
                                    </label>

                                    <div class="space"></div>
                                    <?php
                                    if (!isset($this->request->data['User']['remember']))
                                        $this->request->data['User']['remember'] = true;
                                    ?>
                                    <div class="clearfix">
                                        <label class="inline">
                                            <input type="checkbox" class="ace" name="remember">
                                            <span class="lbl"> Tự đăng nhập lần sau</span>
                                        </label>

                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-key"></i>
                                            <span class="bigger">Thực hiện</span>
                                        </button>
                                    </div>

                                    <div class="space-4"></div>
                                </fieldset>
                            </form>

                            <div class="social-or-login center">
                                <?php echo $this->Html->link('<span class="bigger-110">Trang chủ</span>', Router::url('/', true), array('escape' => false)); ?>

                            </div>

                            <div class="space-6"></div>


                        </div><!-- /.widget-main -->

                        <div class="toolbar clearfix">
                            <div>
                                <a href="/knm/forgotPassword" class="forgot-password-link">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Quên mật khẩu
                                </a>
                            </div>

                            <div>
                                <a href="/knm/register" class="user-signup-link">
                                    Đăng ký
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.widget-body -->
                </div>  
            </div><!-- /.position-relative -->


        </div>
    </div><!-- /.col -->
</div><!-- /.row -->