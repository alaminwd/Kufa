<?php
    require 'db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }    
?>


<?php
    require 'dashboard-parts/header.php';
?>

<div class="container">
    <div class="row mt-5 ">
        <div class="col-lg-12 ">
        <div class="card-header">          
            <h2>Welcome to Dashboard <?=$after_assoc['name'] ?></h2>
        </div>
        <div class="card-body">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error animi perferendis mollitia nobis.</p>
        </div>
        </div>
       
    </div>
</div>



<?php
require 'dashboard-parts/footer.php';
?>