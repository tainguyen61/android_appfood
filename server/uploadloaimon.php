<?php
    include "connect.php";
    $tenloai = $_POST['tenloai'];
    $hinhanh = $_POST['hinhanh'];
    $query = "INSERT INTO loaimon(tenloai,hinhanh) VALUES(N'$tenloai','$hinhanh')";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }
?>