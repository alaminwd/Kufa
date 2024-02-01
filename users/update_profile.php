<?php

    require '../db.php';
    
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password , PASSWORD_DEFAULT);
    
    if(empty($password)){
        $update = "UPDATE users SET name='$name', email='$email' WHERE id=$id" ;
        mysqli_query($db_connection, $update);
        header('location:/kufa/dashboard.php');

    }
    else{
        $update = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id" ;
        mysqli_query($db_connection, $update);
        header('location:/kufa/dashboard.php');
    }


?>