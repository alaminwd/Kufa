<?php

require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
$select = "SELECT * FROM users";
$select_users = mysqli_query($db_connection, $select);

?>
  <?php
    require '../dashboard-parts/header.php'
  ?>
        
  <div class="row">
        <div class="col-lg-12 ">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">User Information</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th style="text-align: center;">sl</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Img</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                <?php foreach($select_users as $key=> $user){ ?>
                    <tr style="text-align: center;">
                        <td><?= $key+1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <?php if($user['photo']== null){?>
                                <img width="70px" src="../dashboard-asset/images/default.png" alt="">
                                <?php } else{?>
                                    <img width="70px" src="../uploads/users/<?=$user['photo'] ?>" alt="">
                                <?php }?>
                            
                        </td>
                        <td>
                            <a class="btn btn-info" href="edit_user.php?id=<?=$user['id']?>">Edit</a>
                            <button data-id="delete_user.php?id=<?= $user['id']?>" class="btn btn-danger delete_btn">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                 </table>
             </div>
        </div>        
    </div> 
      
  
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       $('.delete_btn').click(function(){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    link = $(this).attr('data-id');
                    window.location.href = link;
                }
            })
       });
    </script>

       <?php if(isset($_SESSION['delete'])) {?>
            <script>
                     Swal.fire(
                    'Deleted!',
                    'User Deleted Successfully.',
                    'success'
                    )
            </script>
        <?php } unset($_SESSION['delete'])?>

 <?php
    require '../dashboard-parts/footer.php'
 ?>