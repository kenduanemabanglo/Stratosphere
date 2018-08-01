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
                $role = $display['role'];
                $product = $display['product'];
                $effective_date = $display['effective_date'];
                $due_date = $display['due_date'];
                $amount = $display['amount'];
                $contact_no = $display['contact_no'];
                $email = $display['email'];
                $mode = $display['mode'];
                $status = $display['status'];
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
                        echo '<input type="text" name="middle_name">';
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