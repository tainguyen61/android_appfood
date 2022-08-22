<?php
    include "connect.php";
    $mamon = $_POST['mamon'];
    $matk = $_POST['matk'];

    $query = "SELECT danhgia.rating AS 'danhgia' FROM danhgia WHERE mamon = '$mamon' AND matk = '$matk'";

    $data = mysqli_query($conn,$query);

    if($data){
        $row = mysqli_fetch_assoc($data);
        echo $row['danhgia'];
    }

?>