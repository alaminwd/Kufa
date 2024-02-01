<?php

    session_start();
    require '../db.php';
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }  

    $upload_file = $_FILES['photo'];

    $after_expload = explode('.', $upload_file['name']);
  
    $extension = end($after_expload);

    $allowed = array('jpg', 'png', 'jpeg', 'webp', 'HEIC');
    $file = $upload_file['name']; 

    if(in_array($extension, $allowed)){
        if($upload_file['size'] < 7000000){
            $insert = "INSERT INTO banner_photos (photo) VALUES('$file')";
            mysqli_query($db_connection, $insert);
            $last_id =mysqli_insert_id($db_connection);
            $file_name = $last_id.'.'.$extension;
            $new_location = '../uploads/banners/'.$file_name ;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            $update = "UPDATE banner_photos SET photo='$file_name' WHERE id=$last_id ";
            mysqli_query($db_connection, $update);
            
            header('location:banner.php');

        }
        else{
            $_SESSION['invalid_extension'] ="Maximum file size 7MB";
            header('location:banner.php');

        }

    }
    else{
        $_SESSION['invalid_extension'] ="Invalid extension ";
        header('location:banner.php');
    }




?>