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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Message.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Message.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Groups'), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Group'), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
