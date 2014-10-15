<div class="teachingPlans form">
<?php echo $this->Form->create('TeachingPlan'); ?>
	<fieldset>
		<legend><?php echo __('Add Teaching Plan'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Teaching Plans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
