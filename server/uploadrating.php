<?php
    require "connect.php";

    $mamon = $_POST['mamon'];
    $matk = $_POST['matk'];
    $rating = $_POST['rating'];
    $cmt = $_POST['cmt'];
    $date = $_POST['date'];

    $query = "INSERT INTO danhgia(mamon,matk,rating,cmt,date) VALUES('$mamon','$matk','$rating','$cmt','$date')";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>