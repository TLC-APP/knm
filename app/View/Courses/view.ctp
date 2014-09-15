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
		<li><?php echo $this->Html->link(__('List Attends'), array('controller' => 'attends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attend'), array('controller' => 'attends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sessions'), array('controller' => 'sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Session'), array('controller' => 'sessions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attends'); ?></h3>
	<?php if (!empty($course['Attend'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Pass'); ?></th>
		<th><?php echo __('Hoc Phi'); ?></th>
		<th><?php echo __('Ngay Thu'); ?></th>
		<th><?php echo __('Nguoi Thu'); ?></th>
		<th><?php echo __('So Tien'); ?></th>
		<th><?php echo __('So Phieu Thu'); ?></th>
		<th><?php echo __('Vang'); ?></th>
		<th><?php echo __('Buoi Vang'); ?></th>
		<th><?php echo __('Ly Do Vang'); ?></th>
		<th><?php echo __('Nguoi Xu Ly Vang'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Attend'] as $attend): ?>
		<tr>
			<td><?php echo $attend['pass']; ?></td>
			<td><?php echo $attend['hoc_phi']; ?></td>
			<td><?php echo $attend['ngay_thu']; ?></td>
			<td><?php echo $attend['nguoi_thu']; ?></td>
			<td><?php echo $attend['so_tien']; ?></td>
			<td><?php echo $attend['so_phieu_thu']; ?></td>
			<td><?php echo $attend['vang']; ?></td>
			<td><?php echo $attend['buoi_vang']; ?></td>
			<td><?php echo $attend['ly_do_vang']; ?></td>
			<td><?php echo $attend['nguoi_xu_ly_vang']; ?></td>
			<td><?php echo $attend['course_id']; ?></td>
			<td><?php echo $attend['user_id']; ?></td>
			<td><?php echo $attend['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attends', 'action' => 'view', $attend['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attends', 'action' => 'edit', $attend['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attends', 'action' => 'delete', $attend['id']), array(), __('Are you sure you want to delete # %s?', $attend['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attend'), array('controller' => 'attends', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sessions'); ?></h3>
	<?php if (!empty($course['Session'])): ?>
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
	<?php foreach ($course['Session'] as $session): ?>
		<tr>
			<td><?php echo $session['name']; ?></td>
			<td><?php echo $session['start']; ?></td>
			<td><?php echo $session['end']; ?></td>
			<td><?php echo $session['note']; ?></td>
			<td><?php echo $session['course_id']; ?></td>
			<td><?php echo $session['room_id']; ?></td>
			<td><?php echo $session['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sessions', 'action' => 'view', $session['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sessions', 'action' => 'edit', $session['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sessions', 'action' => 'delete', $session['id']), array(), __('Are you sure you want to delete # %s?', $session['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Session'), array('controller' => 'sessions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
