<?php
    require "connect.php";

    $matk = $_POST['matk'];
    $tentk = $_POST['tentk'];
    $diachi = $_POST['diachi'];

    if(strlen($tentk)>0 && strlen($diachi)>0){
        $query = "UPDATE taikhoan set tentk = N'$tentk',diachi = N'$diachi' WHERE matk ='$matk'";
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