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
    $functions_idAddSupplier = $_GET["functions_idAddSupplier"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';
    
// 6. Relevant Functions Execution Control
    
// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdAddSupplierResult = $functionsObj->getSpecificFunctionRelevatFunctionIdAddSupplier($functions_idAddSupplier);
    $getSpecificFunctionRelevatFunctionIdAddSupplier = $getSpecificFunctionRelevatFunctionIdAddSupplierResult->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";
    
// 9.Image Control
    
// 10. Breadcrumb Control   
    $column1 = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1->fetch_assoc();
    
    $column2 = $breadcrumbObj->viewBreadcrumbRow(28);
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
    $d3 = $getSpecificFunctionRelevatFunctionIdAddSupplier["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdAddSupplier["functions_name"];?></h4>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <form action="../../controller/controller/supplier_controller.php?status=add_supplier&module_id=<?php echo $module_id;?>" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">1. Supplier Surname</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierSurname" id="supplierSurname"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">2. Supplier Other Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierOthername" id="supplierOthername"/>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">3. Supplier Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierEmail" id="supplierEmail"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">4. Supplier NIC</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierNIC" id="supplierNIC"/>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">5. Supplier Mobile Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierMobileNumber" id="supplierMobileNumber"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">6. Supplier Address</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplierAddress" id="supplierAddress"/>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">7. Supplier Date of Birth</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="supplier_dob" id="supplier_dob"/>
                        </div>    
                        <div class="col-md-3">
                            <label class="control-label">8. Supplier Image</label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" class="form-control" name="supplier_image" id="supplier_image" onchange="readSupplier_imageURL(this)"/>                      
                            <img id="supplierImagePrev"/>                         
                        </div>
                    </div>                       
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">9. Add Password</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_password1" id="supplier_password1"/>
                        </div>    
                        <div class="col-md-3">
                            <label class="control-label">10. Re-add the Password</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_password2" id="supplier_password2"/>
                        </div>  
                    </div>                       
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div>
                        <h6 class="text-danger">*If Supplier have a company</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">11. Supplier Profession</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_prefession" id="supplier_prefession"/>
                        </div>                               
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>                      
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">12. Supplier Company Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_companyName" id="supplier_companyName"/>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">13. Supplier Company Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_companyEmail" id="supplier_companyEmail"/>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">14. Supplier Company Contact Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="supplier_companyContactNumber" id="supplier_companyContactNumber"/>
                        </div>     
                        <div class="col-md-3">
                            <label class="control-label">15. Supplier Company Logo</label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" class="form-control" name="supplier_companyLogo" id="supplier_companyLogo" onchange="readURLsupplierCompanyLogo(this)"/>
                            <img id="supplierCompanyLogoPrev"/>
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>                
                    <div class="row ">
                        <div class="col-md-3 mx-auto d-block">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-disk"></span>
                                &nbsp;Add Warehouse
                            </button>
                            <button type="" class="btn btn-danger">
                                <span class="glyphicon glyphicon-refresh"></span>
                                &nbsp;Reset
                            </button>
                        </div>  
                    </div>
                    
                </div>
            </form>
        </div>
    </body>       
    <?php
        include_once '../../includes/bootstrap_footer.php';
    ?>
    <?php
        include_once '../../includes/jquery_includes.php';
    ?>
<!--    <script src="../js/loginvalidation.js"></script>-->
    <script type="text/javascript">
        function readSupplier_imageURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#supplierImagePrev')
                        .attr('src', e.target.result)
                        .height(70)
                        .width(80);
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script type="text/javascript">
        function readURLsupplierCompanyLogo(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#supplierCompanyLogoPrev')
                        .attr('src', e.target.result)
                        .height(70)
                        .width(80);
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script src="../../js/js/uservalidation.js"></script>
</html>
