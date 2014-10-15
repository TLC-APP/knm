
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
                <!-- /.login-box -->
                <?php echo $this->element('login_box',array('visible'=>true)); ?>
                <!-- /.forgot-box -->
                <?php echo $this->element('forgot_box',array('visible'=>false)); ?>
                <!-- /.signup-box -->
                <?php echo $this->element('signup_box',array('visible'=>false)); ?>
            </div><!-- /.position-relative -->


        </div>
    </div><!-- /.col -->
</div><!-- /.row -->