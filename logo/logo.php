<?php

    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }    

    $select = "SELECT * FROM logos ";
    $select_res = mysqli_query($db_connection, $select);
?>

    <?php 
        require '../dashboard-parts/header.php';
    ?>
    
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Active Logo</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                          
                            <?php foreach($select_res as $sl=> $logo) {?>
                                    <tr>
                                        <td><?=$sl+1 ?></td>
                                        <td>
                                            <img width="50" src="../uploads/logo/<?=$logo['logo']?>" alt="">
                                        </td>
                                        <td>
                                            <a href="logo_status.php?id=<?=$logo['id'] ?>" class="btn btn-<?=  $logo['status']== 1? 'success':'primary'?>"><?= $logo['status']== 1? 'Active':'Deactive'?></a>
                                        </td>
                                        <td>
                                            <button data-id="logo_delete.php?id=<?=$logo['id']  ?>" class="btn btn-danger delete_btn">Delete</button>
                                        </td>
                                    </tr>

                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Add Logo</h4>
            </div>
            <div class="panel-body">
                    <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="file" name="logo" class="form-control m-t-xxs">
                            <?php if(isset( $_SESSION['error'])){?>
                                <div class="alert alert-danger"><?=  $_SESSION['error']?></div>
                            <?php } unset( $_SESSION['error'])?>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Update Logo</button>
                    </form>
                 </div>
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
            })
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
        require '../dashboard-parts/footer.php';
        
    ?>