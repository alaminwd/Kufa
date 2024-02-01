<?php

require '../db.php';
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:/kufa/login.php');
}
$select = "SELECT * FROM menus";
$select_users = mysqli_query($db_connection, $select);

?>
  <?php
    require '../dashboard-parts/header.php'
  ?>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3> View Menu</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>SL</th>
                            <th>Menu</th>
                            <th>Section ID</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_users as $sl=>$menu){ ?>
                            <tr>
                                <td><?=$sl+1?></td>
                                <td><?=$menu['menu'] ?></td>
                                <td><?=$menu['section_id']  ?></td>
                                <td>
                                    <a href="#" class="btn btn-info">Edite</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
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
                    <h3>Add Menu</h3>
                </div>
                <div class="card-body">
                    <form action="menu_post.php" method="POST">
                        <div class="mb-3">
                            <label for="">Menu</label>
                            <input type="text" name="menu" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Menu</label>
                            <input type="text" name="section_id" class="form-control">
                        </div>
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary" style="width: 100%;" >Add Menu</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>











    <?php
    require '../dashboard-parts/footer.php'
    ?>