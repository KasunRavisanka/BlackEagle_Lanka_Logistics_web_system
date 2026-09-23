<!DOCTYPE html>
<html>
<?php
// 1. Session Control
    include_once '../../includes/session.php';
// 2. Object Control
    include_once '../common/objects.php';

// 3. Relevant Functions Control
    $user_id = $_SESSION["user"]["user_id"];
    $supplier_id = $_GET["supplier_id"];
    $module_id = $_GET["module_id"];
    $functions_modules_id = $module_id;
    $functions_idViewSuppliers = $_GET["functions_idViewSuppliers"];
    $functions_idViewSpecificSupplier = $_GET["functions_idViewSpecificSupplier"];

// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';  
    
// 6. Relevant Functions Execution Control      
    $getSpecificSupplierResult = $supplierObj->getSpecificSupplier($supplier_id);
    $getSpecificSupplierRow = $getSpecificSupplierResult->fetch_assoc();
     
// 7. Functions ID Control   
    $getSpecificFunctionRelevatFunctionIdViewSuppliersResult = $functionsObj->getSpecificFunctionRelevatFunctionIdViewSuppliers($functions_idViewSuppliers);
    $getSpecificFunctionRelevatFunctionIdViewSuppliers = $getSpecificFunctionRelevatFunctionIdViewSuppliersResult->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdViewSpecificSupplierResult = $functionsObj->getSpecificFunctionRelevatFunctionIdViewSpecificSupplier($functions_idViewSpecificSupplier);
    $getSpecificFunctionRelevatFunctionIdViewSpecificSupplier = $getSpecificFunctionRelevatFunctionIdViewSpecificSupplierResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedSupplierImg = "";
    if($getSpecificSupplierRow["supplier_logo"]==""){
        $selectedSupplierImg = "../../images/supplier_images/download.jpeg";
    }else{
        $selectedSupplierImg = "../../images/supplier_images/".$getSpecificSupplierRow["supplier_logo"];
    }
    
// 10. Breadcrumb Control    
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(28);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(29);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&functions_idViewSuppliers=".$functions_idViewSuppliers;
    
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
    $d3 = $getSpecificFunctionRelevatFunctionIdViewSuppliers["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdViewSpecificSupplier["functions_name"]; //    $d4 = $specificVehicleDetails["make"]." ".$specificVehicleDetails["model"];
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
                <h4 style="text-align:center"><?php echo $getSpecificSupplierRow["supplier_name"];?></h4>
            </div>        
            <div>
                <img class="rounded mx-auto d-block" src="<?php echo $selectedSupplierImg?>" width="400px" />
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">1. Supplier Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierName" id="supplierName" value="<?php echo $getSpecificSupplierRow["supplier_name"];?>" disabled="disabled"/> 
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">2. Supplier Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierEmail" id="supplierEmail" value="<?php echo $getSpecificSupplierRow["supplier_email"];?>" disabled="disabled"/> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>                                 
                </div> 
                <div class="row">
                    <div class="col-md-4 mx-auto d-block">
                        <!--<a type="button" class="btn btn-primary" href="update-vehicle.php?vehicle_id=<?php // echo $vehicle_id;?>&module_id=<?php // echo $module_id;?>">-->
                        <a type="button" class="btn btn-primary" href="update-specific-supplier.php?module_id=<?php echo $module_id;?>&supplier_id=<?php echo $supplier_id?>&functions_idViewSuppliers=<?php echo $functions_idViewSuppliers;?>&functions_idViewSpecificSupplier=<?php echo $functions_idViewSpecificSupplier;?>&functions_idUpdateSpecificSupplier=25">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            &nbsp;To Update
                        </a>
                        <button type="" class="btn btn-danger">
                            <span class="glyphicon glyphicon-refresh"></span>
                            &nbsp;For Sell
                        </button>
                        <button type="" class="btn btn-danger">
                            <span class="glyphicon glyphicon-refresh"></span>
                            &nbsp;Change the Fleet
                        </button>
                    </div>  
                </div>
            </div>  
        </div>
    </body>
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
</html>    