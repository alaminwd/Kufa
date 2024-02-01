<?php 
require '../db.php';
session_start();
$id = $_GET['id'];


$select = "DELETE FROM users WHERE id=$id";
mysqli_query($db_connection, $select);

$_SESSION['delete'] = 'User Deleted Successfully';
header('location:users.php')





?>