<h2>Danh sách giảng viên</h2>
<table class="table table-condensed" >
    <thead>
        <tr>
            <th><?php echo __('STT'); ?></th>
            <th><?php echo __('Tên'); ?></th>
            <th><?php echo __('Username'); ?></th>
            <th><?php echo __('Email'); ?></th>
            <th><?php echo __('Đã xác nhận email'); ?></th>
            <th><?php echo __('Trạng thái'); ?></th>
            <th><?php echo __('Ngày tạo'); ?></th>
            <th><?php echo __('Thao tác'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($users)) {
            $sl = 0;
            foreach ($users as $row) {
                $sl++;
                echo "<tr>";
                echo "<td>" . $sl . "</td>";
                echo "<td>" . h($row['User']['last_name']) . " " . h($row['User']['first_name']) . "</td>";
                echo "<td>" . h($row['User']['username']) . "</td>";
                echo "<td>" . h($row['User']['email']) . "</td>";
                echo "<td>";
                if ($row['User']['email_verified'] == 1) {
                    echo "Yes";
                } else {
                    echo "No";
                }
                echo"</td>";
                echo "<td>";
                if ($row['User']['active'] == 1) {
                    echo "Đã kích hoạt";
                } else {
                    echo "Chưa kích hoạt";
                }
                echo"</td>";
                echo "<td>" . date('d-m-Y', strtotime($row['User']['created'])) . "</td>";
                echo "<td>";
                echo "<span class='icon'><a href='" . $this->Html->url('/viewUser/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/view.png' border='0' alt='View' title='View'></a></span>";
                echo "<span class='icon'><a href='" . $this->Html->url('/editUser/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                echo "<span class='icon'><a href='" . $this->Html->url('/changeUserPassword/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a></span>";
                if ($row['User']['email_verified'] == 0) {
                    echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/verifyEmail/' . $row['User']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/email-verify.png' border='0' alt='Verify Email' title='Verify Email'></a></span>";
                }
                if ($row['User']['active'] == 0) {
                    echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/1') . "'><img src='" . SITE_URL . "usermgmt/img/dis-approve.png' border='0' alt='Make Active' title='Make Active'></a></span>";
                } else {
                    echo "<span class='icon'><a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/0') . "'><img src='" . SITE_URL . "usermgmt/img/approve.png' border='0' alt='Make Inactive' title='Make Inactive'></a></span>";
                }
                if ($row['User']['id'] != 1 && $row['User']['username'] != 'Admin') {
                    echo $this->Form->postLink($this->Html->image(SITE_URL . 'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $row['User']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=10><br/><br/>Không có dữ liệu</td></tr>";
        }
        ?>
    </tbody>
</table>