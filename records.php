<?php include 'database.php';
    session_start();
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
    <title>Stratosphere | My Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/records.css" />
    <link rel="stylesheet" type="text/css" href="css/cards.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="css/datedropper.css" rel="stylesheet" type="text/css" />
    <link href="css/manulife.css" rel="stylesheet" type="text/css" />
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
        

            <div class="actions">
            
                <div class="action green"><a href="#add"><i class="fa fa-user-plus"></i></a>
                <div class="tooltip">Add a Record</div>
            </div>
                <div class="action blue"><a href="#edit"><i class="fa fa-pencil"></i></a>
                <div class="tooltip">Edit a Record</div>
                </div>
                <div class="action red"><a href="#delete"><i class="fa fa-trash"></i></a>
                <div class="tooltip">Delete a Record</div>
                </div>
                <div class="action orange"><a href="print.php"><i class="fa fa-print"></i></a>
                <div class="tooltip">Print</div>
                </div>
                </center>
            </div>
    
    </div>

    <!-- Modals -->
    <div id="add">
    <?php include 'controllers/add-record.php'; ?>
    <form method="POST" class="submission-form">
		<div class="add-content">
			<div class="header">
                <h2>Add a Record</h2>
                <?php 
                $servicing_agent = implode('', $_SESSION);
                $name = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$servicing_agent';");
                if($name->num_rows != 0) {
                    while($show_name = mysqli_fetch_assoc($name)){
                        $first_name = $show_name['first_name'];
                        echo '<h3>Hi, '.$first_name.'. Adding a new record? Just simply fill out all the boxes provided below and as you input your new record, smile! Just keep adding a new record, it will not only increase your production rather it will increase your passion within this institution. </h3>';
                    }
                }
            ?>
            </div>
			<div class="copy two-row">
            
            <div class="two-column">
                <label>Policy No.</label>
                    <input type="text" name="policy_no">
            </div>
            <div class="two-column">
                <label>First Name</label>
                    <input type="text" name="first_name">
            </div>
            <div class="two-column">
                <label>Middle Name/M.I.</label>
                    <input type="text" name="middle_name">
            </div>
            <div class="two-column">
                <label>Last Name</label>
                    <input type="text" name="last_name">
            </div>
            <div class="two-column">
                <label>Contact No.</label>
                    <input type="text" name="contact_no">
            </div>
            <div class="two-column">
                <label>Email</label>
                    <input type="text" name="email">
            </div>
            <div class="two-column">
                <label>Role</label>
                   <select name="role">
                       <option default>Please choose role</option>
                       <option value="Insured">Insured</option>
                       <option value="Owner">Owner</option>
                       <option value="Insured/Owner">Insured/Owner</option>
                       <option value="Owner/Payor">Owner/Payor</option>
                   </select>
            </div>
            <div class="two-column">
                <label>Product</label>
                   <select name="product">
                       <option default>Please choose product</option>
                       <?php    
                            $product = mysqli_query($db, "SELECT * FROM product;");
                            if ($product->num_rows > 0) {
                            while($show_product = mysqli_fetch_assoc($product)) {
                            echo '<option value="'.$show_product['product_name'].'">'.$show_product['product_name'].'</option>';
                            }
                        }
                        ?>
                   </select>
            </div>
            <div class="two-column">
                <label>Effective Date</label>
                <input type="text" name="effective_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife"/>
                <script>
                    $("input[name='effective_date']").dateDropper();
                </script>
            </div>
            <div class="two-column">
                <label>Due Date</label>
                <input type="text" name="due_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife"/>
                <script>
                    $("input[name='due_date']").dateDropper();
                </script>
            </div>
            <div class="two-column">
                <label>Status</label>
                   <select name="status">
                       <option default>Please choose status</option>
                       <option value="Premium Paying">Premium Paying</option>
                       <option value="Fully Paid">Fully Paid</option>
                       <option value="Lapsed">Lapsed</option>
                       <option value="Surrendered">Surrendered</option>
                       <option value="Postponed">Postponed</option>
                       <option value="Cancelled">Cancelled</option>
                       <option value="Declined">Declined</option>
                       <option value="Dropped">Dropped</option>
                       <option value="Recall">Recall</option>
                   </select>
            </div>
            <div class="two-column">
                <label>Mode</label>
                   <select name="mode">
                       <option default>Please choose mode</option>
                       <option value="Annually">Annually</option>
                       <option value="Semi-annually">Semi-annually</option>
                       <option value="Quarterly">Quarterly</option>
                       <option value="Monthly">Monthly</option>
                   </select>
            </div>
            <div class="two-column">
                <label>Amount</label>
                    <input type="text" name="amount">
            </div>
            <div class="two-column">
                <label>Servicing Agent</label>
                <?php 
                $servicing_agent = implode('', $_SESSION);
                $servicing_name = mysqli_query($db, "SELECT servicing_name FROM login WHERE username = '$servicing_agent' LIMIT 1;");
                if($servicing_name->num_rows != 0) {
                    while($show_agent_name = mysqli_fetch_assoc($servicing_name)){
                        $servicing_agent_name = $show_agent_name['servicing_name'];
                        echo '<input type="text" value="'.$servicing_agent_name.'" name="servicing_agent">';
                    }
                }
            ?>  
            </div>
            
            
			</div>
			<div class="cf footer">
                <input type="submit" class="add" name="add" value="Add";/>
            </form>
                <input type="reset" class="reset" value="Reset"/>
                <input type="button" class="close" value="Cancel" onclick="location.href='#';"/>

			</div>
		</div>
		<div class="overlay"></div>
    </div>
    
    <div id="edit">
		<div class="edit-content">
			<div class="header">
				<h2>Modal Heading</h2>
			</div>
			<div class="copy">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="cf footer">
				<a href="#" class="btn">Close</a>
			</div>
		</div>
		<div class="overlay"></div>
    </div>
    
    <div id="delete">
		<div class="delete-content">
			<div class="header">
				<h2>Modal Heading</h2>
			</div>
			<div class="copy">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="cf footer">
				<a href="#" class="btn close">Close</a>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
<script>
    $('.fab').click(function() {
    $(this).toggleClass('open');
});
</script>

</body>
</html>