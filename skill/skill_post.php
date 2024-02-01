<?php
    session_start();
    require '../db.php';

    $title = $_POST['title'];

    $percentage =$_POST['percentage'];

    if(empty($title)){
        $_SESSION['empty_skill'] ="Add your experience" ;
        header('location:skill.php');
    }
    if(empty($percentage)){
        $_SESSION['empty_percentage'] ="Add skill percentage";
        header('location:skill.php');
    }
    else{
        $insert = "INSERT INTO skills(title, percentage) VALUES ('$title', '$percentage')";
        mysqli_query($db_connection, $insert);
        header('location:skill.php');
    }
   

?>