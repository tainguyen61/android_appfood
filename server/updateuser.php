<?php
    require "connect.php";

    $matk = $_POST['matk'];
    $tentk = $_POST['tentk'];
    $diachi = $_POST['diachi'];
    $hinhanh = $_POST['hinhanh'];

    if(strlen($tentk)>0 && strlen($diachi)>0){
        $query = "UPDATE taikhoan set tentk = N'$tentk',diachi = N'$diachi',hinhanh = '$hinhanh' WHERE matk ='$matk'";
        $data = mysqli_query($conn,$query);
        if($data){
            echo "Success";
        }else{
            echo "Fail";
        }
    }else{
        echo "Null";
    }
?>