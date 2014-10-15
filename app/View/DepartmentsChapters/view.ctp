<div class="departmentsChapters view">
<h2><?php echo __('Departments Chapter'); ?></h2>
	<dl>
		<dt><?php echo __('Chapter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($departmentsChapter['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $departmentsChapter['Chapter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($departmentsChapter['Department']['name'], array('controller' => 'departments', 'action' => 'view', $departmentsChapter['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($departmentsChapter['DepartmentsChapter']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Departments Chapter'), array('action' => 'edit', $departmentsChapter['DepartmentsChapter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Departments Chapter'), array('action' => 'delete', $departmentsChapter['DepartmentsChapter']['id']), array(), __('Are you sure you want to delete # %s?', $departmentsChapter['DepartmentsChapter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments Chapters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Departments Chapter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
