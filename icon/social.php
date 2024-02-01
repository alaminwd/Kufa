<?php
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }    

    $select = "SELECT * FROM social";
    $select_res = mysqli_query($db_connection, $select);


?>


<?php
    require '../dashboard-parts/header.php';
?>
        <div class="row">
        <div class="col-lg-10 m-auto">
         <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Add Social Icon</h4>
            </div>
                <?php   
                    $fonts = array(
                        'fa-facebook',
                        'fa-facebook-f',
                        'fa-facebook-official',
                        'fa-facebook-square',
                        'fa-twitter',
                        'fa-twitter-square',
                        'fa-linkedin',
                        'fa-linkedin-square',
                        'fa-instagram',
                        'fa-youtube',
                        'fa-youtube-play',
                        'fa-youtube-square',
                        'fa-git-square',
                        'fa-github',
                        'fa-github-alt',
                        'fa-github-square',
                    );

                ?>
                    <div class="panel-body">
                        <form action="icon_post.php" method="POST" >
                        <div class="form-group">
                                    <?php foreach($fonts as $icon){ ?>
                                        <i style="font-family: fontawesome; font-size:27px; color:black; margin: 0 8px" class="fa <?=$icon?>"> </i>
                                    <?php }?>
                            </div>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Social Icon</label>
                                <input type="text" name="icon" class="form-control m-t-xxs" id="icon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon Link</label>
                                <input type="text" name="link" class="form-control m-t-xxs" placeholder="link" >
                            </div>
                            <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Upload Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="text-center">Update Icon</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <tr>
                                <th  style="text-align: center;">sl</th>
                                <th  style="text-align: center;">Icon</th>
                                <th  style="text-align: center;">Link</th>
                                <th  style="text-align: center;">status</th>
                                <th  style="text-align: center;">Action</th>
                            </tr>
                            <?php foreach($select_res as $sl=>$social){ ?>
                                <tr>
                                    <td><?=$sl+1 ?></td>
                                    <td><?=$social['icon'] ?></td>
                                    <td><?= $social['link'] ?></td>
                                    <td>
                                        <a href="icon_status.php?id=<?= $social['id'] ?>" class="btn btn-<?=$social['status']==1?'success':'info' ?>"> <?=$social['status']==1?'Active':'Deactive' ?> </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php }?>
                        </table>
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
        $('.fa').click(function(){
            var social =$(this).attr('class');
            $('#icon').attr('value', social);
        });
    </script>
        
      
    
    <script>
        <?php if(isset( $_SESSION['active_limit'])){ ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?=  $_SESSION['active_limit'] ?>',
                footer: '<a href="">Why do I have this issue?</a>'
                });

            <?php } unset( $_SESSION['active_limit'])?>
    </script>






<?php
    require '../dashboard-parts/footer.php';
?>
