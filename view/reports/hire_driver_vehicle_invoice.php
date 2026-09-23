<?php
//    include_once '../model/user_model.php';
//    $userObj = new User();
//    $userResult= $userObj->getAllUsers();
    include_once '../../commons/fpdf185/fpdf.php';

    $fpdf = new FPDF();
    $fpdf->SetTitle("Hire Vehicle Invoice");
    $fpdf->AddPage("P");
    
    $fpdf->SetFont("Arial", "B", 16);
    $fpdf->Cell(0, 20, "BlackEagle Lanka Logistics PVT LTD", 0, 1, "C");
    
    $fpdf->SetFont("Arial", "B", 16);
    $fpdf->Cell(0, 2, "Hire Vehicle Invoice", 0, 1, "C");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 25, "", 0, 1, "C");
    $fpdf->Cell(190, 8, "Details", 1, 0, "C");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Date", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "2025.04.03", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Client Name", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Irenej Charity Simon", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Driver Name", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Ian Zoe Perez", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Vehicle Name", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Scania Streamline Normal", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Vehicle Registration No.", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "WP LY-1000", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Driver Type", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Motor Lorry", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Vehicle Type", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Motor Lorry", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Start Location", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Colombo", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "End Location", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "Gampaha", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Spent Time", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "8:20 hours", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 8, "Distance Traveled", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "46 km", 1, 0, "L");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 8, "", 0, 1, "C");
    $fpdf->Cell(95, 25, "Payment", 1, 0, "L");
    $fpdf->SetFont("Arial", "", 15);
    $fpdf->Cell(95, 25, "Rs 15,200/=", 1, 0, "C");
    
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40, 40, "", 0, 1, "C");
    $fpdf->Cell(40, 8, "Client Signature", 0, 0, "L");
    $fpdf->SetFont("Arial", "", 12);
    $fpdf->Cell(95, 8, "...........................", 0, 0, "L");

//    $fpdf->SetFont("Arial", "", 12);

    // table body row
//    while($userrow = $userResult->fetch_assoc()){
//        $fpdf->Image("../images/user_images/download(1).jpeg", $xpos, $ypos, 10);
//        $fpdf->Cell(40, 20, "", 1, 0, "C");
//        $fpdf->Cell(40, 20, "", 1, 0, "L");
//        $fpdf->Cell(40, 20, "", 1, 0, "L");
//        $fpdf->Cell(40, 20, "", 1, 0, "L");
//        $fpdf->Cell(40, 20, "", 1, 0, "L");
//        $fpdf->Cell(40, 20, "", 1, 1, "L");
//        $ypos += 20;
//    }
    
//    $fpdf->Cell(60, 80, "", 0, 1, "C");
//    $fpdf->SetFont("Arial", "", 8);
//    $fpdf->Cell(0, 20, "dfgsfsafsfs", 0, 0, "L");

    // to make it output on the browser
//    $filename = time()."user_report.pdf";
//    $path = "../../documents/$filename";
//    $fpdf->Output($path,"F");
    $fpdf->Output();

?>