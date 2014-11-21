<div class="periods index">
	<h2><?php echo __('Periods'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($periods as $period): ?>
	<tr>
		<td><?php echo h($period['Period']['name']); ?>&nbsp;</td>
		<td><?php echo h($period['Period']['start']); ?>&nbsp;</td>
		<td><?php echo h($period['Period']['note']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($period['Course']['name'], array('controller' => 'courses', 'action' => 'view', $period['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($period['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $period['Room']['id'])); ?>
		</td>
		<td><?php echo h($period['Period']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $period['Period']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $period['Period']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $period['Period']['id']), array(), __('Are you sure you want to delete # %s?', $period['Period']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Period'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
