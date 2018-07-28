<?php include 'database.php';
    if(isset($_POST['search'])) {
        $search = implode('', $_POST);
        $results = mysqli_query($db, "SELECT * FROM records WHERE policy_no LIKE '%$search%' OR last_name LIKE '%$search%' OR first_name LIKE '%$search%' ORDER BY last_name ASC");
        if($results->num_rows != 0) {
            while($show_results = mysqli_fetch_assoc($results)){
                $policy_no = $show_results['policy_no'];
                $name = $show_results['name'];
                $role = $show_results['role'];
                $product = $show_results['product'];
                $effective_date = $show_results['effective_date'];
                $status = $show_results['status'];
             
                // Premium Paying Cards
            if ($status == "Premium Paying") {
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
    
                // Declined Cards
                if ($status == "Declined") {
                    echo '<div class="column">';
                        echo '<div class="card-dc">';
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
    
                // Fully Paid Cards
                if ($status == "Fully Paid") {
                    echo '<div class="column">';
                        echo '<div class="card-f">';
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
    
                // Recall Cards
                if ($status == "Recall") {
                    echo '<div class="column">';
                        echo '<div class="card-r">';
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
    
                // Surrendered Paid Cards
                if ($status == "Surrendered") {
                    echo '<div class="column">';
                        echo '<div class="card-s">';
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
    
                // Lapsed Cards
                if ($status == "Lapsed") {
                    echo '<div class="column">';
                        echo '<div class="card-l">';
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
    
                // Cancelled Cards
                if ($status == "Cancelled") {
                    echo '<div class="column">';
                        echo '<div class="card-c">';
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
    
                // Postponed Cards
                if ($status == "Postponed") {
                    echo '<div class="column">';
                        echo '<div class="card-p">';
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
    
                // Dropped Cards
                if ($status == "Dropped") {
                    echo '<div class="column">';
                        echo '<div class="card-d">';
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
        }else{
            echo 'No matching records.';
        }
    }
?>