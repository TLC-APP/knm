<div class="enrollments view">
<h2><?php echo __('Enrollment'); ?></h2>
	<dl>
		<dt><?php echo __('Pass'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['fee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Date'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['fee_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Hangling'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['FeeHangling']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['FeeHangling']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Amount'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['fee_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fee Paper No'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['fee_paper_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absence'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['absence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absence Period'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['AbsencePeriod']['name'], array('controller' => 'periods', 'action' => 'view', $enrollment['AbsencePeriod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absence Reason'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['absence_reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absence Handling'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['AbsenceHandling']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['AbsenceHandling']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrollment['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Student']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enrollment'), array('action' => 'edit', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enrollment'), array('action' => 'delete', $enrollment['Enrollment']['id']), array(), __('Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fee Hangling'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Absence Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
