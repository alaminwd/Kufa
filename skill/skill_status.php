<?php

    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }   
    $id = $_GET['id'];

        $select = "SELECT * FROM skills WHERE id= $id";
        $select_res = mysqli_query($db_connection, $select);
        $after_assoc = mysqli_fetch_assoc($select_res);

        if($after_assoc['status']==1){
            $update = "UPDATE skills SET status=0 WHERE id=$id";
            mysqli_query($db_connection, $update);
            header('location:skill.php');
        }
        else{
            $select_status = "SELECT COUNT(*) as skill_active FROM skills WHERE status=1";
            $select_status_res = mysqli_query($db_connection, $select_status);
            $after_assoc_status = mysqli_fetch_assoc($select_status_res);

            if( $after_assoc_status['skill_active'] ==6){
                $_SESSION['active_limit'] = "You can activate maximum 6 skills";
                 header('location:skill.php');
            }

            else{
                $update2 ="UPDATE skills SET status=1 WHERE id=$id";
                mysqli_query($db_connection, $update2);
                header('location:skill.php');
            }
        }


?>