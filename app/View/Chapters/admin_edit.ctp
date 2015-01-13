<?php echo $this->element('tinymce'); ?>
<div class="chapters form">
    <?php
    echo $this->Form->create('Chapter', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        "type" => "file",
        'class' => 'well form-horizontal',
    ));
    ?>
    <fieldset>
        <legend>Cập nhật kỹ năng</legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Tên kỹ năng'));

        echo $this->Form->input('so_tiet_ly_thuyet', array('label' => 'Số tiết lý thuyết'));
        echo $this->Form->input('so_tiet_thuc_hanh', array('label' => 'Số tiết thực hành'));
        echo $this->Form->input('chapter_type_id', array('label' => 'Loại kỹ năng'));
        echo $this->Form->input('Department', array('label' => 'Đơn vị được miễn'));
        echo $this->Form->input('User', array('label' => 'Giảng viên có thể dạy'));
        echo $this->Form->input('description', array('label' => 'Miêu tả'));

        echo $this->Form->input('id');
        ?>
    </fieldset>
    <?php echo $this->Form->end('Lưu'); ?>
</div>