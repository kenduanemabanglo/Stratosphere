<?php include 'database.php';
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($db, "SELECT * FROM login WHERE username = '$username' AND password = '$password';");
        $login_verify = mysqli_num_rows($query);
        if($login_verify != 0) {
            session_start();
            $_SESSION['start_session'] = $username;
            header("location: stratosphere.php");
        }else{
            echo '<div class="alert">';
            echo 'Oops! Wrong username or password.';
            echo '</div>';
        }
    }
?>
