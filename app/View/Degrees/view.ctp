<div class="degrees view">
<h2><?php echo __('Degree'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Degree'), array('action' => 'edit', $degree['Degree']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Degree'), array('action' => 'delete', $degree['Degree']['id']), array(), __('Are you sure you want to delete # %s?', $degree['Degree']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Degrees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($degree['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Academic Id'); ?></th>
		<th><?php echo __('Degree Id'); ?></th>
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
		<th><?php echo __('Ip Address'); ?></th>
		<th><?php echo __('Email Verified'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($degree['User'] as $user): ?>
		<tr>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['academic_id']; ?></td>
			<td><?php echo $user['degree_id']; ?></td>
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
			<td><?php echo $user['ip_address']; ?></td>
			<td><?php echo $user['email_verified']; ?></td>
			<td><?php echo $user['id']; ?></td>
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
