<?php
    include "connect.php";
    $json = $_POST['json'];
    $data = json_decode($json,true);
    foreach ($data as $value){
        $mahd = $value['mahd'];
        $mamon = $value['mamon'];
        $tenmon = $value['tenmon'];
        $sl = $value['sl'];
        $gia = $value['gia'];
        $danhgia = $value['danhgia'];
        $hinhanh = $value['hinhanh'];
        $date = $value['date'];
        $query = "INSERT INTO cthd(mahd,mamon,tenmon,sl,gia,danhgia,hinhanh,date) VALUES('$mahd','$mamon','$tenmon','$sl','$gia','$danhgia','$hinhanh','$date')";
        $Dta = mysqli_query($conn,$query);
    }
    if($Dta){
        echo "1";
    }else{
        echo "0";
    }
?>