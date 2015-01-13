<div class="col-lg-10">
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
