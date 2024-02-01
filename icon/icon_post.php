<?php
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }    



    $icon = $_POST['icon'];
    $link = $_POST['link'];

    $insert = "INSERT INTO social (icon, link)VALUES('$icon', '$link') ";
    mysqli_query($db_connection, $insert);
    header('location:social.php');


?>
