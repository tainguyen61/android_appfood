<?php
    include "connect.php";
    $maloai = $_POST['maloai'];
    $mon = array();
    $query = "SELECT * FROM `mon` WHERE maloai = '$maloai' AND tt ='0'";
    $data = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($data)){
        array_push($mon,new Mon(
            $row['mamon'],
            $row['tenmon'],
            $row['gia'],
            $row['danhgia'],
            $row['maloai'],
            $row['hinhanh'],
            $row['tt']
        ));
    }
    echo json_encode($mon);
    class Mon{
        function Mon($mamon,$tenmon,$gia,$danhgia,$maloai,$hinhanh,$tt){
            $this->mamon = $mamon;
            $this->tenmon = $tenmon;
            $this->gia = $gia;
            $this->danhgia = $danhgia;
            $this->maloai = $maloai;
            $this->hinhanh = $hinhanh;
            $this->tt = $tt;
        }
    }

?>