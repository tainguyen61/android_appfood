<?php
    include "connect.php";
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];
    $hinhanh = $_POST['hinhanh'];

    $query = "UPDATE loaimon SET tenloai = '$tenloai',hinhanh = '$hinhanh' WHERE maloai = '$maloai'";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }

?>