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
        On due for today <?php echo $on_due = date('F j, Y'); ?>
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
                <div class="action orange"><a href="print-to-pdf.php" target="_blank"><i class="fa fa-print"></i></a>
                <div class="tooltip">Print all Records</div>
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
                        echo '<h3>Hi, '.$first_name.'. Adding a new record? Just simply fill out all the boxes provided below and as you input your new record, smile! Just keep adding a new record, 
                        it will not only increase your production rather it will increase your passion within this institution. </h3>';
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
                    while($show_agent_name = mysqli_fetch_assoc($servicing_name)) {
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
                <input type="button" class="close" value="Cancel" onclick="location.href='../../../records.php';"/>

			</div>
		</div>
		<div class="overlay"></div>
    </div>
    
    <div id="edit">
    <form method="POST" class="submission-form">
		<div class="edit-content">
			<div class="header">
            <h2>Edit a Record</h2>
                <?php 
                $servicing_agent = implode('', $_SESSION);
                $name = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$servicing_agent';");
                if($name->num_rows != 0) {
                    while($show_name = mysqli_fetch_assoc($name)) {
                        $first_name = $show_name['first_name'];
                        echo '<h3>Hi, '.$first_name.'. Editing a record? Make sure to fill up all the necssary and/or required fields below.</h3>';
                    }
                }
            ?>
			</div>
			<div class="copy two-row">
				<div class="one-column">
                <label>Record</label>
                   <select name="record-name">
                       <option default>Please choose record to edit</option>
                       <?php include 'database.php';
                            $agent = implode('', $_SESSION);
                            $edit_record = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$agent'  ORDER BY last_name;;");
                            if ($edit_record->num_rows > 0) {
                            while($show_record = mysqli_fetch_assoc($edit_record)) {
                            echo '<option value="'.$show_record['name'].'">'.$show_record['name'].'</option>';
                            }
                        }
                        ?>
                   </select>
                </div>
                <div class="lookup-button">
                <input type="submit" class="look" name="look" value="Lookup" id="show-record">
                </form>
                </div>
                <?php include 'database.php';
        $agent_name = implode('', $_SESSION);
        if(isset($_POST['look'])) {
            $temp_client_name = $_POST['record-name'];
            $client_name = strtoupper($temp_client_name);
            $disp_record = mysqli_query($db, "SELECT * FROM records WHERE name = '$client_name' AND servicing_agent_username = '$agent_name';");
            while($display = mysqli_fetch_assoc($disp_record)) {
                $policy_no = $display['policy_no'];
                $temp_last_name = $display['last_name'];
                $first_name = $display['first_name'];
                $last_name = strtoupper($temp_last_name);
                $middle_name = $display['middle_name'];
                $role = $display['role'];
                $product = $display['product'];
                $effective_date = $display['effective_date'];
                $due_date = $display['due_date'];
                $amount = $display['amount'];
                $contact_no = $display['contact_no'];
                $email = $display['email'];
                $mode = $display['mode'];
                $status = $display['status'];
                $middle_initial = $middle_name[0];

                echo '<br>';
                echo '<form method="POST" action="">';
                echo '<center><input type="text" name="client" value="'.$client_name.'"></center>';
                echo '<div class="two-column">';
                    echo '<label>Policy No.</label>';
                        echo '<input type="text" name="policy_no" value="'.$policy_no.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>First Name</label>';
                        echo '<input type="text" name="first_name" value="'.$first_name.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Middle Name/M.I.</label>';
                        echo '<input type="text" name="middle_name" value="'.$middle_initial.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Last Name</label>';
                        echo '<input type="text" name="last_name" value="'.$last_name.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Contact No.</label>';
                        echo '<input type="text" name="contact_no" value="'.$contact_no.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Email</label>';
                        echo '<input type="text" name="email" value="'.$email.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Role</label>';
                    echo '<select name="role">';
                        echo '<option>'.$role.'</option>';
                        echo '<option default disabled>Please choose new role</option>';
                        echo '<option value="Insured">Insured</option>';
                        echo '<option value="Owner">Owner</option>';
                        echo '<option value="Insured/Owner">Insured/Owner</option>';
                        echo '<option value="Owner/Payor">Owner/Payor</option>';
                    echo '</select>';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Product</label>';
                    echo '<select name="product">';
                        echo '<option>'.$product.'</option>';
                        echo '<option default disabled>Please choose new product</option>'; 
                                $product = mysqli_query($db, "SELECT * FROM product;");
                                if ($product->num_rows > 0) {
                                while($show_product = mysqli_fetch_assoc($product)) {
                                echo '<option value="'.$show_product['product_name'].'">'.$show_product['product_name'].'</option>';
                                }
                            }
                    echo '</select>';
                echo '</div>';

                echo '<div class="two-column">';
                    echo '<label>Effective Date</label>';
                    echo '<input type="text" name="effective_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife" value="'.$effective_date.'"/>';
                    echo '<script>';
                        echo '$("input[name="effective_date"]").dateDropper();';
                    echo '</script>';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Due Date</label>';
                    echo '<input type="text" name="due_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife" value="'.$due_date.'"/>';
                    echo '<script>';
                        echo '$("input[name="due_date"]").dateDropper();';
                    echo '</script>';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Status</label>';
                    echo '<select name="status">';
                        echo '<option>'.$status.'</option>';
                        echo '<option default disabled>Please choose new status</option>';
                        echo '<option value="Premium Paying">Premium Paying</option>';
                        echo '<option value="Fully Paid">Fully Paid</option>';
                        echo '<option value="Lapsed">Lapsed</option>';
                        echo '<option value="Surrendered">Surrendered</option>';
                        echo '<option value="Postponed">Postponed</option>';
                        echo '<option value="Cancelled">Cancelled</option>';
                        echo '<option value="Declined">Declined</option>';
                        echo '<option value="Dropped">Dropped</option>';
                        echo '<option value="Recall">Recall</option>';
                    echo '</select>';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Mode</label>';
                    echo '<select name="mode">';
                        echo '<option>'.$mode.'</option>';
                        echo '<option default disabled>Please choose new mode</option>';
                        echo '<option value="Annually">Annually</option>';
                        echo '<option value="Semi-annually">Semi-annually</option>';
                        echo '<option value="Quarterly">Quarterly</option>';
                        echo '<option value="Monthly">Monthly</option>';
                    echo '</select>';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Amount</label>';
                        echo '<input type="text" name="amount" value="'.$amount.'">';
                echo '</div>';
                echo '<div class="two-column">';
                    echo '<label>Servicing Agent</label>';
                    $servicing_agent = implode('', $_SESSION);
                    $servicing_name = mysqli_query($db, "SELECT servicing_name FROM login WHERE username = '$servicing_agent' LIMIT 1;");
                    if($servicing_name->num_rows != 0) {
                        while($show_agent_name = mysqli_fetch_assoc($servicing_name)){
                            $servicing_agent_name = $show_agent_name['servicing_name'];
                            echo '<input type="text" value="'.$servicing_agent_name.'" name="servicing_agent">';
                        }
                    } 
                echo '</div>';
            }
        }

    ?>
			    </div>
			<div class="cf footer">
                <input type="submit" class="save" name="save" value="Save" onclick="location.href='../../records.php";/>
            <?php echo '</form>'; ?>
                <input type="reset" class="reset" value="Reset"/>
                <input type="button" class="close" value="Cancel" onclick="location.href='../../records.php';"/>

            <?php include 'database.php';
            if(isset($_POST['save'])) {
                $client = $_POST['client'];
                $policy_no = $_POST['policy_no'];
                $first_name = $_POST['first_name'];
                $middle_name = $_POST['middle_name'];
                $temp_last_name = $_POST['last_name'];
                $last_name = strtoupper($temp_last_name);
                $contact_no = $_POST['contact_no'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $product = $_POST['product'];
                $effective_date = $_POST['effective_date'];
                $due_date = $_POST['due_date'];
                $status = $_POST['status'];
                $mode = $_POST['mode'];
                $amount = $_POST['amount'];
                $servicing_agent = $_POST['servicing_agent'];
                $servicing_agent_username = implode('', $_SESSION);

                $middle_initial = $middle_name[0];
                $get_middle_initial = mysqli_query($db, "SELECT name FROM records WHERE name LIKE '%.' AND name = '$client';");
                $name = $last_name . ", " . $first_name . " " . $middle_initial . ".";

                $edit = mysqli_query($db, "UPDATE
                `records` SET
                `policy_no` = '$policy_no',
                `last_name` = '$last_name',
                `first_name` = '$first_name',
                `name` = '$name',
                `role` = '$role',
                `product` = '$product',
                `effective_date` = '$effective_date',
                `due_date` = '$due_date',
                `amount` = '$amount',
                `contact_no` = '$contact_no',
                `email` = '$email',
                `mode` = '$mode',
                `status` = '$status',
                `servicing_agent` = '$servicing_agent'
                WHERE name = '$client';"); 
                      
    
        if($edit) {
            echo '<script type="text/javascript">';
            header('location: records.php');
            echo 'alert("Congratulations! You have successfully added a new record. Just keep adding!")';
            echo '</script>';
        }else{
        echo '<script type="text/javascript">';
            echo 'alert("Oops! Something went wrong. Please try again.")';
            echo '</script>';
            }
        }
        ?>

			</div>
		</div>
		<div class="overlay"></div>
    </div>
    
    <div id="delete">
        <form method="POST" class="submission-form">
            <div class="delete-content">
                <div class="header">
                <h2>Delete a Record</h2>
                    <?php $servicing_agent = implode('', $_SESSION);
                    $name = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$servicing_agent';");
                    if($name->num_rows != 0) {
                        while($show_name = mysqli_fetch_assoc($name)) {
                            $first_name = $show_name['first_name'];
                            echo '<h3>Hi, '.$first_name.'. Deleting a record? Make sure to fill up all the necssary and/or required fields below.</h3>';
                        }
                    }
                    ?>
                </div>
            <div class="copy two-row">
                <div class="one-column">
                <label>Record</label>
                <select name="delete_name">
                       <option default>Please choose record to delete</option>
                       <?php include 'database.php';
                            $agent = implode('', $_SESSION);
                            $delete_record = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$agent'  ORDER BY last_name;");
                            if ($delete_record->num_rows > 0) {
                            while($show_record = mysqli_fetch_assoc($delete_record)) {
                            echo '<option value="'.$show_record['name'].'">'.$show_record['name'].'</option>';
                            }
                        }
                        ?>
                   </select>
                </div>
            </div>
            <?php include 'database.php';
                if(isset($_POST['delete'])) {
                    $delete_name = $_POST['delete_name'];

                    $delete = mysqli_query($db, "DELETE FROM records WHERE name = '$delete_name';");
                }
            ?>
            <div class="cf footer">
                <input type="submit" class="delete" name="delete" value="Delete" onclick="location.href= '../../records.php';" />
                <input type="button" class="close" value="Cancel" onclick="location.href= '../../records.php';" />
            </form>
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