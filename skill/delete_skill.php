    <?php 

        require '../db.php';
        session_start();
        if(!isset($_SESSION['login_success'])){
            header('location:login.php');
        }   

    $id = $_GET['id'];

    $delete = "DELETE FROM skills WHERE id=$id";
    mysqli_query($db_connection, $delete);
    header('location:skill.php');


    ?>