<?php
$events=array();
$i = 0;
foreach ($periods as $event) {
    $start = new DateTime($event['Period']['start']);
    $events[$i]['title'] = $event['Course']['name'] . ' ' . $event['Period']['name'];
    $events[$i]['name'] = $event['Period']['name'];
    $events[$i]['start'] = $event['Period']['start'];
    $events[$i]['backgroundColor'] = ($start->format('H') == '07') ? '#0071BF' : '#FFB752';
    //Khóa học hết hạn
    if($event['Course']['trang_thai']==COURSE_CANCELLED){
        $events[$i]['backgroundColor']="#A20F09";
    }
    if($event['Course']['trang_thai']==COURSE_CANCELLED){
        $events[$i]['backgroundColor']="#D15B47";
    }
    
    if($event['Course']['trang_thai']==COURSE_WAIT_CANCEL){
        $events[$i]['backgroundColor']="#ABBAC3";
    }
    $events[$i]['id'] = $event['Period']['id'];
    $events[$i]['course_id'] = $event['Course']['id'];
    $events[$i]['room_id'] = $event['Room']['id'];
    $events[$i]['room_name'] = $event['Room']['name'];
    $events[$i]['teacher_name'] = $event['Course']['Teacher']['name'];
    $events[$i]['chapter_name'] = $event['Course']['Chapter']['name'];
    $events[$i]['malop'] = $event['Course']['name'];
    $events[$i]['enrolledno'] = $event['Course']['enrolledno'];
    $i++;
}

echo json_encode(($events));
