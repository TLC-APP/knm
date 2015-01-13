<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php
$this->Paginator->options(array(
    //'url' => array('manager' => true, 'action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'before' => $this->Js->get('#loading')->effect('fadeIn', array('speed' => 'fast')),
    'complete' => $this->Js->get('#loading')->effect('fadeOut', array('speed' => 'fast')),
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>

<div class="row">
    <h2>Danh sách lớp kỹ năng có thể đăng ký</h2>
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
        echo $this->Form->year('year', 2013, date('Y') + 5, array('empty' => 'Chọn năm', "class" => "form-control"));
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
        'placeholder' => 'Mã lớp', 'required' => false
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
        <?php
        echo $this->Paginator->pagination(array(
            'ul' => 'pagination pagination-sm'
        ));
        ?>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th><?php echo $this->Paginator->sort('name', 'Mã lớp'); ?></th>
                    <th>Buổi học</th>
                    <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
                    <th>Hạn đăng ký còn</th>
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
                        <td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
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
                                $i++;

                                echo $this->element('buoi_hoc', array('buoi' => $ten_buoi, 'start' => $start, 'room' => $room, 'class' => $class));
                            }
                            ?></td>
                        <td>
                            <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                        </td>
                        <td>
    <?php echo $course['Teacher']['name']; ?>
                        </td>
                        <td><?php echo ($course['Course']['handangky'] > 0) ? $course['Course']['handangky'] . ' ngày' : 'Hết hạn'; ?></td>
                        <td>
    <?php echo $course['Course']['si_so'] - $course['Course']['enrolledno']; ?>
                        </td>
                        <td><?php echo $this->Html->link(__('enroll'), array('action' => 'enroll', $course['Course']['id']), array('escape' => false)); ?></td>
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

    $("#filter-course").submit(function (e) {
        e.preventDefault();
        process();

    });


</script>
<?php echo $this->Js->writeBuffer(); // Write cached scripts    ?>

