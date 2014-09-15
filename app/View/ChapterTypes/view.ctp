<div class="chapterTypes view">
<h2><?php echo __('Chapter Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chapterType['ChapterType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($chapterType['ChapterType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($chapterType['ChapterType']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chapter Type'), array('action' => 'edit', $chapterType['ChapterType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chapter Type'), array('action' => 'delete', $chapterType['ChapterType']['id']), array(), __('Are you sure you want to delete # %s?', $chapterType['ChapterType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapter Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Chapters'); ?></h3>
	<?php if (!empty($chapterType['Chapter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('So Tiet Ly Thuyet'); ?></th>
		<th><?php echo __('So Tiet Thuc Hanh'); ?></th>
		<th><?php echo __('Chapter Type Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($chapterType['Chapter'] as $chapter): ?>
		<tr>
			<td><?php echo $chapter['name']; ?></td>
			<td><?php echo $chapter['description']; ?></td>
			<td><?php echo $chapter['so_tiet_ly_thuyet']; ?></td>
			<td><?php echo $chapter['so_tiet_thuc_hanh']; ?></td>
			<td><?php echo $chapter['chapter_type_id']; ?></td>
			<td><?php echo $chapter['id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chapters', 'action' => 'view', $chapter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chapters', 'action' => 'edit', $chapter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chapters', 'action' => 'delete', $chapter['id']), array(), __('Are you sure you want to delete # %s?', $chapter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
