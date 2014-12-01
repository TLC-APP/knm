<?php

$this->Pdf->createDocument();
//$this->Pdf->core = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$this->Pdf->core->SetCreator(PDF_CREATOR);
$this->Pdf->core->SetAuthor('TLC');
$this->Pdf->core->SetTitle($course['Course']['name']);
$this->Pdf->core->SetSubject($course['Course']['name']);
//$this->Pdf->core->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$this->Pdf->core->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 061', PDF_HEADER_STRING);
// set header and footer fonts
//$this->Pdf->core->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$this->Pdf->core->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$this->Pdf->core->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$this->Pdf->core->setPrintHeader(false);
$this->Pdf->core->setPrintFooter(false);
$this->Pdf->core->SetMargins(10, 5,2);
//$this->Pdf->core->SetHeaderMargin(PDF_MARGIN_HEADER);
//$this->Pdf->core->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
//$this->Pdf->core->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// ---------------------------------------------------------
// set font
// remake times
$fontname = $this->Pdf->addTTFfont('arial/arial.ttf');
$this->Pdf->core->SetFont($fontname, '', 8, '', true);
// add a page
$this->Pdf->core->AddPage();
$style = '<!-- EXAMPLE OF CSS STYLE -->
<style>
body{
	margin: 0;	
}

table{
        width:100%;
	border-collapse: collapse;
		
}

@media print
{
  table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }
}

table tr{
	background-color: white;

}

/* Footer*/

.footer-container{
	background-color: #DDD;;	
}

.footer-wrapper{
	color: #fff;
	width: 895px;
	margin: 0 auto;
	text-align: center;
	font-size: 11px;
}


</style>';
$bieu_ngu = '<table><tbody>
                                <tr>
                                    <td align="center" width="45%">TRƯỜNG ĐẠI HỌC TRÀ VINH<br/>
                                        <b>TT HỖ TRỢ - PHÁT TRIỂN DẠY VÀ HỌC</b><br/>
                                        <hr/>                                     
                                    </td>

                                    <td align="center" width="50%">
                                        <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br/>
                                        Độc lập - Tự do - Hạnh phúc<br/>
                                            <hr/></td>
                                </tr>
                            
                            
                            </tbody>
                            
                        </table>';


//Ghi bieu ngu


$period_text = "";
$dia_diem = "";
foreach ($course['Period'] as $period) {
    $period_text.=$period['name'] . ':';
    $dia_diem.=$period['name'] . ':' . $period['Room']['name'] . '; ';
    $start = new DateTime($period['start']);
    $period_text.=($start->format('H') == '07') ? ' Sáng ' : ' Chiều ';
    $period_text.=$start->format('d-m-Y') . '; ';
}

$title = '              <p align="right"><em>Trà Vinh, ngày... tháng... năm 20...</em></p>
                        <h3><font><b><p align="center">DANH SÁCH SINH VIÊN THAM GIA HỌC KỸ NĂNG MỀM</p></b></font></h3>
                        <p>Mã lớp kỹ năng: ' . $course['Course']['name'] . '<br/>Tên kỹ năng: ' . $course['Chapter']['name'] . '<br/>Ngày học: <font color="blue">' . $period_text . '</font><br/>
                            Nơi học: ' . $dia_diem . '<br/>
                            Số tiết: ' . ($course['Chapter']['so_tiet_ly_thuyet'] + $course['Chapter']['so_tiet_thuc_hanh']) . ' (LT: ' . $course['Chapter']['so_tiet_ly_thuyet'] . ' tiết - TH: ' . $course['Chapter']['so_tiet_thuc_hanh'] . ' tiết)
                        </p>
                        <br/>';


$thead = '<table border="1" cellspacing="0" cellpadding="1">
                            <tbody><tr>
                                <td width="4%" rowspan="2" align="center"><strong>Stt</strong></td>
                                <td width="11%" rowspan="2" align="center"><strong>MSSV</strong></td>
                                <td width="21%" rowspan="2" align="center"><strong>Họ tên</strong></td>
                                <td width="11%" rowspan="2" align="center"><p><strong>Lớp</strong><br>
                                        <em>(ghi mã lớp<br> 
                                            chuyên ngành<br> 
                                            đang học)</em> </p></td>
                                <td colspan="2" width="16%"align="center">
                                    <b>Ký tên</b><BR/>
                                    <em>(Sinh viên ký tên)</em>
                                </td>
                                
                                <td colspan="2" align="center" width="16%"><strong>Thái độ tham gia</strong><br>
                                    <em>(Giảng viên nhận xét)</em>
                                </td>
                                <td colspan="2" align="center" width="16%"><strong>Kết quả</strong><br>
                                    <em>(Giảng viên đánh giá)</em>
                                </td>
                            </tr>
                            <tr>
                                <td width="8%" align="center"><em>Buổi 1</em></td>
                                <td width="8%" align="center"><em>Buổi 2</em></td>
                                <td width="8%" align="center"><em>Tích cực</em></td>
                                <td width="8%" align="center"><em>Không tích cực </em></td>
                                <td width="8%" align="center"><em>Đạt</em></td>
                                <td width="8%" align="center"><em>Không đạt</em></td>
                            </tr>';
$tfooter = '</table>

                        <br/>
                                <br/>

                        <table width="100%">
                            <tbody>
                            <tr>
                                <td width="35%" align="left">Tổng số sinh viên theo danh sách:..........</td>
                                <td width="30%" align="left"></td>
                                <td width="35%" align="center"><b>GIẢNG VIÊN PHỤ TRÁCH</b></td>

                            </tr>
                            
                            <tr>
                                <td>Số sinh viên tham dự:..........</td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>Số sinh viên Đạt:..........</td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>Số sinh viên Không đạt:..........</td>
                                <td></td>
                                <td width="35%" align="center"><br/><br/><br/>'.$course['Teacher']['name'].'</td>

                            </tr>
                        </tbody></table>';
/* echo sinh viên */
$stt = 1;
foreach ($course['Enrollment'] as $student) {
    $tdata.='<tr>';
    $tdata.="<td align='center'>5</td>
                                <td align='center'>".$student['username']."</td>
                                <td>".$student['name']."</td>
                                <td align='center'>".$student['Classroom']['name']."</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>";
    $tdata.='</tr>';
}
$tdata .= '</tbody>';
// define some HTML content with style
$html = <<<EOF
        $style
        $bieu_ngu
        $title
        $thead
        $tdata
        $tfooter
EOF;

// output the HTML content
$this->Pdf->core->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// ---------------------------------------------------------
//Close and output PDF document
$this->Pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+