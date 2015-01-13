<div class="col-lg-8">
    <h3><?php echo 'Thông tin ' . h($chapter['Chapter']['name']); ?></h3>
    <ol>
        <li><?php echo __('So Tiet Ly Thuyet').": ".($chapter['Chapter']['so_tiet_ly_thuyet']); ?></li>
        
        <li><?php echo __('So Tiet Thuc Hanh').": ".($chapter['Chapter']['so_tiet_thuc_hanh']); ?></li>
        
        <li><?php echo __('Chapter Type').": ".$chapter['ChapterType']['name']; ?></li>
         

        <p>
            <?php echo ($chapter['Chapter']['description']); ?>
            &nbsp;
        </p>


    </ol>
</div>
<div class="col-lg-4">
    <div class="col-xs-12 widget-container-col ui-sortable">
        <div class="widget-box widget-color-blue ui-sortable-handle">

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thin-border-bottom">
                            <tr>
                                <th>                                    
                                    Kỹ năng khác
                                </th>                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($kynangkhac as $kynang):
                                ?>
                                <tr>
                                    <td class=""><?php echo $this->Html->link($kynang['Chapter']['name'], array('action' => 'view', 'controller' => 'chapters', $kynang['Chapter']['id'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>