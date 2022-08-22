<?php
    include "connect.php";
    $tenmon = $_POST['tenmon'];
    $query = "SELECT * FROM mon WHERE tenmon LIKE N'%$tenmon%' AND tt ='0'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new SearchMon(
            $row['mamon'],
            $row['tenmon'],
            $row['gia'],
            $row['danhgia'],
            $row['maloai'],
            $row['hinhanh'],
            $row['tt']
        ));
    }
    echo json_encode($mang);
    class SearchMon{
        function SearchMon($mamon,$tenmon,$gia,$danhgia,$maloai,$hinhanh,$tt){
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