<p>Thay đổi ảnh của <?php echo $user['User']['name']?></p>
<?php if (!empty($user['User']['photo'])):?>

    <p>Hình hiện tại:</p>
    <?php echo $this->Html->image("/files/user/photo/" . h($user['User']['photo_dir']) . '/' . h($user['User']['photo']), array('width'=>'80px')) ?>
<?php endif;?>
<?php echo $this->Form->create('User',array('type'=>'file'));?>
<?php echo $this->Form->input('id');?>
<?php echo $this->Form->input('photo',array('type'=>'file','label'=>'Avatar mới:'))?>
<?php echo $this->Form->input('photo_dir',array('type'=>'hidden'))?>
<?php echo $this->Form->end('Cập nhật');