<?php
     
     session_start();

    require '../db.php';

    $id = $_GET['id'];

    echo $id ;

    $select = "DELETE FROM logos WHERE id=$id";
    mysqli_query($db_connection, $select);


    $_SESSION['delete'] = 'Logo Deleted Successfully';
    header('location:logo.php');





?>