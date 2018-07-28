<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere | My Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/records.css" />
    <link rel="stylesheet" type="text/css" href="css/cards.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
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

    <form method="POST" action="search.php">
    <div class="search-bar">
        <input type="text" autocomplete="off" name="search" placeholder="Search...">
        <div class="result"></div>
    </div>
    </form>

    <div class="dues">
        On due for today <?php echo $on_due = date('F d, Y'); ?>
    </div>
        <div class="row">
        <?php include 'controllers/due-policy.php'; ?>
        </div>
    <br>
    <hr>
    <br>
    <div class="row">
    <?php include 'controllers/show-records.php'; ?>
    </div>
    
    <div class="fab">
        <div class="trigger"><span>&#9776;</span></div>
        

            <div class="actions id="overlay>
                <div class="action green"><i class="fa fa-user-plus"></i>
                <!-- <div class="tooltip">Add a Record</div> -->
            </div>
                <div class="action blue"><i class="fa fa-pencil"></i>
                <!-- <div class="tooltip">Edit a Record</div> -->
                </div>
                <div class="action red"><i class="fa fa-trash"></i>
                <!-- <div class="tooltip">Delete a Record</div> -->
                </div>
                <div class="action orange"><i class="fa fa-print"></i>
                <!-- <div class="tooltip">Print</div> -->
                </div>
                </center>
            </div>
    
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $('.fab').click(function() {
    $(this).toggleClass('open');
});
</script>
</body>
</html>