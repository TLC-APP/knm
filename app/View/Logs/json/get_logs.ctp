
<?php
$response=array();
foreach ($logs as $log){
    array_push($response, $log['Log']);
}
echo json_encode($response);
?>