/* 
 * Lưu trữ các ngày lễ trong năm của Việt Nam
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getNgayLe(year_no) {
    /*Tết dương lịch 1/1*/
    var TETDUONGLICH = moment();
    TETDUONGLICH.date(1);
    TETDUONGLICH.month(0);
    TETDUONGLICH.year(year_no);
    /*Giỗ tổ Hùng Vương*/
    /*Tính ngày dương của ngày 10/3 âm dựa vào thư viện amlich-aa98.js*/
    var ngaygiotoduonglich = convertLunar2Solar(10, 2, year_no, 0, 7);

    var gioto = new Date(ngaygiotoduonglich[2], ngaygiotoduonglich[1] - 1, ngaygiotoduonglich[0]);
    var GIOTOHUNGVUONG = moment(gioto);
    console.log(GIOTOHUNGVUONG.format('DD/MM'));
    /*30 tháng 4*/
    var NGAY30THANG4 = moment();
    NGAY30THANG4.date(30);
    NGAY30THANG4.month(3);
    NGAY30THANG4.year(year_no);
    /* 1 THÁNG NĂM*/
    var NGAYQUOCTELAODONG = moment();
    NGAYQUOCTELAODONG.date(1);
    NGAYQUOCTELAODONG.month(4);
    NGAYQUOCTELAODONG.year(year_no);
    /* QUOC KHANH*/
    var NGAYQUOCKHANH = moment();
    NGAYQUOCKHANH.date(2);
    NGAYQUOCKHANH.month(8);
    NGAYQUOCKHANH.year(year_no);

    /* NHA GIAO VIET NAM*/
    var NGAYNHAGIAO = moment();
    NGAYNHAGIAO.date(20);
    NGAYNHAGIAO.month(10);
    NGAYNHAGIAO.year(year_no);

    var NGAYLE = [
        {ngay: TETDUONGLICH, ten: "Tết dương lịch 01 tháng 01"},
        {ngay: GIOTOHUNGVUONG, ten: "Giỗ tổ Hùng Vương mùng 10 tháng 03"},
        {ngay: NGAY30THANG4, ten: "Giải phóng Miền nam 30 tháng 04"},
        {ngay: NGAYQUOCTELAODONG, ten: "Ngày Quốc tế Lao động 1 tháng 5"},
        {ngay: NGAYQUOCKHANH, ten: "Quốc khánh Việt Nam"},
        {ngay: NGAYNHAGIAO, ten: "Ngày nhà giáo 20-11"}
    ];
    return NGAYLE;
}