<?php
echo $this->Form->create('Course', array('url' => array('action' => '#'),
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-sm-3 control-label'
        ),
        'wrapInput' => 'col col-sm-7',
        'class' => 'form-control'
    ),
    'class' => 'form-horizontal',
    'id' => 'managerAddCourseForm'
));

echo $this->Form->input('chapter_id', array('label' => 'Chuyên đề'));
//echo $this->Form->input('Course.name', array('label' => 'Lớp', 'placeholder' => '1 hoặc 2 hoặc 3', 'required'));
echo $this->Form->input('Period.0.room_id', array('label' => 'Phòng'));
//echo $this->Form->input('Period.1.room_id', array('label' => 'Phòng buổi 2'));
echo $this->Form->input('Period.0.name', array('value' => 'Buổi 1','type'=>'hidden'));
echo $this->Form->input('Period.1.name', array('value' => 'Buổi 2','type'=>'hidden'));
echo $this->Form->input('Course.start', array('value' => $start, 'type' => 'hidden'));
echo $this->Form->input('Period.0.start', array('value' => $start, 'type' => 'hidden'));
echo $this->Form->input('Period.1.start', array('value' => $start2, 'type' => 'hidden'));
echo $this->Form->input('teacher_id', array('value' => $teacher_id, 'type' => 'hidden'));
?>
<?php
echo $this->Form->end();
?>
