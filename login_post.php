<?php 
session_start();
require 'db.php';

$email =$_POST['email'];
$password =$_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$select = "SELECT COUNT(*) as paisi FROM users WHERE email='$email'";
$select_res = mysqli_query($db_connection, $select);

$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['paisi'] ==1){
   $select_paisi = "SELECT * FROM users WHERE email='$email'";
   $select_paisi_res = mysqli_query($db_connection, $select_paisi);
   $after_assoc_paisi =mysqli_fetch_assoc($select_paisi_res);

      if(password_verify($password, $after_assoc_paisi['password'])){
         $_SESSION['login_success']="";
         $_SESSION['id']= $after_assoc_paisi['id'];
         header('location:/kufa/dashboard.php');
      }
   
   else{
      $_SESSION['wrong_password'] = 'password inccorect';
      header('location:login.php');
   }

}
else{
    $_SESSION['invalid'] ='Invalid Email Address !';
    header('location:login.php');
}

?>