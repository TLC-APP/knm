<div id="forgot-box" class="forgot-box <?php if(($visible)) echo 'visible';?> widget-box no-border">
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

                            <form method='post' action='<?php echo SUB_DIR?>/forgotPassword'>
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
                </div>