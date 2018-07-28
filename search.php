<?php include 'database.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere | Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/records.css" />
    <link rel="stylesheet" type="text/css" href="css/cards.css" />
</head>
<body>  
        <nav>
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

    <form method="POST" action="search.php">
    <div class="search-bar">
        <input type="text" autocomplete="off" name="search" placeholder="Search...">
        <div class="result"></div>
    </div>
    </form>
    <div class="row">
    <?php include 'controllers/search-results.php'; ?>
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</body>
</html>