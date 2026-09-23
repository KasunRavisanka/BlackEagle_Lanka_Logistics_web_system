<!DOCTYPE html>
<html>
<?php
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';
    
// 3. Relevant Functions Control
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"];
    $vehicle_licenses_id = $_GET["vehicle_licenses_id"];
    $functions_modules_id = $module_id;
    $functions_idVehicleLicenses = $_GET["functions_idVehicleLicenses"];
    $functions_idSpecificVehicleLicenses = $_GET["functions_idSpecificVehicleLicenses"];
    $functions_idUpdateSpecificVehicleLicenses = $_GET["functions_idUpdateSpecificVehicleLicenses"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';   

// 6. Relevant Functions Execution Control
    $getAllDriverLicensesResults = $LicenseAndPermitObj->getAllDriverLicenses();
    
    $getSpecificVehicleLicensesResults = $LicenseAndPermitObj->getSpecificVehicleLicenses($vehicle_licenses_id);
    $getSpecificVehicleLicenses = $getSpecificVehicleLicensesResults->fetch_assoc();

    
    $number;

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdVehicleLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleLicenses($functions_idVehicleLicenses);
    $getSpecificFunctionRelevatFunctionIdVehicleLicenses = $getSpecificFunctionRelevatFunctionIdVehicleLicensesResults->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdSpecificVehicleLicenses($functions_idSpecificVehicleLicenses);
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleLicenses = $getSpecificFunctionRelevatFunctionIdSpecificVehicleLicensesResults->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicenses($functions_idUpdateSpecificVehicleLicenses);
    $getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicenses = $getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicensesResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedVehicleImg = "";
    if($getSpecificVehicleLicenses["vehicleImage_"]==""){
        $selectedVehicleImg = "../../images/driver_images/download.jpeg";
    }else{
        $selectedVehicleImg = "../../images/vehicle_images/".$getSpecificVehicleLicenses["vehicleImage_"];
    }

    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(47);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(50);
    $column4 = $column4Result->fetch_assoc();
    
    $column5Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column5 = $column5Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e3 = "&vehicle_licenses_id=".$vehicle_licenses_id;
    $e2 = "&functions_idVehicleLicenses=".$functions_idVehicleLicenses;
    $e4 = "&functions_idSpecificVehicleLicenses=".$functions_idSpecificVehicleLicenses;
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = $column2["breadcrumb_li_css"];
    $a3 = $column3["breadcrumb_li_css"];
    $a4 = $column4["breadcrumb_li_css"];
    $a5 = $column5["breadcrumb_li_css"];
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = $column2["breadcrumb_li_aria-current"];
    $b3 = $column3["breadcrumb_li_aria-current"];
    $b4 = $column4["breadcrumb_li_aria-current"];
    $b5 = $column5["breadcrumb_li_aria-current"];
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = $column2["breadcrumb_a_href"].$e1;
    $c3 = $column3["breadcrumb_a_href"].$e1.$e2.$e3;
    $c4 = $column4["breadcrumb_a_href"].$e1.$e2.$e3.$e4;
    $c5 = $column5["breadcrumb_a_href"];
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdVehicleLicenses["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdSpecificVehicleLicenses["functions_name"];
    $d5 = $getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicenses["functions_name"];
    $d6 = '';
    $d7 = '';
?>
    <head>
    <?php
        include_once '../../includes/bootstrap_header_includes.php';
    ?>
        <link rel="stylesheet" href="../../css/datatables.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
    <?php
                include_once '../common/navbar1.php';
    ?>    
    <?php 
                include_once '../common/modules.php';
    ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>    
            </div> 
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>    
            </div> 
            <div class="row">
                <div class="col-md-12">
    <?php
                    include_once '../common/navbar2.php';
    ?> 
                </div>
            </div>     
            <div class="row">
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdUpdateSpecificVehicleLicenses["functions_name"];?> - <?php echo $getSpecificVehicleLicenses["make"]." ".$getSpecificVehicleLicenses["model"];?></h4>
            </div>  
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="rounded mx-auto d-block" src="<?php echo $selectedVehicleImg?>" width="100px"/>
                </div>             
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="container">                            
                <form action="../../controller/controller/license_permit_controller.php?status=update_specific_driver_licenses&driver_licenses_id=<?php echo $driver_licenses_id;?>&module_id=<?php echo $module_id;?>&functions_idDriverLicenses=<?php echo $functions_idDriverLicenses;?>&functions_idSpecificDriverLicenses=<?php echo $functions_idSpecificDriverLicenses;?>" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">  
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>    
                        </div>
                        <div class="row">
                             <div class="col-md-3">
                                <label class="control-label">1. License No.</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="vehicleNo" id="vehicleNo" value="<?php echo $getSpecificVehicleLicenses["licenseNo"];?>"/> 
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div> 
                            <div class="col-md-3">
                                <label class="control-label">2. Class of Vehicle</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="make" id="make" value="<?php echo $getSpecificVehicleLicenses["class_of_vehicle_name"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>      
                        <div class="row">
                            <div class="col-md-3">
                                    <label class="control-label">3. Fuel Type</label>
                                </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="model" id="model" value="<?php echo $getSpecificVehicleLicenses["fuel_type_name"];?>"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">4. Vehicle No.</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="policyNo" id="policyNo" value="<?php echo $getSpecificVehicleLicenses["vehicleNo"];?>"/> 
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div> 
                        <div class="row">                    
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">5. Owner Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleLicenses["ownerName"];?>"/>
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">6. Owner Address</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleLicenses["ownerAddress"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div> 
                        <div class="row">                    
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">7. Unladen Weight</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleLicenses["unladenWeight"];?>"/>
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">8. Gross Weight</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleLicenses["grossWeight"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div> 
                        <div class="row">                    
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">9. No of Seats</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleLicenses["noOfSeats"];?>"/>
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">10. Vet No.</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleLicenses["vetNo"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div> 
                        <div class="row">                    
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">11. Annual Fee</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleLicenses["annualFee"];?>"/>
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">12. Arrears</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleLicenses["arrears"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">                    
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">13. Fines Paid</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleLicenses["finesPaid"];?>"/>
                            </div>

                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">14. License Valid From</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleLicenses["licenseValidFrom"];?>"/> 
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">15. License Valid To</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="periodOfEnd" id="periodOfEnd" value="<?php echo $getSpecificVehicleLicenses["licenseValidTo"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">16. Issued Date</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleLicenses["issuedDate"];?>"/> 
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>

                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">17. Signature of Officer</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="engineNo" id="engineNo" value="<?php echo $getSpecificVehicleLicenses["signatureOfOfficer"];?>"/> 
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">18. Designation of Officer</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="chassisNo" id="chassisNo" value="<?php echo $getSpecificVehicleLicenses["designationOfOfficer"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">19. Provincial Council</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="insuranceCompanyName" id="insuranceCompanyName" value="<?php echo $getSpecificVehicleLicenses["provincialCouncil"];?>"/> 
                            </div>
                            <div class="row d-md-none">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">20. M.T.S.W.P.</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="insuranceCompanyAddress" id="insuranceCompanyAddress" value="<?php echo $getSpecificVehicleLicenses["mtswp"];?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>               
            </div>
        </div>
    </body>
    <script src="../../js/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#drivertable").DataTable();
        });
    </script>
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
</html>