
<div class="row">
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <h2>Đổi mật khẩu</h2>
            <div class="well" id="login">

                <?php
                echo $this->Form->create('User', array('action' => 'changePassword', 'inputDefaults' => array(
                        'div' => 'form-group',
                        'wrapInput' => false,
                        'class' => 'form-control'
                    ),
                    'class' => 'well'));
                ?>

                <?php echo $this->Form->input("oldpassword", array("type" => "password", 'label' => 'Mật khẩu cũ')) ?>
                <?php echo $this->Form->input("password", array("type" => "password", 'label' => 'Mật khẩu mới')) ?>
                <?php echo $this->Form->input("cpassword", array("type" => "password", 'label' => 'Nhập lại mật khẩu mới')) ?>
                <?php echo $this->Form->Submit('Thực hiện'); ?>
                <?php echo $this->Form->end(); ?>

            </div>
        </div>
    </div>
    <script>
        document.getElementById("UserOldpassword").focus();
    </script>