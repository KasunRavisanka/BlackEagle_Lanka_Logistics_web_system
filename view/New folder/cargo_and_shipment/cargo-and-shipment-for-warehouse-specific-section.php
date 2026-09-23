<!DOCTYPE html>
<?php
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';

// 3. Relevant Functions Control    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"];
    $cargo_and_shipment_id = $_GET["cargo_and_shipment_id"];
    $functions_modules_id = $module_id;
    $functions_idCargoAndShipmentForWarehouse = $_GET["functions_idCargoAndShipmentForWarehouse"];
    $functions_idCargoAndShipmentForWarehouseSpecificSection = $_GET["functions_idCargoAndShipmentForWarehouseSpecificSection"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php'; 

// 6. Relevant Functions Execution Control
    $getSpecificCargoAndShipmentForWarehouseResult = $CargoAndShipmentObj->getSpecificCargoAndShipmentForWarehouse($cargo_and_shipment_id);
    $getSpecificCargoAndShipmentForWarehouse = $getSpecificCargoAndShipmentForWarehouseResult->fetch_assoc();
    
    $getSpecificCargoAndShipmentForWarehouseSectionsResult = $CargoAndShipmentObj->getSpecificCargoAndShipmentForWarehouseSections($cargo_and_shipment_id);  

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseResult = $functionsObj->getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouse($functions_idCargoAndShipmentForWarehouse);
    $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouse = $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseResult->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseSpecificSectionResult = $functionsObj->getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseSpecificSection($functions_idCargoAndShipmentForWarehouseSpecificSection);
    $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseSpecificSection = $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseSpecificSectionResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control

// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(60);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(61);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&functions_idCargoAndShipmentForWarehouse=".$functions_idCargoAndShipmentForWarehouse;
    
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
    $d3 = $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouse["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouseSpecificSection["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdCargoAndShipmentForWarehouse["functions_name"];?></h4>
                <h5 style="text-align:center"><?php echo $getSpecificCargoAndShipmentForWarehouse["cargo_and_shipment_name"];?></h5>
            </div>

            <div class="row px-3">
                <h5 style="text-align:start">Select Warehouse</h5>
            </div>
            <div class="row px-3">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col" href="" width="50px"></th>
                            <th scope="col">Cargo and Shipment Name</th>
                            <!--<th scope="col"></th>-->
                            <!--<th scope="col">City of the Warehouse Located</th>-->
                            <!--<th scope="col">Class of Vehicle</th>-->
                            <!--<th scope="col">Class of Vehicle ID</th>-->
                            <!--<th scope="col">Color</th>-->
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                        while($getSpecificCargoAndShipmentForWarehouseSections = $getSpecificCargoAndShipmentForWarehouseSectionsResult->fetch_assoc()){
//                            $selectedWarehouseSectionsImg="";
//                            if($getAllCargoAndShipmentForWarehouse["warehouseImage_"]==""){
//                                $selectedWarehouseSectionsImg = "../../images/fleet_images/download.jpeg";
//                            }else{
//                                $selectedWarehouseSectionsImg = "../../images/warehouse_images/".$getAllCargoAndShipmentForWarehouse["warehouseImage_"];
//                            }
    ?>
                            <tr>
                                <td><?php echo $number;?></td>
                                <td><?php echo ucwords($getSpecificCargoAndShipmentForWarehouseSections["cargo_and_shipment_section_name"]); ?></td>
<!--                                <td>
                                    <a class="btn btn-primary" href="cargo-and-shipment-for-warehouse-specific-section.php?status=addCargoAndShipmentForWarehouse&warehouse_id=<?php echo $getAllCargoAndShipmentForWarehouse["cargo_and_shipment_id"];?>&module_id=<?php echo $module_id;?>&functions_idCargoAndShipmentForWarehouseSpecificSection=127">
                                        Select
                                    </a>
                                </td>-->
                                <!--<td><?php echo ucwords($getAllCargoAndShipmentForWarehouse["cityOfTheWarehouseLocated"]); ?></td>-->
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