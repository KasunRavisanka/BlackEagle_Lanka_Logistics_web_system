<!doctype html>
<html>
    <?php
    include_once '../../includes/session.php';
    include_once '../../model/module_model.php';
    include_once '../../model/breadcrumb_model.php'; 
    include_once '../../model/client_model.php'; 
    include_once '../../model/functions_model.php'; 
    include_once '../../model/functions_modules_model.php'; 
    $moduleObj = new Module();
    $breadcrumbObj = new Breadcrumb();
    $clientObj = new Client();
    $functionsObj = new Functions();
    $functionsModulesObj = new Functions_Module();
    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"]; 
    $client_id = $_GET["client_id"]; 
    $functions_modules_id = $module_id;
    
//    include_once '../errors/errorDirect.php';
    
    $getSpecificModuleResult = $moduleObj->getSpecificModule($module_id);
    $getSpecificModule = $getSpecificModuleResult->fetch_assoc();
    
    $getFunctionsModulesByIdResult = $functionsModulesObj->getFunctionsModulesByIdResult($functions_modules_id);
    $getFunctionsModulesById = $getFunctionsModulesByIdResult->fetch_assoc();
    
    $getSpecificFunctionsResult = $functionsObj->getSpecificFunctionsRelevantModule($module_id,$functions_modules_id);  
    
    
    $getSpecificClientDetailsByClientIdResult = $clientObj->getSpecificClientDetailsByClientId($client_id);
    $getSpecificClientDetailsByClientId = $getSpecificClientDetailsByClientIdResult->fetch_assoc();
    
    
    $column1 = $breadcrumbObj->viewBreadcrumbRow(2);
    $column1 = $column1->fetch_assoc();
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = "breadcrumb-item active d-none";
    $a3 = "breadcrumb-item active d-none";
    $a4 = "breadcrumb-item active d-none";
    $a5 = "breadcrumb-item active d-none";
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = "";
    $b3 = "";
    $b4 = "";
    $b5 = "";
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = "";
    $c3 = "";
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $getSpecificModule["module_name"];
    $d2 = '';
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
                include_once 'unregistered_client-navbar1.php';
    ?>      
    <?php 
                include_once 'unregistered_client-modules.php';
    ?>
                <div class="row px-3">
                    <div class="col-md-12">
    <?php
                    include_once 'unregistered_client-navbar2.php';
    ?> 
                    </div>
                </div>
            </div>

            <div class="row">
                <h4 style="text-align:center">Welcome <?php echo $getSpecificClientDetailsByClientId["client_client_othername"];?></h4>
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