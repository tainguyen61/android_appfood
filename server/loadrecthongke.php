<?php
    include "connect.php";
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $mon = array();
    $query = "SELECT mon.tenmon,mon.gia,mon.danhgia,mon.hinhanh,SUM(sl)AS 'sl',(SUM(sl)/(SELECT SUM(sl) FROM cthd WHERE date BETWEEN '$ngaybatdau' AND '$ngayketthuc' AND tt = N'Đã thanh toán.')*100) AS 'pt' FROM mon LEFT JOIN cthd ON cthd.mamon = mon.mamon AND date BETWEEN '$ngaybatdau' AND '$ngayketthuc' AND cthd.tt = N'Đã thanh toán.'  GROUP BY mon.tenmon ORDER BY `sl` DESC";
    $data = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($data)){
        array_push($mon,new Mon(
            $row['tenmon'],
            $row['gia'],
            $row['danhgia'],
            $row['hinhanh'],
            $row['sl'],
            $row['pt']
        ));
    }
    echo json_encode($mon);
    class Mon{
        function Mon($tenmon,$gia,$danhgia,$hinhanh,$sl,$pt){
            $this->tenmon = $tenmon;
            $this->gia = $gia;
            $this->danhgia = $danhgia;
            $this->hinhanh = $hinhanh;
            $this->sl = $sl;
            $this->pt = $pt;
        }
    }

?>