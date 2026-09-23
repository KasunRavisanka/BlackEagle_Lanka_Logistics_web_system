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
    $functions_idVehicleMaintenance = 61;
    $functions_idVehicleSpareParts = 64;
    $functions_idHubs = $_GET["functions_idHubs"];
    $functions_modules_id = 42;
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php'; 

// 6. Relevant Functions Execution Control    
    $getAllVehicleResult = $vehicleObj->getAllVehicle();
    
    $getAllNewHubsResult = $maintenanceObj->getAllNewHubs();
    
    $getAllClassOfVehicleTabResult = $vehicleObj->getAllClassOfVehicle();
    
    $getAllClassOfVehiclesTableSelectResult = $vehicleObj->getAllClassOfVehicle();
    
// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdVehicleMaintenanceResult = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleMaintenance($functions_idVehicleMaintenance);
    $getSpecificFunctionRelevatFunctionIdVehicleMaintenance = $getSpecificFunctionRelevatFunctionIdVehicleMaintenanceResult->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdVehicleSparePartsResult = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleSpareParts($functions_idVehicleSpareParts);
    $getSpecificFunctionRelevatFunctionIdVehicleSpareParts = $getSpecificFunctionRelevatFunctionIdVehicleSparePartsResult->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdHubsResult = $functionsObj->getSpecificFunctionRelevatFunctionIdHubs($functions_idHubs);
    $getSpecificFunctionRelevatFunctionIdHubs = $getSpecificFunctionRelevatFunctionIdHubsResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control

// 10. Breadcrumb Control    
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(12);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(13);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(14);
    $column4 = $column4Result->fetch_assoc();
    
    $column5Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column5 = $column5Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&functions_idVehicleMaintenance=".$functions_idVehicleMaintenance;
    $e3 = "&functions_idVehicleSpareParts=".$functions_idVehicleSpareParts;
    
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
    $c3 = $column3["breadcrumb_a_href"].$e1.$e2;
    $c4 = $column4["breadcrumb_a_href"].$e1.$e2.$e3;
    $c5 = $column5["breadcrumb_a_href"];
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdVehicleMaintenance["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdVehicleSpareParts["functions_name"];
    $d5 = $getSpecificFunctionRelevatFunctionIdHubs["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdHubs["functions_name"];?></h4>
            </div>
            <div class="row">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col" width="50px"></th>
                            <th scope="col" width="60px"></th>
                            <th scope="col">Hub Name</th>
                            <th scope="col">Hub Position</th>
                            <th scope="col">Hub Brand</th>
                            <th scope="col">Hub Available Stock</th>
                            <th scope="col">Hub Stock Max</th>
                            <th scope="col">Hub Stock Min</th>
                            <th scope="col">Hub Arrived Stock</th>
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>                
     <?php  
                        while($getAllNewHubsRow = $getAllNewHubsResult->fetch_assoc()){
                            $selectedNewHubsImg="";
                            if($getAllNewHubsRow["new_hubs_images"]==""){
                                $selectedNewHubsImg = "../../images/new_hubs_images/download.jpeg";
                            }
                            else{
                                $selectedNewHubsImg = "../../images/new_hubs_images/".$getAllNewHubsRow["new_hubs_images"];
                            }
    ?>                       
                            <tr>
                                <td><?php echo $number;?></td>
                                <td scope="row"><img class="rounded-circle" src="<?php echo $selectedNewHubsImg;?>" width="60px"/></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_name"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_positions_name"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_brands_name"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_available_stocks"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_stocks_max"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_stocks_min"]);?></td>
                                <td><?php echo ucwords($getAllNewHubsRow["new_hubs_arrived_stocks"]);?></td>
                            </tr> 
    <?php
                            $number = $number + 1;
                        }
    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
    <script>
        $(document).ready(function(){
            $("#table").DataTable();
        });
    </script>
</html>