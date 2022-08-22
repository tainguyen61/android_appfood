<?php
    include "connect.php";
    $query = "SELECT * FROM taikhoan ORDER BY matk DESC";
    $data = mysqli_query($conn,$query);
    $mang = array();
    while($row = mysqli_fetch_assoc($data)){
        array_push($mang, new UserInfo(
            $row['matk'],
            $row['tentk'],
            $row['sdt'],
            $row['mk'],
            $row['diachi'],
            $row['quyen'],
            $row['hinhanh']
        ));
    }
    echo json_encode($mang);
    class UserInfo{
        function UserInfo($matk,$tentk,$sdt,$mk,$diachi,$quyen,$hinhanh){
            $this->matk = $matk;
            $this->tentk = $tentk;
            $this->sdt = $sdt;
            $this->mk = $mk;
            $this->diachi = $diachi;
            $this->quyen = $quyen;
            $this->hinhanh = $hinhanh;
        }
    }
?>