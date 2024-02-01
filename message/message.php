<?php
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    } 

    $select = "SELECT * FROM messages ";
    $select_res = mysqli_query($db_connection, $select);

?>

<?php  
    require '../dashboard-parts/header.php';
?>

<div class="row">
   <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Message Information</h2>
            </div>
        <div class="card-body">
            <table class="table table-hover">
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
                <?php foreach( $select_res as $sl=>$message) {?>

                <tr class="bg-<?=$message['status'] == 0?'light':'' ?>">
                    <td><?=$sl+1 ?></td>
                    <td><?=$message['name'] ?></td>
                    <td><?= $message['email'] ?></td>
                    <td>
                        <?= substr($message['message'], 0, 30).'....More' ?>
                    </td>
                    <td>
                        <a href="message_view.php?id=<?=$message['id'] ?>" class="btn btn-info">View</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>


            <?php }?>

                <?php if(mysqli_num_rows($select_res)==0){?>
                    <tr>
                        <td colspan="6" class="text-center">Not Message found</td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
   </div>
</div>






<?php 
    require '../dashboard-parts/footer.php';
?>