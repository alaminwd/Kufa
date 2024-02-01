<?php

require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}

$id = $_GET['id'];


// $update = "DELETE FROM services WHERE id=$id";
// mysqli_query($db_connection, $delete);
// header('location:service.php');




?>