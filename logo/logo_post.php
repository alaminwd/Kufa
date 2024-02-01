<?php

    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }  
    
    $logo = $_FILES['logo'];
    $name = $logo['name'];

    $after_explode = explode('.', $logo['name']);
    $extension = end($after_explode);
    $allow_extension = array('png');


    if(in_array($extension, $allow_extension)){
       if($logo['size'] <= 5000000){

        $insert = "INSERT INTO logos (logo)VALUES ('$name')";
        mysqli_query($db_connection, $insert);
        $last_id = mysqli_insert_id($db_connection);
        $file_name = $last_id.'.'.$extension;
        $new_location = '../uploads/logo/'.$file_name;
        move_uploaded_file($logo['tmp_name'],$new_location);

        $update = "UPDATE logos SET logo='$file_name' WHERE id=$last_id ";
        mysqli_query($db_connection, $update);
        header('location:logo.php');
        

       }
       else{
            $_SESSION['error'] ='Maximum size 5MB';
            header('location:logo.php');
       }

    }
    else{
        $_SESSION['error'] ="Invalid Extension";
        header('location:logo.php');
    }
?>

