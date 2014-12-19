<div class="certs index">
	<h2><?php echo __('Certs'); ?></h2>
	<table class="table table-condensed">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('cert_no'); ?></th>
			<th><?php echo $this->Paginator->sort('cert_date'); ?></th>
			<th><?php echo $this->Paginator->sort('signer'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('da_in'); ?></th>
			<th><?php echo $this->Paginator->sort('recieved'); ?></th>
			<th><?php echo $this->Paginator->sort('nguoi_phat'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($certs as $cert): ?>
	<tr>
		<td><?php echo h($cert['Cert']['cert_no']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['cert_date']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['signer']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['created']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['modified']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['da_in']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['recieved']); ?>&nbsp;</td>
		<td><?php echo h($cert['Cert']['nguoi_phat']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cert['Student']['name'], array('controller' => 'users', 'action' => 'view', $cert['Student']['id'])); ?>
		</td>
		<td><?php echo h($cert['Cert']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cert['Cert']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cert['Cert']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cert['Cert']['id']), array(), __('Are you sure you want to delete # %s?', $cert['Cert']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cert'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
