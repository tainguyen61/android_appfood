<?php
    require "connect.php";

    $tt = $_POST['tt'];
    $mamon = $_POST['mamon'];

    $query = "UPDATE mon SET tt = '$tt' WHERE mamon ='$mamon'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>