<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($user['User']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hoc Ham'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['HocHam']['name'], array('controller' => 'hoc_hams', 'action' => 'view', $user['HocHam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hoc Vi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['HocVi']['name'], array('controller' => 'hoc_vis', 'action' => 'view', $user['HocVi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Department']['name'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthplace'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthplace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar Path'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar_path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activated'); ?></dt>
		<dd>
			<?php echo h($user['User']['activated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Captcha'); ?></dt>
		<dd>
			<?php echo h($user['User']['captcha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['ip_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Verified'); ?></dt>
		<dd>
			<?php echo h($user['User']['email_verified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hoc Hams'), array('controller' => 'hoc_hams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hoc Ham'), array('controller' => 'hoc_hams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hoc Vis'), array('controller' => 'hoc_vis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hoc Vi'), array('controller' => 'hoc_vis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attends'), array('controller' => 'attends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attend'), array('controller' => 'attends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attends'); ?></h3>
	<?php if (!empty($user['Attend'])): ?>
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
	<?php foreach ($user['Attend'] as $attend): ?>
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
	<h3><?php echo __('Related Chapters'); ?></h3>
	<?php if (!empty($user['Chapter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('So Tiet Ly Thuyet'); ?></th>
		<th><?php echo __('So Tiet Thuc Hanh'); ?></th>
		<th><?php echo __('Chapter Type Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Chapter'] as $chapter): ?>
		<tr>
			<td><?php echo $chapter['name']; ?></td>
			<td><?php echo $chapter['description']; ?></td>
			<td><?php echo $chapter['so_tiet_ly_thuyet']; ?></td>
			<td><?php echo $chapter['so_tiet_thuc_hanh']; ?></td>
			<td><?php echo $chapter['chapter_type_id']; ?></td>
			<td><?php echo $chapter['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chapters', 'action' => 'view', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chapters', 'action' => 'edit', $chapter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chapters', 'action' => 'delete', $chapter['id']), array(), __('Are you sure you want to delete # %s?', $chapter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Groups'); ?></h3>
	<?php if (!empty($user['Group'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Image Path'); ?></th>
		<th><?php echo __('Decription'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['name']; ?></td>
			<td><?php echo $group['alias']; ?></td>
			<td><?php echo $group['image']; ?></td>
			<td><?php echo $group['image_path']; ?></td>
			<td><?php echo $group['decription']; ?></td>
			<td><?php echo $group['created']; ?></td>
			<td><?php echo $group['modified']; ?></td>
			<td><?php echo $group['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groups', 'action' => 'view', $group['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groups', 'action' => 'edit', $group['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groups', 'action' => 'delete', $group['id']), array(), __('Are you sure you want to delete # %s?', $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
