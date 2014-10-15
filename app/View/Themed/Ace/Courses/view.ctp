<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ma So'); ?></dt>
		<dd>
			<?php echo h($course['Course']['ma_so']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Si So'); ?></dt>
		<dd>
			<?php echo h($course['Course']['si_so']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trang Thai'); ?></dt>
		<dd>
			<?php echo h($course['Course']['trang_thai']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chapter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array(), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('controller' => 'periods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrollments'); ?></h3>
	<?php if (!empty($course['Enrollment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Pass'); ?></th>
		<th><?php echo __('Fee'); ?></th>
		<th><?php echo __('Fee Date'); ?></th>
		<th><?php echo __('Fee Hangling Id'); ?></th>
		<th><?php echo __('Fee Amount'); ?></th>
		<th><?php echo __('Fee Paper No'); ?></th>
		<th><?php echo __('Absence'); ?></th>
		<th><?php echo __('Absence Period Id'); ?></th>
		<th><?php echo __('Absence Reason'); ?></th>
		<th><?php echo __('Absence Handling Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Enrollment'] as $enrollment): ?>
		<tr>
			<td><?php echo $enrollment['pass']; ?></td>
			<td><?php echo $enrollment['fee']; ?></td>
			<td><?php echo $enrollment['fee_date']; ?></td>
			<td><?php echo $enrollment['fee_hangling_id']; ?></td>
			<td><?php echo $enrollment['fee_amount']; ?></td>
			<td><?php echo $enrollment['fee_paper_no']; ?></td>
			<td><?php echo $enrollment['absence']; ?></td>
			<td><?php echo $enrollment['absence_period_id']; ?></td>
			<td><?php echo $enrollment['absence_reason']; ?></td>
			<td><?php echo $enrollment['absence_handling_id']; ?></td>
			<td><?php echo $enrollment['course_id']; ?></td>
			<td><?php echo $enrollment['student_id']; ?></td>
			<td><?php echo $enrollment['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enrollments', 'action' => 'view', $enrollment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enrollments', 'action' => 'edit', $enrollment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enrollments', 'action' => 'delete', $enrollment['id']), array(), __('Are you sure you want to delete # %s?', $enrollment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Periods'); ?></h3>
	<?php if (!empty($course['Period'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Period'] as $period): ?>
		<tr>
			<td><?php echo $period['name']; ?></td>
			<td><?php echo $period['start']; ?></td>
			<td><?php echo $period['end']; ?></td>
			<td><?php echo $period['note']; ?></td>
			<td><?php echo $period['course_id']; ?></td>
			<td><?php echo $period['room_id']; ?></td>
			<td><?php echo $period['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'periods', 'action' => 'view', $period['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'periods', 'action' => 'edit', $period['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'periods', 'action' => 'delete', $period['id']), array(), __('Are you sure you want to delete # %s?', $period['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Period'), array('controller' => 'periods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
