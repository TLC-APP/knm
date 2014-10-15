<div class="departmentTypes form">
<?php echo $this->Form->create('DepartmentType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Department Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DepartmentType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('DepartmentType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Department Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
