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
                $born=new DateTime($student['User']['borndate']);
                echo $born->format('d/m/Y'); ?>&nbsp;</td>
                <td><?php echo h($student['User']['phone']); ?>&nbsp;</td>
                <td>
                    <?php
                    $i=1;
                    foreach ($student['Enrollment'] as $enrollment) {
                        
                        if ($enrollment['pass']) {
                            echo $i++.'. '.$enrollment['Course']['Chapter']['name'] . '<br/>';
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
<?php echo $this->Js->writeBuffer(); // Write cached scripts     ?>

