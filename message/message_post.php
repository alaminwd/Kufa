<?php

    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    } 


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = mysqli_real_escape_string($db_connection, $_POST['message']) ;
    $date = date('Y-m-d h:i:s');



    $insert = "INSERT INTO messages (name, email, message, date) VALUES('$name', '$email', '$message', '$date')";
    mysqli_query($db_connection, $insert);
    $_SESSION['message_success'] = "Thanks for contacting us! We will be in touch with you shortly.";
    header('location:../index.php#contact');


    
   



?>