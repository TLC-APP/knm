<div class="departmentsChapters form">
<?php echo $this->Form->create('DepartmentsChapter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Departments Chapter'); ?></legend>
	<?php
		echo $this->Form->input('chapter_id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DepartmentsChapter.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('DepartmentsChapter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Departments Chapters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>