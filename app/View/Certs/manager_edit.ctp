<div class="certs form">
<?php echo $this->Form->create('Cert'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cert'); ?></legend>
	<?php
		echo $this->Form->input('cert_no');
		echo $this->Form->input('cert_date');
		echo $this->Form->input('signer');
		echo $this->Form->input('da_in');
		echo $this->Form->input('recieved');
		echo $this->Form->input('nguoi_phat');
		echo $this->Form->input('student_id');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cert.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cert.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Certs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
