<?php

$this->Pdf->createDocument();

//$this->Pdf->core = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$this->Pdf->core->SetCreator(PDF_CREATOR);
$this->Pdf->core->SetAuthor('Nicola Asuni');
$this->Pdf->core->SetTitle('TCPDF Example 061');
$this->Pdf->core->SetSubject('TCPDF Tutorial');
$this->Pdf->core->SetKeywords('TCPDF, PDF, example, test, guide');

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
$this->Pdf->core->SetMargins(5, 5, 3);
//$this->Pdf->core->SetHeaderMargin(PDF_MARGIN_HEADER);
//$this->Pdf->core->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
//$this->Pdf->core->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// ---------------------------------------------------------
// set font
// remake times

$this->Pdf->core->SetFont('dejavusans', '', 8, '', 'false');
// add a page
$this->Pdf->core->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
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
$bieu_ngu = '<table>
                            <tbody>
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

$title = '<p align="right"><em>Trà Vinh, ngày......tháng......năm 20....</em></p>
                        <h3><font><b><p align="center">DANH SÁCH SINH VIÊN THAM GIA HỌC KỸ NĂNG MỀM</p></b></font></h3>
                        <div id="class-box">
                            Mã lớp kỹ năng: TK081114-01
                            <br>
                            Tên kỹ năng: Tìm kiếm tài liệu, đọc hiểu và ghi nhớ tài liệu
                            <br>
                            Ngày học: <font color="blue">Buổi 1: Sáng 08-11-2014 - Buổi 2: Sáng 15-11-2014 </font>
                            <br>
                            Nơi học: G51.108
                            <br>
                            Số tiết: 9 (LT: 3 tiết - TH: 6 tiết)
                        </div>
                        <br>';
$thead = '<table border="1" cellpadding="4">
                            <tbody><tr>
                                <td width="4%" rowspan="2" align="center"><strong>Stt</strong></td>
                                <td width="11%" rowspan="2" align="center"><strong>MSSV</strong></td>
                                <td width="21%" rowspan="2" align="center"><strong>Họ tên</strong></td>
                                <td width="11%" rowspan="2" align="center"><p><strong>Lớp</strong><br>
                                        <em>(ghi mã lớp<br> 
                                            chuyên ngành<br> 
                                            đang học)</em> </p></td>
                                <td colspan="2" width="16%"align="center">
                                    <strong>Ký tên</strong><BR/>
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
                            <tbody><tr>
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
                                <td></td>

                            </tr>
                        </tbody></table>';

$tdata = '<tr>
                                <td align="center">1</td>
                                <td align="center">110413040</td>
                                <td> Trần Thị Ngọc Thuận</td>
                                <td align="center">DA13NNAA</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">2</td>
                                <td align="center">113813042</td>
                                <td> Thạch Phă Ka Đi</td>
                                <td align="center">DA13VDT</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">3</td>
                                <td align="center">114113058</td>
                                <td> Thạch Kiệt</td>
                                <td align="center">DA13LB</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">4</td>
                                <td align="center">114113112</td>
                                <td> Nguyễn Thị Hồng Nhung</td>
                                <td align="center">DA13LB</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">5</td>
                                <td align="center">114113170</td>
                                <td> Thạch Thị Kim Trang</td>
                                <td align="center">DA13LB</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">6</td>
                                <td align="center">114113267</td>
                                <td> Nguyễn Phúc Nhân</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">7</td>
                                <td align="center">114113275</td>
                                <td> Phan Thị Kiều Oanh</td>
                                <td align="center">DA13LD</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">8</td>
                                <td align="center">114113439</td>
                                <td> Lê Ngọc Huyền</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">9</td>
                                <td align="center">114113505</td>
                                <td>  Dương Thị Nhựt Mỹ</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">10</td>
                                <td align="center">114113521</td>
                                <td> Bùi Bội Ngọc</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">11</td>
                                <td align="center">114113642</td>
                                <td>  Trần Phương Thanh</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">12</td>
                                <td align="center">114113649</td>
                                <td> Huỳnh Mai Phương Thảo</td>
                                <td align="center">DA13LG</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">13</td>
                                <td align="center">310913032</td>
                                <td> Sơn Thị Hồng Loan</td>
                                <td align="center">TH13HCVPA</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">14</td>
                                <td align="center">312913004</td>
                                <td> Trần Vĩnh Cường</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">15</td>
                                <td align="center">312913008</td>
                                <td>  Thạch Sâm Nang</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">16</td>
                                <td align="center">312913009</td>
                                <td> Lê Trường Ngân</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">17</td>
                                <td align="center">312913010</td>
                                <td> Lê Minh Nguyên</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">18</td>
                                <td align="center">312913016</td>
                                <td>  Lâm Vinh Thái Sương</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">19</td>
                                <td align="center">312913018</td>
                                <td> Nguyễn Văn Tặng</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">20</td>
                                <td align="center">312913020</td>
                                <td> Lý Nhựt Thanh</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">21</td>
                                <td align="center">312913021</td>
                                <td> Nguyễn Trần Anh Thi</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">22</td>
                                <td align="center">312913023</td>
                                <td> Mai Thanh Toàn</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">23</td>
                                <td align="center">312913024</td>
                                <td> đoàn Việt Trường</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                        <tr>
                                <td align="center">24</td>
                                <td align="center">312913026</td>
                                <td> Phạm Minh Trí</td>
                                <td align="center">TH13XDC</td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                                                    </tbody>';
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