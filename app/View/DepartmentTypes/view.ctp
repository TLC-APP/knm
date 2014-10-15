<div class="departmentTypes view">
<h2><?php echo __('Department Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($departmentType['DepartmentType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($departmentType['DepartmentType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department Type'), array('action' => 'edit', $departmentType['DepartmentType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department Type'), array('action' => 'delete', $departmentType['DepartmentType']['id']), array(), __('Are you sure you want to delete # %s?', $departmentType['DepartmentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Department Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Departments'); ?></h3>
	<?php if (!empty($departmentType['Department'])): ?>
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
	<?php foreach ($departmentType['Department'] as $department): ?>
		<tr>
			<td><?php echo $department['name']; ?></td>
			<td><?php echo $department['parent_id']; ?></td>
			<td><?php echo $department['phone_number']; ?></td>
			<td><?php echo $department['decription']; ?></td>
			<td><?php echo $department['lft']; ?></td>
			<td><?php echo $department['rght']; ?></td>
			<td><?php echo $department['created']; ?></td>
			<td><?php echo $department['modified']; ?></td>
			<td><?php echo $department['department_type_id']; ?></td>
			<td><?php echo $department['id']; ?></td>
			<td><?php echo $department['code']; ?></td>
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
