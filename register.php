<?php

  session_start();

?>


      
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/kufa/dashboard_asset/image/png" sizes="16x16" href="/kufa/dashboard_asset/images/favicon.png">
    <link href="/kufa/dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <style>
      .password-field{
        position: relative;
      }
      .fa {
      position: absolute;
      top: 32px;
      text-align: center;
      right: -2px;
      background: teal;
      color: #fff;
      width: 46px;
      height: 56px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
      padding-top: 18px;


     }

    </style>
        
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="register_post.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                              <input type="text" class="form-control" name="name" value="<?= (isset( $_SESSION['name_value'])? $_SESSION['name_value']:'') ?>" style="border-color: <?= (isset( $_SESSION['name_value'])? 'red':'')?>;">
                                        <?php
                                            if(isset($_SESSION['name'])){?>
                                            <strong class="text-danger"><?= $_SESSION['name']?></strong>
                                          
                                            <?php } unset($_SESSION['name']) ?>
                                            </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" value="<?= (isset( $_SESSION['email_value'])? $_SESSION['email_value']:'') ?>" style="border-color: <?= (isset( $_SESSION['email_value'])? 'red':'')?>;">
                                          <?php
                                              if(isset($_SESSION['email'])){?>
                                              <strong class="text-danger"><?= $_SESSION['email']?></strong>
                                            
                                              <?php } unset($_SESSION['email'])?>

                                              <?php 
                                                if(isset($_SESSION['email_validate'])){ ?>
                                                <strong class="text-danger"><?= $_SESSION['email_validate']?></strong>
                                            <?php } unset($_SESSION['email_validate'])?>
                                        </div>
                                       <div class="form-group password-field">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="show-pass">
                                        <i class="fa fa-eye" onclick="showpass()"></i>
                                    <?php
                                        if(isset($_SESSION['password'])){?>
                                        <strong class="text-danger"><?= $_SESSION['password']?></strong>
                                        <?php } unset($_SESSION['password']) ?>
                                      </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="/kufa/login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/kufa/dashboard_asset/vendor/global/global.min.js"></script>
<script src="/kufa/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/kufa/dashboard_asset/js/custom.min.js"></script>
<script src="/kufa/dashboard_asset/js/deznav-init.js"></script>

</body>
</html>
        
    
                  <!-- <form  >
                      <div class="form-group">
                     
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email Address</label>
                       
                      </div>
                     
                      </div>
                      <button type="submit" class="btn btn-success btn-block m-t-xs">Register Now</button>
                      <p class="text-center m-t-xs text-sm">Already have an account?</p>
                      <a href="/kufa/login.php" class="btn btn-default btn-block m-t-xs">Login</a>
                  </form>
                 -->

        
    <script>
       <?php if(isset($_SESSION['success'])){?>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: '<?= $_SESSION['success']?>',
          showConfirmButton: false,
          timer: 1500
        });

        <?php } unset($_SESSION['success']) ?>
    </script>


    <script>
      function showpass(){
        var password = document.getElementById('show-pass')

        if(password.type == 'password'){
          password.type ='text';
        }
        else{
          password.type = 'password';
        }
      }
    </script>
        
    </body>
</html>

<?php
unset($_SESSION['name_value']);
unset($_SESSION['email_value']);

?>