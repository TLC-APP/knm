<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1">Thông tin người dùng</span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="index">
				<table cellspacing="0" cellpadding="0" width="100%" border="0" >
					<tbody>
			<?php       if (!empty($user)) { ?>
							<tr>
								<td><strong>ID</strong></td>
								<td><?php echo $user['User']['id']?></td>
							</tr>
							<tr>
								<td><strong>Nhóm</strong></td>
								<td><?php echo h($user['UserGroup']['name'])?></td>
							</tr>
							<tr>
								<td><strong>Username</strong></td>
								<td><?php echo h($user['User']['username'])?></td>
							</tr>
							<tr>
								<td><strong>Tên</strong></td>
								<td><?php echo h($user['User']['first_name'])?></td>
							</tr>
							<tr>
								<td><strong>Họ lót</strong></td>
								<td><?php echo h($user['User']['last_name'])?></td>
							</tr>
                                                        <tr>
								<td><strong>CMND</strong></td>
								<td><?php echo h($user['User']['cmnd'])?></td>
							</tr>
                                                        <tr>
								<td><strong>Ngày cấp</strong></td>
								<td><?php echo h($user['User']['ngay_cap'])?></td>
							</tr>
                                                        <tr>
								<td><strong>Nơi cấp</strong></td>
								<td><?php echo h($user['User']['noi_cap'])?></td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td><?php echo h($user['User']['email'])?></td>
							</tr>
                                                        <tr>
								<td><strong>Địa chỉ</strong></td>
								<td><?php echo h($user['User']['dia_chi'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email Verified');?></strong></td>
								<td><?php
										if ($user['User']['email_verified']) {
											echo 'Yes';
										} else {
											echo 'No';
										} ?>
								</td>
							</tr>
							<tr>
								<td><strong>Trạng thái</strong></td>
								<td><?php
										if ($user['User']['active']) {
											echo 'Active';
										} else {
											echo 'Inactive';
										} ?>
								</td>
							</tr>
							<tr>
								<td><strong>Địa chỉ IP</strong></td>
								<td><?php echo h($user['User']['ip_address'])?></td>
							</tr>
							<tr>
								<td><strong>Ngày tạo</strong></td>
								<td><?php echo date('d-M-Y',strtotime($user['User']['created']))?></td>
							</tr>
				<?php   } else {
							echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>