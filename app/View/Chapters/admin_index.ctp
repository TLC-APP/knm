<div class="chapters index">
	<h2><?php echo __('Chapters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('so_tiet_ly_thuyet'); ?></th>
			<th><?php echo $this->Paginator->sort('so_tiet_thuc_hanh'); ?></th>
			<th><?php echo $this->Paginator->sort('chapter_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($chapters as $chapter): ?>
	<tr>
		<td><?php echo h($chapter['Chapter']['name']); ?>&nbsp;</td>
		<td><?php echo h($chapter['Chapter']['so_tiet_ly_thuyet']); ?>&nbsp;</td>
		<td><?php echo h($chapter['Chapter']['so_tiet_thuc_hanh']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chapter['ChapterType']['name'], array('controller' => 'chapter_types', 'action' => 'view', $chapter['ChapterType']['id'])); ?>
		</td>
		<td><?php echo h($chapter['Chapter']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chapter['Chapter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chapter['Chapter']['id']), array(), __('Are you sure you want to delete # %s?', $chapter['Chapter']['id'])); ?>
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
