<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
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
        echo $this->Form->year('year', 2013, date('Y') + 5, array('empty' => 'Chọn năm', "class" => "form-control"));
        ?>
    </div>
    <?php echo $this->Form->month('month', array('empty' => 'Chọn tháng', "class" => "form-control", 'monthNames' => false)); ?>
    <?php
    echo $this->Form->input('chapter_id', array(
        'empty' => 'Chọn kỹ năng','required'=>false
    ));
    ?>
    <?php
    echo $this->Form->input('teacher_id', array(
        'empty' => 'Chọn giảng viên','required'=>false
    ));
    ?>
    <?php
    echo $this->Form->input('name', array(
        'placeholder' => 'Tên lớp','required'=>false
    ));
    ?>
    <?php
    echo $this->Form->submit('lọc', array(
        'div' => 'form-group',
        'class' => 'btn btn-purple btn-sm'
    ));
    ?>
    <?php echo $this->Form->end(); ?> 
    <div class="table-responsive" id="datarows">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th>Buổi học</th>
                    <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
                    <th>Hạn đăng ký còn</th>
                    <th>Có thể đăng ký thêm</th>
                   
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
                            foreach ($course['Period'] as $buoi) {
                                $line = $buoi['name'] . ' ';
                                $batdau = new DateTime($buoi['start']);
                                $line .=($batdau->format('H' == '07')) ? 'Sáng ' : 'Chiều ';

                                $jd = cal_to_jd(CAL_GREGORIAN, $batdau->format('m'), $batdau->format('d'), $batdau->format('Y'));
                                $day = jddayofweek($jd, 0);
                                switch ($day) {
                                    case 0:
                                        $thu = "Chủ Nhật";
                                        break;
                                    case 1:
                                        $thu = "Thứ Hai";
                                        break;
                                    case 2:
                                        $thu = "Thứ Ba";
                                        break;
                                    case 3:
                                        $thu = "Thứ Tư";
                                        break;
                                    case 4:
                                        $thu = "Thứ Năm";
                                        break;
                                    case 5:
                                        $thu = "Thứ Sáu";
                                        break;
                                    case 6:
                                        $thu = "Thứ 7";
                                        break;
//Vì mod bằng 0
                                }
                                $line.=$thu . ' ' . $batdau->format('d/m/Y');
                                $line.=' tại ' . $buoi['Room']['name'] . '<br/>';
                                echo $line;
                            }
                            ?></td>
                        <td>
                            <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                        </td>
                        <td><?php echo ($course['Course']['handangky']>0)?$course['Course']['handangky'].' ngày':'Hết hạn'; ?></td>
                        <td>
                            <?php echo $course['Course']['si_so']-$course['Course']['enrolledno']; ?>
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

    $("#filter-course").submit(function (e) {
        e.preventDefault();
        process();
        
    });


</script>
<?php echo $this->Js->writeBuffer(); // Write cached scripts   ?>
