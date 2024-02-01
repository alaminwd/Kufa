<?php

    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:/kufa/login.php');
    }
// $select = "SELECT * FROM users";
// $select_users = mysqli_query($db_connection, $select);

$icon = $_POST['icon'];
$title = $_POST['title'];
$sub_title = $_POST['sub_title'];

$insert = "INSERT INTO services (icon, title, sub_title) VALUES ('$icon', '$title', '$sub_title')";
mysqli_query($db_connection, $insert);
header('location:service.php');

?>