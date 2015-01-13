<div class="chapters view">
    <div class="headline"><?php echo 'Thông tin ' . h($chapter['Chapter']['name']); ?></div>
    <dl>
        <dt><?php echo __('So Tiet Ly Thuyet'); ?></dt>
        <dd>
            <?php echo h($chapter['Chapter']['so_tiet_ly_thuyet']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('So Tiet Thuc Hanh'); ?></dt>
        <dd>
            <?php echo h($chapter['Chapter']['so_tiet_thuc_hanh']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Chapter Type'); ?></dt>
        <dd>
            <?php echo $this->Html->link($chapter['ChapterType']['name'], array('controller' => 'chapter_types', 'action' => 'view', $chapter['ChapterType']['id'])); ?>
            &nbsp;
        </dd> 

        <dd>
            <?php echo h($chapter['Chapter']['description']); ?>
            &nbsp;
        </dd>


    </dl>
</div>