<!-- PAGE CONTENT ENDS -->
<div class="col-sm-12">
    <div class="tabbable">
        <ul class="nav nav-tabs tab-color-blue background-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#courseinfo">Thông tin lớp</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#sinhvien">Danh sách sinh viên</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#buoihoc">Buổi học</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="courseinfo" class="tab-pane active">
                <div class="">
                    <table class="table table-condensed">
                        <tbody>
                            <tr><td><?php echo __('Name'); ?></td><td><?php echo h($course['Course']['name']); ?></td></tr>
                            <tr><td><?php echo __('Si So'); ?></td><td><?php echo h($course['Course']['si_so']); ?></td></tr>
                            <tr><td><?php echo __('Trang Thai'); ?></td><td><?php echo $this->element('course_status', array('status' => $course['Course']['trang_thai'])); ?></td></tr>
                            <tr><td>
                                    <?php echo __('Chapter'); ?></td><td><?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                                </td></tr>
                            <tr><td><?php echo __('Teacher'); ?></td><td>                            <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                                </td></tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div id="sinhvien" class="tab-pane">
                <div class="related">
                    <h3><?php echo __('Related Enrollments'); ?></h3>
                    <?php if (!empty($course['Enrollment'])): ?>
                        <table class="table table-condensed">
                            <tr>
                                <th>STT</th>
                                <th><?php echo __('Student Name'); ?></th>
                                <th><?php echo __('Pass'); ?></th>
                                <th><?php echo __('Fee'); ?></th>
                                <th><?php echo __('Absence'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            <?php
                            $stt = 1;
                            foreach ($course['Enrollment'] as $enrollment):
                                ?>
                                <tr>
                                    <td><?php echo $stt++; ?></td>
                                    <td><?php echo $enrollment['Student']['name']; ?></td>
                                    <td><?php
                                        $pass = "";
                                        if ($enrollment['pass'] == 2) {
                                            $pass = "<a class='btn btn-danger' href='#'><i class='fa fa-times fa-1'></i></a>";
                                        } elseif ($pass == 1) {
                                            $pass = "<a class='btn btn-success' href='#'><i class='fa fa-check-square-o fa-1'></i></a>";
                                        } else {
                                            $pass = "chưa có";
                                        }
                                        echo $pass;
                                        ?></td>
                                    <td><?php echo $enrollment['fee']; ?></td>
                                    <td><?php echo $enrollment['absence']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('view'), array('controller' => 'enrollments', 'action' => 'view', $enrollment['id']), array('escape' => false)); ?>
                                        <?php echo $this->Html->link(__('edit'), array('controller' => 'enrollments', 'action' => 'edit', $enrollment['id']), array('escape' => false)); ?>
                                        <?php echo $this->Form->postLink(__('delete'), array('controller' => 'enrollments', 'action' => 'delete', $enrollment['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $enrollment['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    <?php endif; ?>


                </div>

            </div>

            <div id="buoihoc" class="tab-pane">
                <div class="related">
                    <?php if (!empty($course['Period'])): ?>
                        <table class="table table-condensed">
                            <tr>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Start'); ?></th>
                                <th><?php echo __('Note'); ?></th>
                                <th><?php echo __('Room Name'); ?></th>
                                <th><?php echo __('Action'); ?></th>

                            </tr>
                            <?php foreach ($course['Period'] as $period): ?>
                                <tr>
                                    <td><?php echo $period['name']; ?></td>
                                    <td><?php echo $period['start']; ?></td>
                                    <td><?php echo $period['note']; ?></td>
                                    <td><?php echo $period['Room']['name']; ?></td>
                                    <th>                                        
                                        <?php echo $this->Html->link(__('edit'), array('controller' => 'enrollments', 'action' => 'edit', $period['id']), array('escape' => false)); ?>
                                    </th>

                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <?php echo $this->Html->link('Cập nhật thông tin lớp', array('action' => 'edit', $course['Course']['id']), array('escape' => false, 'class' => 'btn btn-info')); ?>

        <?php echo $this->Html->link('In lớp', array('action' => 'course_pdf_export', 'manager' => false, $course['Course']['id']), array('class' => 'btn btn-info')); ?>
    </div>

</div>




