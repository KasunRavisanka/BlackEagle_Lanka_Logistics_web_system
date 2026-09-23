<?php
    include_once '../model/user_model.php';
    $userObj = new User();
    $userResult= $userObj->getAllUsers();
    include_once '../commons/fpdf185/fpdf.php';

    $fpdf = new FPDF();
    $fpdf->SetTitle("User Report");
    $fpdf->AddPage("P");
    $fpdf->SetFont("Arial", "B", 20);

    $fpdf->Image("../images/esoft.jpg", 10, 6, 80);
    $fpdf->Cell(0, 20, "User Analysis", 0, 1, "C");
    $fpdf->SetFont("Arial", "B", 12);
    $fpdf->Cell(40,25, "", 0, 1, "C");

    // table header row
    $fpdf->Cell(40, 8, "", 1, 0, "C");
    $fpdf->Cell(40, 8, "Name", 1, 0, "C");
    $fpdf->Cell(40, 8, "Email", 1, 0, "C");
    $fpdf->Cell(40, 8, "NIC", 1, 0, "C");
    $fpdf->Cell(40, 8, "DOB", 1, 1, "C");

    $xpos = 20;
    $ypos = 70;

    $fpdf->SetFont("Arial", "", 12);

    // table body row
    while($userrow = $userResult->fetch_assoc()){
        $fpdf->Image("../images/user_images/download(1).jpeg", $xpos, $ypos, 10);
        $fpdf->Cell(40, 20, "", 1, 0, "C");
        $fpdf->Cell(40, 20, ucwords($userrow["user_fname"]), 1, 0, "L");
        $fpdf->Cell(40, 20, $userrow["user_fname"], 1, 0, "L");
        $fpdf->Cell(40, 20, $userrow["user_email"], 1, 0, "L");
        $fpdf->Cell(40, 20, $userrow["user_nic"], 1, 0, "L");
        $fpdf->Cell(40, 20, $userrow["user_dob"], 1, 1, "L");
        $ypos += 20;
    }
    
    $fpdf->Cell(60, 80, "", 0, 1, "C");
    $fpdf->SetFont("Arial", "", 8);
    $fpdf->Cell(0, 20, "dfgsfsafsfs", 0, 0, "L");

    // to make it output on the browser
    $filename = time()."user_report.pdf";
    $path = "../documents/$filename";
    $fpdf->Output($path,"F");
    $fpdf->Output();

?>