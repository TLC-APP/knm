<div class="courses form">
    <?php
    echo $this->Form->create('Course', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
    ));
    ?>
    <fieldset>
        <legend>Cập nhật thông tin lớp kỹ năng</legend>
        <?php
        echo $this->Form->input('name',array('label'=>'Tên lớp','readonly'));
        echo $this->Form->input('si_so',array('label'=>'Sĩ số'));
        echo $this->Form->input('trang_thai',array('label'=>'Trạng thái','options'=>array(
            COURSE_ENROLLING=>'Đang đăng ký',
            COURSE_OPENABLE=>'Có thể mở',
            COURSE_OPEN=>'Đã mở',
            COURSE_WAIT_CANCEL=>'Chờ hủy'
            
        )));
        echo $this->Form->input('chapter_id',array('label'=>'Chuyên đề'));
        echo $this->Form->input('teacher_id',array('label'=>'Giảng viên'));
        echo $this->Form->input('id');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
