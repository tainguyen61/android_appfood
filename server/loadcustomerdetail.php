<?php
    include "connect.php";
    $sdt =  $_POST['sdt'];
    $query = "SELECT tentk,taikhoan.sdt,diachi, (SELECT COUNT(*) hoadon FROM hoadon WHERE sdt = '$sdt' AND tt = N'Đã thanh toán.')  AS 'hd',(SELECT COUNT(*) hoadon FROM hoadon WHERE sdt = '$sdt' AND tt = N'Đơn hàng đã bị hủy!')  AS 'hdhuy', SUM(cthd.gia) AS 'tong' from taikhoan,hoadon,cthd WHERE taikhoan.sdt = '$sdt' AND hoadon.mahd = cthd.mahd AND taikhoan.sdt = hoadon.sdt AND hoadon.tt = N'Đã thanh toán.'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new LoadCustomerDetail(
            $row['tentk'],
            $row['sdt'],
            $row['diachi'],
            $row['hd'],
            $row['hdhuy'],
            $row['tong']
        ));
    }
    echo json_encode($mang);
    class LoadCustomerDetail{
        function LoadCustomerDetail($tentk,$sdt,$diachi,$hd,$hdhuy,$tong){
            $this->tentk = $tentk;
            $this->sdt = $sdt;
            $this->diachi = $diachi;
            $this->hd = $hd;
            $this->hdhuy = $hdhuy;
            $this->tong = $tong;
        }
    }
?>