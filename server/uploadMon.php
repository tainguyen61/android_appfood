<?php
    require "connect.php";

    $tenmon = $_POST['tenmon'];
    $gia = $_POST['gia'];
    $maloai = $_POST['maloai'];
    $hinhanh = $_POST['hinhanh'];

    $query = "INSERT INTO mon(tenmon,gia,maloai,hinhanh) VALUES('$tenmon','$gia','$maloai','$hinhanh')";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>