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
    $functions_idPendingTrips = $_GET["functions_idPendingTrips"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php'; 

// 6. Relevant Functions Execution Control
    $getCompletedTripsResult = $TripAndRouteObj->getCompletedTrips();
    
// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdPendingTripsResult = $functionsObj->getSpecificFunctionRelevatFunctionIdPendingTrips($functions_idPendingTrips);
    $getSpecificFunctionRelevatFunctionIdPendingTrips = $getSpecificFunctionRelevatFunctionIdPendingTripsResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";
    
// 9.Image Control 
    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(62);
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
    $d3 = $getSpecificFunctionRelevatFunctionIdPendingTrips["functions_name"];
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
        <!--<script src="../../js/jquery-1.12.4.js"></script>-->   
        <!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>-->
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdPendingTrips["functions_name"];?></h4>
            </div>
            <div class="row">
                <table class="table table-hover table-responsive table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col" href="" width="50px"></th>
                            <!--<th scope="col" href="" width="60px"></th>-->
                            <th scope="col">Trip Name</th>
                            <!--<th scope="col">City of the Fleet Located</th>-->
                            <!--<th scope="col">Class of Vehicle</th>-->
                            <!--<th scope="col">Class of Vehicle ID</th>-->
                            <!--<th scope="col">Color</th>-->
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                        while($getCompletedTrips = $getCompletedTripsResult->fetch_assoc()){
                            $selectedViewFleetsImg="";
//                            if($fleetrow["fleetImage_"]==""){
//                                $selectedViewFleetsImg = "../../images/fleet_images/download.jpeg";
//                            }else{
//                                $selectedViewFleetsImg = "../../images/fleet_images/".$fleetrow["fleetImage_"];
//                            }
    ?>
                            <tr>
                                <td><?php echo $number;?></td>
<!--                                <td scope="row">                                   
                                    <a href="view-specific-fleet.php?fleet_id=<?php echo $fleetrow["fleet_id"];?>&module_id=<?php echo $module_id;?>&functions_idViewFleets=<?php echo $functions_idViewFleets;?>&functions_idViewSpecificFleet=43">
                                        <img class="rounded-circle" src="<?php echo $selectedViewFleetsImg ?>" width="35px" height="35px"/>
                                    </a>
                                </td>-->
                                <td><?php echo ucwords($getCompletedTrips["trip_name"]); ?></td>
                                <!--<td><?php echo ucwords($getCompletedTrips["cityOfTheFleetLocated"]); ?></td>-->
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
    <!--<script src="../js/datatable/jquery-3.5.1.js"></script>-->
    <!--<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->
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