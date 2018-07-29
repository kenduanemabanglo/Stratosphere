<?php
    session_start();
    unset($_SESSION['start_session']);    
    session_destroy();
    header("Location: index.php");
    exit();
?>