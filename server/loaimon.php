<?php
    include "connect.php";
    $query = "select * from loaimon ORDER BY maloai DESC";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new Loaimon(
            $row['maloai'],
            $row['tenloai'],
            $row['hinhanh']
        ));
    }
    echo json_encode($mang);
    class Loaimon{
        function Loaimon($maloai,$tenloai,$hinhanh){
            $this->maloai = $maloai;
            $this->tenloai = $tenloai;
            $this->hinhanh = $hinhanh;
        }
    }
?>