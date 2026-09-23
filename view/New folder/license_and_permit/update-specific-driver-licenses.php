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
    $functions_idUpdateSpecificDriverLicenses = $_GET["functions_idUpdateSpecificDriverLicenses"];
    
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
    
    $getSpecificFunctionRelevatFunctionIdUpdateSpecificDriverLicensesResults = $functionsObj->getSpecificFunctionRelevatFunctionIdUpdateSpecificDriverLicenses($functions_idUpdateSpecificDriverLicenses);
    $getSpecificFunctionRelevatFunctionIdUpdateSpecificDriverLicenses = $getSpecificFunctionRelevatFunctionIdUpdateSpecificDriverLicensesResults->fetch_assoc();
    
// 8. Function Module Control
    $moduleType = "functions";

// 9.Image Control
    $selectedDriverImg = "";
    if($getSpecificDriverLicenses["driverImage_"]==""){
        $selectedDriverImg = "../../images/driver_images/download.jpeg";
    }else{
        $selectedDriverImg = "../../images/driver_images/".$getSpecificDriverLicenses["driverImage_"];
    }
    $selectedDriverSignatureImg = "";
    if($getSpecificDriverLicenses["signatureHolder"]==""){
        $selectedDriverSignatureImg = "";
    }else{
        $selectedDriverSignatureImg = "../../images/driver_signatures/".$getSpecificDriverLicenses["signatureHolder"];
    }
    
// 10. Breadcrumb Control
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(1);
    $column1 = $column1Result->fetch_assoc();
    
    $column2Result = $breadcrumbObj->viewBreadcrumbRow(42);
    $column2 = $column2Result->fetch_assoc();
    
    $column3Result = $breadcrumbObj->viewBreadcrumbRow(43);
    $column3 = $column3Result->fetch_assoc();
    
    $column4Result = $breadcrumbObj->viewBreadcrumbRow(44);
    $column4 = $column4Result->fetch_assoc();
    
    $column5Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column5 = $column5Result->fetch_assoc();
    
    $e1 = "?module_id=".$module_id;
    $e4 = "&driver_licenses_id=".$driver_licenses_id;
    $e2 = "&functions_idDriverLicenses=".$functions_idDriverLicenses;
    $e3 = "&functions_idUpdateSpecificDriverLicenses=".$functions_idSpecificDriverLicenses;
    
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
    $c4 = $column4["breadcrumb_a_href"].$e1.$e2.$e3.$e4;
    $c5 = $column5["breadcrumb_a_href"];
    $c6 = "";
    $c7 = "";
    
    $d1 = $column1["breadcrumb_a_content"];
    $d2 = $getSpecificModule["module_name"];
    $d3 = $getSpecificFunctionRelevatFunctionIdDriverLicense["functions_name"];
    $d4 = $getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses["functions_name"];    
    $d5 = $getSpecificFunctionRelevatFunctionIdUpdateSpecificDriverLicenses["functions_name"];
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
                <h4 style="text-align:center"><?php echo $getSpecificFunctionRelevatFunctionIdSpecificDriverLicenses["functions_name"];?> - <?php echo $getSpecificDriverLicenses["otherNames"];?></h4>
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
                <form action="../../controller/controller/license_permit_controller.php?status=update_specific_driver_licenses&driver_licenses_id=<?php echo $driver_licenses_id;?>&module_id=<?php echo $module_id;?>&functions_idDriverLicenses=<?php echo $functions_idDriverLicenses;?>&functions_idSpecificDriverLicenses=<?php echo $functions_idSpecificDriverLicenses;?>" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">  
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="row">
                <div class="col-md-12">&nbsp;</div>    
            </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <div id="alertmsg"></div> 
                            </div>
                        </div>
                        <div class="row">
                <!--Surname-->
                            <div class="col-md-3">
                                <label class="control-label">1. Surname</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="surname" id="surname" value="<?php echo $getSpecificDriverLicenses["surname"];?>"/>
                            </div>
                <!--Other Names-->
                            <div class="col-md-3">
                                <label class="control-label">2. Other Names</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="otherNames" id="otherNames" value="<?php echo $getSpecificDriverLicenses["otherNames"];?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                <!--Date of Birth-->
                            <div class="col-md-3">
                                <label class="control-label">3. Date of Birth</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $getSpecificDriverLicenses["dob"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                <!--Date of issue of the LICENSE-->
                            <div class="col-md-3">
                                <label class="control-label">4a. Date of issue of the LICENSE</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="issueLicense" id="issueLicense" value="<?php echo $getSpecificDriverLicenses["issueLicense"];?>"/>
                            </div>
                <!--Date of expiry of the LICENSE-->
                            <div class="col-md-3">
                                <label class="control-label">4b. Date of expiry of the LICENSE</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="expiryLicense" id="expiryLicense" value="<?php echo $getSpecificDriverLicenses["expiryLicense"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">     
                <!--Date of issue of the LICENSE-->
                            <div class="col-md-3">
                            <label class="control-label">4c. Issuing Authority</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="issuingAuthority" id="issuingAuthority" value="<?php echo $getSpecificDriverLicenses["issuingAuthority"];?>"/>
                            </div>
                <!--Administrative Number(NIC)-->            
                            <div class="col-md-3">
                                <label class="control-label">4d. Administrative Number(NIC)</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="NIC" id="NIC" value="<?php echo $getSpecificDriverLicenses["NIC"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">    
                <!--Number of the LICENSE-->
                            <div class="col-md-3">
                                <label class="control-label">5. Number of the LICENSE</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="noLicense" id="noLicense" value="<?php echo $getSpecificDriverLicenses["noLicense"];?>"/>
                            </div>
                <!--Blood Group-->           
                            <div class="col-md-3">
                                <label class="control-label">6. Blood Group</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="bloodGroup" id="bloodGroup" value="<?php echo $getSpecificDriverLicenses["bloodGroup"];?>"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">    
                <!--Signature of the Holder-->
                            <div class="col-md-3">
                                <label class="control-label">7. Signature of the Holder</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="signatureHolder" id="signatureHolder" value="<?php echo $getSpecificDriverLicenses; ?>" onchange="readURLdriverSignatureImage(this)"/>
                                <img src="<?php echo $selectedDriverSignatureImg; ?>" width="80" id="driverSignatureImagePrev"/>
                            </div>
                <!--Permanent place of residence-->
                            <div class="col-md-3">
                                <label class="control-label">8. Permanent place of residence(Address)</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo $getSpecificDriverLicenses["address"];?>"/>
                            </div>                                                              
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                <!--Driver Image-->
                            <div class="col-md-3">
                                <label class="control-label">9. Driver Image</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="driverImage" id="driverImage" value="<?php echo $selectedDriverImg; ?>" onchange="readURLdriverImage(this)"/></input>
                                <img src="<?php echo $selectedDriverImg; ?>" width="80" id="driverImagePrev"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <table class="table table-dark table-bordered">
                                <thead>
                                    <tr>
                            <!--Categories of vehicles-->
                                        <td scope="col"><label class="control-label">10. Categories of vehicles</label></td>
                            <!--Date of Issue per category-->
                                        <td scope="col"><label class="control-label">11. Date of Issue per category</label></td>
                            <!--Date of Expiry per category-->
                                        <td scope="col"><label class="control-label">12. Date of Expiry per category</label></td>
                            <!--Restrictions in code form-->
                                        <td scope="col"><label class="control-label">13. Restrictions in code form</label></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">A1</td>
                                        <td scope="row"><input type="date" class="form-control" name="a1Issue" id="a1Issue" value="<?php echo $getSpecificDriverLicenses["a1Issue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="a1Expiry" id="a1Expiry" value="<?php echo $getSpecificDriverLicenses["a1Expiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="a1Code" id="a1Code" value="<?php echo $getSpecificDriverLicenses["a1Code"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">A</td>
                                        <td scope="row"><input type="date" class="form-control" name="aIssue" id="aIssue" value="<?php echo $getSpecificDriverLicenses["aIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="aExpiry" id="aExpiry" value="<?php echo $getSpecificDriverLicenses["aExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="aCode" id="aCode" value="<?php echo $getSpecificDriverLicenses["aCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">B1</td>
                                        <td scope="row"><input type="date" class="form-control" name="b1Issue" id="b1Issue" value="<?php echo $getSpecificDriverLicenses["b1Issue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="b1Expiry" id="b1Expiry" value="<?php echo $getSpecificDriverLicenses["b1Expiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="b1Code" id="b1Code" value="<?php echo $getSpecificDriverLicenses["b1Code"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">B</td>
                                        <td scope="row"><input type="date" class="form-control" name="bIssue" id="bIssue" value="<?php echo $getSpecificDriverLicenses["bIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="bExpiry" id="bExpiry" value="<?php echo $getSpecificDriverLicenses["bExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="bCode" id="bCode" value="<?php echo $getSpecificDriverLicenses["bCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">C1</td>
                                        <td scope="row"><input type="date" class="form-control" name="c1Issue" id="c1Issue" value="<?php echo $getSpecificDriverLicenses["c1Issue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="c1Expiry" id="c1Expiry" value="<?php echo $getSpecificDriverLicenses["c1Expiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="c1Code" id="c1Code" value="<?php echo $getSpecificDriverLicenses["c1Code"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">C</td>
                                        <td scope="row"><input type="date" class="form-control" name="cIssue" id="cIssue" value="<?php echo $getSpecificDriverLicenses["cIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="cExpiry" id="cExpiry" value="<?php echo $getSpecificDriverLicenses["cExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="cCode" id="cCode" value="<?php echo $getSpecificDriverLicenses["cCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">CE</td>
                                        <td scope="row"><input type="date" class="form-control" name="ceIssue" id="ceIssue" value="<?php echo $getSpecificDriverLicenses["ceIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="ceExpiry" id="ceExpiry" value="<?php echo $getSpecificDriverLicenses["ceExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="ceCode" id="ceCode" value="<?php echo $getSpecificDriverLicenses["ceCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">D1</td>
                                        <td scope="row"><input type="date" class="form-control" name="d1Issue" id="d1Issue" value="<?php echo $getSpecificDriverLicenses["d1Issue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="d1Expiry" id="d1Expiry" value="<?php echo $getSpecificDriverLicenses["d1Expiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="d1Code" id="d1Code" value="<?php echo $getSpecificDriverLicenses["d1Code"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">D</td>
                                        <td scope="row"><input type="date" class="form-control" name="dIssue" id="dIssue" value="<?php echo $getSpecificDriverLicenses["dIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="dExpiry" id="dExpiry" value="<?php echo $getSpecificDriverLicenses["dExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="dCode" id="dCode" value="<?php echo $getSpecificDriverLicenses["dCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">DE</td>
                                        <td scope="row"><input type="date" class="form-control" name="deIssue" id="deIssue" value="<?php echo $getSpecificDriverLicenses["deIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="deExpiry" id="deExpiry" value="<?php echo $getSpecificDriverLicenses["deExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="deCode" id="deCode" value="<?php echo $getSpecificDriverLicenses["deCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">G1</td>
                                        <td scope="row"><input type="date" class="form-control" name="g1Issue" id="g1Issue" value="<?php echo $getSpecificDriverLicenses["g1Issue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="g1Expiry" id="g1Expiry" value="<?php echo $getSpecificDriverLicenses["g1Expiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="g1Code" id="g1Code" value="<?php echo $getSpecificDriverLicenses["g1Code"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">G</td>
                                        <td scope="row"><input type="date" class="form-control" name="gIssue" id="gIssue" value="<?php echo $getSpecificDriverLicenses["gIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="gExpiry" id="gExpiry" value="<?php echo $getSpecificDriverLicenses["gExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="gCode" id="gCode" value="<?php echo $getSpecificDriverLicenses["gCode"];?>"/></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">J</td>
                                        <td scope="row"><input type="date" class="form-control" name="jIssue" id="jIssue" value="<?php echo $getSpecificDriverLicenses["jIssue"];?>"/></td>
                                        <td scope="row"><input type="date" class="form-control" name="jExpiry" id="jExpiry" value="<?php echo $getSpecificDriverLicenses["jExpiry"];?>"/></td>
                                        <td scope="row"><input type="text" class="form-control" name="jCode" id="jCode" value="<?php echo $getSpecificDriverLicenses["jCode"];?>"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                                                        
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                    </div>
                </form>
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