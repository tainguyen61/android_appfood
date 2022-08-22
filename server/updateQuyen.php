<?php
    include "connect.php";
    $sdt = $_POST['sdt'];
    $quyen = $_POST['quyen'];

    $query = "UPDATE taikhoan SET quyen = '$quyen' WHERE sdt = '$sdt'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }
?>