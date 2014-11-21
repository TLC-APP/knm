<?php
$i = 0;
foreach ($teachingPlans as $event) {
    $session = 'Sáng';
    if ($event['TeachingPlan']['session'] == 'C') {
        $session = 'Chiều';
    }
    /* Kiểm tra xem kê hoạch có được tạo course chưa */
    /* 1 teaching plan có 1 buổi học khi TeachingPlan.date=Period.start && TeachingPlan.teacher_id=Period.Course.teacher_id */
    $backgroundColor = ($event['TeachingPlan']['session'] == 'S') ? '#0071BF' : '#FFB752';
    $events[$i]['created']=0;
    foreach ($periods as $period) {
        if ($event['TeachingPlan']['date'] == $period['Period']['start'] && $event['TeachingPlan']['teacher_id'] == $period['Course']['teacher_id']) {
            $backgroundColor = '#DADACE';
            $events[$i]['borderColor'] = ($event['TeachingPlan']['session'] == 'S') ? '#0071BF' : '#FFB752';
            $events[$i]['created']=1;
            break;
        }
    }
    $events[$i]['id'] = $event['TeachingPlan']['id'];
    $teacher_name = $event['Teacher']['last_name'] . ' ' . $event['Teacher']['first_name'] . ', kỹ năng giảng dạy: <br/>';

    foreach ($event['Teacher']['Chapter'] as $chapter) {
        $teacher_name.="</br/>" . $chapter['code'] . '-' . $chapter['name'];
    }

    $events[$i]['title'] = ' Buổi ' . $event['TeachingPlan']['name'] . '-' . $event['Teacher']['first_name'] . '(' . $event['TeachingPlan']['id'] . ")";
    $events[$i]['name'] = $event['TeachingPlan']['name'];
    $events[$i]['session'] = $event['TeachingPlan']['session'];
    $events[$i]['session_name'] = $session;
    $events[$i]['teacher_id'] = $event['Teacher']['id'];
    $events[$i]['teacher_name'] = $teacher_name;
    $events[$i]['start'] = $event['TeachingPlan']['date'];
    $events[$i]['backgroundColor'] = $backgroundColor;
    $i++;
}

echo json_encode(($events));
