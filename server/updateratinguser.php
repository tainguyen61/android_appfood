<?php
    require "connect.php";

    $mamon = $_POST['mamon'];
    $matk = $_POST['matk'];
    $rating = $_POST['rating'];
    $cmt = $_POST['cmt'];
    $date = $_POST['date'];

    $query = "UPDATE danhgia SET cmt = N'$cmt', rating = '$rating', date = '$date' WHERE mamon = '$mamon' AND matk = '$matk'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>