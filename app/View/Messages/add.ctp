<div class="messages form">
<?php echo $this->element('tinymce'); ?>
    <?php
    echo $this->Form->create('Message', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => 'well'
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Add Message'); ?></legend>

        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('meta');

        echo $this->Form->input('content', array('label' => 'Nội dung'));
        echo $this->Form->input('published');
        echo $this->Form->input('user_group_id', array('label' => 'Nhóm nhận'));
        ?>
    </fieldset>
    <?php echo $this->Form->end('Thực hiện'); ?>
</div>
