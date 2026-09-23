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
    $client_id = $_GET["client_id"]; 
    $functions_idServiceRequests = $_GET["functions_idServiceRequests"]; 
    $functions_modules_id = 20;
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';
//    $getSpecificModuleResult = $moduleObj->getSpecificModule($module_id);
//    $getSpecificModule = $getSpecificModuleResult->fetch_assoc();
//    
//    $getFunctionsModulesByIdResult = $functionsModulesObj->getFunctionsModulesByIdResult($functions_modules_id);
//    $getFunctionsModulesById = $getFunctionsModulesByIdResult->fetch_assoc();
//    
//    $getSpecificClientFunctionsResult = $functionsObj->getSpecificFunctionsRelevantModule($module_id, $functions_modules_id);
    
// 6. Relevant Functions Execution Control
    $getSpecificClientDetailsByClientIdResult = $clientObj->getSpecificClientDetailsByClientId($client_id);
    $getSpecificClientDetailsByClientId = $getSpecificClientDetailsByClientIdResult->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdServiceRequestsResult = $functionsObj->getSpecificFunctionRelevatFunctionIdServiceRequests($functions_idServiceRequests);
    $getSpecificFunctionRelevatFunctionIdServiceRequests = $getSpecificFunctionRelevatFunctionIdServiceRequestsResult->fetch_assoc();
    
// 7. Functions ID Control

// 8. Function Module Control
    $moduleType="client_functions";
//    $moduleType="functions";
    
// 9. Image Control
    
// 10. Breadcrumb Control       
    $column1 = $breadcrumbObj->viewBreadcrumbRow(31);
    $column1 = $column1->fetch_assoc();
    
    $column2 = $breadcrumbObj->viewBreadcrumbRow(2);
    $column2 = $column2->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&client_id=".$client_id;
    
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
    
    $c1 = $column1["breadcrumb_a_href"].$e1.$e2;  
    $c2 = $column2["breadcrumb_a_href"];
    $c3 = "";
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $getSpecificModule["module_name"];
    $d2 = $getSpecificFunctionRelevatFunctionIdServiceRequests["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdServiceRequests["functions_name"];?></h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="">
                        <div class="card-header">
                            <h6 align="center">
                                Test
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
<!--        <div class="container-fluid">
            <div class="row">
                <label>Driver Info:&nbsp;</label>
                <span>Gary Barker</span>
            </div>
            <div class="row" style="background-color:skyblue">
                <div class="container-fluid">
                    <div class="row">
                        <label>Name:&nbsp;</label>
                        <span>Gary Barker</span>
                    </div>
                    <div class="row">
                        <label>Driver ID:&nbsp;</label>
                        <span>111</span>
                    </div>
                    <div class="row">
                        <label>CDL#:&nbsp;</label>
                        <span>AA 987654321</span>
                    </div>
                    <div class="row">
                        <label>Cell Phone:&nbsp;</label>
                        <span>(050)123-1234</span>
                    </div>
                </div>
            </div>
            <div class="row" style="background-color:yellow">
                <div class="col-md-2">Driver Overview</div>
                <div class="col-md-2">Performance</div>
                <div class="col-md-2">Logbook History</div>
                <div class="col-md-2">Expiration</div>
                <div class="col-md-2">Settings</div>
                <div class="col-md-2">Billing</div>
            </div>
            <div class="row">
                <div class="col-md-2">Details</div>
                <div class="col-md-2">Employment History</div>
                <div class="col-md-2">Training Records</div>
                <div class="col-md-2">Medical Info</div>
                <div class="col-md-2">Files</div>
            </div>
        </div>-->
    </body>
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
</html>