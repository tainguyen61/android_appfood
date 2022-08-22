<?php
    include "connect.php";
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $thongke = array();
    $query = "SELECT (SELECT COUNT(*) FROM hoadon WHERE date BETWEEN '$ngaybatdau' AND '$ngayketthuc')AS 'tong',(SELECT COUNT(*) FROM hoadon WHERE tt=N'Chờ xử lý.' AND date BETWEEN '$ngaybatdau' AND '$ngayketthuc') AS 'tt1',(SELECT COUNT(*) FROM hoadon WHERE tt=N'Đang giao.' AND date BETWEEN '$ngaybatdau' AND '$ngayketthuc') AS 'tt2',(SELECT COUNT(*) FROM hoadon WHERE tt=N'Đơn hàng đã bị hủy!' AND date BETWEEN '$ngaybatdau' AND '$ngayketthuc') AS 'tt3',(SELECT COUNT(*) FROM hoadon WHERE tt=N'Đã thanh toán.' AND date BETWEEN '$ngaybatdau' AND '$ngayketthuc')AS 'tt4',(SELECT SUM(gia) FROM cthd,hoadon WHERE hoadon.tt =N'Đã thanh toán.' AND hoadon.mahd = cthd.mahd AND hoadon.date BETWEEN '$ngaybatdau' AND '$ngayketthuc' )AS 'tongtien'";
    $data = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($data)){
        array_push($thongke,new Thongke(
            $row['tong'],
            $row['tt1'],
            $row['tt2'],
            $row['tt3'],
            $row['tt4'],
            $row['tongtien']
        ));
    }
    echo json_encode($thongke);
    class Thongke{
        function Thongke($tong,$tt1,$tt2,$tt3,$tt4,$tongtien){
            $this->tong = $tong;
            $this->tt1 = $tt1;
            $this->tt2 = $tt2;
            $this->tt3 = $tt3;
            $this->tt4 = $tt4;
            $this->tongtien = $tongtien;
        }
    }

?>