
<div id="dashboard">
	<div style="float:left"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard") ?></div>
<?php   if ($this->UserAuth->isAdmin()) { ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Thêm user",true),"/addUser") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Tất cả User",true),"/allUsers") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__(" Thêm nhóm",true),"/addGroup") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__(" Tất cả nhóm",true),"/allGroups") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Phân quyền",true),"/permissions") ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Hồ sơ người dùng",true),"/viewUser/".$this->UserAuth->getUserId()) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Sửa hồ sơ",true),"/editUser/".$this->UserAuth->getUserId()) ?></div>
<?php   } else {?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Hồ sơ của tôi",true),"/myprofile") ?></div>
<?php   } ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Đổi password",true),"/changePassword") ?></div>
	<div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Thoát",true),"/logout") ?></div>
	<div style="clear:both"></div>
</div>