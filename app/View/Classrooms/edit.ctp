<div class="classrooms form">
    <?php echo $this->Form->create('Classroom'); ?>
    <fieldset>
        <legend><?php echo __('Edit Classroom'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('code', array('label' => 'Mã lớp '));
        echo $this->Form->input('name', array('label' => 'Tên lớp '));
        echo $this->Form->input('department_id', array('label' => 'Đơn vị '));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
