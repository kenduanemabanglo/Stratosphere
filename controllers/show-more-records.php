<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="img/stratosphere.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere | My Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/records.css" />
    <link rel="stylesheet" type="text/css" href="../css/cards.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <link href="../css/datedropper.css" rel="stylesheet" type="text/css" />
    <link href="../css/manulife.css" rel="stylesheet" type="text/css" />
    <script src="../js/script.js"></script>
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/datedropper.js"></script>
    <style>
        .submission-form label {
            color: #fff !important;
        }
    </style>
</head>
<body style="margin: 50px !important;">   
    <?php include 'database.php';
    session_start();
    $agent = implode('', $_SESSION);
        echo '<div class="more">';
        echo' <form method="POST" class="submission-form">';
            echo' <div class="more-content">';
                echo' <div class="header">';
                echo' <h2>View a Record</h2>';
                    $servicing_agent = implode('', $_SESSION);
                    $name = mysqli_query($db, "SELECT first_name FROM login WHERE username = '$servicing_agent';");
                    if($name->num_rows != 0) {
                        while($show_name = mysqli_fetch_assoc($name)) {
                            $first_name = $show_name['first_name'];
                            echo '<h3>Hi, '.$first_name.'. viewing a record? Make sure to fill up all the necssary and/or required fields below.</h3>';
                        }
                    }
                echo '</div>';
            echo '<div class="copy two-row">';
                echo '<div class="one-column">';
                echo '</div>';
            echo '</div>';
                $policy_no =  $_GET['policy_no'];
                $disp_record = mysqli_query($db, "SELECT * FROM records WHERE policy_no = '$policy_no';");
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
                    $client_name = $display['name'];
    
                    echo '<br>';
                    echo '<form method="POST" action="">';
                    echo '<center><input type="text" name="client" value="'.$client_name.'" readonly></center>';
                    echo '<div class="two-column">';
                        echo '<label>Policy No.</label>';
                            echo '<input type="text" name="policy_no" value="'.$policy_no.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>First Name</label>';
                            echo '<input type="text" name="first_name" value="'.$first_name.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Middle Name/M.I.</label>';
                            echo '<input type="text" name="middle_name" value="'.$middle_initial.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Last Name</label>';
                            echo '<input type="text" name="last_name" value="'.$last_name.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Contact No.</label>';
                            echo '<input type="text" name="contact_no" value="'.$contact_no.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Email</label>';
                            echo '<input type="text" name="email" value="'.$email.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Role</label>';
                        echo '<input type="text" name="role" value="'.$role.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Product</label>';
                        echo '<input type="text" name="product" value="'.$product.'" readonly>';
                    echo '</div>';
    
                    echo '<div class="two-column">';
                        echo '<label>Effective Date</label>';
                        echo '<input type="text" name="effective_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife" value="'.$effective_date.'" readonly/>';
                        echo '<script>';
                            echo '$("input[name="effective_date"]").dateDropper();';
                        echo '</script>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Due Date</label>';
                        echo '<input type="text" name="due_date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" data-modal="true" data-theme="manulife" value="'.$due_date.'" readonly/>';
                        echo '<script>';
                            echo '$("input[name="due_date"]").dateDropper();';
                        echo '</script>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Status</label>';
                        echo '<input type="text" name="status" value="'.$status.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Mode</label>';
                        echo '<input type="text" name="mode" value="'.$mode.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Amount</label>';
                            echo '<input type="text" name="amount" value="'.$amount.'" readonly>';
                    echo '</div>';
                    echo '<div class="two-column">';
                        echo '<label>Servicing Agent</label>';
                        $servicing_agent = implode('', $_SESSION);
                        $servicing_name = mysqli_query($db, "SELECT servicing_name FROM login WHERE username = '$servicing_agent' LIMIT 1;");
                        if($servicing_name->num_rows != 0) {
                            while($show_agent_name = mysqli_fetch_assoc($servicing_name)){
                                $servicing_agent_name = $show_agent_name['servicing_name'];
                                echo '<input type="text" value="'.$servicing_agent_name.'" name="servicing_agent" readonly>';
                            }
                        } 
                    echo '</div>';
                }
                echo '</form>';
                echo '<div class="cf-footer">';
                    echo '<center><br><br><br><br><br><a href="../records.php" class="close">Close and Go Back </a></center>';
                echo '</div>';
                echo '</div>';
        echo '</div>';
            
    ?>
</body>
</html>