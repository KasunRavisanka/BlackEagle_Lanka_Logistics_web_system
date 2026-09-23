<!DOCTYPE html>
<?php
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';

// 3. Relevant Functions Control    
    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"];
    $functions_modules_id = $module_id;
    $functions_idViewSuppliers = $_GET["functions_idViewSuppliers"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';

// 6. Relevant Functions Execution Control
    $getAllSupplierResult = $supplierObj->getAllSuppliers();
     
// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdViewSuppliersResult = $functionsObj->getSpecificFunctionRelevatFunctionIdViewSuppliers($functions_idViewSuppliers);
    $getSpecificFunctionRelevatFunctionIdViewSuppliers = $getSpecificFunctionRelevatFunctionIdViewSuppliersResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control

// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(28);
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
    $d3 = $getSpecificFunctionRelevatFunctionIdViewSuppliers["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdViewSuppliers["functions_name"];?></h4>
            </div>
            <div class="row px-3">
                <table class="table table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col" href="" width="50px"></th>
                            <th scope="col" href="" width="60px"></th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Supplier Email</th>
                            <!--<th scope="col">Class of Vehicle</th>-->
                            <!--<th scope="col">Class of Vehicle ID</th>-->
                            <!--<th scope="col">Color</th>-->
                            <!--<th scope="col">Address</th>-->
                        </tr>
                    </thead>
                    <tbody>
    <?php
                        while($getAllSupplierRow = $getAllSupplierResult->fetch_assoc()){
                            $selectedSupplierLogo="";
                            if($getAllSupplierRow["supplier_company_logo"]==""){
                                $selectedSupplierLogo = "../../images/supplier_images/download.jpeg";
                            }else{
                                $selectedSupplierLogo = "../../images/supplier_images/".$getAllSupplierRow["supplier_company_logo"];
                            }
    ?>
                            <tr>
                                <td><?php echo $number;?></td>
                                <td scope="row">                                   
                                    <a href="view-specific-supplier.php?supplier_id=<?php echo $getAllSupplierRow["supplier_id"];?>&module_id=<?php echo $module_id;?>&functions_idViewSuppliers=<?php echo $functions_idViewSuppliers;?>&functions_idViewSpecificSupplier=20">
                                        <img class="rounded-circle" src="<?php echo $selectedSupplierLogo;?>" height="35px"/>
                                    </a>
                                </td>
                                <td><?php echo ucwords($getAllSupplierRow["supplier_othername"]);?></td>
                                <td><?php echo ucwords($getAllSupplierRow["supplier_email"]);?></td>
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