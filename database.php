<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "stratosphere";

    $db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(mysqli_connect_errno()) {
        echo 'Something went wrong with the connection of the database: '.mysqli_connect_error();
    }
?>