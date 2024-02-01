<?php
    require '../db.php';
    session_start();
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    } 
    
    $id = $_GET['id'];

    $update = "UPDATE messages SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);

    $select = "SELECT * FROM messages WHERE  id=$id";
    $select_res = mysqli_query($db_connection, $select);
    $message = mysqli_fetch_assoc($select_res);
?>

<?php  
    require '../dashboard-parts/header.php';
?>

<div class="row">
    <div class="col-lg-6">

        <form action="">
            <div class="mb-3">
                <label for="" class="form-lable">Name</label>
                <input type="text" name="name" class="form-control" value=" <?=$message['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-lable">email</label>
                <input type="text" name="name" class="form-control" value=" <?=$message['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-lable">Message</label>
                <input type="text" name="name" class="form-control" value=" <?=$message['message'] ?>">
            </div>
        </form>
        <!-- <div class="card">
            <div class="card-body">
            <table class="table table-hover">
            <tr>
                <td>Name</td>
                <td><?=$message['name'] ?></td>
                <td><?= $message['email'] ?></td>
                <td><?=$message['message']?></td>
            </tr>

            </table>
            </div> -->
        </div>
    </div>
</div>









<?php  
    require '../dashboard-parts/footer.php';
?>