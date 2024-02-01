<?php 

session_start();
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// $unic_password = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password);
$after_hash = password_hash($password, PASSWORD_DEFAULT);
// $after_hash = 
$flag = true;

if(empty($name)){
   
    $_SESSION['name'] ='please your name !';
    $flag = false;
    header('location:register.php');
}

if(empty($email)){
    $_SESSION['email'] ='please your Email Address !';
    $flag = false;
    header('location:register.php');
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['email_validate'] = $email.' ' .'is not a valid email address.';
        $flag = false; 
        header('location:register.php');

}
if(empty($password)){
    $_SESSION['password'] ='Enter your password !';
    $flag = false;
    header('location:register.php'); 
}
// else{
//     if(!$unic_password ){
//         $_SESSION['password'] ='please set unic password and minimum 8 character !';
//         $flag = false;
//         header('location:register.php'); 
//     }
// }


if($flag){
    $insert = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$after_hash')";
    mysqli_query($db_connection, $insert);
    $_SESSION['success'] ='Your Registation Successfully !';
    header('location:login.php');
}

else{
    $_SESSION['name_value'] = $name;
    $_SESSION['email_value'] = $email ;
    header('location:register.php');
}










?>