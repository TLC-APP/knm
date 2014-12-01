<div class="row">
    <h2><?php echo __('Messages'); ?></h2>
    <?php if (!empty($messages)): ?>
        <table class="table table-hover">	
            <tbody>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td>
                            <?php $created = new DateTime($message['Message']['created']); ?>
                            <?php echo $this->Html->link($message['Message']['title'] . ' ' . '<span class="label label-success">'.$created->format('d/m/Y').'</span>', array('controller' => 'messages', 'action' => 'view', $message['Message']['id']),array('escape'=>false)); ?>&nbsp;
                            <br>
                            <?php
                            echo $this->Text->truncate($message['Message']['content'], 250, array('ellipsis' => '...',
                                'exact' => true,
                                'html' => false));
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
    <?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
<?php endif; ?>
</div>
