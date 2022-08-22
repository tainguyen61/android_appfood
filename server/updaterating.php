<?php
    require "connect.php";

    $mamon = $_POST['mamon'];
    $rating = $_POST['rating'];

    $query = "UPDATE mon SET danhgia = '$rating' WHERE mamon ='$mamon'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>