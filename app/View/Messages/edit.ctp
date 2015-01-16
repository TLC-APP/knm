<div class="messages form">
    
<?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Edit Message'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('meta');
		echo $this->Form->input('content');
		echo $this->Form->input('published');
		echo $this->Form->input('created_user_id');
		echo $this->Form->input('receive_user_id');
		echo $this->Form->input('is_read');
		echo $this->Form->input('user_group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
