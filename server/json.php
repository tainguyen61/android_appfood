<?php
    include "connect.php";
    $query="SELECT * FROM cthd";
    $data = mysqli_query($conn,$query);
    $mang = array();
    if($data){
        while($row = mysqli_fetch_assoc($data)){
            array_push($mang, new Cthd(
                $row['mahd'],
                $row['mamon'],
                $row['tenmon'],
                $row['sl'],
                $row['gia'],
                $row['danhgia'],
                $row['hinhanh']
            ));
        }
    }

    echo json_encode($mang);
    class Cthd{
        function Cthd($mahd,$mamon,$tenmon,$sl,$gia,$danhgia,$hinhanh){
            $this->mahd=$mahd;
            $this->mamon=$mamon;
            $this->tenmon=$tenmon;
            $this->sl=$sl;
            $this->gia=$gia;
            $this->danhgia=$danhgia;
            $this->hinhanh=$hinhanh;
        }
    }
?>