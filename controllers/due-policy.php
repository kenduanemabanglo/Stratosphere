<?php include 'database.php';
    // Show all the records with reference to the logged in agent
    $reference = implode('', $_SESSION);
    $records = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$reference'");
    if($records->num_rows > 0) {
        while($show_records = mysqli_fetch_assoc($records)) {
            $policy_no = $show_records['policy_no'];
            $name = $show_records['name'];
            $role = $show_records['role'];
            $product = $show_records['product'];
            $effective_date = date('F d, Y', strtotime($show_records['effective_date']));
            $due_date = date('F d, Y', strtotime($show_records['due_date']));
            $on_due = date('F d, Y');
            $status = $show_records['status'];
            
            // Premium Paying Cards 
            if ($due_date == $on_due && $status == "Premium Paying") {
            echo '<div class="column">';
                echo '<div class="card-pp">';
                    echo '<div class="info">';
                    echo '<h4><b>'.$name;'</b></h4>';
                    echo '<p>Policy No. : '.$policy_no;'</p>';
                    echo '<p>Role   : '.$role;'</p>'; 
                    echo '<p>Product : '.$product;'</p>'; 
                    echo '<p>Effective Date : '.$effective_date;'</p>'; 
                    echo '<p>Status : '.$status;'</p>'; 
                    echo '</div>';
                

                    // echo '<div class="container">';
                    // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                    // echo '</div>';
                    // echo '<div id="modal">';
                    // echo '<div class="modal-content">';
                    // echo '<div class="header">';
                    // echo '<h2>'.$policy_no;'</h2>';
                    // echo '</div>';
                    // echo '<div class="copy">';
                    // echo '<p></p>';
                    // echo '</div>';
                    // echo '<div class="cf footer">';
                    // echo '<a href="#" class="btn">Close</a>';
                    // echo '</div>';
                    // echo '</div>';
                    // echo '<div class="overlay"></div>';
                    // echo '</div>';
    
                echo '</div>';
            echo '</div>';
            }

            // Declined Cards
            if ($due_date == $on_due && $status == "Declined") {
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
                        
                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$policy_no;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            }

            // Fully Paid Cards
            if ($due_date == $on_due && $status == "Fully Paid") {
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
                    

                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            }

            // Recall Cards
            if ($due_date == $on_due && $status == "Recall") {
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
                    

                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '<p></p>';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            }

            // Surrendered Paid Cards
            if ($due_date == $on_due && $status == "Surrendered") {
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
                    

                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '<p></p>';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            }

            // Lapsed Cards
            if ($due_date == $on_due && $status == "Lapsed") {
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
                    

                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '<p></p>';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            }

            // Cancelled Cards
            if ($due_date == $on_due && $status == "Cancelled") {
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
                        
                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '<p></p>';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';

                    echo '</div>';
                echo '</div>';
            }

            // Postponed Cards
            if ($due_date == $on_due && $status == "Postponed") {
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
            if ($due_date == $on_due && $status == "Dropped") {
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
                        
                        // echo '<div class="container">';
                        // echo '<center><a href="#modal" class="btn go show-more">show more</a></center>';
                        // echo '</div>';
                        // echo '<div id="modal">';
                        // echo '<div class="modal-content">';
                        // echo '<div class="header">';
                        // echo '<h2>'.$name;'</h2>';
                        // echo '</div>';
                        // echo '<div class="copy">';
                        // echo '<p></p>';
                        // echo '</div>';
                        // echo '<div class="cf footer">';
                        // echo '<a href="#" class="btn">Close</a>';
                        // echo '</div>';
                        // echo '</div>';
                        // echo '<div class="overlay"></div>';
                        // echo '</div>';
                        
                    echo '</div>';
                echo '</div>';
            }

        }
    }
?>