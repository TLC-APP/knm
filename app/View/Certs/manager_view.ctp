<div class="certs view">
<h2><?php echo __('Cert'); ?></h2>
	<dl>
		<dt><?php echo __('Cert No'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['cert_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cert Date'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['cert_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Signer'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['signer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Da In'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['da_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recieved'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nguoi Phat'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['nguoi_phat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cert['Student']['id'], array('controller' => 'users', 'action' => 'view', $cert['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cert['Cert']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cert'), array('action' => 'edit', $cert['Cert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cert'), array('action' => 'delete', $cert['Cert']['id']), array(), __('Are you sure you want to delete # %s?', $cert['Cert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Certs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cert'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
