<!DOCTYPE html>
<?php
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';

// 3. Relevant Functions Control    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"];
    $warehouse_id = $_GET["warehouse_id"];
    $cargo_and_shipment_id = $_GET["cargo_and_shipment_id"];
    $functions_modules_id = $module_id;
    $functions_idAddCargoAndShipmentProfileWarehouseSections = $_GET["functions_idAddCargoAndShipmentProfileWarehouseSections"];
    $functions_idAddCargoAndShipmentProfileWarehouseSectionsPage2 = $_GET["functions_idAddCargoAndShipmentProfileWarehouseSectionsPage2"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php'; 

// 6. Relevant Functions Execution Control
    $getSpecificWarehouseSectionsWithoutCargoAndShipmentResult = $CargoAndShipmentObj->getSpecificWarehouseSectionsWithoutCargoAndShipment($warehouse_id);
       

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsResult = $functionsObj->getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSections($functions_idAddCargoAndShipmentProfileWarehouseSections);
    $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSections = $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsResult->fetch_assoc();

    $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsPage2Result = $functionsObj->getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsPage2($functions_idAddCargoAndShipmentProfileWarehouseSectionsPage2);
    $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsPage2 = $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsPage2Result->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control

// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(60);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(59);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&functions_idAddCargoAndShipmentProfileWarehouseSections=".$functions_idAddCargoAndShipmentProfileWarehouseSections;
    
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
    $c3 = $column3["breadcrumb_a_href"].$e1.$e2;
    $c4 = $column4["breadcrumb_a_href"];
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSections["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSectionsPage2["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdAddCargoAndShipmentProfileWarehouseSections["functions_name"];?></h4>
            </div>

            <div class="row px-3">
                <h5 style="text-align:start">Select Warehouse Section for assign Cargo and Shipment profile</h5>
            </div>
            <div class="row px-3">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col" href="" width="50px"></th>
                            <!--<th scope="col" href="" width="60px"></th>-->
                            <th scope="col"> Name</th>
                            <th scope="col"> </th>
                            <!--<th scope="col">City of the Warehouse Located</th>-->
                            <!--<th scope="col">Class of Vehicle</th>-->
                            <!--<th scope="col">Class of Vehicle ID</th>-->
                            <!--<th scope="col">Color</th>-->
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                        while($getSpecificWarehouseSectionsWithoutCargoAndShipment = $getSpecificWarehouseSectionsWithoutCargoAndShipmentResult->fetch_assoc()){
//                            $selectedWarehouseSectionsImg="";
//                            if($getAllCargoAndShipmentProfile["warehouseImage_"]==""){
//                                $selectedWarehouseSectionsImg = "../../images/fleet_images/download.jpeg";
//                            }else{
//                                $selectedWarehouseSectionsImg = "../../images/warehouse_images/".$getAllCargoAndShipmentProfile["warehouseImage_"];
//                            }
    ?>
                            <tr>
                                <td><?php echo $number;?></td>
<!--                                <td scope="row">                                   
                                    <a href="../../controller/controller/cargoAndShipment_controller.php?status=addCargoAndShipmentForWarehouse&warehouse_id=<?php echo $getAllWarehouseWithoutCargoAndShipment["warehouse_id"];?>&module_id=<?php echo $module_id;?>">
                                        <img class="rounded-circle" src="<?php echo $selectedWarehouseSectionsImg ?>" width="35px" height="35px"/>
                                    </a>
                                </td>-->
                                <td><?php echo ucwords($getSpecificWarehouseSectionsWithoutCargoAndShipment["warehouses_sections_name"]); ?></td>
                                <td scope="row">                                   
                                    <a class="btn btn-primary" href="../../controller/controller/cargoAndShipment_controller.php?status=addCargoAndShipmentForWarehouseSections&warehouse_id=<?php echo $warehouse_id;?>&warehouse_section_id=<?php echo $getSpecificWarehouseSectionsWithoutCargoAndShipment["warehouses_sections_id"];?>&cargo_and_shipment_id=<?php echo $cargo_and_shipment_id;?>&module_id=<?php echo $module_id;?>">
                                        Select
                                    </a>
                                </td>
                                <!--<td><?php echo ucwords($getSpecificWarehouseSectionsWithoutCargoAndShipment["cityOfTheWarehouseLocated"]); ?></td>-->
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