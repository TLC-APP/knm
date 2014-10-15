<div class="periods form">
<?php echo $this->Form->create('Period'); ?>
	<fieldset>
		<legend><?php echo __('Edit Period'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('note');
		echo $this->Form->input('course_id');
		echo $this->Form->input('room_id');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Period.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Period.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
