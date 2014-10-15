<div class="teachingPlans form">
<?php echo $this->Form->create('TeachingPlan'); ?>
	<fieldset>
		<legend><?php echo __('Edit Teaching Plan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
		echo $this->Form->input('session');
		echo $this->Form->input('teacher_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TeachingPlan.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TeachingPlan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Teaching Plans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
