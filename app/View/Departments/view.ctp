<div class="departments view">
<h2><?php echo __('Department'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($department['ParentDepartment']['name'], array('controller' => 'departments', 'action' => 'view', $department['ParentDepartment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($department['Department']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Decription'); ?></dt>
		<dd>
			<?php echo h($department['Department']['decription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($department['Department']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($department['Department']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($department['DepartmentType']['name'], array('controller' => 'department_types', 'action' => 'view', $department['DepartmentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($department['Department']['code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Department Types'), array('controller' => 'department_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department Type'), array('controller' => 'department_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Class Rooms'), array('controller' => 'class_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Class Room'), array('controller' => 'class_rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Class Rooms'); ?></h3>
	<?php if (!empty($department['ClassRoom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['ClassRoom'] as $classRoom): ?>
		<tr>
			<td><?php echo $classRoom['id']; ?></td>
			<td><?php echo $classRoom['name']; ?></td>
			<td><?php echo $classRoom['department_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'class_rooms', 'action' => 'view', $classRoom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'class_rooms', 'action' => 'edit', $classRoom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'class_rooms', 'action' => 'delete', $classRoom['id']), array(), __('Are you sure you want to delete # %s?', $classRoom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Class Room'), array('controller' => 'class_rooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Departments'); ?></h3>
	<?php if (!empty($department['ChildDepartment'])): ?>
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
		<th><?php echo __('Department Type Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['ChildDepartment'] as $childDepartment): ?>
		<tr>
			<td><?php echo $childDepartment['name']; ?></td>
			<td><?php echo $childDepartment['parent_id']; ?></td>
			<td><?php echo $childDepartment['phone_number']; ?></td>
			<td><?php echo $childDepartment['decription']; ?></td>
			<td><?php echo $childDepartment['lft']; ?></td>
			<td><?php echo $childDepartment['rght']; ?></td>
			<td><?php echo $childDepartment['created']; ?></td>
			<td><?php echo $childDepartment['modified']; ?></td>
			<td><?php echo $childDepartment['department_type_id']; ?></td>
			<td><?php echo $childDepartment['id']; ?></td>
			<td><?php echo $childDepartment['code']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'departments', 'action' => 'view', $childDepartment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'departments', 'action' => 'edit', $childDepartment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'departments', 'action' => 'delete', $childDepartment['id']), array(), __('Are you sure you want to delete # %s?', $childDepartment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($department['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Borndate'); ?></th>
		<th><?php echo __('Bornplace'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Classroom Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('User Group Id'); ?></th>
		<th><?php echo __('Email Verified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Ip Address'); ?></th>
		<th><?php echo __('Salt'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['borndate']; ?></td>
			<td><?php echo $user['bornplace']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['classroom_id']; ?></td>
			<td><?php echo $user['department_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['user_group_id']; ?></td>
			<td><?php echo $user['email_verified']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['ip_address']; ?></td>
			<td><?php echo $user['salt']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Chapters'); ?></h3>
	<?php if (!empty($department['Chapter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('So Tiet Ly Thuyet'); ?></th>
		<th><?php echo __('So Tiet Thuc Hanh'); ?></th>
		<th><?php echo __('Chapter Type Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['Chapter'] as $chapter): ?>
		<tr>
			<td><?php echo $chapter['name']; ?></td>
			<td><?php echo $chapter['code']; ?></td>
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
