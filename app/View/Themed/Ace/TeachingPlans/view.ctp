<div class="teachingPlans view">
<h2><?php echo __('Teaching Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teachingPlan['TeachingPlan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($teachingPlan['TeachingPlan']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Session'); ?></dt>
		<dd>
			<?php echo h($teachingPlan['TeachingPlan']['session']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teachingPlan['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $teachingPlan['Teacher']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teaching Plan'), array('action' => 'edit', $teachingPlan['TeachingPlan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teaching Plan'), array('action' => 'delete', $teachingPlan['TeachingPlan']['id']), array(), __('Are you sure you want to delete # %s?', $teachingPlan['TeachingPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teaching Plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teaching Plan'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
