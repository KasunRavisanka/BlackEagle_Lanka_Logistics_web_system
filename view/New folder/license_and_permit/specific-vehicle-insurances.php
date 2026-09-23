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
    $vehicle_insurances_id = $_GET["vehicle_insurances_id"];
    $functions_modules_id = $module_id;
    $functions_idVehicleInsurances = $_GET["functions_idVehicleInsurances"];
    $functions_idSpecificVehicleInsurance = $_GET["functions_idSpecificVehicleInsurance"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';   

// 6. Relevant Functions Execution Control
    $getAllDriverLicensesResults = $LicenseAndPermitObj->getAllDriverLicenses();
    
    $getSpecificVehicleInsurancesResults = $LicenseAndPermitObj->getSpecificVehicleInsurances($vehicle_insurances_id);
    $getSpecificVehicleInsurances = $getSpecificVehicleInsurancesResults->fetch_assoc();

    
    $number;

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdVehicleInsurancesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleInsurances($functions_idVehicleInsurances);
    $getSpecificFunctionRelevatFunctionIdVehicleInsurances = $getSpecificFunctionRelevatFunctionIdVehicleInsurancesResults->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurancesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurances($functions_idSpecificVehicleInsurance);
    $getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurances = $getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurancesResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedVehicleImg = "";
    if($getSpecificVehicleInsurances["vehicleImage_"]==""){
        $selectedVehicleImg = "../../images/driver_images/download.jpeg";
    }else{
        $selectedVehicleImg = "../../images/vehicle_images/".$getSpecificVehicleInsurances["vehicleImage_"];
    }

    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(45);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e3 = "?vehicle_insurances_id=".$vehicle_insurances_id;
    $e2 = "&functions_idVehicleInsurances=".$functions_idVehicleInsurances;
    
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
    $d3 = $getSpecificFunctionRelevatFunctionIdVehicleInsurances["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurances["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdSpecificVehicleInsurances["functions_name"];?> - <?php echo $getSpecificVehicleInsurances["make"]." ".$getSpecificVehicleInsurances["model"];?></h4>
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
                <div class="row">  
                    <div class="col-md-12">
                        <a type="button" class="btn btn-primary" href="update-specific-vehicle-insurances.php?module_id=<?php echo $module_id;?>&vehicle_insurances_id=<?php echo $vehicle_insurances_id;?>&functions_idVehicleInsurances=<?php echo $functions_idVehicleInsurances;?>&functions_idSpecificVehicleInsurance=<?php echo $functions_idSpecificVehicleInsurance;?>&functions_idUpdateSpecificVehicleInsurance=106">
                            Update
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">1. Vehicle No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="vehicleNo" id="vehicleNo" value="<?php echo $getSpecificVehicleInsurances["vehicle_no"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="col-md-3">
                        <label class="control-label">2. Make</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="make" id="make" value="<?php echo $getSpecificVehicleInsurances["make"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>      
                <div class="row">
                    <div class="col-md-3">
                            <label class="control-label">3. Model</label>
                        </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="model" id="model" value="<?php echo $getSpecificVehicleInsurances["model"];?>" disabled="disabled"/>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">4. Policy No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="policyNo" id="policyNo" value="<?php echo $getSpecificVehicleInsurances["policyNo"];?>" disabled="disabled"/> 
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
                        <label class="control-label">5. Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $getSpecificVehicleInsurances["name"];?>" disabled="disabled"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">6. Address</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificVehicleInsurances["address"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">7. Period of Start</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="periodOfStart" id="periodOfStart" value="<?php echo $getSpecificVehicleInsurances["periodOfStart"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">8. Period of End</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="periodOfEnd" id="periodOfEnd" value="<?php echo $getSpecificVehicleInsurances["periodOfEnd"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">9. Engine No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="engineNo" id="engineNo" value="<?php echo $getSpecificVehicleInsurances["engineNo"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">10. Chassis No.</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="chassisNo" id="chassisNo" value="<?php echo $getSpecificVehicleInsurances["ChassisNo"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">11. Insurance Company Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="insuranceCompanyName" id="insuranceCompanyName" value="<?php echo $getSpecificVehicleInsurances["insuranceCompanyName"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">12. Insurance Company Address</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="insuranceCompanyAddress" id="insuranceCompanyAddress" value="<?php echo $getSpecificVehicleInsurances["insuranceCompanyAddress"];?>" disabled="disabled"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">13. Insurance Company Number</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="insuranceCompanyNumber" id="insuranceCompanyNumber" value="<?php echo $getSpecificVehicleInsurances["insuranceCompanyNumber"];?>" disabled="disabled"/> 
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