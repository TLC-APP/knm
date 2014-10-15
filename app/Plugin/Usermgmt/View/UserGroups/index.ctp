
<h2>Danh sách nhóm</h2>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nhóm ID</th>
            <th>Tên nhóm</th>
            <th>Alias</th>
            <th>Cho phép đăng ký</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($userGroups)) {
            foreach ($userGroups as $row) {
                echo "<tr>";
                echo "<td>" . $row['UserGroup']['id'] . "</td>";
                echo "<td>" . h($row['UserGroup']['name']) . "</td>";
                echo "<td>" . h($row['UserGroup']['alias_name']) . "</td>";
                echo "<td>";
                if ($row['UserGroup']['allowRegistration']) {
                    echo "Yes";
                } else {
                    echo "No";
                }
                echo"</td>";
                echo "<td>" . date('d-M-Y', strtotime($row['UserGroup']['created'])) . "</td>";
                echo "<td>";
                echo "<span class='icon'><a href='" . $this->Html->url('/editGroup/' . $row['UserGroup']['id']) . "'><img src='" . SITE_URL . "usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
                if ($row['UserGroup']['id'] != 1) {
                    echo $this->Form->postLink($this->Html->image(SITE_URL . 'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=6><br/><br/>Không có data</td></tr>";
        }
        ?>
    </tbody>
</table>

