<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Trang {:page} của tất cả {:pages} trang, hiển thị {:current} dòng của {:count} dòng từ dòng {:start},đến dòng {:end}')
    ));
    ?>	</p>
<?php
echo $this->Paginator->pagination(array('ul' => 'pagination'));
