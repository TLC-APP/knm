<div class="col-md-12">
    <h2><?php echo __('Enrollments'); ?></h2>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Kỹ năng</th>
                <th>Mã lớp</th>
                <th>Tình trạng lớp</th>
                <th>Kết quả</th>
                <th>Học phí</th>
                <th>Vắng</th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrollments as $enrollment): ?>
                <tr>
                    <td>
                        <?php echo ($enrollment['Course']['Chapter']['name']) . '<span class="badge text-info">' . $enrollment['Course']['Chapter']['ChapterType']['name'] . '</span>'; ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($enrollment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrollment['Course']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->element('course_status', array('status' => $enrollment['Course']['trang_thai'])); ?>
                    </td>
                    <td><?php
                        if (is_null($enrollment['Enrollment']['pass'])) {
                            $pass = "Chưa cập nhật";
                        } else {
                            if (($enrollment['Enrollment']['pass'])) {
                                $pass = "<i class='fa fa-check text-success'></i>";
                            } else {
                                $pass = "<i class='fa fa-times text-danger'></i>";
                            }
                        }
                        echo $pass;
                        ?>&nbsp;</td>
                    <td><?php
                        $fee = "";
                        if (!is_null($enrollment['Enrollment']['pass']) && !$enrollment['Enrollment']['pass']) {
                            if ($enrollment['Enrollment']['fee']) {
                                $fee = "<i class='fa fa-check text-success'></i>";
                            } else {
                                $fee = "<i class='fa fa-times text-danger'></i>";
                            }
                            echo $fee;
                        }
                        ?>&nbsp;</td>
                    <td><?php echo ($enrollment['Enrollment']['absence']) ? "<i class='fa fa-times text-danger'></i>" : ""; ?>&nbsp;</td>
                    <td><?php
                        if ($enrollment['Course']['trang_thai'] == COURSE_ENROLLING && $enrollment['Course']['handangky'] > 0) {
                            echo $this->Html->link('Hủy', array('controller' => 'courses', 'action' => 'unenroll', $enrollment['Course']['id']), array('class' => 'btn btn-danger'));
                        }
                        ?>
                        <?php //echo $this->Form->postLink('<span class="fa fa-trash-o"> Hủy</span>',  array('controller' => 'courses', 'action' => 'unenroll', $enrollment['Course']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "left", 'title' => "Hủy tham gia"), __('Bạn chắc chắn hủy tham gia lớp # %s?', $enrollment['Course']['name']));
                        ?></td>
                </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>

</div>




