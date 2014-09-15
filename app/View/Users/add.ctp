<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('sex');
		echo $this->Form->input('hoc_ham_id');
		echo $this->Form->input('hoc_vi_id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('birthday');
		echo $this->Form->input('birthplace');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('address');
		echo $this->Form->input('avatar');
		echo $this->Form->input('avatar_path');
		echo $this->Form->input('activated');
		echo $this->Form->input('last_login');
		echo $this->Form->input('captcha');
		echo $this->Form->input('ip_address');
		echo $this->Form->input('email_verified');
		echo $this->Form->input('Chapter');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
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
