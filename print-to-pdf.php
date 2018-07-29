<?php
    include 'database.php'; 
    require 'fpdf.php';
    
    class printToPDF extends FPDF {
        function header() {
        include 'database.php';
        session_start();
        $servicing_agent = implode('', $_SESSION);
        $name = mysqli_query($db, "SELECT first_name, last_name FROM login WHERE username = '$servicing_agent' LIMIT 1;");
        if($name->num_rows != 0) {
            while($show_name = mysqli_fetch_array($name)){
                $first_name = $show_name['first_name'];
                $last_name = $show_name['last_name'];
                $full_name = strtoupper($first_name . " " .$last_name);
            }
            $this->Image('img/small-logo.png', 20, 12);
            
            $this->SetFont('CenturyGothic', 'B', 14);
            $this->Cell(260, 10, 'STRATOSPHERE UNIT', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('CenturyGothic', '', 12);
            $this->Cell(260, 0, 'Client Records', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('CenturyGothic', 'B', 12);
            $this->Cell(260, 10, $full_name, 0, 0, 'C');
            $this->Image('img/stratosphere2018.png', 215, 14, 'R');
            $this->Ln(15);
        }
    }

    function footer() {
        $this->SetY(-15);
        $this->SetFont('CenturyGothic', 'B');
        $this->Cell(0, 8, 'Page ' . $this->PageNo().'of {nb}', 0, 0, 'R');
    }

    function tableHeader() {
        $this->SetFont('CenturyGothic', 'B', 11);
        $this->Cell(30, 10, 'POLICY NO.', 1, 0, 'C'); // Policy No.
        $this->Cell(60, 10, 'POLICY OWNER', 1, 0, 'C'); // Policy Owner
        $this->Cell(40, 10, 'EFFECTIVE DATE', 1, 0, 'C'); // Effective Date
        $this->Cell(30, 10, 'MODE', 1, 0, 'C'); // Mode
        $this->Cell(35, 10, 'CONTACT NO.', 1, 0, 'C'); // Contact No.
        $this->Cell(25, 10, 'AMOUNT', 1, 0, 'C'); // Amount
        $this->Cell(40, 10, 'STATUS', 1, 0, 'C'); // Status
        $this->Ln();
    }

    function printTable($db) {
        $reference = implode('', $_SESSION);
        $this->SetFont('CenturyGothic', '', 11);
        $records = mysqli_query($db, "SELECT * FROM records WHERE servicing_agent_username = '$reference' ORDER BY last_name ASC");
        while($result = mysqli_fetch_array($records)){
            $policy_no = $result['policy_no'];
            $name = $result['name'];
            $temp_effective_date = $result['effective_date'];
            $effective_date = date('M d, Y', strtotime($result['effective_date']));
            $mode = $result['mode'];
            $contact_no = $result['contact_no'];
            $amount = $result['amount'];
            $status = $result['status'];

            $this->Cell(30, 10, $policy_no, 1, 0, 'C'); // Policy No.
            $this->Cell(60, 10, $name, 1, 0, 'L'); // Policy Owner
            $this->Cell(40, 10, $effective_date, 1, 0, 'C'); // Effective Date
            $this->Cell(30, 10, $mode, 1, 0, 'C'); // Mode
            $this->Cell(35, 10, $contact_no, 1, 0, 'C'); // Contact No.
            $this->Cell(25, 10, $amount, 1, 0, 'C'); // Amount
            $this->Cell(40, 10, $status, 1, 0, 'C'); // Status
            $this->Ln();
        }
    }       
}
    
    $pdf = new printToPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'Letter', 0);
    $pdf->tableHeader();
    $pdf->printTable($db);
    $pdf->Output();