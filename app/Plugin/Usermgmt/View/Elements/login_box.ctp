<div id="login-box" class="login-box <?php if(($visible)) echo 'visible';?> widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header blue lighter bigger">
                <i class="ace-icon fa fa-coffee green"></i>
                Vui lòng đăng nhập hệ thống
            </h4>
            <div class="space-6"></div>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>
            <form action="<?php echo SUB_DIR ?>/users/login" method="post">
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
                    Đăng ký
                    <i class="ace-icon fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div><!-- /.widget-body -->
</div>  