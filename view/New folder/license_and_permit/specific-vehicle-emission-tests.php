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
    $vehicle_emission_tests_id = $_GET["vehicle_emission_tests_id"];
    $functions_modules_id = $module_id;
    $functions_idVehicleEmissionTests = $_GET["functions_idVehicleEmissionTests"];
    $functions_idSpecificVehicleEmissionTests = $_GET["functions_idSpecificVehicleEmissionTests"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';   

// 6. Relevant Functions Execution Control
    $getAllDriverLicensesResults = $LicenseAndPermitObj->getAllDriverLicenses();
    
    $getSpecificVehicleEmissionTestsResults = $LicenseAndPermitObj->getSpecificVehicleEmissionTests($vehicle_emission_tests_id);
    $getSpecificVehicleEmissionTests = $getSpecificVehicleEmissionTestsResults->fetch_assoc();

    
    $number;

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdVehicleEmissionTestsResults = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleEmissionTests($functions_idVehicleEmissionTests);
    $getSpecificFunctionRelevatFunctionIdVehicleEmissionTests = $getSpecificFunctionRelevatFunctionIdVehicleEmissionTestsResults->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTestsResults = $functionsObj->getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTests($functions_idSpecificVehicleEmissionTests);
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTests = $getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTestsResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedVehicleImg = "";
    if($getSpecificVehicleEmissionTests["vehicleImage_"]==""){
        $selectedVehicleImg = "../../images/driver_images/download.jpeg";
    }else{
        $selectedVehicleImg = "../../images/vehicle_images/".$getSpecificVehicleEmissionTests["vehicleImage_"];
    }

    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(48);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e3 = "&vehicle_emission_tests_id=".$vehicle_emission_tests_id;
    $e2 = "&functions_idVehicleEmissionTests=".$functions_idVehicleEmissionTests;
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = $column2["breadcrumb_li_css"];
    $a3 = $column3["breadcrumb_li_css"];
    $a4 = $column4["breadcrumb_li_css"];
    $a5 = "breadcrumb-item active d-none";
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = $column2["breadcrumb_li_aria-current"];
    $b3 = $column3["breadcrumb_li_aria-current"];
    $b4 = $column4["breadcrumb_li_aria-current"];
    $b5 = "";
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = $column2["breadcrumb_a_href"].$e1;
    $c3 = $column3["breadcrumb_a_href"].$e1.$e2.$e3;
    $c4 = $column4["breadcrumb_a_href"];
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdVehicleEmissionTests["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTests["functions_name"];
    $d5 = '';
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdSpecificVehicleEmissionTests["functions_name"];?> - <?php echo $getSpecificVehicleEmissionTests["make"]." ".$getSpecificVehicleEmissionTests["model"];?></h4>
            </div>  
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="rounded mx-auto d-block" src="<?php echo $selectedVehicleImg?>" width="150px"/>
                </div>             
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="container">
                <div class="row">  
                    <div class="col-md-12">
                        <a type="button" class="btn btn-primary" href="update-specific-vehicle-emission-tests.php?module_id=<?php echo $module_id;?>&vehicle_emission_tests_id=<?php echo $vehicle_emission_tests_id;?>&functions_idVehicleEmissionTests=<?php echo $functions_idVehicleEmissionTests;?>&functions_idSpecificVehicleEmissionTests=<?php echo $functions_idSpecificVehicleEmissionTests;?>&functions_idUpdateSpecificVehicleEmissionTests=109">
                            Update
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">1. Serial No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="vehicleNo" id="vehicleNo" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_tests_serialNo"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="col-md-3">
                        <label class="control-label">2. Date of Issue</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="make" id="make" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_tests_dateOfIssue"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>      
                <div class="row">
                    <div class="col-md-3">
                            <label class="control-label">3. Reg. No.</label>
                        </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="model" id="model" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_regNo"];?>" disabled="disabled"/>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">4. Make</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="policyNo" id="policyNo" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_make"];?>" disabled="disabled"/> 
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
                        <label class="control-label">5. Vehicle Class</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["class_of_vehicle_name"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">6. Model</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_model"];?>" disabled="disabled"/>
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
                        <label class="control-label">7. Chassis No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_chassisNo"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">8. Year of MFG.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_yearOfMFG"];?>" disabled="disabled"/>
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
                        <label class="control-label">9. Engine No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_engineNo"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">10. Fuel Type</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleEmissionTests["fuel_type_name"];?>" disabled="disabled"/>
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
                        
                    </div>
                    <div class="col-md-3">                        
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">11. Odometer</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_odometer"];?>" disabled="disabled"/>
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
                        <label class="control-label">14. Centre</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_centre"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">15. Lane</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_lane"];?>" disabled="disabled"/>
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
                        <label class="control-label">16. Test Fee</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_testFee"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">17. Inspector</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_inspector"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">14. Test Start</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_testStarted"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">15. Test End</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="periodOfEnd" id="periodOfEnd" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_testEnd"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                <!--Categories of vehicles-->
                            <th scope="col"><label class="control-label"></label></th>
                <!--Date of Issue per category-->
                            <th scope="col"><label class="control-label">RPM</label></th>
                <!--Date of Expiry per category-->
                            <th scope="col"><label class="control-label">HC</label></th>
                <!--Restrictions in code form-->
                            <th scope="col"><label class="control-label">CO</label></th>
                            <th scope="col"><label class="control-label">Lambda</label></th>
                            <th scope="col"><label class="control-label">O2</label></th>
                            <th scope="col"><label class="control-label">CO2</label></th>
                            <th scope="row" rowspan="2"><label class="control-label">Overall Status</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Unit</th>
                            <th scope="col"><label class="control-label">r/Min</label></th>
                <!--Date of Expiry per category-->
                            <th scope="col"><label class="control-label">ppm v/v</label></th>
                <!--Restrictions in code form-->
                            <th scope="col"><label class="control-label">% v/v</label></th>
                            <th scope="col"><label class="control-label">-</label></th>
                            <th scope="col"><label class="control-label">% v/v</label></th>
                            <th scope="col"><label class="control-label">% v/v</label></th>        
                            <th scope="row"></th>
                        </tr>
                        <tr>
                            <th scope="row">Standard</th>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardRPM"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardHC"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardCO"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardLamda"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardO2"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_standardCO2"];?></td>
                            <td scope="row" rowspan="3"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_overAllStatus"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">Idel</th>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelRPM"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelHC"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelCO"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelLamda"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelO2"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_idelCO2"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">2500 RPM</th>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rmpRPM"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rpmHC"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rpmCO"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rpmLamda"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rpmO2"];?></td>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_2500rpmCO2"];?></td>

                        </tr>
                        <tr>
                            <th scope="row">Oil Temp(C)</th>
                            <td scope="row"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_oilTemp"];?></td>
                            <td scope="row" colspan="2"></td>
                            <th scope="row" colspan="2">Reference No</th>
                            <td scope="row" colspan="2"><?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_referenceNo"];?></td>
                        </tr>
                    </tbody>
                </table>  
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">16. QR Code</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_QRCode"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">17. Vehicle Image</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_vehicleImage"];?>" disabled="disabled"/> 
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
                        <label class="control-label">17. Valid Till</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="engineNo" id="engineNo" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_validTill"];?>" disabled="disabled"/> 
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">18. Revenue License No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="insuranceCompanyName" id="insuranceCompanyName" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_revenueLicenseNo"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">19. Authorized Signature</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="insuranceCompanyAddress" id="insuranceCompanyAddress" value="<?php echo $getSpecificVehicleEmissionTests["vehicle_emission_test_authorizedSignature"];?>" disabled="disabled"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
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