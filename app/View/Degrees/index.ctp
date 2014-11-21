<div class="degrees index">
	<h2><?php echo __('Degrees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($degrees as $degree): ?>
	<tr>
		<td><?php echo h($degree['Degree']['id']); ?>&nbsp;</td>
		<td><?php echo h($degree['Degree']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $degree['Degree']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $degree['Degree']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $degree['Degree']['id']), array(), __('Are you sure you want to delete # %s?', $degree['Degree']['id'])); ?>
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
	<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
</div>

