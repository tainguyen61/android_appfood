<?php
    include "connect.php";
    $tentk = $_POST['tentk'];
    $sdt = $_POST['sdt'];
    $mk = $_POST['mk'];
    $diachi = $_POST['diachi'];

    if(strlen($tentk)> 0 && strlen($sdt) && strlen($mk) && strlen($diachi)){
        $query = "INSERT INTO taikhoan(tentk,sdt,mk,diachi) VALUES ('$tentk','$sdt','$mk','$diachi')";
        $check = mysqli_query($conn,$query);
    }
    if($check){
        echo "1";
    }else{
        echo $conn->error;
    }
?>