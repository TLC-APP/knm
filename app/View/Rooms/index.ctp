<div class="rooms index">
    <h2><?php echo __('Rooms'); ?></h2>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('decription'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = (($this->Paginator->params['paging']['Room']['page'] - 1) * $this->Paginator->params['paging']['Room']['limit']) + 1;
            ?>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?php echo $stt++;?></td>
                    <td>
                        <?php echo $this->Html->link(h($room['Room']['name']), array('action' => 'view', $room['Room']['id']), array('escape' => false)); ?>
                        &nbsp;</td>
                    <td><?php echo h($room['Room']['decription']); ?>&nbsp;</td>
                    <td class="actions">
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
    <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
</div>
