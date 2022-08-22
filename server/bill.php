<?php
    include "connect.php";
    $phone = $_POST["phone"];
    $query = "SELECT mahd,sdt,DATE_FORMAT(date,'%d/%m/%y %h:%i:%s') as 'date',tt,dc FROM hoadon WHERE sdt = '$phone' ORDER BY mahd DESC";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new Hoadon(
            $row['mahd'],
            $row['sdt'],
            $row['date'],
            $row['tt'],
            $row['dc']
        ));
    }
    echo json_encode($mang);
    class Hoadon{
        function Hoadon($mahd,$sdt,$date,$tt,$dc){
            $this->mahd = $mahd;
            $this->sdt = $sdt;
            $this->date = $date;
            $this->tt = $tt;
            $this->dc =$dc;
        }
    }
?>