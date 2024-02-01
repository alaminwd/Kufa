<?php

    session_start();
    require '../db.php';

    $id = $_GET['id'];


    $select_icon = "SELECT * FROM social WHERE id=$id";
    $select_res_icon = mysqli_query($db_connection, $select_icon);
    $after_assoc_icon = mysqli_fetch_assoc($select_res_icon);

   
   

    if($after_assoc_icon['status'] == 1){
        $update ="UPDATE social SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $update);
        header('location:social.php');
    }
    else{
        $select_icon_status = "SELECT COUNT(*) as total_active FROM social WHERE status=1 ";
        $select_status_res = mysqli_query($db_connection, $select_icon_status);
        $after_assoc_status = mysqli_fetch_assoc($select_status_res);

        if($after_assoc_status['total_active'] == 4){
            $_SESSION['active_limit'] = "You can activate maximum 4 icons";
            header('location:social.php');


        }
        else{
            $update2 = "UPDATE social SET status=1 WHERE id=$id";
            mysqli_query($db_connection, $update2);
            header('location:social.php');

        }
    }





 ?>