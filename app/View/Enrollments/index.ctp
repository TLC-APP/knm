<div class="enrollments index">
	<h2><?php echo __('Enrollments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('pass'); ?></th>
			<th><?php echo $this->Paginator->sort('fee'); ?></th>
			<th><?php echo $this->Paginator->sort('fee_date'); ?></th>
			<th><?php echo $this->Paginator->sort('fee_hangling_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fee_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('fee_paper_no'); ?></th>
			<th><?php echo $this->Paginator->sort('absence'); ?></th>
			<th><?php echo $this->Paginator->sort('absence_period_id'); ?></th>
			<th><?php echo $this->Paginator->sort('absence_reason'); ?></th>
			<th><?php echo $this->Paginator->sort('absence_handling_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($enrollments as $enrollment): ?>
	<tr>
		<td><?php echo h($enrollment['Enrollment']['pass']); ?>&nbsp;</td>
		<td><?php echo h($enrollment['Enrollment']['fee']); ?>&nbsp;</td>
		<td><?php echo h($enrollment['Enrollment']['fee_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enrollment['FeeHangling']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['FeeHangling']['id'])); ?>
		</td>
		<td><?php echo h($enrollment['Enrollment']['fee_amount']); ?>&nbsp;</td>
		<td><?php echo h($enrollment['Enrollment']['fee_paper_no']); ?>&nbsp;</td>
		<td><?php echo h($enrollment['Enrollment']['absence']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enrollment['AbsencePeriod']['name'], array('controller' => 'periods', 'action' => 'view', $enrollment['AbsencePeriod']['id'])); ?>
		</td>
		<td><?php echo h($enrollment['Enrollment']['absence_reason']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enrollment['AbsenceHandling']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['AbsenceHandling']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enrollment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrollment['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enrollment['Student']['name'], array('controller' => 'users', 'action' => 'view', $enrollment['Student']['id'])); ?>
		</td>
		<td><?php echo h($enrollment['Enrollment']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $enrollment['Enrollment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enrollment['Enrollment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enrollment['Enrollment']['id']), array(), __('Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fee Hangling'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Absence Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
