<div class="rooms form">
<?php echo $this->Form->create('Room'); ?>
	<fieldset>
		<legend><?php echo __('Add Room'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('decription');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Periods'), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
	</ul>
</div>
