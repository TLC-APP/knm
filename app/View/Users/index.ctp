<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('hoc_ham_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hoc_vi_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('birthplace'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('avatar'); ?></th>
			<th><?php echo $this->Paginator->sort('avatar_path'); ?></th>
			<th><?php echo $this->Paginator->sort('activated'); ?></th>
			<th><?php echo $this->Paginator->sort('last_login'); ?></th>
			<th><?php echo $this->Paginator->sort('captcha'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ip_address'); ?></th>
			<th><?php echo $this->Paginator->sort('email_verified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sex']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['HocHam']['name'], array('controller' => 'hoc_hams', 'action' => 'view', $user['HocHam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['HocVi']['name'], array('controller' => 'hoc_vis', 'action' => 'view', $user['HocVi']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Department']['name'], array('controller' => 'departments', 'action' => 'view', $user['Department']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['birthplace']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['avatar_path']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['activated']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['captcha']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['ip_address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email_verified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
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
