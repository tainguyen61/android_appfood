<?php
    include "connect.php";
    $sdt = $_POST['sdt'];

    $query = "SELECT COUNT(*) AS 'count' FROM taikhoan WHERE sdt = '$sdt'";
    $data = mysqli_query($conn,$query);
    if($data){
        $row = mysqli_fetch_assoc($data);
        echo $row['count']; 
    }
?>