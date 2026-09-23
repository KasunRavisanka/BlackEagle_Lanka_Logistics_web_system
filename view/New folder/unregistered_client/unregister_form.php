<!DOCTYPE html>
<?php
//    include_once '../../includes/session.php';
    include_once '../../model/module_model.php';
    include_once '../../model/breadcrumb_model.php';  
    include_once '../../model/functions_model.php';  
    include_once '../../model/user_model.php';  
    $moduleObj = new Module();
    $breadcrumbObj = new Breadcrumb();
    $functionsObj = new Functions();
    $userObj = new User();
    
//    $user_id = $_SESSION["user"]["user_id"];
    $module_id = $_GET["module_id"]; 
    $functions_modules_id = $module_id;
    
    $roleResult = $userObj->getUserRoles();
    
    $getSpecificModuleResult = $moduleObj->getSpecificModule($module_id);
    $getSpecificModule = $getSpecificModuleResult->fetch_assoc();
    
    $getSpecificFunctionsResult = $functionsObj->getSpecificFunctionsRelevantModule($module_id,$functions_modules_id);
    
    $column1Result = $breadcrumbObj->viewBreadcrumbRow(2);
    $column1 = $column1Result->fetch_assoc();
    
    $a1 = $column1["breadcrumb_li_css"];
    $a2 = "breadcrumb-item active d-none";
    $a3 = "breadcrumb-item active d-none";
    $a4 = "breadcrumb-item active d-none";
    $a5 = "breadcrumb-item active d-none";
    $a6 = "breadcrumb-item active d-none";
    $a7 = "breadcrumb-item active d-none";
    
    $b1 = $column1["breadcrumb_li_aria-current"];
    $b2 = "";
    $b3 = "";
    $b4 = "";
    $b5 = "";
    $b6 = "";
    $b7 = "";
    
    $c1 = $column1["breadcrumb_a_href"];  
    $c2 = "";
    $c3 = "";
    $c4 = "";
    $c5 = "";
    $c6 = "";
    $c7 = "";
    
    $d1 = $getSpecificModule["module_name"]." "."Form";
    $d2 = '';
    $d3 = '';
    $d4 = '';
    $d5 = '';
    $d6 = '';
    $d7 = '';
    
    $role_id = 19;
    $module_id = 19;        
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
                include_once 'unregistered_client-client_navbar1.php';
    ?>      
    <?php
                include_once 'unregistered_client-modules.php';
    ?>
                <div class="row px-3">
                    <div class="col-md-12">
    <?php
                        include_once 'unregistered_client-client_navbar2.php';
    ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 style="text-align:center">Sign Up Form</h4>
            </div>
            <div class="row"> 
                <div class="col-md-12">&nbsp;</div>
            </div>
            <form action="../../controller/controller/client_controller.php?status=add_unregisteredClient&role_id=<?php echo $role_id;?>&module_id=<?php echo $module_id;?>" method="post" enctype="multipart/form-data">
                <!--<form action="../../controller/controller/client_controller.php?status=add_unregisteredClient" method="post" enctype="multipart/form-data">-->
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <div id="alertmsg"></div> 
                            </div>
                        </div>                 
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">1. Client Surname</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_surname" id="unregisteredClient_surname"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">2. Client Other Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_othername" id="unregisteredClient_othername"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">3. Client Email</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_email" id="unregisteredClient_email"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">4. Client NIC</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_NIC" id="unregisteredClient_NIC"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">5. Client Mobile Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_mobNum" id="unregisteredClient_mobNum"/>
                            </div> 
                            <div class="col-md-3">
                                <label class="control-label">6. Client Address</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_address" id="unregisteredClient_address"/>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">7. Client Date of Birth</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="unregisteredClient_dob" id="unregisteredClient_dob"/>
                            </div>    
                            <div class="col-md-3">
                                <label class="control-label">8. Client Image</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="unregisteredClient_image" id="unregisteredClient_image" onchange="readUnregisteredClient_imageURL(this)"/>                      
                                <img id="unregisteredClient_imagePrev"/>                         
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
                                <input type="text" class="form-control" name="unregisteredClient_password1" id="unregisteredClient_password1"/>
                            </div>    
                            <div class="col-md-3">
                                <label class="control-label">10. Re-add the Password</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_password2" id="unregisteredClient_password2"/>
                            </div>  
                        </div>                       
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div>
                            <h6 class="text-danger">*If You have a company</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">11. Client Profession</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_prefession" id="unregisteredClient_prefession"/>
                            </div>                               
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>                      
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">12. Company Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_companyName" id="unregisteredClient_companyName"/>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">13. Company Email</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_companyEmail" id="unregisteredClient_companyEmail"/>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">14. Company Contact Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="unregisteredClient_companyConNum" id="unregisteredClient_companyConNum"/>
                            </div>     
                            <div class="col-md-3">
                                <label class="control-label">15. Company Image</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="unregisteredClient_companyImage" id="unregisteredClient_companyImage" onchange="readUnregisteredClient_companyImageURL(this)"/>
                                <img id="unregisteredClient_companyImagePrev"/>
                            </div>   
                        </div> 
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>                                              
                        <div class="row ">
                            <div class="col-md-offset-4 col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                    &nbsp;Save
                                </button>
                                <a type="button" href="../site/main.php" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    &nbsp;Cancel
                                </a>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                    </div>    
                </form>
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
<!--    <script src="../js/loginvalidation.js"></script>-->
    <script type="text/javascript">
        function readUnregisteredClient_imageURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#unregisteredClient_imagePrev')
                        .attr('src', e.target.result)
                        .height(70)
                        .width(80);
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script type="text/javascript">
        function readUnregisteredClient1_imageURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#unregisteredClient_imagePrev1')
                        .attr('src', e.target.result)
                        .height(70)
                        .width(80);
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script type="text/javascript">
        function readUnregisteredClient_companyImageURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#unregisteredClient_companyImagePrev')
                        .attr('src', e.target.result)
                        .height(70)
                        .width(80);
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <!--<script src="../../js/js/uservalidation.js"></script>-->
</html>