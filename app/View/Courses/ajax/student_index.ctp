<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'before' => $this->Js->get('#loading')->effect('fadeIn', array('speed' => 'fast')),
    'complete' => $this->Js->get('#loading')->effect('fadeOut', array('speed' => 'fast')),
    'evalScripts' => true,
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
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th>Buổi học</th>
            <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
            <th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
            <th>Hạn đăng ký còn</th>
            <th>Có thể đăng ký thêm</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
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
                    <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                </td>
                <td><?php echo ($course['Course']['handangky'] > 0) ? $course['Course']['handangky'] . ' ngày' : 'Hết hạn'; ?></td>
                <td>
                    <?php echo $course['Course']['si_so'] - $course['Course']['enrolledno']; ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('enroll'), array('action' => 'enroll', $course['Course']['id']), array('escape' => false)); ?>

                    <?php //echo $this->Html->link(__('enroll'), array('action' => 'enroll', $course['Course']['id']), array('escape' => false));  ?>

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

<?php
echo $this->Js->writeBuffer(); // Write cached scripts  ?>