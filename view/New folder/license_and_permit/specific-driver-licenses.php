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
    $driver_licenses_id = $_GET["driver_licenses_id"];
    $functions_modules_id = $module_id;
    $functions_idDriverLicenses = $_GET["functions_idDriverLicenses"];
    $functions_idSpecificDriverLicenses = $_GET["functions_idSpecificDriverLicenses"];
    
// 4. Error Control
    include_once '../errors/errorDirect.php';
    
// 5. Common Fetch Assoc Control
    include_once '../common/fetch_assoc.php';   

// 6. Relevant Functions Execution Control
    $getAllDriverLicensesResults = $LicenseAndPermitObj->getAllDriverLicenses();
    
    $getSpecificDriverLicensesResults = $LicenseAndPermitObj->getSpecificDriverLicenses($driver_licenses_id);
    $getSpecificDriverLicenses = $getSpecificDriverLicensesResults->fetch_assoc();

    
    $number;

// 7. Functions ID Control    
    $getSpecificFunctionRelevatFunctionIdDriverLicenseResults = $functionsObj->getSpecificFunctionRelevatFunctionIdDriverLicenses($functions_idDriverLicenses);
    $getSpecificFunctionRelevatFunctionIdDriverLicense = $getSpecificFunctionRelevatFunctionIdDriverLicenseResults->fetch_assoc();
    
    $getSpecificFunctionRelevatFunctionIdSpecificDriverLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses($functions_idSpecificDriverLicenses);
    $getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses = $getSpecificFunctionRelevatFunctionIdSpecificDriverLicensesResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedDriverImg = "";
    if($getSpecificDriverLicenses["driver_driverImage_"]==""){
        $selectedDriverImg = "../../images/driver_images/download.jpeg";
    }else{
        $selectedDriverImg = "../../images/driver_images/".$getSpecificDriverLicenses["driver_driverImage_"];
    }
    $selectedDriverSignatureImg = "";
    if($getSpecificDriverLicenses["driver_licenses_signatureHolder"]==""){
        $selectedDriverSignatureImg = "";
    }else{
        $selectedDriverSignatureImg = "../../images/driver_signatures/".$getSpecificDriverLicenses["driver_licenses_signatureHolder"];
    }
    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(43);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column4 = $column4Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e2 = "&functions_idDriverLicenses=".$functions_idDriverLicenses;
    
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
    $d3 = $getSpecificFunctionRelevatFunctionIdDriverLicense["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses["functions_name"];?> - <?php echo $getSpecificDriverLicenses["driver_otherNames"];?></h4>
            </div>  
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="rounded mx-auto d-block" src="<?php echo $selectedDriverImg?>" width="100px"/>
                </div>             
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
            <div class="container">
                <div class="row">  
                    <div class="col-md-12">
                        <a type="button" class="btn btn-primary" href="update-specific-driver-licenses.php?module_id=<?php echo $module_id;?>&driver_licenses_id=<?php echo $driver_licenses_id;?>&functions_idDriverLicenses=<?php echo $functions_idDriverLicenses;?>&functions_idSpecificDriverLicenses=<?php echo $functions_idSpecificDriverLicenses;?>&functions_idUpdateSpecificDriverLicenses=103">
                            Update
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">1. Surname</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $getSpecificDriverLicenses["driver_licenses_surname"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div> 
                    <div class="col-md-3">
                        <label class="control-label">2. Supplier Email</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="otherNames" id="otherNames" value="<?php echo $getSpecificDriverLicenses["driver_licenses_otherNames"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>      
                <div class="row">
                    <div class="col-md-3">
                            <label class="control-label">3. Date of Birth</label>
                        </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $getSpecificDriverLicenses["driver_licenses_dob"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">4a. Date of issue of the LICENSE</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="issueLicense" id="issueLicense" value="<?php echo $getSpecificDriverLicenses["driver_licenses_issueLicense"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">4b. Date of expiry of the LICENSE</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="expiryLicense" id="expiryLicense" value="<?php echo $getSpecificDriverLicenses["driver_licenses_expiryLicense"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">4c. Issuing Authority</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="issuingAuthority" id="issuingAuthority" value="<?php echo $getSpecificDriverLicenses["driver_licenses_issuingAuthority"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">4d. Administrative Number(NIC)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="NIC" id="NIC" value="<?php echo $getSpecificDriverLicenses["driver_licenses_NIC"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">5. Number of the LICENSE</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="noLicense" id="noLicense" value="<?php echo $getSpecificDriverLicenses["driver_licenses_noLicense"];?>" disabled="disabled"/> 
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">6. Blood Group</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="bloodGroup" id="bloodGroup" value="<?php echo $getSpecificDriverLicenses["driver_licenses_bloodGroup"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">7. Signature of the Holder</label>
                    </div>
                    <div class="col-md-3">
                        <img class="rounded mx-auto d-block" src="<?php echo $selectedDriverSignatureImg?>" width="100px"/>
                    </div>
                    <div class="row d-md-none">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">8. Permanent place of residence(Address)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificDriverLicenses["driver_licenses_address"];?>" disabled="disabled"/>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                <!--Categories of vehicles-->
                            <th scope="col"><label class="control-label">9. Categories of vehicles</label></th>
                <!--Date of Issue per category-->
                            <th scope="col"><label class="control-label">10. Date of Issue per category</label></th>
                <!--Date of Expiry per category-->
                            <th scope="col"><label class="control-label">11. Date of Expiry per category</label></th>
                <!--Restrictions in code form-->
                            <th scope="col"><label class="control-label">12. Restrictions in code form</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">A1</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_a1Issue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_a1Expiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_a1Code"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">A</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_aIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_aExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_aCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">B1</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_b1Issue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_b1Expiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_b1Code"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">B</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_bIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_bExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_bCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">C1</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_c1Issue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_c1Expiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_c1Code"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">C</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_cIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_cExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_cCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">CE</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_ceIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_ceExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_ceCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">D1</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_d1Issue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_d1Expiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_d1Code"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">D</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_dIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_dExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_dCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">DE</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_deIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_deExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_deCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">G1</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_g1Issue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_g1Expiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_g1Code"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">G</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_gIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_gExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_gCode"];?></td>
                        </tr>
                        <tr>
                            <th scope="row">J</th>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_jIssue"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_jExpiry"];?></td>
                            <td scope="row"><?php echo $getSpecificDriverLicenses["driver_licenses_jCode"];?></td>
                        </tr>
                    </tbody>
                </table>              
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>               
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