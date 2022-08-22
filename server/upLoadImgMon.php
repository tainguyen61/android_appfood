<?php
    $file_path = "imgMon/";
    $file_path = $file_path.basename($_FILES['uploadimgmon']['name']);

    if(move_uploaded_file($_FILES['uploadimgmon']['tmp_name'],$file_path)){
        echo $_FILES['uploadimgmon']['name'];
    }else{
        echo "Failed";
    }
?>