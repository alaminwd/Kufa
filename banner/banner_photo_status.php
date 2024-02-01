<?php
    session_start();
    require '../db.php';


    $id =$_GET['id'];


    $select = "SELECT * FROM banner_photos WHERE id=$id";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);


      if($after_assoc['status'] == 1){
        $update = "UPDATE banner_photos SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $update);
        header('location:banner.php');
      }  

      else{
         $update2 = "UPDATE banner_photos SET status=0";
         mysqli_query($db_connection, $update2);


         $update = "UPDATE banner_photos SET status=1 WHERE id=$id";
         mysqli_query($db_connection, $update);
         $_SESSION['status_on'] = "Image Active Successfully";
         header('location:banner.php');
      }
?>