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
    <link rel="icon" href="img/stratosphere.ico">
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

                    
                }
            }
        ?>
        <p id="message"></p>
        
<script>
    function displayClock() {
    var time = new Date();
    var type = "AM";
    var message = "Good morning, " + name;
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    var name = "<?php echo $first_name; ?>";
    

    if (hours == 0) {
        hours = 12;
    }
    if (hours > 12) {
        hours = hours - 12;
        type = "PM";
        message = "Good afternoon!";
            if(hours > 6) {
                message = "Good evening, " + name;
            }
    }
    
    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes
    }

    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    var myClock = document.getElementById('clock');
    var myMessage = document.getElementById('message');
    myClock.textContent = hours + ":" + minutes + ":" + seconds + "       " + type;
    myMessage.textContent = message ;
    
    setTimeout('displayClock()', 1000);
}
displayClock();

</script>
</body>
</html>