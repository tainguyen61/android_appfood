<?php
    include "connect.php";
    $matk = $_POST['matk'];
    $mamon = $_POST['mamon'];
    $sdt = $_POST['sdt'];
    $query = "SELECT (SELECT COUNT(*) AS 'count' FROM danhgia,mon,taikhoan WHERE mon.mamon = danhgia.mamon AND taikhoan.matk = danhgia.matk AND danhgia.matk = '$matk' AND danhgia.mamon = '$mamon') AS 'checkdanhgia',(SELECT COUNT(*) FROM cthd,hoadon WHERE hoadon.mahd = cthd.mahd AND sdt = '$sdt' AND cthd.tt =N'Đã thanh toán.' AND mamon = '$mamon') AS 'checkdamua'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new CheckRating(
            $row['checkdanhgia'],
            $row['checkdamua']
        ));
    }
    echo json_encode($mang);
    class CheckRating{
        function CheckRating($checkdanhgia,$checkdamua){
            $this->checkdanhgia = $checkdanhgia;
            $this->checkdamua = $checkdamua;
        }
    }
?>