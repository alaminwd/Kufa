<?php
     session_start();
    require '../db.php';
   
        $id = $_POST['id'];
        $uploaded_file = $_FILES['photo'];

        $after_explode = explode('.', $uploaded_file['name']);

        $extension = end($after_explode);
        $allow_extension = array('jpg', 'png');


        if(in_array($extension , $allow_extension)){
           if($uploaded_file['size'] <=10000000){

            $select_img = "SELECT * FROM users WHERE  id=$id ";
            $result = mysqli_query($db_connection, $select_img);
            $aftar_assoc_img = mysqli_fetch_assoc($result);
            $delete_from = '../uploads/users/'.$aftar_assoc_img['photo'];
            unlink($delete_from);


                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/users/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
                mysqli_query($db_connection, $update);
                header('location:profile.php');
                
           }
            else{
                $_SESSION['error'] = "Maxium file size 10 MB";
                header('location:profile.php');
            }
        }
        else{
            $_SESSION['error'] = "Invalid Extension";
            header('location:profile.php');
        }
 
    
?>





