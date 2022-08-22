<?php
    include "connect.php";
    $mamon = $_POST['mamon'];
    $query = "SELECT (SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon' AND rating ='5') AS 'rating5',(SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon' AND rating ='4') AS 'rating4',(SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon' AND rating ='3') AS 'rating3',(SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon' AND rating ='2') AS 'rating2',(SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon' AND rating ='1') AS 'rating1',(SELECT COUNT(*) FROM danhgia WHERE mamon = '$mamon')AS 'tong',(SELECT SUM(sl) FROM cthd WHERE mamon = '$mamon' AND tt = N'Đã thanh toán.') AS 'daban'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new Rating(
            $row['rating1'],
            $row['rating2'],
            $row['rating3'],
            $row['rating4'],
            $row['rating5'],
            $row['tong'],
            $row['daban']
        ));
    }
    echo json_encode($mang);
    class Rating{
        function Rating($rating1,$rating2,$rating3,$rating4,$rating5,$tong,$daban){
            $this->rating1 = $rating1;
            $this->rating2 = $rating2;
            $this->rating3 = $rating3;
            $this->rating4 = $rating4;
            $this->rating5 = $rating5;
            $this->tong = $tong;
            $this->daban = $daban;
        }
    }
?>