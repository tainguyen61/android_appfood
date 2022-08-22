<?php
    include "connect.php";
    $sdt = $_POST['sdt'];
    $pass = $_POST['pass'];

    $query = "UPDATE taikhoan SET mk = '$pass' WHERE sdt = '$sdt'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }
?>