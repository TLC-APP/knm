<div class="classRooms form">
<?php echo $this->Form->create('ClassRoom'); ?>
	<fieldset>
		<legend><?php echo __('Edit Class Room'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('department_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClassRoom.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ClassRoom.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Class Rooms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
