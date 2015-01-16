<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php
$this->Paginator->options(array(
    'url' => array('manager' => true, 'action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'before' => $this->Js->get('#loading')->effect('fadeIn', array('speed' => 'fast')),
    'complete' => $this->Js->get('#loading')->effect('fadeOut', array('speed' => 'fast')),
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>

<div class="row">
    <h2>Danh sách lớp kỹ năng</h2>
    <?php
    echo $this->Form->create('Course', array(
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => false,
            'wrapInput' => false,
            'class' => 'form-control'
        ),
        'class' => ' form-inline',
        'id' => 'filter-course'
    ));
    ?>
    <div class="form-group">
        <?php
        echo $this->Form->year('year', 2011, date('Y') + 5, array('empty' => 'Chọn năm', "class" => "form-control"));
        ?>
    </div>
    <?php echo $this->Form->month('month', array('empty' => 'Chọn tháng', "class" => "form-control", 'monthNames' => false)); ?>
    <?php
    echo $this->Form->input('chapter_id', array(
        'empty' => 'Chọn kỹ năng', 'required' => false
    ));
    ?>
    <?php
    echo $this->Form->input('teacher_id', array(
        'empty' => 'Chọn giảng viên', 'required' => false
    ));
    ?>
    <?php
    echo $this->Form->input('name', array(
        'placeholder' => 'Tên lớp', 'required' => false
    ));
    ?>
    <?php
    echo $this->Form->input('trang_thai', array('options' => array(COURSE_ENROLLING => 'Đang đăng ký', COURSE_OPEN => 'Đã mở', COURSE_OPENABLE => 'Có thể mở', COURSE_WAIT_CANCEL => 'Chờ hủy', COURSE_CANCELLED => 'Đã hủy'),
        'placeholder' => 'Trạng thái', 'required' => false, 'empty' => 'Chọn trạng thái'
    ));
    ?>
    <?php
    echo $this->Form->submit('lọc', array(
        'div' => 'form-group',
        'class' => 'btn btn-purple btn-sm'
    ));
    ?>
    <?php echo $this->Form->end(); ?> 
    <?php echo $this->element('loading'); ?>
    <div class="table-responsive" id="datarows">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th>Buổi học</th>
                    <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
                    <th>Có thể đăng ký thêm</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = (($this->Paginator->params['paging']['Course']['page'] - 1) * $this->Paginator->params['paging']['Course']['limit']) + 1;
                ?>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php
                            echo h($course['Course']['name']) . ' ';
                            echo ($course['Course']['handangky'] > 0) ? ' <span class="label label-info arrowed arrowed-right">còn ' . $course['Course']['handangky'] . ' ngày</span>' : '<span class="label label-danger arrowed arrowed-right">hết hạn</span>';
                            echo $this->element('course_status', array('status' => $course['Course']['trang_thai']))
                            ?>&nbsp;</td>
                        <td><?php
                            $i = 0;
                            foreach ($course['Period'] as $buoi) {
                                if ($i % 2 == 0) {
                                    $class = "label label-success";
                                } else {
                                    $class = "label label-info";
                                }

                                $ten_buoi = $buoi['name'];
                                $start = $buoi['start'];
                                $room = $buoi['Room']['name'];


                                echo $this->element('buoi_hoc', array('buoi' => $ten_buoi, 'start' => $start, 'room' => $room, 'class' => $class));
                                $i++;
                            }
                            ?></td>
                        <td>
                            <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $course['Course']['si_so'] - $course['Course']['enrolledno']; ?>
                        </td>
                        <td>
                            <?php
                            if ($course['Course']['enrolledno'] >= SO_SINH_VIEN_TOI_THIEU && $course['Course']['trang_thai'] != COURSE_OPEN) {
                                echo $this->Html->link(__('open'), array('action' => 'mo_lop', $course['Course']['id']), array('escape' => false));
                            }
                            ?>

                            <?php if ($course['Course']['enrolledno'] >= SO_SINH_VIEN_TOI_THIEU) echo $this->Html->link(__('print'), array('manager' => false, 'action' => 'course_pdf_export', $course['Course']['id']), array('escape' => false)); ?>
                            <?php if ($course['Course']['trang_thai'] != COURSE_CANCELLED) echo $this->Html->link(__('cancel'), array('action' => 'huy_lop', $course['Course']['id']), array('escape' => false)); ?>
                            <?php
                            if ($course['Course']['trang_thai'] == COURSE_OPEN) {
                                echo $this->Html->link(__('ket qua'), array('controller' => 'enrollments', 'action' => 'ket_qua', $course['Course']['id']), array('escape' => false));
                            }
                            ?>
                            <?php echo $this->Form->postLink(__('Cho đăng ký'), array('action' => 'cho_dang_ky', $course['Course']['id']), array('escape' => false), "Bạn chắc chắn cho đăng ký lớp " . $course['Course']['name']); ?>

                            <?php echo $this->Form->postLink(__('delete'), array('action' => 'delete', $course['Course']['id']), array('escape' => false), "Bạn chắc chắn xóa lớp " . $course['Course']['name']); ?>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	</p>


        <?php
        echo $this->Paginator->pagination(array(
            'ul' => 'pagination pagination-sm'
        ));
        ?>
    </div>

</div>
<script>
    function process() {
        $("#loading").fadeIn();
        $.ajax({
            type: "post",
            data: $("#filter-course").serialize(),
            success: function (data) {
                $("#datarows").html(data);
                $("#loading").fadeOut();
            }
        });
        return false;
    }
    $("#CourseYearYear").change(function () {
        process();
    });
    $("#CourseMonthMonth").change(function () {
        process();
    });
    $("#CourseChapterId").change(function () {
        process();
    });
    $("#CourseTeacherId").change(function () {
        process();
    });

    $("#CourseTrangThai").change(function () {
        process();
    });
    $("#filter-course").submit(function (e) {
        e.preventDefault();
        process();

    });


</script>
<?php echo $this->Js->writeBuffer(); // Write cached scripts       ?>

