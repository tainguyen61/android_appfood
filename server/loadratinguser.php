<?php
    include "connect.php";
    $mamon = $_POST['mamon'];
    $matk = $_POST['matk'];
    $query = "SELECT taikhoan.hinhanh,taikhoan.tentk,danhgia.rating,DATE_FORMAT(danhgia.date,'%d/%m/%y')AS 'date',danhgia.cmt FROM taikhoan,danhgia WHERE taikhoan.matk = '$matk' AND danhgia.matk = taikhoan.matk AND mamon = '$mamon'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new LoadRecRating(
            $row['hinhanh'],
            $row['tentk'],
            $row['rating'],
            $row['date'],
            $row['cmt']
        ));
    }
    echo json_encode($mang);
    class LoadRecRating{
        function LoadRecRating($hinhanh,$tentk,$rating,$date,$cmt){
            $this->hinhanh = $hinhanh;
            $this->tentk = $tentk;
            $this->rating = $rating;
            $this->date = $date;
            $this->cmt = $cmt;
        }
    }
?>