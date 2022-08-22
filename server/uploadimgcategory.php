<?php
    $file_path = "imgCategory/";
    $file_path = $file_path.basename($_FILES['uploadimgcategory']['name']);

    if(move_uploaded_file($_FILES['uploadimgcategory']['tmp_name'],$file_path)){
        echo $_FILES['uploadimgcategory']['name'];
    }else{
        echo "Failed";
    }
?>