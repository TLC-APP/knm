<div class="messages form">
    <?php
    echo $this->Form->create('Message', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-sm-3 control-label'
            ),
            'wrapInput' => 'col col-sm-7',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal',
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Add Message'); ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('meta');
        echo $this->Form->input('content');
        echo $this->Form->input('published');
        echo $this->Form->input('receive_user_id');
        echo $this->Form->input('user_group_id');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
