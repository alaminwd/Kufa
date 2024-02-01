<?php
require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
// $select = "SELECT * FROM users";
// $select_users = mysqli_query($db_connection, $select);

$icon = $_POST['icon'];
$counter = $_POST['counter'];
$sub_title = $_POST['sub_title'];

$insert = "INSERT INTO counters (icon, counter, sub_title) VALUES ('$icon', '$counter', '$sub_title')";
mysqli_query($db_connection, $insert);
header('location:counter.php');


?>