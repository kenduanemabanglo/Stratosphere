<?php include 'database.php';
    // Show all the records with reference to the logged in agent
    $reference = implode('', $_SESSION);
    $records = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$reference' ORDER BY last_name ASC");
    if ($records->num_rows > 0) {
        while($show_records = mysqli_fetch_assoc($records)) {
            $policy_no = $show_records['policy_no'];
            $name = $show_records['name'];
            $temp_name = $show_records['name'];
            $role = $show_records['role'];
            $product = $show_records['product'];
            $effective_date = date('F d, Y', strtotime($show_records['effective_date']));
            $status = $show_records['status'];
            
            // Premium Paying Cards
            
            echo '<div class="column">';
                echo '<div class="card-pp">';
                    echo '<div class="info">';
                    echo '<h4><b>'.$name;'</b></h4>';
                    echo '<p>Policy No. : '.$policy_no;'</p>';
                    echo '<p>Role : '.$role;'</p>'; 
                    echo '<p>Product : '.$product;'</p>'; 
                    echo '<p>Effective Date : '.$effective_date;'</p>'; 
                    echo '<p>Status : '.$status;'</p>'; 
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        } 
    }
?>