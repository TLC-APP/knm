<!-- PAGE CONTENT ENDS -->
<div class="col-sm-12">
    <h2>Thông tin lớp <?php echo $course['Course']['name']?></h2>
    <div class="tabbable">
        <ul class="nav nav-tabs tab-color-blue background-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#courseinfo">Thông tin lớp</a>
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
                            <tr><td><?php echo __('Teacher'); ?></td><td>                            <?php echo $course['Teacher']['name']; ?>
                                </td></tr>
                        </tbody>
                    </table>
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
                                <th>Phòng</th>
                                
                            </tr>
                            <?php foreach ($course['Period'] as $period): ?>
                                <tr>
                                    <td><?php echo $period['name']; ?></td>
                                    <td><?php echo $period['start']; ?></td>
                                    <td><?php echo $period['note']; ?></td>
                                    <td><?php echo $period['Room']['name']; ?></td>
                                    

                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</div>




