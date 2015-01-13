<div class="classrooms index">
    <h2><?php echo __('Classrooms'); ?></h2>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('code'); ?></th>

                <th><?php echo $this->Paginator->sort('name'); ?></th>

                <th><?php echo $this->Paginator->sort('department_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classrooms as $classroom): ?>
                <tr>
                    <td><?php echo h($classroom['Classroom']['id']); ?>&nbsp;</td>
                    <td><?php echo h($classroom['Classroom']['code']); ?>&nbsp;</td>

                    <td><?php echo h($classroom['Classroom']['name']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($classroom['Department']['name'], array('controller' => 'departments', 'action' => 'view', $classroom['Department']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $classroom['Classroom']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $classroom['Classroom']['id']), array(), __('Are you sure you want to delete # %s?', $classroom['Classroom']['id'])); ?>
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

