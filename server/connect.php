<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $database = "orderfood";

    $conn = mysqli_connect($host,$username,$pass,$database);
    mysqli_query($conn,"SET NAME 'utf8'");

?>