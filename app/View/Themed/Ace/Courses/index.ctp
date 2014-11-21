<div class="courses index">
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
        'id'=>'filter-course'
    ));
    ?>
    <?php
    echo $this->Form->input('name', array(
        'placeholder' => 'Tên lớp'
    ));
    ?>
    <?php
    echo $this->Form->input('start', array(
        'placeholder' => 'Từ','type'=>'text'
    ));
    ?>
    <?php
    echo $this->Form->input('end', array(
        'placeholder' => 'đến'
    ));
    ?>
    <?php
    echo $this->Form->input('chapter_id', array(
        'empty' => 'Kỹ năng'
    ));
    ?>
    <?php
    echo $this->element('course_status_select_control');
    ?>
    
<?php
echo $this->Form->submit('lọc', array(
    'div' => 'form-group',
    'class' => 'btn btn-purple btn-sm'
));
?>
<?php echo $this->Form->end(); ?>   
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('si_so'); ?></th>
                <th><?php echo $this->Paginator->sort('trang_thai'); ?></th>
                <th><?php echo $this->Paginator->sort('chapter_id'); ?></th>
                <th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
                <th><?php echo $this->Paginator->sort('enrolledno'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
                    <td><?php echo h($course['Course']['si_so']); ?>&nbsp;</td>
                    <td><?php echo $this->element('course_status', array('status' => ($course['Course']['trang_thai']))); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($course['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $course['Chapter']['id'])); ?>
                    </td>
                    <td>
                <?php echo $this->Html->link($course['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $course['Teacher']['id'])); ?>
                    </td>
                    <td>
    <?php echo h($course['Course']['enrolledno']); ?>
                    </td>
                    <td class="actions">
            <?php echo $this->Html->link(__('view'), array('action' => 'view', $course['Course']['id'])); ?>
            <?php echo $this->Html->link(__('edit'), array('action' => 'edit', $course['Course']['id'])); ?>
            <?php echo $this->Form->postLink(__('delete'), array('action' => 'delete', $course['Course']['id']), array(), __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
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

