<?php

$line = $buoi . ' ';
$batdau = new DateTime($start);
//$line.=$batdau->format('H');
$line .=($batdau->format('H') == '07') ? 'Sáng ' : 'Chiều ';

$jd = cal_to_jd(CAL_GREGORIAN, $batdau->format('m'), $batdau->format('d'), $batdau->format('Y'));
$day = jddayofweek($jd, 0);
switch ($day) {
    case 0:
        $thu = "Chủ Nhật";
        break;
    case 1:
        $thu = "Thứ Hai";
        break;
    case 2:
        $thu = "Thứ Ba";
        break;
    case 3:
        $thu = "Thứ Tư";
        break;
    case 4:
        $thu = "Thứ Năm";
        break;
    case 5:
        $thu = "Thứ Sáu";
        break;
    case 6:
        $thu = "Thứ 7";
        break;
//Vì mod bằng 0
}
$line.=$thu . ' ' . $batdau->format('d/m/Y');
$line.=' tại ' . $room . '<br/>';
echo '<span class="' . $class . '">' . $line . '</span>';
