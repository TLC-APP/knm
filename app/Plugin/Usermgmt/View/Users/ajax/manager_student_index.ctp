<?php
$this->Paginator->options(array(
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<table class="table table-condensed">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('username', 'MSSV'); ?></th>

            <th><?php echo $this->Paginator->sort('name', 'Họ tên'); ?></th>
            <th><?php echo $this->Paginator->sort('classroom_id', 'Lớp'); ?></th>

            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('last_login'); ?></th>
            <th><?php echo __('Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = (($this->Paginator->params['paging']['User']['page'] - 1) * $this->Paginator->params['paging']['User']['limit']) + 1;
        ?>
        <?php
        if (!empty($users)) {

            foreach ($users as $row) {
                echo "<tr>";
                echo "<td>" . $stt++ . "</td>";
                echo "<td>" . h($row['User']['username']) . "</td>";

                echo "<td>" . h($row['User']['name']) . "</td>";
                echo "<td>" . h($row['Classroom']['code']) . "</td>";

                echo "<td>" . h($row['User']['email']) . "</td>";
                echo "<td>" . h($row['User']['last_login']) . "</td>";
                echo "<td>";

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
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>	</p>
<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
<?php
echo $this->Js->writeBuffer(); // Write cached scripts ?>