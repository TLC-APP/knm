<div class="departmentsChapters index">
	<h2><?php echo __('Departments Chapters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($departmentsChapters as $departmentsChapter): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($departmentsChapter['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $departmentsChapter['Chapter']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($departmentsChapter['Department']['name'], array('controller' => 'departments', 'action' => 'view', $departmentsChapter['Department']['id'])); ?>
		</td>
		<td><?php echo h($departmentsChapter['DepartmentsChapter']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $departmentsChapter['DepartmentsChapter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $departmentsChapter['DepartmentsChapter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $departmentsChapter['DepartmentsChapter']['id']), array(), __('Are you sure you want to delete # %s?', $departmentsChapter['DepartmentsChapter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Departments Chapter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
