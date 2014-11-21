<?php
switch ($status) {
    case COURSE_CANCELLED:
        echo __('Da huy');

        break;
    case COURSE_ENROLLING:
        echo __('Dang dang ky');

        break;
    case COURSE_OPEN:
        echo __('Da mo');

        break;
    case COURSE_OPENABLE:
        echo __('Co the mo');

        break;
    case COURSE_WAIT_CANCEL:
        echo __('Cho huy');

        break;
    default:
        break;
}
