<?php
    include "connect.php";
    $mamon = $_POST['mamon'];
    $query = "SELECT taikhoan.hinhanh,taikhoan.tentk,danhgia.rating,DATE_FORMAT(danhgia.date,'%d/%m/%y')AS 'date',danhgia.cmt FROM taikhoan,danhgia WHERE danhgia.matk = taikhoan.matk AND mamon = '$mamon' ORDER BY danhgia.id DESC";
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