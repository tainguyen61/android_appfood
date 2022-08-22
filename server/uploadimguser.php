<?php
    $file_path = "imgUsers/";
    $file_path = $file_path.basename($_FILES['uploadimguser']['name']);

    if(move_uploaded_file($_FILES['uploadimguser']['tmp_name'],$file_path)){
        echo $_FILES['uploadimguser']['name'];
    }else{
        echo "Failed";
    }
?>