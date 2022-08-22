<?php
    include "connect.php";
    $sdt = $_POST['sdt'];
    $mk = $_POST['mk'];
    $query = "SELECT * FROM taikhoan WHERE sdt = '$sdt' and mk = '$mk'";
    $data = mysqli_query($conn,$query);
    $mang = array();
    if($data){
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
        if(count($mang) > 0){
            echo json_encode($mang);
        }else{
            echo "Fail";
        }
    }else{
        echo "Null";
    }

    
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