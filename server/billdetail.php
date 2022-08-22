<?php
    include "connect.php";
    $mahd = $_POST['mahd'];
    $query = "SELECT * FROM `cthd` WHERE mahd = '$mahd'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new BillDetail(
            $row['mahd'],
            $row['mamon'],
            $row['tenmon'],
            $row['sl'],
            $row['gia'],
            $row['danhgia'],
            $row['hinhanh']
        ));
    }
    echo json_encode($mang);
    class BillDetail{
        function BillDetail($mahd,$mamon,$tenmon,$sl,$gia,$danhgia,$hinhanh){
            $this->mahd = $mahd;
            $this->mamon = $mamon;
            $this->tenmon = $tenmon;
            $this->sl = $sl;
            $this->gia = $gia;
            $this->danhgia = $danhgia;
            $this->hinhanh = $hinhanh;
        }
    }
?>
