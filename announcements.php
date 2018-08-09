<?php include 'database.php';
    session_start();
    if (!isset($_SESSION['start_session']) || (trim ($_SESSION['start_session']) == '')) {
        header('location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="img/stratosphere.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere | My Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/records.css" />
    <link rel="stylesheet" type="text/css" href="css/cards.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="css/datedropper.css" rel="stylesheet" type="text/css" />
    <link href="css/manulife.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/datedropper.js"></script>
    
</head>
<body>
<nav class="navbar-background">
            <input type="checkbox" id="nav" class="hidden">
            <label for="nav" class="nav-btn">
                <i></i>
                <i></i>
                <i></i>                  
            </label>
            <div class="logo">
                <a href="stratosphere.php">STRATOSPHERE</a>
            </div>
            <div class="nav-wrapper">
                <ul>
                    <li><a href="stratosphere.php">Home</a></li>
                    <li><a href="announcements.php">Announcements</a></li>
                    <li><a href="records.php">My Records</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
</body>
</html>