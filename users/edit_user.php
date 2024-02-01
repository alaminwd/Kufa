<?php
   
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
       header('location:/kufa/login.php');
   }

    $id = $_GET['id'];

    $select_user = "SELECT * FROM users WHERE id=$id";
    $select_user_res = mysqli_query($db_connection, $select_user);
    $after_assoc = mysqli_fetch_assoc($select_user_res);


?>
   
   <?php
        require '../dashboard-parts/header.php';
   ?>


<div class="container">
    <div class="row">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Update User</h4>
            </div>
            <div class="panel-body">
                <form action="update_user.php" method="POST">
                <div class="form-group">
                        <label for="exampleInputEmail1">Your Name</label>
                        <input type="hidden" name="id"  value="<?= $id?>">
                        <input type="text" name="name" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?= $after_assoc['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?= $after_assoc['email'] ?>">
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
</div>

                        
   
    <?php
        require '../dashboard-parts/footer.php';
   ?>