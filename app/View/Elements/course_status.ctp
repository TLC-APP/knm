<?php

switch ($status) {
    case COURSE_CANCELLED:
        echo '<span class="label arrowed"><s>đã hủy</s></span>';

        break;
    case COURSE_ENROLLING:
        echo '<span class="label label-info arrowed arrowed-right">đang đăng ký</span>';

        break;
    case COURSE_OPEN:
        echo '<span class="label label-success arrowed arrowed-right">đã mở</span>';

        break;
    case COURSE_OPENABLE:
        echo '<span class="label label-danger arrowed arrowed-right">có thể mở</span>';

        break;
    case COURSE_WAIT_CANCEL:
        echo '<span class="label label-warning arrowed arrowed-right">chờ hủy</span>';

        break;
    default:
        break;
}
