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
    <h2>Thống kê sinh viên đạt kỹ năng</h2>
    <?php
    echo $this->Form->create(null, array(
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
    <?php echo $this->Form->input('level', array('empty' => 'Hệ', "class" => "form-control", 'type' => 'select', 'options' => array(1 => 'Đại học', 2 => 'Cao đẳng', 3 => 'TCCN'))); ?>

    <div class="form-group">
        <?php
        echo $this->Form->year('year', 2012, date('Y'), array('empty' => 'Chọn năm', "class" => "form-control"));
        ?>
    </div>

    <?php
    echo $this->Form->input('sbb_no', array(
        'empty' => 'Bắt buộc', 'type' => 'select', 'options' => array(0 => 'Chưa đạt kỹ năng nào', '1' => 'Đạt 1', 2 => 'Đạt 2')
    ));
    ?>
    <?php
    echo $this->Form->input('stc_no', array(
        'empty' => 'Tự chọn', 'type' => 'select', 'options' => array(0 => 'Chưa đạt kỹ năng nào', '1' => 'Đạt 1', 2 => 'Đạt 2', 3 => 'Đạt 3', 4 => 'Đạt 4', 5 => 'Đạt 5')
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
                    <th>MSSV</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Ngày sinh</th>
                    <th>SĐT</th>                    
                    <th>Kỹ năng</th>                    
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = (($this->Paginator->params['paging']['User']['page'] - 1) * $this->Paginator->params['paging']['User']['limit']) + 1;
                ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo h($student['User']['username']); ?>&nbsp;</td>
                        <td><?php echo h($student['User']['name']); ?>&nbsp;</td>
                        <td><?php echo h($student['Classroom']['code']) . ' - ' . h($student['Classroom']['name']); ?>&nbsp;</td>
                        <td><?php
                            $born = new DateTime($student['User']['borndate']);
                            echo $born->format('d/m/Y');
                            ?>&nbsp;</td>
                        <td><?php echo h($student['User']['phone']); ?>&nbsp;</td>
                        <td>
                            <?php
                            $i = 1;
                            foreach ($student['Enrollment'] as $enrollment) {

                                if ($enrollment['pass']) {
                                    echo $i++ . '. ' . $enrollment['Course']['Chapter']['name'] . '<br/>';
                                }
                            }
                            ?>

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
    <?php echo $this->Html->link('Xuất Excel', '?export=1'); ?>
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
    $("#UserLevel").change(function () {
        process();
    });
    $("#UserYearYear").change(function () {
        process();
    });
    $("#UserSbbNo").change(function () {
        process();
    });
    $("#UserStcNo").change(function () {
        process();
    });

    $("#filter-course").submit(function (e) {
        e.preventDefault();
        process();

    });


</script>
<?php echo $this->Js->writeBuffer(); // Write cached scripts     ?>

