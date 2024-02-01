<?php
require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
$select = "SELECT * FROM counters";
$select_counters = mysqli_query($db_connection, $select);

?>

<?php 
    require '../dashboard-parts/header.php';
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Counter information</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>sl</th>
                        <th>Icon</th>
                        <th>counter</th>
                        <th>sub title</th>
                    </tr>
                    <?php foreach($select_counters as $sl=>$counter) { ?>
                            <tr>
                                <td><?=$sl+1 ?></td>
                                <td><?=$counter['icon'] ?></td>
                                <td><?=$counter['counter'] ?></td>
                                <td><?=$counter['sub_title'] ?></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Counter</h3>
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
                <form action="counter_post.php" method="POST">
                    <div class="mb-3">
                    <?php foreach($fonts as $icon){ ?>
                        <i style="font-family: fontawesome; font-size:27px; color:black; margin: 0 8px" class="fa <?=$icon?>"> </i>
                    <?php }?>
                    </div>
                    <div class="mb-3">
                        <label >icon</label>
                        <input type="text" name="icon" id="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">counter</label>
                        <input type="number" name="counter"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">sub title</label>
                        <input type="text" name="sub_title"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Counter</button>
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
            var icon =$(this).attr('class');
            $('#icon').attr('value', icon );
        });
</script>


<?php 
    require '../dashboard-parts/footer.php';
?>

