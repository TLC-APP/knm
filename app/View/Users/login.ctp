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
                            <form action="<?php echo SUB_DIR ?>/users/login" method="post">
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input name="data[User][username]" type="text" class="form-control" placeholder="Username">
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
                                            <span class="bigger">Đăng nhập</span>
                                        </button>
                                    </div>

                                    <div class="space-4"></div>
                                </fieldset>
                            </form>

                            <div class="social-or-login center">
                                <span class="bigger-110">Cần hướng dẫn</span>
                            </div>

                            <div class="space-6"></div>

                            <div class="social-login center">
                                <a class="btn btn-primary">
                                    <i class="ace-icon fa fa-facebook"></i>
                                </a>

                                <a class="btn btn-info">
                                    <i class="ace-icon fa fa-video-camera"></i>
                                </a>

                                <a class="btn btn-danger">
                                    <i class="ace-icon fa fa-file"></i>

                                </a>
                            </div>
                        </div><!-- /.widget-main -->

                        <div class="toolbar clearfix">
                            <div>
                                <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Quên mật khẩu
                                </a>
                            </div>

                            <div>
                                <a href="#" data-target="#signup-box" class="user-signup-link">
                                    Tôi muốn đăng ký
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.login-box -->

                <div id="forgot-box" class="forgot-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header red lighter bigger">
                                <i class="ace-icon fa fa-key"></i>
                                Nhận lại mật khẩu
                            </h4>

                            <div class="space-6"></div>
                            <p>
                                Vui lòng nhập email để nhận hướng dẫn lấy lại mật khẩu
                            </p>

                            <form method='post' action='/forgotPassword'>
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" class="form-control" name='data[User][email]' placeholder="Email">
                                            <i class="ace-icon fa fa-envelope"></i>
                                        </span>
                                    </label>

                                    <div class="clearfix">
                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                                            <i class="ace-icon fa fa-lightbulb-o"></i>
                                            <span class="bigger-110">Gửi</span>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div><!-- /.widget-main -->

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                Trở lại trang đăng nhập
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.forgot-box -->

                <div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header green lighter bigger">
                                <i class="ace-icon fa fa-users blue"></i>
                                Đăng ký tài khoản mới
                            </h4>

                            <div class="space-6"></div>
                            <p> Nhập các thông tin bên dưới: </p>

                            <form method="post" action="<?php echo SUB_DIR ?>/users/register">
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control" placeholder="Mã số sinh viên" required=required>
                                            <i class="ace-icon fa fa-user"></i>
                                        </span>
                                    </label>
                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" class="form-control" placeholder="Email">
                                            <i class="ace-icon fa fa-envelope"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control" placeholder="Password">
                                            <i class="ace-icon fa fa-lock"></i>
                                        </span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control" placeholder="Nhập lại password">
                                            <i class="ace-icon fa fa-retweet"></i>
                                        </span>
                                    </label>

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

                                        <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                            <span class="bigger-110">Đăng ký</span>

                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="toolbar center">
                            <a href="#" data-target="#login-box" class="back-to-login-link">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Trở lại trang đăng nhập
                            </a>
                        </div>
                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
            </div><!-- /.position-relative -->


        </div>
    </div><!-- /.col -->
</div><!-- /.row -->