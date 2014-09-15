<div class="chapterTypes form">
<?php echo $this->Form->create('ChapterType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Chapter Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ChapterType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ChapterType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Chapter Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Chapters'), array('controller' => 'chapters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chapter'), array('controller' => 'chapters', 'action' => 'add')); ?> </li>
	</ul>
</div>
