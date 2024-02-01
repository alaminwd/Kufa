<?php
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);

$id = $_POST['id'];


if(empty($password)){

    $update = "UPDATE users SET name='$name', email='$email' WHERE id=$id ";
    mysqli_query($db_connection, $update);
    header('location:users.php');

}
else{
    $update = "UPDATE users SET name='$name', email='$email', password='$after_hash' WHERE id=$id ";
    mysqli_query($db_connection, $update);
    header('location:users.php');
}








?>