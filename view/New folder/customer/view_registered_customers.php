<!DOCTYPE html>
<html>
<?php
    include_once '../../includes/session.php';
    include_once '../../model/module_model.php';
    include_once '../../model/driver_model.php';
    include_once '../../model/breadcrumb_model.php';
    include_once '../../model/customer_model.php';
    include_once '../../model/functions_model.php';
    include_once '../../model/functions_modules_model.php'; 
    $moduleObj = new Module();
    $driverObj = new Driver();
    $breadcrumbObj = new Breadcrumb();
    $customerObj = new Customer();
    $functionsObj = new Functions();
    $functionsModulesObj = new Functions_Module();
    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"];
    $functions_modules_id = $module_id;
    $functions_idViewRegisteredCustomers = $_GET["functions_idViewRegisteredCustomers"];
    
    include_once '../errors/errorDirect.php';
    
    $getSpecificModuleResult = $moduleObj->getSpecificModule($module_id);
    $getSpecificModule = $getSpecificModuleResult->fetch_assoc();
    
    $getFunctionsModulesByIdResult = $functionsModulesObj->getFunctionsModulesByIdResult($functions_modules_id);
    $getFunctionsModulesById = $getFunctionsModulesByIdResult->fetch_assoc();
    
    $getSpecificFunctionsResult = $functionsObj->getSpecificFunctionsRelevantModule($module_id,$functions_modules_id);  
    
    
    $getSpecificFunctionRelevatFunctionIdViewRegisteredCustomersResult = $functionsObj->getSpecificFunctionRelevatFunctionIdViewRegisteredCustomers($functions_idViewRegisteredCustomers);
    $getSpecificFunctionRelevatFunctionIdViewRegisteredCustomers = $getSpecificFunctionRelevatFunctionIdViewRegisteredCustomersResult->fetch_assoc();
    
    $getAllRegisteredCustomersResult = $customerObj->getAllRegisteredCustomers();
            
    $column1 = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1->fetch_assoc();
    
    $column2 = $breadcrumbObj->viewBreadcrumbRow(25);
    $column2 = $column2->fetch_assoc();
    
    $column3 = $breadcrumbObj->viewBreadcrumbRow(2);
    $column3 = $column3->fetch_assoc();
    
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
    $d3 = $getSpecificFunctionRelevatFunctionIdViewRegisteredCustomers["functions_name"];
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
                include_once 'customer_navbar1.php';
    ?>      
    <?php 
                include_once 'customer-modules.php';
    ?>
                <div class="row px-3">
                    <div class="col-md-12">
    <?php
                    include_once 'customer_navbar2.php';
    ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 style="text-align:center">View Registered Customers</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>    
            </div>  
            <div class="row">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Name</th>
                            <!--<th scope="col">Client Email</th>-->
                            <!--<th scope="col">Client Post</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                    while($getAllRegisteredCustomersRow = $getAllRegisteredCustomersResult->fetch_assoc()){
                        $selectedClientImg="";
                        if($getAllRegisteredCustomersRow["client_client_image"]==""){                            
                            $selectedClientImg = "../../images/client_images/download.jpeg";
                        }
                        else{
                            $selectedClientImg = "../../images/client_images/".$getAllRegisteredCustomersRow["client_client_image"];
                        }
                        $selectedComapnyImg="";
                        if($getAllRegisteredCustomersRow["client_company_image"]==""){                            
                            $selectedComapnyImg = "../../images/company_images/download.jpeg";
                        }
                        else{
                            $selectedComapnyImg = "../../images/company_images/".$getAllRegisteredCustomersRow["client_company_image"];
                        }

//                            $driver_id = $driverrow["driver_id"];
//                            $driver_id = base64_encode($driver_id);
    ?>  
                        <tr>
                            <td scope="row">
                                <a href="view-specific-driver.php?driver_id=<?php echo $getAllRegisteredCustomersRow["client_id"];?>&module_id=<?php echo $module_id;?>&functions_idViewRegisteredCustomers=<?php echo $functions_idViewRegisteredCustomers;?>&functions_idViewSpecificDriver=23">
                                    <img class="rounded-circle" src="<?php echo $selectedClientImg;?>" height="30px"/>
                                </a>
                            </td>
                            <td><?php echo ucwords($getAllRegisteredCustomersRow["client_client_othername"]);?></td>
                            <td><?php echo ucwords($getAllRegisteredCustomersRow["client_company_name"]);?></td>
                            <td>
                                <a>
                                    <img class="rounded-circle" src="<?php echo $selectedComapnyImg;?>" height="30px"/>
                                </a>
                            </td>
                            <!--<td><?php echo ucwords($getAllRegisteredCustomersRow["client_client_email"]);?></td>-->
                            <!--<td><?php echo ucwords($getAllRegisteredCustomersRow["client_client_prof"]);?></td>-->
                        </tr>    
    <?php
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
//        include_once '../../includes/jquery_includes.php';
    ?>
    <script>
        $(document).ready(function(){
            $("#table").DataTable();
        });
    </script>
</html>