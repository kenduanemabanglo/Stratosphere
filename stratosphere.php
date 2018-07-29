<?php include 'database.php'; 
    session_start(); 
    $username = implode('', $_SESSION);
    $query = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$username';");
    if($query->num_rows != 0) {
        while($name = mysqli_fetch_assoc($query)) {
            $first_name = $name['first_name'];
        }
    }
 
 if (!isset($_SESSION['start_session']) || (trim ($_SESSION['start_session']) == '')) {
   header('location:index.php');
   exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stratosphere.css" />
</head>
<body>
    <div class="container">
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
    </div>
        <h1 id="clock"></h1>
        <?php $username = implode('', $_SESSION);
            $query = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$username';");
            if($query->num_rows != 0) {
                while($name = mysqli_fetch_assoc($query)) {
                    $first_name = $name['first_name'];

                    echo '<p id="message">'.$first_name;'</p>';
                }
            }
    ?>
        
  <script src="js/clock.js"></script>
</body>
</html>