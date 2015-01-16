<?php
$this->PhpExcel->loadWorksheet(WWW_ROOT . 'files/thong_ke_sinh_vien_du_dieu_kien_cap_cn.xlsx');
$this->PhpExcel->setRow(5);

// data 
$stt = 1;
foreach ($students as $student) {
    $born = new DateTime($student['User']['borndate']);
    $data = array(
        $stt++,
        $student['User']['username'],
        $student['User']['name'],
        ($student['Classroom']['code'] . ' - ' . $student['Classroom']['name']),
        $born->format('d/m/Y'),
        $student['User']['phone']
    );
    foreach ($student['Enrollment'] as $enrollment) {
        if ($enrollment['pass']) {
            array_push($data, $enrollment['Course']['Chapter']['name']);
        }
    }
    $this->PhpExcel->addData($data);
}
$now = new DateTime();
$this->PhpExcel->output($now->format("d_m_Y_H_i_s") . '.xlsx');
