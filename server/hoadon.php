<?php
    include "connect.php";
    $sdt = $_POST['sdt'];
    $date = $_POST['date'];
    $dc = $_POST['dc'];
    $query = "INSERT INTO hoadon(mahd,sdt,date,dc) VALUES(null,'$sdt','$date',N'$dc')";
    if(mysqli_query($conn,$query)){
        $mahoadon = $conn->insert_id;
        echo $mahoadon;
    }else{
        echo "loi";
    }
?>