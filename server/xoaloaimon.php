<?php
    require "connect.php";

    $maloai = $_POST['maloai'];

    $query = "DELETE FROM loaimon WHERE maloai = '$maloai'";
    $data = mysqli_query($conn,$query);
    if($data){
        echo "Success";
    }else{
        echo "Fail";
    }   

?>