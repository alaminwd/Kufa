<?php

require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
// $select = "SELECT * FROM users";
// $select_users = mysqli_query($db_connection, $select);

$menu = $_POST['menu'];
$section_id = $_POST['section_id'];

$insert = "INSERT INTO menus(menu, section_id)VALUES ('$menu', '$section_id')";
mysqli_query($db_connection, $insert);
header('location:menu.php');

?>