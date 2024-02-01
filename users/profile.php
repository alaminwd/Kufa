<?php
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }   
    

?>

    <?php
        require '../dashboard-parts/header.php'
    ?>

 <div class="container">
    <div class="row">
         <div class="col-lg-6">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Update profile</h4>
            </div>
            <div class="panel-body">
                <form action="update_profile.php" method="POST">
                <div class="form-group">
                        <label for="exampleInputEmail1">Your Name</label>
                        
                        <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                        <input type="text" name="name" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?= $after_assoc['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?=  $after_assoc['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="password form-control m-t-xxs" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Update Profile</button>
                </form>
            </div>
        </div>
         </div>

    <div class="col-lg-6">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Upload Image</h4>
            </div>
            <div class="panel-body">
                <form action="update_image.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="exampleInputEmail1">Add Photo</label>
                        <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                        <input type="file" name="photo" class="form-control m-t-xxs" id="exampleInputEmail1">
                        <?php if(isset($_SESSION['error'])){?>
                            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                        <?php } unset($_SESSION['error']) ?>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Update Image</button>
                </form>
            </div>
        </div>
         </div>
    </div>
</div>










    <?php
        require '../dashboard-parts/footer.php'
    ?>