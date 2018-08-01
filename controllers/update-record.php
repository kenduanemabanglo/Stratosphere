<?php include 'database.php';;
    if(isset($_POST['save'])) {
        print_r($_POST);
        // $client = $_POST['client'];
        // echo $client;
        // $policy_no = $_POST['policy_no'];
        // $first_name = $_POST['first_name'];
        // $middle_name = $_POST['middle_name'];
        // $temp_last_name = $_POST['last_name'];
        // $last_name = strtoupper($temp_last_name);
        // $contact_no = $_POST['contact_no'];
        // $email = $_POST['email'];
        // $role = $_POST['role'];
        // $product = $_POST['product'];
        // $effective_date = $_POST['effective_date'];
        // $due_date = $_POST['due_date'];
        // $status = $_POST['status'];
        // $mode = $_POST['mode'];
        // $amount = $_POST['amount'];
        // $servicing_agent = $_POST['servicing_agent'];
        // $servicing_agent_username = implode('', $_SESSION);

        // $middle_initial = $middle_name[0];
        // $name = $last_name . ", " . $first_name . " " . $middle_initial . ".";

        // $add = mysqli_query($db, "UPDATE
        // `records` SET
        //   `policy_no` = '$policy_no',
        //   `last_name` = '$last_name',
        //   `first_name` = '$first_name',
        //   `name` = '$name',
        //   `role` = '$role',
        //   `product` = '$product',
        //   `effective_date` = '$effective_date',
        //   `due_date` = '$due_date',
        //   `amount` = '$amount',
        //   `contact_no` = '$contact_no',
        //   `email` = '$email',
        //   `mode` = '$mode',
        //   `status` = '$status',
        //   `servicing_agent` = '$servicing_agent';
        //   WHERE name = $"); 
        
  //       if($add) {
  //         echo '<script type="text/javascript">';
  //           echo 'alert("Congratulations! You have successfully added a new record. Just keep adding!")';
  //           header('location: ../records.php');
  //         echo '</script>';
  //     }else{
  //       echo '<script type="text/javascript">';
  //           echo 'alert("Oops! Something went wrong. Please try again.")';
  //         echo '</script>';
          
  // }
    }
    
?>