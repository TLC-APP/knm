<?php
echo $this->Form->input('trang_thai',array('empty'=>'Trạng thái','options'=>array(
    COURSE_CANCELLED=>__('Da huy'),
    COURSE_ENROLLING=>__('Dang dang ky'),
    COURSE_OPEN=>__('Da mo'),
    COURSE_OPENABLE=>__('Co the mo'),
    COURSE_WAIT_CANCEL=>__('Cho huy')
)));