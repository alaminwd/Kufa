   <?php

    session_start();

    require '../db.php';

    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }  


   $sub_title = $_POST['sub_title'];
   $title = $_POST['title'];
   $desp = $_POST['desp'];


   

   if(empty($sub_title && $title && $desp)){

    $_SESSION['sub_title']= "Input file empty";
    header('location:banner.php');
     
   }
   else{
          
      $update_banner_text = "UPDATE banners SET sub_title='$sub_title', title='$title', desp='$desp' " ;
      mysqli_query($db_connection, $update_banner_text);
      $_SESSION['update_successfully'] ="Banner Updated Successfully";
      header('location:banner.php');
    
   }


   // if(empty($title)){

   //  $_SESSION['title']= "Input file empty";
   //  header('location:banner.php');
     
   // }
   // if(empty($desp)){

   //  $_SESSION['desp']= "Input file empty";
   //  header('location:banner.php');
     
   // }
   
   
      

    ?>