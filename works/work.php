<?php
    session_start();
    require '../db.php';
    if(!isset($_SESSION['login_success'])){
        header('location:login.php');
    }   

    $select = "SELECT * FROM works ";
    $select_res = mysqli_query($db_connection, $select);

?>

<?php
    require '../dashboard-parts/header.php';
?>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Work</h2>
                    </div>
                    <div class="card-body">
                        <form action="work_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <input type="hidden" name="user_id" value="<?=$after_assoc['id'] ?>">
                                <input type="text" name="category" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                               <textarea name="desp" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Gallry Imag</label>
                                <input type="file" name="gallery" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Preview Image</label>
                                <input type="file" name="preview" class="form-control">
                            </div>
                            <div class="mb-3">
                               <button type="submit" class="btn btn-info">Add work</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>work Information </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                                <tr>
                                    <th>Sl</th>
                                    <th>user</th>
                                    <th>category</th>
                                    <th>sub tile</th>
                                    <th>title</th>
                                    <th>Description</th>
                                    <th>gallery</th>
                                    <th>preview</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach( $select_res as $sl=>$work) {?>
                                    <tr>
                                        <td><?=$sl+1 ?></td>
                                        <td>
                                           <?php
                                                 $id = $work['user_id'] ;
                                                 $select_user = "SELECT * FROM users WHERE id=$id";
                                                 $select_user_res = mysqli_query($db_connection, $select_user);
                                                 $after_assoc_user = mysqli_fetch_assoc($select_user_res);
                                                 echo $after_assoc_user['name'];
                                           ?>
                                        </td>
                                        <td><?=$work['category'] ?></td>
                                        <td><?=$work['sub_title'] ?></td>
                                        <td><?=substr($work['title'], 0, 20)  ?></td>
                                        <td><?=substr($work['desp'], 0, 20)  ?></td>
                                        <td>
                                            <img width="50" src="../uploads/work/gallery/<?=$work['gallery'] ?>" alt="">
                                        </td>

                                        <td>
                                            <img width="50" src="../uploads/work/preview/<?=$work['preview'] ?>" alt="">
                                        </td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php

    require '../dashboard-parts/footer.php'
?>


