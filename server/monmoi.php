<?php
    include "connect.php";
    $query = "SELECT * FROM mon WHERE tt = '0 'ORDER BY mamon DESC LIMIT 6";
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