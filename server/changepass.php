<?php
    include "connect.php";
    $matk = $_POST['matk'];
    $mk = $_POST['mk'];

    $query = "UPDATE taikhoan SET mk = '$mk' WHERE matk = '$matk'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }
?>