<div class="enrollments form">
<?php echo $this->Form->create('Enrollment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Enrollment'); ?></legend>
	<?php
		echo $this->Form->input('pass');
		echo $this->Form->input('fee');
		echo $this->Form->input('fee_date');
		echo $this->Form->input('fee_hangling_id');
		echo $this->Form->input('fee_amount');
		echo $this->Form->input('fee_paper_no');
		echo $this->Form->input('absence');
		echo $this->Form->input('absence_period_id');
		echo $this->Form->input('absence_reason');
		echo $this->Form->input('absence_handling_id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Enrollment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Enrollment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fee Hangling'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Absence Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
