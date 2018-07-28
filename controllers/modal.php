<?php include 'database.php';
    // Show all the records with reference to the logged in agent
    $reference = implode('', $_SESSION);
    $records = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$reference'");
    if ($records->num_rows > 0) {
        while($show_records = mysqli_fetch_assoc($records)) {
            $policy_no = $show_records['policy_no'];
            $name = $show_records['name'];
            $temp_name = $show_records['name'];
            $role = $show_records['role'];
            $product = $show_records['product'];
            $effective_date = date('F d, Y', strtotime($show_records['effective_date']));
            $status = $show_records['status'];
            
            
        }
    }