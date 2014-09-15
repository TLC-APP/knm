<div class="chapters view">
<h2><?php echo __('Chapter'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('So Tiet Ly Thuyet'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['so_tiet_ly_thuyet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('So Tiet Thuc Hanh'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['so_tiet_thuc_hanh']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chapter Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chapter['ChapterType']['name'], array('controller' => 'chapter_types', 'action' => 'view', $chapter['ChapterType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chapter['Chapter']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chapter'), array('action' => 'edit', $chapter['Chapter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chapter'), array('action' => 'delete', $chapter['Chapter']['id']), array(), __('Are you sure you want to delete # %s?', $chapter['Chapter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapter Types'), array('controller' => 'chapter_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter Type'), array('controller' => 'chapter_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($chapter['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Ma So'); ?></th>
		<th><?php echo __('Si So'); ?></th>
		<th><?php echo __('Trang Thai'); ?></th>
		<th><?php echo __('Chapter Id'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chapter['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['name']; ?></td>
			<td><?php echo $course['ma_so']; ?></td>
			<td><?php echo $course['si_so']; ?></td>
			<td><?php echo $course['trang_thai']; ?></td>
			<td><?php echo $course['chapter_id']; ?></td>
			<td><?php echo $course['teacher_id']; ?></td>
			<td><?php echo $course['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), array(), __('Are you sure you want to delete # %s?', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Departments'); ?></h3>
	<?php if (!empty($chapter['Department'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Decription'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chapter['Department'] as $department): ?>
		<tr>
			<td><?php echo $department['name']; ?></td>
			<td><?php echo $department['parent_id']; ?></td>
			<td><?php echo $department['phone_number']; ?></td>
			<td><?php echo $department['decription']; ?></td>
			<td><?php echo $department['lft']; ?></td>
			<td><?php echo $department['rght']; ?></td>
			<td><?php echo $department['created']; ?></td>
			<td><?php echo $department['modified']; ?></td>
			<td><?php echo $department['type']; ?></td>
			<td><?php echo $department['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'departments', 'action' => 'view', $department['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'departments', 'action' => 'edit', $department['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'departments', 'action' => 'delete', $department['id']), array(), __('Are you sure you want to delete # %s?', $department['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($chapter['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Hoc Ham Id'); ?></th>
		<th><?php echo __('Hoc Vi Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Birthplace'); ?></th>
		<th><?php echo __('Phone Number'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Avatar'); ?></th>
		<th><?php echo __('Avatar Path'); ?></th>
		<th><?php echo __('Activated'); ?></th>
		<th><?php echo __('Last Login'); ?></th>
		<th><?php echo __('Captcha'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ip Address'); ?></th>
		<th><?php echo __('Email Verified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chapter['User'] as $user): ?>
		<tr>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['hoc_ham_id']; ?></td>
			<td><?php echo $user['hoc_vi_id']; ?></td>
			<td><?php echo $user['department_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['birthplace']; ?></td>
			<td><?php echo $user['phone_number']; ?></td>
			<td><?php echo $user['address']; ?></td>
			<td><?php echo $user['avatar']; ?></td>
			<td><?php echo $user['avatar_path']; ?></td>
			<td><?php echo $user['activated']; ?></td>
			<td><?php echo $user['last_login']; ?></td>
			<td><?php echo $user['captcha']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['ip_address']; ?></td>
			<td><?php echo $user['email_verified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
