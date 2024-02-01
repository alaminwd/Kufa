<?php

require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
$select = "SELECT * FROM services";
$select_service = mysqli_query($db_connection, $select);

?>
 <?php
    require '../dashboard-parts/header.php'
  ?>
      

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Service Part </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>sl</th>
                        <th>icon</th>
                        <th>title</th>
                        <th>sub_title</th>
                        <th>action</th>
                    </tr>

                    <?php foreach($select_service as $sl=>$service ) { ?>
                            <tr>
                                <td><?= $sl+1?></td>
                                <td><?= $service['icon']?></td>
                                <td><?=$service['title']?></td>
                                <td><?=$service['sub_title']?></td>
                                <td>
                                    <a href="update_service.php?id=<?=$service['id'] ?>'" class="btn btn-info">Edite</a>
                                    <a href="service_delete.php?id=<?=$service['id'] ?>" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>

                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Service Information</h3>
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
            <div class="card-body">
                <form action="service_post.php" method="POST">
                <div class="mb-3">
                        <?php foreach( $fonts as $icon) {?>
                            <i class="fa <?= $icon?>" style="font-family: fontawesome; font-size:30px; margin-left:10px" ></i>

                            <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="">icon</label>
                        <input type="text" name="icon" class="form-control" id="service_icon">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">sub title</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>
                    <div class="mb-3 text-center">
                        <button style="width: 50%;" type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>


<script>
    $('.fa').click(function(){
        var service = $(this).attr('class');
        $('#service_icon').attr('value', service);
    });
</script>

<?php
    require '../dashboard-parts/footer.php'
?>
      