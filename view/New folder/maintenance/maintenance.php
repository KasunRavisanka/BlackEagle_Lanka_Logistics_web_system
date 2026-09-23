<!doctype html>
<html>
<?php   
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';

// 3. Relevant Functions Control    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"]; 
    $functions_modules_id = $module_id;
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';

// 6. Relevant Functions Execution Control    
    $getAllClassOfVehicleResult = $vehicleObj->getAllClassOfVehicle();
    
    $getHeavyMotorLorryResult = $vehicleObj->getHeavyMotorLorry();
    $getHeavyMotorLorry = $getHeavyMotorLorryResult->fetch_assoc();
    
    $getMotorLorryResult = $vehicleObj->getMotorLorry();
    $getMotorLorry = $getMotorLorryResult->fetch_assoc();
    
    $getLightMotorLorryResult = $vehicleObj->getLightMotorLorry();
    $getLightMotorLorry = $getLightMotorLorryResult->fetch_assoc();
          
// 7. Functions ID Control

// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control

// 10. Breadcrumb Control    
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column2 = $column2Result->fetch_assoc();
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = $column2["breadcrumb_li_css"];
    $a3 = "breadcrumb-item active d-none";
    $a4 = "breadcrumb-item active d-none";
    $a5 = "breadcrumb-item active d-none";
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = $column2["breadcrumb_li_aria-current"];
    $b3 = "";
    $b4 = "";
    $b5 = "";
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = $column2["breadcrumb_a_href"];
    $c3 = "";
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = '';
    $d4 = '';
    $d5 = '';
    $d6 = '';
    $d7 = '';
    
?>
    <head>   
    <?php
        include_once '../../includes/bootstrap_header_includes.php';
    ?>
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
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="">
                        <div class="card-header">
                            <h6 align="center">
                                Vehicle Service Reminders
                            </h6>
                        </div>
                        <div class="card-body">
                            <h6 align="center">
                               0
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <div class="card-header">
                            <h6 align="center">
                                Ongoing Vehicle Services
                            </h6>
                        </div>
                        <div class="card-body">
                            <h6 align="center">
                               0
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <div class="card-header">
                            <h6 align="center">
                                Test
                            </h6>
                        </div>
                        <div class="card-body">
                            <h6 align="center">
                               Number
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-4">
                    <div class="card" style="">
                        <div class="card-header">
                            <h6 align="center">
                                Test
                            </h6>
                        </div>
                        <div class="card-body">
                            <h6 align="center">
                               Number
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
</html>