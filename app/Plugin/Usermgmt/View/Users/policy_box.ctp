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
</div>