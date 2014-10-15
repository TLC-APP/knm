<div>
    <?php
    echo $this->Form->create('User', array('action' => 'addUser',
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'));
    ?>
    <fieldset>
        <legend>Thêm người dùng mới</legend>
        <?php echo $this->Form->input('last_name', array('label' => 'Họ lót')); ?>
        <?php echo $this->Form->input('first_name', array('label' => 'Tên')); ?>
        <?php echo $this->Form->input('department_id', array('label' => 'Đơn vị')); ?>
        <?php echo $this->Form->input('user_group_id', array('label' => 'Nhóm')); ?>
        <?php echo $this->Form->input('email', array('label' => 'Email')); ?>
        <?php echo $this->Form->input('phone', array('label' => 'Số điện thoại')); ?>
        <?php echo $this->Form->input('username', array('label' => 'Username')); ?>
        <?php echo $this->Form->input('password', array('label' => 'Password')); ?>
        <?php echo $this->Form->input('cpassword', array('label' => 'Nhập lại password', 'type' => 'password')); ?>
    </fieldset>
    <?php echo $this->Form->end('Submit'); ?>
</div>

<script>
    document.getElementById("UserUserGroupId").focus();
</script>