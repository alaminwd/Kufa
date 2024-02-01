<?php
        require '../db.php';
       session_start();
       if(!isset($_SESSION['login_success'])){
           header('location:login.php');
       }   
       
       $select = "SELECT * FROM skills";
       $select_res =  mysqli_query($db_connection, $select);
 ?>
 
        
        <?php
            require '../dashboard-parts/header.php';
        ?>


        <div class="row">
        <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Skill Information</h3>
            </div>
            <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>sl</th>
                            <th>title</th>
                            <th>percentage</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>

                      <?php foreach($select_res as $sl=>$skill){ ?>
                            <tr>
                                <td><?=$sl+1 ?></td>
                                <td><?=$skill['title'] ?></td>
                                <td><?=$skill['percentage'] ?></td>
                                <td>
                                    <a href="skill_status.php?id=<?=$skill['id'] ?>" class="btn btn-<?=$skill['status']==1?'success':'light' ?>" ><?=$skill['status']==1?'active':'Deactive'  ?></a>
                                </td>
                                <td>
                                    <a href="delete_skill.php?id=<?=$skill['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
                    <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Add Skill</h4>
                </div>
                <div class="panel-body">
                        <form action="skill_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Skill</label>
                                <input type="text" name="title" class="form-control m-t-xxs">
                                <?php if(isset( $_SESSION['empty_skill'] )){ ?>
                                        <div class="alert alert-danger"><?=  $_SESSION['empty_skill']  ?></div>
                                <?php } unset( $_SESSION['empty_skill'])?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">percentage</label>
                                <input type="number" name="percentage" class="form-control m-t-xxs">
                                <?php if(isset( $_SESSION['empty_percentage'])) {?>

                                    <div class="alert alert-danger"><?= $_SESSION['empty_percentage']  ?></div>
                                    <?php  } unset( $_SESSION['empty_percentage'])?>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Update Logo</button>
                        </form>
                    </div>
                </div>
         </div>
     </div>
                    
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            <?php if(isset(  $_SESSION['active_limit'])) {?>

                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })


                <?php } unset($_SESSION['active_limit'])?>
        </script>



       
<?php
    require '../dashboard-parts/footer.php';
?>


