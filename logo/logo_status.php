<?php
    require '../db.php';

    $id =$_GET['id'];

    $select = "SELECT * FROM logos WHERE id= $id";
    $select_res = mysqli_query($db_connection , $select);
    $aftar_assoc_logo = mysqli_fetch_assoc($select_res);

    if($aftar_assoc_logo['status']==1 ){
        $update = "UPDATE logos SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $update);
        header('location:logo.php');
    }
    else{
        $update = "UPDATE logos SET status=0 ";
        mysqli_query($db_connection, $update);
       
        $update2 = "UPDATE logos SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update2);
         header('location:logo.php');
    }










?>