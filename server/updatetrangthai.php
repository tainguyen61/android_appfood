<?php
    include "connect.php";
    $mahd = $_POST['mahd'];
    $trangthai = $_POST['tt'];

    $query = "UPDATE hoadon SET tt = N'$trangthai' WHERE mahd = '$mahd'";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }

?>