<div class="chapters form">
<?php echo $this->Form->create('Chapter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chapter'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('so_tiet_ly_thuyet');
		echo $this->Form->input('so_tiet_thuc_hanh');
		echo $this->Form->input('chapter_type_id');
		echo $this->Form->input('id');
		echo $this->Form->input('Department');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Chapter.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Chapter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('action' => 'index')); ?></li>
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
