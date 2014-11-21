<?php
$i = 0;
$events=array();
foreach ($teachingPlans as $event) {
    $session = 'Sáng';
    if ($event['TeachingPlan']['session'] == 'C') {
        $session = 'Chiều';
    }
    $backgroundColor = ($event['TeachingPlan']['session'] == 'S') ? '#0071BF' : '#FFB752';
    $events[$i]['id'] = $event['TeachingPlan']['id'];
    $events[$i]['title'] = $session.' buổi '.$event['TeachingPlan']['name'].'('.$event['TeachingPlan']['id'].")";
    $events[$i]['start'] = $event['TeachingPlan']['date'];
    $events[$i]['backgroundColor'] = $backgroundColor;
    $i++;
}
echo json_encode(($events));