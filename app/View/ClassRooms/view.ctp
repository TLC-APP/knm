<div class="classRooms view">
<h2><?php echo __('Class Room'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classRoom['ClassRoom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($classRoom['ClassRoom']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classRoom['Department']['name'], array('controller' => 'departments', 'action' => 'view', $classRoom['Department']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Class Room'), array('action' => 'edit', $classRoom['ClassRoom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Class Room'), array('action' => 'delete', $classRoom['ClassRoom']['id']), array(), __('Are you sure you want to delete # %s?', $classRoom['ClassRoom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Class Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Class Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
