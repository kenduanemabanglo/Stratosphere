<?php include 'database.php';;
    if(isset($_POST['add'])) {
        $policy_no = $_POST['policy_no'];
        $first_name = $_POST['first_name'];
        $middle_name_initial = $_POST['middle_name_initial'];
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

        $middle_initial = $middle_name_initial[0];
        $name = $last_name . ", " . $first_name . " " . $middle_initial . ".";

        $add = mysqli_query($db, "INSERT INTO
        `records`(
          `policy_no`,
          `last_name`,
          `middle_name_inital`,
          `first_name`,
          `name`,
          `role`,
          `product`,
          `effective_date`,
          `due_date`,
          `amount`,
          `contact_no`,
          `email`,
          `mode`,
          `status`,
          `servicing_agent`,
          `servicing_agent_username`
        )
      VALUES
        (
          '$policy_no',
          '$last_name',
          '$middle_initial',
          '$first_name',
          '$name',
          '$role',
          '$product',
          '$effective_date',
          '$due_date',
          '$amount',
          '$contact_no',
          '$email',
          '$mode',
          '$status',
          '$servicing_agent',
          '$servicing_agent_username'
        )"); 
        
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