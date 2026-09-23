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
    $functions_modules_id = $module_id;
    $functions_idVehicleLicenses = $_GET["functions_idVehicleLicenses"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';   

// 6. Relevant Functions Execution Control
    $getAllVehicleLicensesResults = $LicenseAndPermitObj->getAllVehicleLicenses();
    
    $number;

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdVehicleLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdVehicleLicenses($functions_idVehicleLicenses);
    $getSpecificFunctionRelevatFunctionIdVehicleLicenses = $getSpecificFunctionRelevatFunctionIdVehicleLicensesResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column3 = $column3Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    
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
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = $column2["breadcrumb_a_href"].$e1;
    $c3 = $column3["breadcrumb_a_href"];
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdVehicleLicenses["functions_name"];
    $d4 = '';
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdVehicleLicenses["functions_name"];?></h4>
            </div>           
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>  
            <div class="row">
                <table class="table table-hover table-bordered" id="drivertable">
                    <thead>
                        <tr>
                            <th scope="col" width="50px"></th>
                            <th scope="col" width="60px"></th>
                            <th scope="col">Make and Model</th>
                            <th scope="col"></th>
                            <!--<th scope="col">Email</th>-->
                            <th scope="col">Class of Vehicle</th>
                            <th scope="col">Vehicle No</th>
                            <!--<th scope="col">Insurance Company Name</th>-->
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                    while($getAllVehicleLicenses = $getAllVehicleLicensesResults->fetch_assoc()){
                        $selectedImg = "";
                            if($getAllVehicleLicenses["vehicleImage_"]=="")
                            {
                                $selectedImg = "../../images/driver_images/download.jpeg";
                            }
                            else{
                                $selectedImg = "../../images/vehicle_images/".$getAllVehicleLicenses["vehicleImage_"];
                            }

//                            $driver_id = $driverrow["driver_id"];
//                            $driver_id = base64_encode($driver_id);
//    ?>  
                        <tr>
                            <td><?php echo $number?></td>
                            <td scope="row">
                                <a href="specific-vehicle-licenses.php?vehicle_licenses_id=<?php echo $getAllVehicleLicenses["vehicle_licenses_id"];?>&module_id=<?php echo $module_id;?>&functions_idVehicleLicenses=<?php echo $functions_idVehicleLicenses;?>&functions_idSpecificVehicleLicenses=105">
                                    <img class="rounded-circle" src="<?php echo $selectedImg ?>" width="30px" height="30px"/>
                                </a>
                            </td>
                            <td><?php echo ucwords($getAllVehicleLicenses["make"]." ".$getAllVehicleLicenses["model"]);?></td>
                            <!--<td><?php echo ucwords($driverrow["email"]); ?></td>-->
                            <td><?php echo ucwords($getAllVehicleLicenses["vehicleLicenseHeader"]); ?></td>
                            <td><?php echo ucwords($getAllVehicleLicenses["class_of_vehicle_name"]); ?></td>
                            <td><?php echo ucwords($getAllVehicleLicenses["vehicleNo"]); ?></td>
                            <!--<td><?php echo ucwords($getAllVehicleLicenses["periodOfStart"]." to ".$getAllVehicleLicenses["periodOfEnd"]);?></td>-->
                            <!--<td><?php echo ucwords($getAllVehicleLicenses["insuranceCompanyName"]); ?></td>-->
                            <!--<td><?php echo ucwords($driverrow["address"]); ?></td>-->
                        </tr>    
    <?php
                        $number=$number+1;
                    }
    ?>
                    </tbody>
                </table>
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