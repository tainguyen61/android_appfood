<?php
    include "connect.php";
    $mamon = $_POST['mamon'];
    $tenmon = $_POST['tenmon'];
    $maloai = $_POST['maloai'];
    $gia = $_POST['gia'];
    $hinhanh = $_POST['hinhanh'];

    $query = "UPDATE mon SET tenmon = '$tenmon',maloai = '$maloai',gia = '$gia',hinhanh = '$hinhanh' WHERE mamon = '$mamon'";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }

?>