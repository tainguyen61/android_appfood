<?php
    require "connect.php";

    $mamon = $_POST['mamon'];

    $query = "DELETE FROM mon WHERE mamon = '$mamon'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>