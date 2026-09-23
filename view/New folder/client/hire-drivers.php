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
    $functions_idHireDrivers = $_GET["functions_idHireDrivers"]; 
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
    
    $getSpecificFunctionRelevatFunctionIdHireDriversResult = $functionsObj->getSpecificFunctionRelevatFunctionIdHireDrivers($functions_idHireDrivers);
    $getSpecificFunctionRelevatFunctionIdHireDrivers = $getSpecificFunctionRelevatFunctionIdHireDriversResult->fetch_assoc();
    
// 7. Functions ID Control

// 8. Function Module Control
    $moduleType="client_functions";
//    $moduleType="functions";
    
// 9. Image Control
    
// 10. Breadcrumb Control       
    $column1 = $breadcrumbObj->viewBreadcrumbRow(31);
    $column1 = $column1->fetch_assoc();
    
    $column2 = $breadcrumbObj->viewBreadcrumbRow(32);
    $column2 = $column2->fetch_assoc();
    
    $column3 = $breadcrumbObj->viewBreadcrumbRow(2);
    $column3 = $column3->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&client_id=".$client_id;
    $e3 = "&functions_idServiceRequests=".$functions_idServiceRequests;
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = $column2["breadcrumb_li_css"];
    $a3 = $column3["breadcrumb_li_css"];
    $a4 = "breadcrumb-item active d-none";
    $a5 = "breadcrumb-item active d-none";
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = $column2["breadcrumb_li_aria-current"];
    $b3 = $column3["breadcrumb_li_aria-current"];
    $b4 = "";
    $b5 = "";
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"].$e1.$e2;  
    $c2 = $column2["breadcrumb_a_href"].$e1.$e2.$e3.
    $c3 = $column3["breadcrumb_a_href"];
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $getSpecificModule["module_name"];
    $d2 = $getSpecificFunctionRelevatFunctionIdServiceRequests["functions_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdHireDrivers["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdHireDrivers["functions_name"];?></h4>
            </div>
            <div class="row">
                <form action="../../controller/controller/client_controller.php?status=add_unregisteredClient&role_id=<?php echo $role_id;?>&module_id=<?php echo $module_id;?>" method="post" enctype="multipart/form-data">              
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <div id="alertmsg"></div> 
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">1. Select Driver Type</label>
                            </div>
                            <div class="col-md-3">
                                <select class="control-label" name="classOfVehicleId" id="classOfVehicleId">
                                    <!--<option value=""></option>-->
    <?php  
//                                while($getAllClassOfVehicleRow = $getAllClassOfVehicleResult->fetch_assoc()){
    ?>       
                                    <!--<option value="<?php echo $getAllClassOfVehicleRow["class_of_vehicle_id"];?>"><?php echo $getAllClassOfVehicleRow["class_of_vehicle_name"];?></option>-->   
    <?php        
//                                }                             
    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">2. Client Other Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_othername" id="unregisteredClient_othername"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                    </div>
                </form>
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