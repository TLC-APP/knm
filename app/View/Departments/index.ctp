<div class="departments index">
	<h2><?php echo __('Departments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('decription'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('department_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($departments as $department): ?>
	<tr>
		<td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($department['ParentDepartment']['name'], array('controller' => 'departments', 'action' => 'view', $department['ParentDepartment']['id'])); ?>
		</td>
		<td><?php echo h($department['Department']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['decription']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['lft']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['rght']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['created']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($department['DepartmentType']['name'], array('controller' => 'department_types', 'action' => 'view', $department['DepartmentType']['id'])); ?>
		</td>
		<td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
		<td><?php echo h($department['Department']['code']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $department['Department']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $department['Department']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?></li>
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
