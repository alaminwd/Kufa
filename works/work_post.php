<?php

    session_start();
    require '../db.php';
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }   



    $user_id = $_POST['user_id'];
    $category = $_POST['category'];
    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $desp =  mysqli_real_escape_string($db_connection, $_POST['desp']);

    $insert = "INSERT INTO works(user_id, category, sub_title, title, desp) VALUES($user_id, '$category', '$sub_title', '$title', '$desp')";
    mysqli_query($db_connection, $insert);

    $last_id = mysqli_insert_id($db_connection);

    // --------Gallery Image -------------//
    $gallery_img = $_FILES['gallery'];

    $after_expload = explode('.', $gallery_img ['name']);
    $extension = end($after_expload);
    $allowed_extension = array('png', 'jpg');

        if(in_array($extension, $allowed_extension)){
            if($gallery_img['size'] <= 8000000){
                $file_name = $last_id.'.'.$extension;
                $new_location = '../uploads/work/gallery/'. $file_name;
                move_uploaded_file($gallery_img['tmp_name'], $new_location);
                $update_name = "UPDATE works SET gallery='$file_name' WHERE id=$last_id";
                mysqli_query($db_connection, $update_name);
                header('location:work.php');
            }
            else{
                header('location:work.php');
            }
        }
        else{
            header('location:work.php');
        }

        // ---------Preview image------------//
        $preview_img = $_FILES['preview'];

        $after_expload2 = explode('.', $preview_img ['name']);
        $extension2 = end($after_expload2);
        $allowed_extension2 = array('png', 'jpg');

        if(in_array($extension2, $allowed_extension2)){
            if($preview_img['size'] <= 8000000){
                $file_name2 = $last_id.'.'.$extension2;
                $new_location2 = '../uploads/work/preview/'. $file_name2;
                move_uploaded_file($preview_img['tmp_name'], $new_location2);
                $update_name2 = "UPDATE works SET preview='$file_name2' WHERE id=$last_id";
                mysqli_query($db_connection, $update_name2);
                header('location:work.php');
            }
            else{
                header('location:work.php');
            }
        }
        else{
            header('location:work.php');
        }

     
        header('location:work.php');

// ?>