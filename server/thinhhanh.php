<?php
    include "connect.php";
    $query = "SELECT mon.mamon,mon.tenmon,mon.gia,mon.danhgia,mon.maloai,mon.hinhanh FROM mon,cthd WHERE cthd.mamon=mon.mamon AND mon.tt = '0' AND cthd.tt = N'Đã thanh toán.' GROUP BY mon.gia,mon.tenmon,mon.mamon,mon.danhgia,mon.maloai,mon.hinhanh ORDER BY SUM(cthd.sl) DESC LIMIT 6";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new Monmoi(
            $row['mamon'],
            $row['tenmon'],
            $row['gia'],
            $row['danhgia'],
            $row['maloai'],
            $row['hinhanh']
        ));
    }
    echo json_encode($mang);
    class Monmoi{
        function Monmoi($mamon,$tenmon,$gia,$danhgia,$maloai,$hinhanh){
            $this->mamon = $mamon;
            $this->tenmon = $tenmon;
            $this->gia = $gia;
            $this->danhgia = $danhgia;
            $this->maloai = $maloai;
            $this->hinhanh = $hinhanh;
        }
    }
?>