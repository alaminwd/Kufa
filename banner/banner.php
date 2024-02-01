<?php

    require '../db.php';

    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }   

    $select_banner = "SELECT * FROM banners";
    $select_banner_res = mysqli_query($db_connection, $select_banner);
    $after_assoc_banner = mysqli_fetch_assoc($select_banner_res);

    $select_img = "SELECT * FROM banner_photos";
    $select_banner_photo = mysqli_query($db_connection, $select_img);

?>

    <?php
        require '../dashboard-parts/header.php';
    ?>


    <div class="row">
        <div class="col-lg-4">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Update New Image</h4>
            </div>
            <div class="panel-body">
                <form action="update_photo.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="exampleInputEmail1">Sub Title</label>
                        
                        <input type="file" name="photo" class="form-control m-t-xxs" id="exampleInputEmail1">
                            <?php if(isset(  $_SESSION['invalid_extension'] )){ ?>
                                <div class="alert alert-danger"><?=   $_SESSION['invalid_extension']  ?></div>
                            <?php } unset(  $_SESSION['invalid_extension'] )?>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Upload Image</button>
                </form>
            </div>
        </div>
     </div>
     <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Image Information</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>sl</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_banner_photo as $sl=>$img){ ?>

                                <tr>
                                    <td><?=$sl+1?></td>
                                    <td>
                                        <img width="60" src="../uploads/banners/<?= $img['photo']?>" alt="">
                                    </td>
                                    <td>      
                                        <a href="banner_photo_status.php?id=<?=$img['id'] ?>" class="btn btn-<?= $img['status']==1?'success':'primary'?> "> <?= $img['status']==1?'Active':'Deactive'?> </a>
                                    </td>
                                    <td>
                                        <!-- <button data-id="" class="btn btn-danger delete_btn"> Delete </button> -->
                                        <a href="delete_banner.php?id=<?= $img['id'] ?>" class="btn btn-danger">Delet</a>
                                    </td>
                                </tr>

                            <?php }?>
                    </table>
                </div>
            </div>
         </div>

      
    </div>
    <div class="row my-5 ">
         <div class="col-lg-10 m-auto">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Update Banner</h4>
            </div>
            <div class="panel-body">
                          <?php if(isset(  $_SESSION['sub_title'])){ ?>
                                <div class="alert alert-danger"><?= $_SESSION['sub_title'] ?></div>
                            <?php } unset($_SESSION['sub_title'])?>
                <form action="update_banner.php" method="POST">
                <div class="form-group">
                        <label for="exampleInputEmail1">Sub Title</label>
                        
                        <input type="text" name="sub_title" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?= $after_assoc_banner['sub_title']  ?>">
                            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?=$after_assoc_banner['title'] ?>">
                            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" name="desp" class="password form-control m-t-xxs" id="exampleInputPassword1" value="<?=$after_assoc_banner['desp']  ?>" >
                
                    </div>
                            <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Update Banner</button>
                         </form>
                    </div>
             </div>
         </div>
    </div>

    
      <script="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if(isset($_SESSION['update_successfully'])){ ?>

              Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['update_successfully']  ?>',
            showConfirmButton: false,
            timer: 1500
            });

           <?php } unset($_SESSION['update_successfully'])?>
    </script>

    <script>
        <?php if(isset($_SESSION['status_on'])){ ?>

              Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?=$_SESSION['status_on']  ?>',
            showConfirmButton: false,
            timer: 1500
            });

           <?php } unset($_SESSION['status_on'])?>
    </script>


        <?php if(isset($_SESSION['banner'])) {?>
            <script>
                     Swal.fire(
                    'Deleted!',
                    'User Deleted Successfully.',
                    'success'
                    )
            </script>
        <?php } unset($_SESSION['banner'])?>



    <?php
        require '../dashboard-parts/footer.php';
    ?>