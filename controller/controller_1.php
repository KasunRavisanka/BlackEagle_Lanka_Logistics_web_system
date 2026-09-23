<?php
//    include_once '../includes/session.php';
//    if(!isset($_GET["module_id"]) & !isset($_SESSION["user"]["user_id"])){?>
        <!--<script>window.location = "../view/login.php";</script>-->     
<?php
//    } 
    include_once '../view/common/objects.php';
    $status = $_GET["status"];
    switch($status){     
/************************************************************************************************/
        /* (1) Process Status */
        /* (2) Role Modules */
        /* (3) Module Functions */
        /* (4) Role Functions */
        /* (5) User Functions */
        /* (6) Module */
        /* (7) Role */
        /* (8) Functions */
        /* (9) User Modules */
        /* (10) User Administrator */
        /* (11) Functions Modules */
        /* (12) Breadcrumb */
        /* (13) Navigation Tabs */
        /* (14) Year */
        /* (15) Month */
        /* (16) City */  
        /* (17) Client Services */  
        /* (18) Client Request */ 
        /* (19) Hire Driver */
        /* (20) Hire Vehicle */   
        /* (21) Driver Tasks */
        /* (22) Client */
        /* (23) Driver Class of Vehicles */ 
        /* (24) Driver ADR Certificates */
        /* (25) Driver */
        /* (26) Driver Overview */
        /* (27) Driver License Overview */
        /* (28) ADR Certificate */
        /* (29) Finance */
        /* (30) Fuel */
        /* (31) Fleet */
        /* (32) Product Manufacturer */
        /* (33) Inventory */
        /* (34) Product Category */
        /* (35) Products */
        /* (36) Inventory Section */
        /* (37) Login */
        /* (38) Profile Settings */
        /* (39) Vehicle */
        /* (40) Vehicle Overview */
        /* (41) Vehicle Manufacturer */
        /* (42) Vehicle Revenue License */ 
        /* (43) Vehicle Insurance */
        /* (44) Vehicle Emission Test */
        /* (45) Vehicle Book */
        /* (46) Province Council */
        /* (47) Class of Vehicle */
        /* (48) Warehouse Section */
        /* (49) Warehouse */
        /* (50) Supplier */
        /* (51) User Management */
        /* (52) Specific Inventory Section Specific Product */
        /* (53) Specific Inventory Section Products */
        /* (54) Driver Operator */
        /* (55) Client Payment Invoice Request */
        /* (56) Vehicle Tasks */
        /* (57) Hire Driver and Vehicle */
        /* (58) Driver And Vehicle Tasks */
        /* (59) Product Sell Price */
        /* (60) Product Buying Price */
        /* (61) Cargo and Shipment */
        /* (62) Cargo and Shipment Section */
        /* (63) Product Purchasing */
        /* (64) Cargo and Shipment Tasks */
/************************************************************************************************/
/* (1) Process Status */
        // 1) Add New Process Status       
        case "addNewProcessStatus":
            $module_id = $_GET["module_id"];
            $processName = $_POST["processName"];
            $processStatusButtonCSS = $_POST["processStatusButtonCSS"];
            try{
                $modelObj->addNewProcessStatus($processName, $processStatusButtonCSS);
                $msg = "Add New Process Status was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_process_status.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_process_status.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Update Process Status      
        case "updateSpecificProcessStatus":
            $module_id = $_GET["module_id"];
            $processStatusId = $_POST["processStatusId"];
            $processName = $_POST["processName"];
            $cssColorId = $_POST["cssColorId"];
            try{
                $modelObj->updateSpecificProcessStatus($processStatusId, $processName, $cssColorId);
                $msg = "Process Status was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_process_status.php?msgSuccess=<?php echo $msg;?>&updateProcessStatusId=<?php echo $processStatusId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_process_status.php?msgWarning=<?php echo $msg;?>&updateProcessStatusId=<?php echo $processStatusId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Activate Process Status        
        case "activateProcessStatus":
            $updateProcessStatusId = $_GET["updateProcessStatusId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateProcessStatus($updateProcessStatusId);
                $msg = "Process Status was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_process_status.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>            
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_process_status.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>    
<?php       }
            break;
        // 4) Deactivate Process Status
        case "deactivateProcessStatus":
            $updateProcessStatusId = $_GET["updateProcessStatusId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateProcessStatus($updateProcessStatusId);
                $msg = "Process Status was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_process_status.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_process_status.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }
            break;
        
/********************************************************************************************* */
/* (2) Role Modules */
        // 1) Update Role Modules
        case "update_roleModules":
            $updateRole_id = $_GET["updateRole_id"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["roleModules"])){
                    $roleModules = [];
                }else{
                    $roleModules = $_POST["roleModules"];
                }
                $modelObj->deleteAllSpecificRoleModules($updateRole_id);
                foreach($roleModules as $m){
                    $modelObj->addRoleModules($updateRole_id, $m);            
                }       
                $msg = "Role Functions were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_role_module.php?msgSuccess=<?php echo $msg;?>&updateRole_id=<?php echo $updateRole_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_role_module.php?msgSuccess=<?php echo $msg;?>&updateRole_id=<?php echo $updateRole_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* ************************************************************************************************ */
/* (3) Module Functions */
        // 1) Update Module Functions
        case "update_moduleFunctions":
            $updateModule_id = $_GET["updateModule_id"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["moduleFunctions"])){
                    $moduleFunctions = [];
                }else{
                    $moduleFunctions = $_POST["moduleFunctions"];
                }
                $modelObj->deleteAllSpecificModulesFunctions($updateModule_id);
                foreach($moduleFunctions as $f){
                    $modelObj->addModuleFunctions($updateModule_id, $f);            
                }       
                $msg = "Module Functions were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_module_function.php?msgSuccess=<?php echo $msg;?>&updateModule_id=<?php echo $updateModule_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_module_function.php?msgWarning=<?php echo $msg;?>&updateModule_id=<?php echo $updateModule_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* ************************************************************************************************ */
/* (4) Role Functions */
        // 1) Update Role Functions
        case "update_roleFunctions":
            $updateRole_id = $_GET["updateRole_id"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["roleFunctions"])){
                    $roleFunctions = [];
                }else{
                    $roleFunctions = $_POST["roleFunctions"];
                }
                $modelObj->deleteAllSpecificRoleFunctions($updateRole_id);
                foreach($roleFunctions as $f){
                    $modelObj->addRoleFunctions($updateRole_id, $f);            
                }        
                $msg = "Role Functions were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_role_functions.php?msgSuccess=<?php echo $msg;?>&updateRole_id=<?php echo $updateRole_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_role_functions.php?msgWarning=<?php echo $msg;?>&updateRole_id=<?php echo $updateRole_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* ********************************************************************************************** */
/* (5) User Functions */
        // 1) Update User Functions
        case "update_userFunctions":
            $updateUserId = $_GET["updateUserId"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["userFunctions"])){
                    $userFunctions = [];
                }else{
                    $userFunctions = $_POST["userFunctions"];
                }
                $modelObj->deleteAllSpecificUserFunctions($updateUserId);
                foreach($userFunctions as $f){
                    $modelObj->addUserFunctions($updateUserId, $f);            
                }     
                $msg = "User Functions were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_user_functions.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $updateUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_user_functions.php?msgWarning=<?php echo $msg;?>&updateUserId=<?php echo $updateUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* ******************************************************************************************** */
/* (6) Module */
        // 1) Activate Module
        case "activateModule":
            $updateModule_id = $_GET["updateModule_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateModule($updateModule_id);
                $msg = "Module was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_modules.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>            
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_modules.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>    
<?php       }
            break;
        // 2) Deactivate Module
        case "deactivateModule":
            $updateModule_id = $_GET["updateModule_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateModule($updateModule_id);
                $msg = "Module was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_modules.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_modules.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }
            break;
        // 3) Add New Module
        case "addNewModule":
            $module_id = $_GET["module_id"];
            $moduleName = $_POST["moduleName"];
            $moduleURL = $_FILES["moduleURL"];
            try{
                $moduleURLEdit = "";  
                if($moduleURL["name"] != ""){
                    $moduleURLEdit = $moduleURL["name"];
                    $path = "../view/".$moduleURLEdit;
                    move_uploaded_file($moduleURL["tmp_name"], $path);  
                }
                $modelObj->addNewModule($moduleName, $moduleURLEdit);
                $msg = "New module was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_modules.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_module.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;     
        // 4) Update Specific Module
        case "updateSpecificModule":
            $updateModuleId = $_GET["updateModuleId"];
            $module_id = $_GET["module_id"];
            $moduleName = $_POST["moduleName"];
            $moduleUrl = $_FILES["moduleUrl"];
            try{
                $moduleUrlEdit = "";  
                if($moduleUrl["name"] != ""){
                    $moduleUrlEdit = $moduleUrl["name"];
                    $path = "../view/".$moduleUrlEdit;
                    move_uploaded_file($moduleUrl["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificModule($moduleName, $moduleUrlEdit, $updateModuleId);
                $msg = "Module was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_module.php?msgSuccess=<?php echo $msg;?>&updateModuleId=<?php echo $updateModuleId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_module.php?msgWarning=<?php echo $msg;?>&updateModuleId=<?php echo $updateModuleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 5) View Modules in Offcanvas
        case "moduleView":
            $module_id = $_GET["module_id"];
            $getSpecificModule = $modelObj->getSpecificModule($module_id);
            $getSpecificModule = $getSpecificModule->fetch_assoc();?>
            <script>window.location="../view/<?php echo $getSpecificModule["module_url"];?>?module_id=<?php echo $module_id;?>";</script>
<?php
            break;
/* ********************************************************************************************** */
/* (7) Role */
        // 1) Update Specific Role
        case "updateSpecificRole":
            $module_id = $_GET["module_id"];
            $updateRoleId = $_GET["updateRoleId"];        
            $roleName = $_POST["roleName"];                
            try{
                $modelObj->updateSpecificRole($updateRoleId, $roleName);
                $msg = "$roleName Role was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_role.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>&updateRoleId=<?php echo $updateRoleId;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_role.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>&updateRoleId=<?php echo $updateRoleId;?>"</script>
<?php       }          
            break;
        // 2) Add New Role
        case "addNewRole":
            $module_id = $_GET["module_id"];
            $roleName = $_POST["roleName"];                
            try{
                $modelObj->addRole($roleName);
                $msg = "$roleName Role was successfully created!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_roles.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_role.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script>
<?php       }
            break;
        // 3) Deactivate Role
        case "deactivateRole":
            $updateRole_id = $_GET["updateRole_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateRole($updateRole_id);
                $msg = "Role was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_roles.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_roles.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 4) Activate Role
        case "activateRole":
            $updateRole_id = $_GET["updateRole_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateRole($updateRole_id);
                $msg = "Role was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_roles.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_roles.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* *********************************************************************************************** */
/* (8) Functions */
        // 1) Add New Function
        case "addNewFunction":
            $module_id = $_GET["module_id"];
            $functionName = $_POST["functionName"];
            $functionUrl = $_FILES["functionUrl"];
            $selectedModuleId = $_POST["moduleId"];
            $functionModuleId = $_POST["functionModuleId"];
            try{
                $functionUrlEdit = "";  
                if($functionUrl["name"] != ""){
                    $functionUrlEdit = $functionUrl["name"];
                    $path = "../view/".$functionUrlEdit;
                    move_uploaded_file($functionUrl["tmp_name"], $path);  
                    $functionUrlEdit = $functionUrlEdit."?";
                }             
                $modelObj->addNewFunction($functionName, $functionUrlEdit, $selectedModuleId, $functionModuleId);
                $msg = "New Function was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_function.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Update Specific Function
        case "updateSpecificFunction":
            $updateFunctionId = $_GET["updateFunctionId"];
            $module_id = $_GET["module_id"];
            $functionName = $_POST["functionName"];
            $functionUrl = $_FILES["functionUrl"];
            $selectedModuleId = $_POST["moduleId"];
            $functionModuleId = $_POST["functionModuleId"];
            try{
                $functionUrlEdit = "";  
                if($functionUrl["name"] != ""){
                    $functionUrlEdit = $functionUrl["name"];
                    $path = "../view/".$functionUrlEdit;
                    move_uploaded_file($functionUrl["tmp_name"], $path);
                    $functionUrlEdit = $functionUrlEdit."?";
                }              
                $modelObj->updateSpecificFunction($functionName, $functionUrlEdit, $selectedModuleId, $functionModuleId, $updateFunctionId);
                $msg = "Function was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_function.php?msgSuccess=<?php echo $msg;?>&updateFunctionId=<?php echo $updateFunctionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_function.php?msgWarning=<?php echo $msg;?>&updateFunctionId=<?php echo $updateFunctionId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Activate Function
        case "activateFunction":
            $updateFunction_id = $_GET["updateFunction_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateFunction($updateFunction_id);
                $msg = "Function was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_functions.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Deactivate Function
        case "deactivateFunction":
            $updateFunction_id = $_GET["updateFunction_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateFunction($updateFunction_id);
                $msg = "Function was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_functions.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* *********************************************************************************************** */
/* (9) User Modules */
        // 1) Update User Modules
        case "updateUserModules":
            $updateUser_id = $_GET["updateUser_id"];
            $module_id = $_GET["module_id"];
            $userModules = $_POST["userModules"];
            try{
                $modelObj->deleteAllSpecificUserModules($updateUser_id);
                foreach($userModules as $m){
                    $modelObj->addUserModules($updateUser_id, $m);            
                }        
                $msg = "User Modules were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_user_modules.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $updateUser_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_user_modules.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $updateUser_id;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/* ********************************************************************************************** */
/* (10) User Administrator */
        // 1) Add New User
        case "addNewUser":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["role_id"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $msg = "New user Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_users_as.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_users_as.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Deactivate User
        case "deactivateSpecificUser":
            $updateUserId = $_GET["updateUserId"];
            $userName = $_GET["userName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateUser($updateUserId);
                $msg = "$userName was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_users_as.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_users_as.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Activate User
        case "activateSpecificUser":
            $updateUserId = $_GET["updateUserId"];
            $userName = $_GET["userName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateUser($updateUserId);
                $msg = "$userName was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_users_as.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_users_as.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Update Specific User
        case "updateSpecificUser":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $userId = $_POST["userId"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $profileImage = $_FILES["profileImage"];           
            $contactMobile = $_POST["contactMobile"];
            $address = $_POST["address"];         
            $roleId = $_POST["roleId"];         
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificUser(
                    $name,
                    $email,   
                    $dob,   
                    $nic,   
                    $profileImageEdit,   
                    $contactMobile,   
                    $address,    
                    $userId,
                    $roleId);               
                $msg = "User Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_user_as.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>&fafdad=<?php echo $profileImageEdit;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_users_as.php?msgWarning=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) Update User Password
        case "updateUserPassword":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "User Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_user_as.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_user_as.php?msgWarning=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**************************************************************************************************/
/* (11) Functions Modules */
        // 1) Deactivate Functions Module
        case "deactivateFunctionsModule":
            $updateFunctionsModulesId = $_GET["updateFunctionsModulesId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateFunctionsModules($updateFunctionsModulesId);
                $msg = "Function Module was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions_modules.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_functions_modules.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2)  Activate Functions Module
        case "activateFunctionsModule":
            $updateFunctionsModulesId = $_GET["updateFunctionsModulesId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateFunctionsModules($updateFunctionsModulesId);
                $msg = "Function Module was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions_modules.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_functions_modules.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;     
        // 3) Update Specific Functions Module
        case "updateSpecificFunctionsModule":
            $updateFunctionsModulesId = $_GET["updateFunctionsModulesId"];
            $module_id = $_GET["module_id"];
            $functionsModuleName = $_POST["functionsModuleName"];
            $idName= $_POST["idName"];
            $sariaLabelledby = $_POST["ariaLabelledby"];
            $dataBsTarget = $_POST["dataBsTarget"];
            try{
                $modelObj->updateSpecificFunctionsModule($functionsModuleName, $idName, $sariaLabelledby, $dataBsTarget, $updateFunctionsModulesId);
                $msg = "Functions Module was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_functions_modules.php?msgSuccess=<?php echo $msg;?>&updateFunctionsModulesId=<?php echo $updateFunctionsModulesId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_functions_modules.php?msgWarning=<?php echo $msg;?>&updateFunctionsModulesId=<?php echo $updateFunctionsModulesId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;     
        // 4) Add New Functions Module
        case "addNewFunctionsModule":
            $module_id = $_GET["module_id"];
            $functionsModuleName = $_POST["functionsModuleName"];
            $idName = $_POST["idName"];
            $ariaLabelledby = $_POST["ariaLabelledby"];
            $dataBsTarget = $_POST["dataBsTarget"];
            try{
                $modelObj->addNewFunctionsModule($functionsModuleName, $idName, $ariaLabelledby, $dataBsTarget);
                $msg = "New functions module was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_functions_modules.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_functions_module.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/*************************************************************************************************/
/* (12) Breadcrumb */
        // 1) Activate Breadcrumnb  
        case "activateBreadcrumb":
            $updateBreadcrumbId = $_GET["updateBreadcrumbId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateBreadcrumb($updateBreadcrumbId);
                $msg = "Breadcrumb was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_breadcrumbs.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_breadcrumbs.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Deactivate Breadcrumb
        case "deactivateBreadcrumb":
            $updateBreadcrumbId = $_GET["updateBreadcrumbId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateBreadcrumb($updateBreadcrumbId);
                $msg = "Breadcrumb was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_breadcrumbs.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_breadcrumbs.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;   
        // 3) Update Specific Breadcrumb
        case "updateSpecificBreadcrumb":
            $updateBreadcrumbId = $_GET["updateBreadcrumbId"];
            $module_id = $_GET["module_id"];
            $breadcrumbName = $_POST["breadcrumbName"];
            $liCSS= $_POST["liCSS"];
            $liAriaCurrent = $_POST["liAriaCurrent"];
            $aHref = $_FILES["aHref"];    
            try{
                $aHrefEdit = "";  
                if($aHref["name"] != ""){
                    $aHrefEdit = $aHref["name"];       
                    $path = "../view/".$aHrefEdit;
                }
                $modelObj->updateSpecificBreadcrumb($breadcrumbName, $liCSS, $liAriaCurrent, $aHrefEdit, $updateBreadcrumbId);
                $msg = "$breadcrumbName Breadcrumb was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_breadcrumb.php?msgSuccess=<?php echo $msg;?>&updateBreadcrumbId=<?php echo $updateBreadcrumbId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_breadcrumb.php?msgWarning=<?php echo $msg;?>&updateBreadcrumbId=<?php echo $updateBreadcrumbId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 4) Add New Breadcrumb
        case "addNewBreadcrumb":
            $module_id = $_GET["module_id"];
            $breadcrumbName = $_POST["breadcrumbName"];
            $liCSS = $_POST["liCSS"];
            $liAriaCurrent= $_POST["liAriaCurrent"];
            $aHref = $_FILES["aHref"];
            $aHrefEdit = "";  
            if($aHref["name"] != ""){
                $aHrefEdit = $aHref["name"];                                   
            }
            try{
                $modelObj->addNewBreadcrumb($breadcrumbName, $liCSS, $liAriaCurrent, $aHrefEdit);
                $msg = "New breadcrumb was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_breadcrumbs.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_breadcrumbs.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/*******************************************************************************************/
/* (13) Navigation Tabs */
        // 1) Deactivate Navigation Tab     
        case "deactivateNavigationTabs":
            $updateNavigationTabsId = $_GET["updateNavigationTabsId"];
            $navigationTabName = $_GET["navigationTabName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateNavigationTab($updateNavigationTabsId);
                $msg = "$navigationTabName navigation tab was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_navigation_tabs.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_navigation_tabs.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Activate Navigation Tab
        case "activateNavigationTabs":
            $updateNavigationTabsId = $_GET["updateNavigationTabsId"];
            $navigationTabName = $_GET["navigationTabName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateNavigationTab($updateNavigationTabsId);
                $msg = "$navigationTabName navigation tab was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_navigation_tabs.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_navigation_tabs.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;   
        // 3) Update Specific Navigation Tab
        case "updateSpecificNavigationTab":
            $updateNavigationTabId = $_GET["updateNavigationTabId"];
            $module_id = $_GET["module_id"];
            $navTabId = $_POST["navTabId"];
            $navTabName = $_POST["navTabName"];
            $navtabTypeId = $_POST["navtabTypeId"];
            $navTabCSS = $_POST["navTabCSS"];   
            $navTabDisplay = $_POST["navTabDisplay"];   
            try{
                $modelObj->updateSpecificNavigationTab($navTabName, $navtabTypeId, $navTabCSS, $navTabDisplay, $navTabId);
                $msg = "$navTabName Navigation Tab was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_navigation_tab.php?msgSuccess=<?php echo $msg;?>&updateNavigationTabId=<?php echo $updateNavigationTabId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_navigation_tab.php?msgWarning=<?php echo $msg;?>&updateNavigationTabId=<?php echo $updateNavigationTabId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 4) Add New Navigation Tab
        case "addNewNavigationTab":
            $module_id = $_GET["module_id"];
            $navTabName = $_POST["navTabName"];
            $navTabCSS = $_POST["navTabCSS"];
            $navTabDisplay = $_POST["navTabDisplay"];
            $navtabTypeId = $_POST["navtabTypeId"];
            try{
                $modelObj->addNewNavigationTab($navTabName, $navTabCSS, $navTabDisplay, $navtabTypeId);
                $msg = "New $navTabName Navigation Tab was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_navigation_tabs.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_navigation_tab.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 5) Update Specific Navigation Tab Type
        case "updateSpecificNavigationTabType":
            $module_id = $_GET["module_id"];
            $navTabTypeId = $_POST["navTabTypeId"];
            $navTabTypeName = $_POST["navTabTypeName"];  
            try{
                $modelObj->updateSpecificNavigationTabType($navTabTypeName, $navTabTypeId);
                $msg = "$navTabTypeName Navigation Tab Type was successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_navigation_tab_type.php?msgSuccess=<?php echo $msg;?>&updateNavigationTabTypeId=<?php echo $navTabTypeId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_navigation_tab_type.php?msgWarning=<?php echo $msg;?>&updateNavigationTabTypeId=<?php echo $navTabTypeId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 6) Add New Navigation Tab Type
        case "addNewNavigationTabType":
            $module_id = $_GET["module_id"];
            $navTabTypeName = $_POST["navTabTypeName"];
            try{
                $modelObj->addNewNavigationTabType($navTabTypeName);
                $msg = "New $navTabTypeName Navigation Tab Type was successfully created!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_navigation_tab_types.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_navigation_tab_type.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/**************************************************************************************************/
/* (14) Year */
        // 1) Add New Year
        case "addYear":
            $module_id = $_GET["module_id"];
            $year = $_POST["year"];
            $getSpecificYearByYearResult = $modelObj->getSpecificYearByYear($year);
            $getSpecificYearByYearRow = $getSpecificYearByYearResult->fetch_assoc();
            try{          
                if(isset($getSpecificYearByYearRow["year_name"])){              
                    $msg = "$year is already added!";
                    $msg = base64_encode($msg);?>            
                    <script>window.location = "../view/add_year.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php           }else{
                    $modelObj->addYear($year);
                    $msg = "$year was successfully added!";
                    $msg = base64_encode($msg);?>
                    <script>window.location = "../view/view_years.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>                   
<?php           }
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_year.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Deactivate Year
        case "deactivateYear":
            $updateYearId = $_GET["updateYearId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateYear($updateYearId);
                $msg = "Year was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_years.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_years.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 3) Activate Year
        case "activateYear":
            $updateYearId = $_GET["updateYearId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateYear($updateYearId);
                $msg = "Year was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_years.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_years.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Update Specific Year
        case "updateSpecificYear":
            $module_id = $_GET["module_id"];
            $yearId = $_POST["yearId"];
            $year = $_POST["year"];
            $getSpecificYearByYearResult = $modelObj->getSpecificYearByYear($year);
            $getSpecificYearByYearRow = $getSpecificYearByYearResult->fetch_assoc();
            try{     
                if(!isset($getSpecificYearByYearRow["year_name"])){
                    $modelObj->updateSpecificYear($year, $yearId);
                    $msg = "$year was Successfully Updated!";
                    $msg = base64_encode($msg);?>
                    <script>window.location = "../view/view_specific_year.php?msgSuccess=<?php echo $msg;?>&updateYearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php                
                }elseif(isset($getSpecificYearByYearRow["year_name"]) & $getSpecificYearByYearRow["year_id"]==$yearId){  
                    $modelObj->updateSpecificYear($year, $yearId);
                    $msg = "$year was Successfully Updated!";
                    $msg = base64_encode($msg);?>            
                    <script>window.location = "../view/view_specific_year.php?msgSuccess=<?php echo $msg;?>&updateYearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php           }elseif(isset($getSpecificYearByYearRow["year_name"]) & $getSpecificYearByYearRow["year_id"]!=$yearId){
                    $msg = "$year was already there!";
                    $msg = base64_encode($msg);?>
                    <script>window.location = "../view/update_specific_year.php?msgWarning=<?php echo $msg;?>&updateYearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>"</script>                   
<?php           }
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_year.php?msgWarning=<?php echo $msg;?>&updateYearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/*********************************************************************************************/
/* (15) Month */
        // 1) Deactivate Month
        case "deactivateMonth":
            $updateMonthId = $_GET["updateMonthId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateMonth($updateMonthId);
                $msg = "Month was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_months.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_months.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Activate Month
        case "activateMonth":
            $updateMonthId = $_GET["updateMonthId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateMonth($updateMonthId);
                $msg = "Month was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_months.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_months.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Update Specific Month
        case "updateSpecificMonth":
            $module_id = $_GET["module_id"];
            $monthId= $_POST["monthId"];
            $month = $_POST["month"];
            $getSpecificMonthByMonthResult = $modelObj->getSpecificMonthByMonth($month);
            $getSpecificMonthByMonthRow = $getSpecificMonthByMonthResult->fetch_assoc();
            try{     
                if(!isset($getSpecificMonthByMonthRow["monthName"])){
                    $modelObj->updateSpecificMonth($month, $monthId);
                    $msg = "$month was Successfully Updated!";
                    $msg = base64_encode($msg);?>
                    <script>window.location = "../view/view_specific_month.php?msgSuccess=<?php echo $msg;?>&updateMonthId=<?php echo $monthId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php                
                }elseif(isset($getSpecificMonthByMonthRow["monthName"]) & $getSpecificMonthByMonthRow["monthId"]==$monthId){  
                    $modelObj->updateSpecificMonth($month, $monthId);
                    $msg = "$month was Successfully Updated!";
                    $msg = base64_encode($msg);?>            
                    <script>window.location = "../view/view_specific_month.php?msgSuccess=<?php echo $msg;?>&updateMonthId=<?php echo $monthId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php           }elseif(isset($getSpecificMonthByMonthRow["monthName"]) & $getSpecificMonthByMonthRow["monthId"]!=$monthId){
                    $msg = "$month was already there!";
                    $msg = base64_encode($msg);?>
                    <script>window.location = "../view/update_specific_month.php?msgWarning=<?php echo $msg;?>&updateMonthId=<?php echo $monthId;?>&module_id=<?php echo $module_id;?>"</script>                   
<?php           }
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_month.php?msgWarning=<?php echo $msg;?>&updateMonthId=<?php echo $monthId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/**********************************************************************************************/
/* (16) City */      
        // 1) Add New City
        case "addNewCity":
            $module_id = $_GET["module_id"];
            $cityName = $_POST["cityName"];
            try{     
                $modelObj->addNewCity($cityName);
                $msg = "$cityName was Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_cities.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script>                   
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_city.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Update Specific City
        case "updateSpecificCity":
            $module_id = $_GET["module_id"];
            $cityId = $_POST["cityId"];
            $cityName = $_POST["cityName"];
            try{     
                $modelObj->updateSpecificCity($cityId, $cityName);
                $msg = "$cityName was Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_city.php?msgSuccess=<?php echo $msg;?>&cityId=<?php echo $cityId;?>&module_id=<?php echo $module_id;?>"</script>                   
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_city.php?msgWarning=<?php echo $msg;?>&cityId=<?php echo $cityId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/****************************************************************************************************/
/* (17) Client Services */  
        // 1) Update Specific Client Service
        case "updateSpecificClientService":
            $module_id = $_GET["module_id"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientServiceName = $_POST["clientServiceName"];
            $clientServiceURL = $_FILES["clientServiceURL"];
            try{
                $clientServiceURLEdit = "";  
                if($clientServiceURL["name"] != ""){
                    $clientServiceURLEdit = $clientServiceURL["name"];       
                    $path = "../view/".$clientServiceURLEdit;
                }
                $modelObj->updateSpecificClientService($clientServiceId, $clientServiceName, $clientServiceURLEdit);
                $msg = "Client Service was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_service.php?msgSuccess=<?php echo $msg;?>&updateClientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_service.php?msgWarning=<?php echo $msg;?>&updateClientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Add New Client Service
        case "addNewClientService":
            $module_id = $_GET["module_id"];
            $clientServiceName = $_POST["clientServiceName"];
            $clientServiceURL = $_POST["clientServiceURL"];
            try{
                $clientServiceURLEdit = "";  
                if($clientServiceURL["name"] != ""){
                    $clientServiceURLEdit = $clientServiceURL["name"];
                    $path = "../view/".$clientServiceURLEdit;
                    move_uploaded_file($clientServiceURL["tmp_name"], $path);                                       
                }
                $modelObj->addNewClientService($clientServiceName, $clientServiceURLEdit);
                $msg = "New Client Service was Successfully Added!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_services.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/add_client_service.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 3) Deactivate Client Service
        case "deactivateClientService":
            $updateClientServiceId = $_GET["updateClientServiceId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateClientService($updateClientServiceId);
                $msg = "Client Service was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_services.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_services.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 4) Activate Client Service
        case "activateClientService":
            $updateClientServiceId = $_GET["updateClientServiceId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateClientService($updateClientServiceId);
                $msg = "Client Service was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_services.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_client_services.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**********************************************************************************************/
/* (18) Client Request */        
        // 1) Update Specific Client Request        
        case "updateSpecificClientRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $processStatusId = $_POST["processStatusId"];
            $changeStatusId = $_POST["changeStatusId"];
            try{
                $modelObj->updateSpecificClientRequest($clientRequestId, $processStatusId, $changeStatusId);
                $msg = "Client Request was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Recall Client Request
        case "recallClientRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_GET["clientRequestId"];
            try{
                $modelObj->recallClientRequest($clientRequestId);
                $msg = "Client Service was Successfully recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/your_requests.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/your_cancelled_requests.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Cancel Client Request
        case "cancelClientRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_GET["clientRequestId"];
            try{
                $modelObj->cancelClientRequest($clientRequestId);
                $msg = "Client Service was Successfully Cancelled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/your_requests.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/your_requests.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/***********************************************************************************************/
/* (19) Hire Driver */
        // 1) Update Hire Driver From Client
        case "updateHireDriverClient":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $classOfVehicleId = $_POST["classOfVehicleId"];
            $hireDriverRequestLocationURL = $_POST["hireDriverRequestLocationURL"];
            try{
                $modelObj->updateHireDriverRequestClient(
                    $clientRequestId,
                    $clientServiceId,
                    $hireDriverRequestId,
                    $classOfVehicleId,
                    $hireDriverRequestLocationURL);
                $msg = "Client Request was Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_your_specific_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/update_your_specific_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break; 
        // 2) Hire Driver From Client     
        case "addHireDriverClient":
            $module_id = $_GET["module_id"];
            $classOfVehicleId = $_POST["classOfVehicleId"];
            $clientUserId = $_POST["clientUserId"];
            $clientServiceId = $_POST["clientServiceId"];
            $linkURL = $_POST["linkURL"];
            try{
                $clientRequestId = $modelObj->addClientRequest($clientUserId, $clientServiceId,);
                $modelObj->addHireDriverRequest($clientRequestId, $classOfVehicleId, $linkURL);
                $msg = "Client Hire Driver Request was Successfully Added!";
                $msg = base64_encode($msg);
?>
                <script>window.location = "../view/your_requests.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_clients.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Hire Driver Requesting
        case "hireDriverRequestRequesting":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            try{
                $modelObj->hireDriverRequestRequesting($hireDriverRequestId);
                $msg = "Driver was Requested!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Hire Driver Request Recalling
        case "hireDriverRequestRecalling":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            try{
                $modelObj->hireDriverRequestRecalling($hireDriverRequestId);
                $msg = "Driver Request was Recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) Hire Driver Driver Resign
        case "hireDriverRequestResignDriver":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->hireDriverRequestResignDriver($hireDriverRequestId);
                $modelObj->driverUnassigning($driverUserId);
                $msg = "Assigned Driver was Resigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6) Hire Driver Driver Resign From Driver Module
        case "hireDriverRequestResignDriverFromDriverModule":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->hireDriverRequestResignDriver($hireDriverRequestId);
                $modelObj->driverUnassigning($driverUserId);
                $msg = "Assigned Driver was Resigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverRequestId=<?php echo $hireDriverRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverRequestId=<?php echo $hireDriverRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 7) Assign Driver to Hire Driver Request
        case "assignDriverHireDriverRequest":
            $module_id = $_GET["module_id"];
            $driverUserId = $_GET["driverUserId"];
            $clientRequestId = $_GET["clientRequestId"];
            $clientServiceId = $_GET["clientServiceId"];
            $hireDriverRequestId = $_GET["hireDriverRequestId"];
            try{
                $modelObj->assignDriverHireDriverRequest($driverUserId, $hireDriverRequestId);
                $modelObj->driverAssigning($driverUserId);
                $msg = "Driver Successfully Assigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverRequestId=<?php echo $hireDriverRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverRequestId=<?php echo $hireDriverRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        
/*********************************************************************************************/
/* (20) Hire Vehicle */   
        // 1) Hire Vehicle From Client     
        case "addHireVehicleClient":
            $module_id = $_GET["module_id"];
            $classOfVehicleId = $_POST["classOfVehicleId"];
            $fleetId = $_POST["fleetId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $clientRequestId = $modelObj->addClientRequest($clientUserId, $clientServiceId);
                $modelObj->addHireVehicleRequest($clientRequestId, $classOfVehicleId, $fleetId);
                $msg = "Client Hire Vehicle Request was Successfully Added!";
                $msg = base64_encode($msg);
?>
                <script>window.location = "../view/your_requests.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/hire_vehicle_c.php?msgWarning=<?php echo $msg;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Hire Vehicle Requesting
        case "hireVehicleRequestRequesting":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestRequesting($hireVehicleRequestId);
                $msg = "Vehicle was Requested!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Hire Vehicle Request Recalling
        case "hireVehicleRequestRecalling":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireVehicleRequestId  = $_POST["hireVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestRecalling($hireVehicleRequestId);
                $msg = "Vehicle Request was Recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Hire Vehicle Vehicle Resign
        case "hireVehicleRequestResignVehicle":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestResignVehicle($hireVehicleRequestId);
                $msg = "Assigned Driver was Resigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;       
        // 5) Hire Vehicle Vehicle Resign From Vehicle Management
        case "hireVehicleRequestResignVehicleFromVehicleManagement":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestResignVehicle($hireVehicleRequestId);
                $msg = "Assigned Vehicle was Resigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_vehicle_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireVehicleRequestId=<?php echo $hireVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_vehicle_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireVehicleRequestId=<?php echo $hireVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6) Assign Vehicle to Hire Vehicle Request
        case "assignVehicleHireVehicleRequest":
            $module_id = $_GET["module_id"];
            $vehicleId = $_GET["vehicleId"];
            $clientRequestId = $_GET["clientRequestId"];
            $clientServiceId = $_GET["clientServiceId"];
            $hireVehicleRequestId = $_GET["hireVehicleRequestId"];
            try{
                $modelObj->assignVehicleHireVehicleRequest($vehicleId, $hireVehicleRequestId);
                $modelObj->updateSpecificVehicleAssignStatus($vehicleId);
                $msg = "Vehicle Successfully Assigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_vehicle_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireVehicleRequestId=<?php echo $hireVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_vehicle_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireVehicleRequestId=<?php echo $hireVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*********************************************************************************************/
/* (21) Driver Tasks */
        // 1) Recall Assing Driver Task
        case "recallAssignDriverTask":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->recallAssignDriverTask($hireDriverRequestId);
                $modelObj->updateHireDriverRequestDriverTaskStatusDeactive($hireDriverRequestId);
                $msg = "Driver Task was Successfull Recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Assign Task For Driver
        case "assignTaskForDriver":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->assignTaskForDriver($clientRequestId, $clientServiceId, $clientUserId, $hireDriverRequestId, $driverUserId);
                $modelObj->updateHireDriverRequestDriverTaskStatusActive($hireDriverRequestId);
                $modelObj->driverAssigning($driverUserId);
                $msg = "Task is Successfully Assigned for Driver!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**********************************************************************************************/
/* (22) Client */
        // 1) Update Specific Client
        case "updateSpecificClient":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $userId = $_POST["userId"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $profileImage = $_FILES["profileImage"];           
            $contactMobile = $_POST["contactMobile"];
            $address = $_POST["address"];         
            $roleId = $_POST["roleId"];         
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificUser(
                    $name,
                    $email,   
                    $dob,   
                    $nic,   
                    $profileImageEdit,   
                    $contactMobile,   
                    $address,    
                    $userId,
                    $roleId);               
                $msg = "Client Successfully Updated!";
                $msg = base64_encode($msg);?>      
                <script>window.location = "../view/view_specific_client.php?msgSuccess=<?php echo $msg;?>&clientUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_client.php?msgWarning=<?php echo $msg;?>&clientUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
    <?php   }
                break;
        // 2) Add New Client
        case "addNewDriver":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["roleId"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $driver_id = $modelObj->addNewDriver($user_id);
                $msg = "New Unregistered Client Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_drivers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_new_client.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Deactivate Specific Client
        case "deactivateSpecificClient":
            $updateUserId = $_GET["updateUserId"];
//            $clientName = $_GET["clientName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateUser($updateUserId);
                $msg = "Client was deactivated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_clients.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_clients.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Activate Specific Client
        case "activateSpecificClient":
            $updateUserId = $_GET["updateUserId"];
//            $clientName = $_GET["clientName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateUser($updateUserId);
                $msg = "Client was activated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_clients.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_clients.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) Add Client Navigation Tab Activation
        case "addClientNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            try{
                $modelObj->viewSpecificNavTabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/add_new_client.php?module_id=<?php echo $module_id;?>";</script>
<?php
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 6) Add Client to Client Table
        case "addClientToClientTable":
        $module_id = $_GET["module_id"]; 
        $clientUserId = $_GET["clientUserId"];          
            try{
                $driver_id = $modelObj->addNewClient($clientUserId);
                $msg = "New Client Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/add_new_client.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_new_client.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 7) Update Specific Client Client Type
        case "updateSpecificClientClientType":
        $module_id = $_GET["module_id"]; 
        $clientUserId = $_POST["clientUserId"];          
        $clientTypeId = $_POST["clientTypeId"];          
            try{
                $modelObj->updateSpecificClientType($clientUserId, $clientTypeId);
                $msg = "Client Type Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client.php?msgSuccess=<?php echo $msg;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_client.php?msgWarning=<?php echo $msg;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 8) Update Client Password
        case "updateClientPassword":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "Client Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client.php?msgSuccess=<?php echo $msg;?>&clientUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_client.php?msgWarning=<?php echo $msg;?>&clientUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 9) Add New Client
        case "addNewClientLogin":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["roleId"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $driver_id = $modelObj->addNewClient($user_id);
                $msg = "Client Successfully Added. Enter the email and password.";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/login.php?msgSuccess=<?php echo $msg;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/login_client.php?msgWarning=<?php echo $msg;?>";</script> 
<?php       }
            break;
/************************************************************************************************/
/* (23) Driver Class of Vehicles */        
        // 1) Update Specific Driver Class of Vehicles
        case "updateSpecificDriverClassOfVehicles":
            $updateDriverUserId = $_GET["updateDriverUserId"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["driverClassOfVehicles"])){
                    $driverClassOfVehicles = [];
                }else{
                    $driverClassOfVehicles = $_POST["driverClassOfVehicles"];
                }
                $modelObj->deleteAllSpecificDriverClassOfVehicle($updateDriverUserId);
                foreach($driverClassOfVehicles as $ClassOfVehicleId){
                    $modelObj->addDriverClassOfVehicle($updateDriverUserId, $ClassOfVehicleId);            
                }       
                $msg = "Driver Class of Vehicles were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $updateDriverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_driver.php?msgWarning=<?php echo $msg;?>&driverUserId=<?php echo $updateDriverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*******************************************************************************************************/
/* (24) Driver ADR Certificates */
        // 1) Update Specific Driver ADR Certificates
        case "updateSpecificDriverADRCertificates":
            $updateDriverUserId = $_GET["updateDriverUserId"];
            $module_id = $_GET["module_id"];
            try{
                if(empty($_POST["driverADRCertificates"])){
                    $driverADRCertificates = [];
                }else{
                    $driverADRCertificates = $_POST["driverADRCertificates"];
                }
                $modelObj->deleteAllSpecificdriverADRCertificates($updateDriverUserId);
                foreach($driverADRCertificates as $ADRCertificateId){
                    $modelObj->addDriverADRCertificates($updateDriverUserId, $ADRCertificateId);            
                }       
                $msg = "Driver ADR Certificates were successfully updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $updateDriverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_driver.php?msgWarning=<?php echo $msg;?>&driverUserId=<?php echo $updateDriverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**************************************************************************************************/
/* (25) Driver */
        // 1) Deactivate Driver
        case "deactivateDriver":
            $updateDriverUserId = $_GET["updateDriverUserId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateDriver($updateDriverUserId);
                $msg = "Driver was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_drivers.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_drivers.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Activate Driver
        case "activateDriver":
            $updateDriverUserId = $_GET["updateDriverUserId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateDriver($updateDriverUserId);
                $msg = "Driver was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_drivers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_drivers.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) View Specific Driver Navigation Tab Activation
        case "viewSpecificDriverNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            $driverUserId = $_GET["driverUserId"];
            try{
                $modelObj->viewSpecificNavTabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/view_specific_driver.php?module_id=<?php echo $module_id;?>&driverUserId=<?php echo $driverUserId;?>";</script>
<?php
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 4) Add Driver Navigation Tab Activation
        case "addDriverNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            try{
                $modelObj->viewSpecificNavTabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/add_driver.php?module_id=<?php echo $module_id;?>";</script>
<?php
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 5) Add New Driver
        case "addNewDriver":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["roleId"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $driver_id = $modelObj->addNewDriver($user_id);
                $msg = "New Driver Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_drivers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_driver.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6) Add Driver to Driver Table
        case "addDriverToDriverTable":
        $module_id = $_GET["module_id"]; 
        $driverUserId = $_GET["driverUserId"];          
        try{
            $driver_id = $modelObj->addNewDriver($driverUserId);
            $msg = "New Driver Successfully Added!";
            $msg = base64_encode($msg);?>
            <script>window.location = "../view/add_driver.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
            $msg = base64_encode($ex->getMessage());?>
            <script>window.location = "../view/add_driver.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
        break;
        // 7) Update Driver Password
        case "updateDriverPassword":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "Driver Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_driver.php?msgWarning=<?php echo $msg;?>&driverUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/******************************************************************************************************/
/* (26) Driver Overview */
        // 1) Update Specific Driver Overview
        case "updateSpecificDriverOverview":
            $module_id = $_GET["module_id"];
            $name = $_POST["name"];
            $userId = $_POST["driverUserId"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateUserName(
                    $name,
                    $userId);
                $modelObj->updateEmail(
                    $email,
                    $userId);
                $modelObj->updateDob(
                    $dob,
                    $userId);
                $modelObj->updateNIC(
                    $nic,
                    $userId);
                $modelObj->updateAddress(
                    $address,
                    $userId);
                $modelObj->updateContactMobile(
                    $contactMobile, 
                    "1",
                    $userId);
                $modelObj->updateProfileImage(
                    $profileImageEdit,
                    $userId);               
                $msg = "Driver Overview Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script>   
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/************************************************************************************************/
/* (27) Driver License Overview */
        // 1) Update Specific License Overview
        case "updateSpecificLicenseOverview":  
            $module_id = $_GET["module_id"];
/* 1 */     $surname = $_POST["surname"];
/* 2 */     $otherNames = $_POST["otherNames"];
/* 3 */     $dob = $_POST["dob"];
/* 4a */    $issueLicense = $_POST["issueLicense"];
/* 4b */    $expiryLicense = $_POST["expiryLicense"];
/* 4c */    $issuingAuthority = $_POST["issuingAuthority"];
/* 4d */    $NIC = $_POST["NIC"];
/* 5 */     $noLicense = $_POST["noLicense"];
/* 6 */     $bloodGroup = $_POST["bloodGroup"];
/* 7 */     $signatureHolder = $_FILES["signatureHolder"];
/* 8 */     $address = $_POST["address"];
/* 10a1 */  $a1Issue = $_POST["a1Issue"];
/* 11a1 */  $a1Expiry = $_POST["a1Expiry"];
/* 12a1 */  $a1Code = $_POST["a1Code"];
/* 10a */   $aIssue = $_POST["aIssue"];
/* 11a */   $aExpiry = $_POST["aExpiry"];
/* 12a */   $aCode = $_POST["aCode"];
/* 10b1 */  $b1Issue = $_POST["b1Issue"];
/* 11b1 */  $b1Expiry = $_POST["b1Expiry"];
/* 12b1 */  $b1Code = $_POST["b1Code"];
/* 10b */   $bIssue = $_POST["bIssue"];
/* 11b */   $bExpiry = $_POST["bExpiry"];
/* 12b */   $bCode = $_POST["bCode"];
/* 10c1 */  $c1Issue = $_POST["c1Issue"];
/* 11c1 */  $c1Expiry = $_POST["c1Expiry"];
/* 12c1 */  $c1Code = $_POST["c1Code"];
/* 10c */   $cIssue = $_POST["cIssue"];
/* 11c */   $cExpiry = $_POST["cExpiry"];
/* 12c */   $cCode = $_POST["cCode"];
/* 10ce */  $ceIssue = $_POST["ceIssue"];
/* 11ce */  $ceExpiry = $_POST["ceExpiry"];
/* 12ce */  $ceCode = $_POST["ceCode"];
/* 10d1 */  $d1Issue = $_POST["d1Issue"];
/* 11d1 */  $d1Expiry = $_POST["d1Expiry"];
/* 12d1 */  $d1Code = $_POST["d1Code"];
/* 10d */   $dIssue = $_POST["dIssue"];
/* 11d */   $dExpiry = $_POST["dExpiry"];
/* 12d */   $dCode = $_POST["dCode"];
/* 10de */  $deIssue = $_POST["deIssue"];
/* 11de */  $deExpiry = $_POST["deExpiry"];
/* 12de */  $deCode = $_POST["deCode"];
/* 10g1 */  $g1Issue = $_POST["g1Issue"];
/* 11g1 */  $g1Expiry = $_POST["g1Expiry"];
/* 12g1 */  $g1Code = $_POST["g1Code"];
/* 10g */   $gIssue = $_POST["gIssue"];
/* 11g */   $gExpiry = $_POST["gExpiry"];
/* 12g */   $gCode = $_POST["gCode"];
/* 10j */   $jIssue = $_POST["jIssue"];
/* 11j */   $jExpiry = $_POST["jExpiry"];
/* 12j */   $jCode = $_POST["jCode"];
/* 12j */   $driverUserId = $_POST["driverUserId"];
/* 12j */   $driverLicenseId = $_POST["driverLicenseId"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^[0-9]{10}$/";
                $patLicenseNo = "/^[A-Z]{1}[0-9]{7}$/";
                //
                $signatureHolder_ = "";  
                if($signatureHolder["name"] != ""){
                    $signatureHolder_ = $signatureHolder["name"];
                    $path = "../images/driver_signatures/".$signatureHolder_;
                    move_uploaded_file($signatureHolder["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificDriverLicense(
                    $surname, 
        /* 2 */     $otherNames, 
        /* 3 */     $dob, 
        /* 4a */    $issueLicense, 
        /* 4b */    $expiryLicense, 
        /* 4c */    $issuingAuthority, 
        /* 4d */    $NIC, 
        /* 5 */     $noLicense, 
        /* 6 */     $bloodGroup,
        /* 7 */     $signatureHolder_,                
        /* 8 */     $address,                
        /* 10a1 */  $a1Issue,                
        /* 11a1 */  $a1Expiry,                
        /* 12a1 */  $a1Code,                
        /* 10a */   $aIssue,                
        /* 11a */   $aExpiry,
        /* 12a */   $aCode,                
        /* 10b1 */  $b1Issue,                
        /* 11b1 */  $b1Expiry,                
        /* 12b1 */  $b1Code,                
        /* 10b */   $bIssue,                
        /* 11b */   $bExpiry,                
        /* 12b */   $bCode,                
        /* 10c1 */  $c1Issue,                
        /* 11c1 */  $c1Expiry,                 
        /* 12c1 */  $c1Code,                
        /* 10c */   $cIssue,                
        /* 11c */   $cExpiry,             
        /* 12c */   $cCode,                
        /* 10ce */  $ceIssue,                
        /* 11ce */  $ceExpiry,                
        /* 12ce */  $ceCode,                
        /* 10d1 */  $d1Issue,                
        /* 11d1 */  $d1Expiry,
        /* 12d1 */  $d1Code,                
        /* 10d */   $dIssue,                
        /* 11d */   $dExpiry,                
        /* 12d */   $dCode,                
        /* 10de */  $deIssue,                
        /* 11de */  $deExpiry,                
        /* 12de */  $deCode,                
        /* 10g1 */  $g1Issue,                
        /* 11g1 */  $g1Expiry,                
        /* 12g1 */  $g1Code,                
        /* 10g */   $gIssue,
        /* 11g */   $gExpiry,                
        /* 12g */   $gCode,                
        /* 10j */   $jIssue,                
        /* 11j */   $jExpiry,                
        /* 12j */   $jCode,
                    $driverLicenseId);
                $msg = "Driver License has been updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $driverUserId;?>&module_id=<?php echo $module_id;?>";</script>   
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_driver.php?msgWarning=<?php echo $msg;?>&driverUserId=<?php echo $driverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Add New Driving License for Driver
        case "addNewDrivingLicenseForDriver":
        $driverUserId = $_GET["driverUserId"];
        $module_id = $_GET["module_id"];
        try{
            $driverLicenseId = $modelObj->addNewDriverLicense();
            $modelObj->updateDriverDrivingLicense($driverUserId, $driverLicenseId);
            $msg = "New Driving Lisence Added!";
            $msg = base64_encode($msg)?>            
            <script>window.location = "../view/view_specific_driver.php?msgSuccess=<?php echo $msg;?>&driverUserId=<?php echo $driverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
            $msg = base64_encode($ex->getMessage());?>
            <script>window.location = "../view/view_specific_driver.php?msgWarning=<?php echo $msg;?>&driverUserId=<?php echo $driverUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
        break;
/***************************************************************************************************/
/* (28) ADR Certificate */
        // 1) Deactivate ADR Certificate    
        case "deactivateADRCertificate":
            $updateADRCertificate = $_GET["updateADRCertificate"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateADRCertificate($updateADRCertificate);
                $msg = "ADR Certificate was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_adr_certificates.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_adr_certificates.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 2) Activate ADR Certificate 
        case "activateADRCertificate":
            $updateADRCertificate = $_GET["updateADRCertificate"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateADRCertificate($updateADRCertificate);
                $msg = "ADR Certificate was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_adr_certificates.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_adr_certificates.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php   }
            break;
        // 3) Add New ADR Certificate
        case "addNewADRCertificate":
            $module_id = $_GET["module_id"];
            $ADRCertificateName = $_POST["ADRCertificateName"];
            $ADRCertificateDescription = $_POST["ADRCertificateDescription"];
            $ADRCertificateImage = $_FILES["ADRCertificateImage"];
            try{       
                $ADRCertificateImageEdit = "";  
                if($ADRCertificateImage["name"] != ""){
                    $ADRCertificateImageEdit = $ADRCertificateImage["name"];
                    $path = "../images/driver_skill_levels_images/".$ADRCertificateImageEdit;
                    move_uploaded_file($ADRCertificateImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewADRCertificate(
                    $ADRCertificateName, 
                    $ADRCertificateDescription, 
                    $ADRCertificateImageEdit);
                $msg = "ADR Certificate Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_adr_certificates.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_adr_certificate.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php
            }
            break;
        // 4) Update Specific ADR Certificate
        case "updateSpecificADRCertificate":
            $module_id = $_GET["module_id"];
            $ADRCertificateName = $_POST["ADRCertificateName"];
            $updateADRCertificateId = $_POST["updateADRCertificateId"];
            $ADRCertificateDescription = $_POST["ADRCertificateDescription"];
            $profileImage = $_FILES["profileImage"];
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/driver_skill_levels_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificADRCertificate(
                    $ADRCertificateName, 
                    $ADRCertificateDescription, 
                    $profileImageEdit, 
                    $updateADRCertificateId);
                $msg = "ADR Certificate Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_adr_certificates.php?msgSuccess=<?php echo $msg;?>&updateADRCertificateId=<?php echo $updateADRCertificateId;?>&module_id=<?php echo $module_id;?>&aaa=<?php echo $profileImageEdit;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_adr_certificate.php?msgWarning=<?php echo $msg;?>&updateADRCertificateId=<?php echo $updateADRCertificateId;?>&module_id=<?php echo $module_id;?>&aaa=<?php echo $profileImage;?>";</script>
<?php       }
            break;
/**********************************************************************************************/
/* (29) Finance */
        // 1) Add Finance Specific Client Request Hire Driver       
        case "addFinanceIdSpecificClientRequestHireDriver":
            $module_id = $_GET["module_id"];
            $financeTypeId = $_POST["financeTypeId"];
            $hireDriverRequestId = $_POST["hireDriverRequestId"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $financeId = $modelObj->addFinanceId($financeTypeId);
                $modelObj->addFinancialIdClientRequest($financeId, $clientRequestId);
                $modelObj->addFinanceIdHireDriverIncome($financeId, $financeTypeId, $hireDriverRequestId);
                $msg = "Financial Details was Successfully Added For Hire Driver Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;  
        // 2) Add Finance Specific Client Request Hire Vehicle       
        case "addFinanceIdSpecificClientRequestHireVehicle":
            $module_id = $_GET["module_id"];
            $financeTypeId = $_POST["financeTypeId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $financeId = $modelObj->addFinanceId($financeTypeId);
                $modelObj->addFinancialIdClientRequest($financeId, $clientRequestId);
                $modelObj->addFinanceIdHireVehicleIncome($financeId, $financeTypeId, $hireVehicleRequestId);
                $msg = "Financial Details was Successfully Added For Hire Vehicle Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break; 
        // 3) Client Request Payment
        case "clientRequestPaymentIncome":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $financeId = $_POST["financeId"];
            $clientServiceId = $_POST["clientServiceId"];
            try{
                $getSpecificFinanceTypeIdOfFinanceIdResult = $modelObj->getSpecificFinanceTypeIdOfFinanceId($financeId);
                $getSpecificFinanceTypeIdOfFinanceIdRow = $getSpecificFinanceTypeIdOfFinanceIdResult->fetch_assoc();
                $getPaymentOfClientRequestResult = $modelObj->getPaymentOfClientRequest($clientRequestId, $financeId);
                $getPaymentOfClientRequestRow = $getPaymentOfClientRequestResult->fetch_assoc();
                if($getSpecificFinanceTypeIdOfFinanceIdRow["financeTypeId"]==1){                 
                    $modelObj->AddPaymentToMoneyIncome($getPaymentOfClientRequestRow["payment"], $financeId);
                    $modelObj->updatePaymentStatusAndClientCompletedStatus($clientRequestId);
                }
                $msg = "Successfully Paid!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_your_specific_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_your_specific_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break; 
        // 4) Add Finance for Specific Client Request in Hire Driver and Vehicle      
        case "addFinanceIdSpecificClientRequestHireDriverAndVehicle":
            $module_id = $_GET["module_id"];
            $financeTypeId = $_POST["financeTypeId"];
            $clientProductPurchasingRequestId = $_POST["clientProductPurchasingRequestId"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $financeId = $modelObj->addFinanceId($financeTypeId);
                $modelObj->addFinancialIdClientRequest($financeId, $clientRequestId);
                $modelObj->addFinanceIdHireDriverAndVehicleIncome($financeId, $financeTypeId, $hireDriverAndVehicleRequestId);
                $msg = "Financial Details was Successfully Added For Hire Driver Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;  
        // 4) Add Finance for Specific Client Request in Hire Driver and Vehicle      
        case "addFinanceIdSpecificProductPurchasingRequest":
            $module_id = $_GET["module_id"];
            $financeTypeId = $_POST["financeTypeId"];
            $clientProductPurchasingRequestId = $_POST["clientProductPurchasingRequestId"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $financeId = $modelObj->addFinanceId($financeTypeId);
                $modelObj->addFinancialIdClientRequest($financeId, $clientRequestId);
                $modelObj->addFinanceIdToProductPurchasingRequest($financeId, $financeTypeId, $clientProductPurchasingRequestId);
                $msg = "Financial Details was Successfully Added For Product Purchasing Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**********************************************************************************************/
/* (30) Fuel */
        // 1) View Fleet Fuel Stocks Navigation Tabs Activate
        case "viewFleetFuelStocksNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/fleet_fuel_stocks.php?module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 2) View Specific Fleet Fuel Stocks Navigation Tabs Activate
        case "viewSpecificFleetFuelStocksNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            $fleetId = $_GET["fleetId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/specific_fleet_fuel_stock.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleetId;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 3) Add Fuel Specific Fleet
        case "add_fuel_specificFleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stock_id"];
/* 1 */     $addStockRangeInput = $_POST["addStockRangeInput"];
/* 1 */     $availability = $_POST["availability"];
            try{          
                $updateFuelStock = $addStockRangeInput + $availability;
                $modelObj->addFuel(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id,
        /* 3 */     $updateFuelStock);?>
                <script>window.location="../view/specific_fleet_fuel_stock_manage.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>&fuel_stock_id=<?php echo $fuel_stocks_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 4) Remove Fuel Specific Fleet
        case "remove_fuel_specificFleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stock_id"];
/* 1 */     $removeStockRangeInput = $_POST["removeStockRangeInput"];
/* 1 */     $availability = $_POST["availability"];
            try{          
                $updateFuelStock = $availability - $removeStockRangeInput;
                $modelObj->removeFuel(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id,
        /* 3 */     $updateFuelStock);?>
                <script>window.location="../view/specific_fleet_fuel_stock_manage.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>&fuel_stock_id=<?php echo $fuel_stocks_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 5) Add Fuel Fleet
        case "add_fuel_fleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stocks_id"];
/* 1 */     $addStockRangeInput = $_POST["addStockRangeInput"];
/* 1 */     $availability = $_POST["availability"];
            try{          
                $updateFuelStock = $addStockRangeInput + $availability;
                $modelObj->addFuel(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id,
        /* 3 */     $updateFuelStock);?>
                <script>window.location="../view/fleet_fuel_stock_manage.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>&fuel_stocks_id=<?php echo $fuel_stocks_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 6) Remove Fuel Fleet
        case "remove_fuel_fleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stocks_id"];
/* 1 */     $removeStockRangeInput = $_POST["removeStockRangeInput"];
/* 1 */     $availability = $_POST["availability"];
            try{          
                $updateFuelStock = $availability - $removeStockRangeInput;
                $modelObj->removeFuel(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id,
        /* 3 */     $updateFuelStock);?>
                <script>window.location="../view/fleet_fuel_stock_manage.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>&fuel_stocks_id=<?php echo $fuel_stocks_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 7) Add New Fuel Stock
        case "AddNewFuelStock":
            $module_id = $_GET["module_id"];
/* 1 */     $stockName = $_POST["stockName"];
/* 1 */     $stockCapacity = $_POST["stockCapacity"];
/* 1 */     $fuelTypeId = $_POST["fuelTypeId"];
/* 2 */     $fleet_id = $_POST["fleetId"];
            try{
                $modelObj->addFuelStock(
        /* 1 */     $stockName,
        /* 2 */     $stockCapacity,
        /* 2 */     $fuelTypeId,
        /* 3 */     $fleet_id);?>
                <script>window.location="../view/fleet_fuel_stocks.php?module_id=<?php echo $module_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 8) Add New Fuel Stock From Specific Fleet
        case "add_fuel_stock_specificFleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
/* 1 */     $stockName = $_POST["stockName"];
/* 1 */     $stockCapacity = $_POST["stockCapacityInput"];
/* 1 */     $fuelTypeId = $_POST["fuelTypeId"];
            try{
                $modelObj->addFuelStock(
        /* 1 */     $stockName,
        /* 2 */     $stockCapacity,
        /* 2 */     $fuelTypeId,
        /* 3 */     $fleet_id);?>
                <script>window.location="../view/specific_fleet_fuel_stock.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 9) Remove Fule Stock 
        case "remove_fuel_stock_fleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stocks_id"];
            try{
                $modelObj->removeFuelStock(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id);?>
                <script>window.location="../view/fleet_fuel_stocks.php?module_id=<?php echo $module_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 10) Remove Fuel Stock from Specific Fleet   
        case "remove_fuel_stock_specificFleet":
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            $fuel_stocks_id = $_GET["fuel_stocks_id"];    
            try{
                $modelObj->removeFuelStock(
        /* 1 */     $fleet_id,
        /* 2 */     $fuel_stocks_id);?>
                <script>window.location="../view/fleet_fuel_stocks.php?module_id=<?php echo $module_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 11) Add New Fuel Type    
        case "addNewFuelType":
            $module_id = $_GET["module_id"];
            $fuelTypeName = $_POST["fuelTypeName"];
            try{
                $modelObj->addNewFuelType($fuelTypeName);
                $msg = "New Fuel Type was Successfully Added!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_fuel_type.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/add_fuel_type.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 12) Deactivate Fuel Type    
        case "deactivateFuelType":
            $updateFuelTypeId = $_GET["updateFuelTypeId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateFuelType($updateFuelTypeId);
                $msg = "Fuel Type was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_fuel_type.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_fuel_type.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 13) Activate Fuel Type
        case "activateFuelType":
            $updateFuelTypeId = $_GET["updateFuelTypeId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateFuelType($updateFuelTypeId);
                $msg = "Fuel Type was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_fuel_type.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_fuel_type.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php   }
            break;
        // 14) Update Specific Fuel Type
        case "updateSpecificFuelType":
            $updateFuelTypeId = $_GET["updateFuelTypeId"];
            $module_id = $_GET["module_id"];
            $fuelTypeId = $_POST["fuel_type_id"];
            $fuelTypeName = $_POST["fuel_type_name"];
            try{
                $modelObj->updateSpecificFuelType($fuelTypeId, $fuelTypeName);
                $msg = "Fuel Type was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_fuel_type.php?msgSuccess=<?php echo $msg;?>&updateFuelTypeId=<?php echo $updateFuelTypeId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_fuel_type.php?msgWarning=<?php echo $msg;?>&updateFuelTypeId=<?php echo $updateFuelTypeId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/******************************************************************************************************/
/* (31) Fleet */
        // 1) Return Specific fleetId for Hire Vehicle in Client
        case "returnFleetId":
            $module_id = $_GET["module_id"];
            $fleetId = $_POST["fleetId"];
            $clientServiceId = $_POST["clientServiceId"];
            try{
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/hire_vehicle_c.php?fleetId=<?php echo $fleetId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/hire_vehicle_c.php?fleetId=<?php echo $fleetId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Class of Vehicle Active in Add Vehicle to Fleet
        case "vehicleCategoryActiveInAddVehicleToFleet":
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            try{
                $modelObj->vehicleCategoryActive($class_of_vehicle_id);
                $modelObj->vehicleCategoryDisplay($class_of_vehicle_id);
                $modelObj->vehicleCategoryVariableId($class_of_vehicle_id);
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/add_vehicle_to_fleet.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                
<?php       }
            break; 
        // 3) Class of Vehicle Navigation Tab Active in View Specific Fleet Vehicles
        case "vehicleCategoryActiveInViewSpecificFleetVehicles":
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            try{
                $modelObj->vehicleCategoryActive($class_of_vehicle_id);
                $modelObj->vehicleCategoryDisplay($class_of_vehicle_id);
                $modelObj->vehicleCategoryVariableId($class_of_vehicle_id);
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_fleet_vehicles.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                                 
<?php       }
            break;
        // 4) Class of Vehicle Navigation Tab Active in Specific Fleet Vehicles
        case "vehicleCategoryActiveInSpecificFleetVehicles":
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $module_id = $_GET["module_id"];
            $fleet_id = $_GET["fleet_id"];
            try{
                $modelObj->vehicleCategoryActive($class_of_vehicle_id);
                $modelObj->vehicleCategoryDisplay($class_of_vehicle_id);
                $modelObj->vehicleCategoryVariableId($class_of_vehicle_id);
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/specific_fleet_vehicles.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>  
                
<?php       }
            break;
        // 5) Add New Fleet
        case "add_fleet":
            $module_id = $_GET["module_id"];
/* 1 */     $fleetName = $_POST["fleetName"];
/* 2 */     $cityOfTheFleetLocated = $_POST["cityOfTheFleetLocated"];
/* 3 */     $totalHeavyMotorLorrySlotCapacity = $_POST["totalHeavyMotorLorrySlotCapacity"];
/* 4 */     $totalMotorLorrySlotCapacity = $_POST["totalMotorLorrySlotCapacity"];
/* 5 */     $totalLightMotorLorrySlotCapacity = $_POST["totalLightMotorLorrySlotCapacity"];
/* 6 */     $fleetImage = $_FILES["fleetImage"];
            try{
                $totalVehicleSlotCapacity = $totalHeavyMotorLorrySlotCapacity 
                    + $totalMotorLorrySlotCapacity
                    + $totalLightMotorLorrySlotCapacity;
                $fleetImage_ = "";  
                if($fleetImage["name"] != ""){
                    $fleetImage_ = $fleetImage["name"];
                    $path = "../images/fleet_images/".$fleetImage_;
                    move_uploaded_file($fleetImage["tmp_name"], $path);                                       
                }
                $modelObj->addFleet(
        /* 1 */     $fleetName,
        /* 2 */     $cityOfTheFleetLocated,
        /* 3 */     $totalHeavyMotorLorrySlotCapacity,
        /* 4 */     $totalMotorLorrySlotCapacity,
        /* 5 */     $totalLightMotorLorrySlotCapacity,
        /* 6 */     $fleetImage_,
                    $totalVehicleSlotCapacity);
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_fleets.php?module_id=<?php echo $module_id;?>";</script>    
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?> 
                
<?php       }
            break;
        // 6) Update Specific Fleet
        case "update_specific_fleet":
            $fleet_id = $_GET["fleet_id"];
            $module_id = $_GET["module_id"];
/* 1 */     $fleetName = $_POST["fleetName"];
/* 2 */     $cityOfTheFleetLocated = $_POST["cityOfTheFleetLocated"];
/* 3 */     $totalHeavyMotorLorrySlotCapacity = $_POST["totalHeavyMotorLorrySlotCapacity"];
/* 4 */     $totalMotorLorrySlotCapacity = $_POST["totalMotorLorrySlotCapacity"];
/* 5 */     $totalLightMotorLorrySlotCapacity = $_POST["totalLightMotorLorrySlotCapacity"];
/* 6 */     $fleetImage = $_FILES["fleetImage"];
            try{
                $totalVehicleSlotCapacity = $totalHeavyMotorLorrySlotCapacity 
                    + $totalMotorLorrySlotCapacity
                    + $totalLightMotorLorrySlotCapacity;
                $fleetImage_ = "";  
                if($fleetImage["name"] != ""){
                    $fleetImage_ = $fleetImage["name"];
                    $path = "../../images/fleet_images/".$fleetImage_;
                    move_uploaded_file($fleetImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificFleet(
        /* 1 */     $fleetName,   
        /* 2 */     $cityOfTheFleetLocated,
        /* 3 */     $totalHeavyMotorLorrySlotCapacity,
        /* 4 */     $totalMotorLorrySlotCapacity,
        /* 5 */     $totalLightMotorLorrySlotCapacity,
        /* 6 */     $fleetImage_,
                    $totalVehicleSlotCapacity,
                    $fleet_id);
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_fleet.php?module_id=<?php echo $module_id;?>&fleet_id=<?php echo $fleet_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?> 
                
<?php       }
            break;
/******************************************************************************************************/
/* (32) Product Manufacturer */
        // 1) Add New Product Manufacturer
        case "addNewProductManufacturer":
            $productManufacturerName = $_POST["productManufacturerName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->addNewProductManufacturer($productManufacturerName);
                $msg = "New Product Manufacturer was Successfully Added!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_manufacturers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_product_manufacturer.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Update Specific Product Manufacturer       
        case "updateSpecificProductManufacturer":
            $productManufacturerId = $_POST["productManufacturerId"];
            $productManufacturerName = $_POST["productManufacturerName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->updateSpecificProductManufacturer($productManufacturerId, $productManufacturerName);
                $msg = "Product Manufacturer was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_product_manufacturer.php?msgSuccess=<?php echo $msg;?>&updateProductManufacturerId=<?php echo $productManufacturerId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_product_manufacturer.php?msgWarning=<?php echo $msg;?>&updateProductManufacturerId=<?php echo $productManufacturerId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Activate Product Category
        case "activateProductManufacturer":
            $updateProductManufacturerId = $_GET["updateProductManufacturerId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateProductManufacturer($updateProductManufacturerId);
                $msg = "Product Manufacturer was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_manufacturers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_product_manufacturers.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Deactivate Product Category
        case "deactivateProductManufacturer":
            $updateProductManufacturerId = $_GET["updateProductManufacturerId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateProductManufacturer($updateProductManufacturerId);
                $msg = "Product Manufacturer was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_manufacturers.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_product_manufacturers.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;  
/************************************************************************************************/
/* (33) Inventory */
        // 1) Add New Inventory For Warehouse
        case "addNewInventoryForWarehouse":
            $module_id = $_GET["module_id"];            
            $warehouseId = $_GET["warehouseId"];            
            try{
                $modelObj->addNewInventoryForWarehouse($warehouseId);
                $modelObj->updateWarehouseInventoryStatusActive($warehouseId);
                $msg = "Warehouse Inventory was Successfully Created!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_inventory.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_inventory.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/*************************************************************************************************/
/* (34) Product Category */
        // 1) Update Specific Product Category  
        case "updateSpecificProductCategory":
            $productCategoryId = $_POST["productCategoryId"];
            $productCategoryName = $_POST["productCategoryName"];
            $productUnitTypeId = $_POST["productUnitTypeId"];
            $productUnitMeasureId = $_POST["productUnitMeasureId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->updateProductCategory($productCategoryId, $productCategoryName, $productUnitTypeId, $productUnitMeasureId);
                $msg = "Product Category was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_product_category.php?msgSuccess=<?php echo $msg;?>&updateProductCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_product_category.php?msgWarning=<?php echo $msg;?>&updateProductCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Add New Product Category
        case "addNewProductCategory":
            $productCategoryName = $_POST["productCategoryName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->addNewProductCategory($productCategoryName);
                $msg = "New Product Category was Successfully Added!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_category.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_product_category.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Activate Product Category
        case "activateProductCategory":
            $updateProductCategoryId = $_GET["updateProductCategoryId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateProductCategory($updateProductCategoryId);
                $msg = "Product Category was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_categories.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_product_categories.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Deactivate Product Category
        case "deactivateProductCategory":
            $updateProductCategoryId = $_GET["updateProductCategoryId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateProductCategory($updateProductCategoryId);
                $msg = "Product Category was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_product_categories.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_product_categories.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5)
        case "productCategoryView":
            $module_id = $_GET["module_id"];
            $category_id = $_GET["category_id"];
            $functions_idProducts = $_GET["functions_idProducts"];?>
            <script>window.location="../../view/inventory/specific-category-products.php?module_id=<?php echo $module_id;?>&category_id=<?php echo $category_id;?>&functions_idProducts=<?php echo $functions_idProducts;?>";</script>
<?php
            break;
/************************************************************************************************/
/* (35) Products */
        // 1) Activate Product 
        case "activateProduct":
            $updateProductId = $_GET["updateProductId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateProduct($updateProductId);
                $msg = "Product was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_products.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_products.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Deactivate Product
        case "deactivateProduct":
            $updateProductId = $_GET["updateProductId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateProduct($updateProductId);
                $msg = "Product was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_products.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_products.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;           
        // 3) Update Specific Product
        case "updateSpecificProduct":
            $module_id = $_GET["module_id"];
            $productId = $_POST["productId"];
            $productName = $_POST["productName"];
            $productUnitPrice = $_POST["productUnitPrice"];
            $productManufacturerId = $_POST["productManufacturerId"];
            $productCategoryId = $_POST["productCategoryId"];
            $productUnitMeasureValue = $_POST["productUnitMeasureValue"];
            $productImage = $_FILES["productImage"];
            try{
                $productImageEdit = "";  
                if($productImage["name"] != ""){
                    $productImageEdit = $productImage["name"];
                    $path = "../images/product_images/".$productImageEdit;
                    move_uploaded_file($productImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificProduct($productId, $productUnitPrice, $productName, $productManufacturerId, $productCategoryId, $productImageEdit, $productUnitMeasureValue);
                $msg = "Product was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_product.php?msgSuccess=<?php echo $msg;?>&updateProductId=<?php echo $productId;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_product.php?msgWarning=<?php echo $msg;?>&updateProductId=<?php echo $productId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Add New Product
        case "addNewProduct":
            $module_id = $_GET["module_id"];
            $productName = $_POST["productName"];
            $productUnitPrice = $_POST["productUnitPrice"];
            $productManufacturerId = $_POST["productManufacturerId"];
            $productCategoryId = $_POST["productCategoryId"];
            $productUnitMeasureValue = $_POST["productUnitMeasureValue"];
            $productImage = $_FILES["productImage"];
            try{
                $productImageEdit = "";  
                if($productImage["name"] != ""){
                    $productImageEdit = $productImage["name"];
                    $path = "../images/product_images/".$productImageEdit;
                    move_uploaded_file($productImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewProduct($productName, $productUnitPrice, $productManufacturerId, $productCategoryId, $productImageEdit, $productUnitMeasureValue);
                $msg = "New Product was Successfully Added!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_products.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>  
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_product.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*******************************************************************************************************/
/* (36) Inventory Section */
        // 1) Add New Inventory Section For Warehouse Section
        case "addNewInventorySectionForWarehouseSection":
            $module_id = $_GET["module_id"];            
            $warehouseId = $_GET["warehouseId"];            
            $warehouseSectionId = $_GET["warehouseSectionId"];            
            try{
                $modelObj->addNewInventorySectionForWarehouseSection($warehouseId, $warehouseSectionId);
                $modelObj->updateWarehouseSectionInventorySectionStatusActive($warehouseSectionId);
                $msg = "Inventory Section was Successfully Created in Warehouse Section!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_inventory_section.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_inventory_section.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/******************************************************************************************************/
/* (37) Login */
        // 1) Login Validation and Direction
        case "login":
            try{
                if($_POST["username"] == ""){throw new Exception("Username cannot be Empty!!!");}
                if($_POST["password"] == ""){throw new Exception("Password cannot be Empty!!!");}
                $login_username = $_POST["username"];
                $login_password = $_POST["password"];
                $loginResult = $modelObj->validateLogin($login_username, $login_password);
                if($loginResult->num_rows==1){
                    $userrow = $loginResult->fetch_assoc();
                    $_SESSION["user"] = $userrow;
                    $user_id = $_SESSION["user"]["user_id"];
                    $modelObj->makeOnlineLoginStatus($user_id);
                    $msg = "Logged Successfully!";
                    $msg = base64_encode($msg);?>
                    <script type="text/javascript">window.location = "../view/dashboard.php?msgSuccess=<?php echo $msg;?>";</script>
<?php           }else{
                    throw new Exception("Invalid Credentails!!!");
                }
            }catch(Exception $ex){
                $msg = $ex->getMessage();
                $msg = base64_encode($msg);?>
                <script type="text/javascript">window.location = "../view/login.php?msgWarning=<?php echo $msg;?>";</script>
<?php       }
            break;
        // 2) Logout the User
        case "logout":
            $user_id = $_GET["user_id"];
            $modelObj->makeOfflineLoginStatus($user_id);
            session_destroy();
            $msg = "Successfully Logout!";
            $msg = base64_encode($msg);?>
            <script type="text/javascript">window.location = "../index.php?msgSuccess=<?php echo $msg;?>";</script>
<?php       break;
/************************************************************************************************************/
/* (38) Profile Settings */
        // 1) Update Profile Password
        case "updateProfilePassword":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_profileProfile_settings.php?msg=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../../view/user/add-user.php?msg=<?php echo $msg;?>&module_id=<?php echo $module_id;?>&functions_idAddUser=5";</script> 
<?php       }
            break;
/******************************************************************************************************/
/* (39) Vehicle */
        // 1) Add New Vehicle
        case "addNewVehicle": 
            $module_id = $_GET["module_id"];
            $vehicleVehicleClassId = $_POST["vehicleVehicleClassId"];
            $vehicleMakeId = $_POST["vehicleMakeId"];
            $vehicleModel = $_POST["vehicleModel"];
            $vehicleColor = $_POST["vehicleColor"];
            $vehicleRegistrationNo = $_POST["vehicleRegistrationNo"];
            $vehicleImage = $_FILES["vehicleImage"];
            try{
                $vehicleImageEdit = "";  
                // upload images
                if($vehicleImage["name"] != ""){
                    $vehicleImageEdit = $vehicleImage["name"];
                    $path = "../images/vehicle_images/".$vehicleImageEdit;
                    move_uploaded_file($vehicleImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewVehicle(
                    $vehicleVehicleClassId,
                    $vehicleMakeId,
                    $vehicleModel,
                    $vehicleColor,
                    $vehicleRegistrationNo,
                    $vehicleImageEdit);
                $msg = "New Vehicle Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_vehicles.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_vehicle.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Get Specific Year for View Specific Year
        case "getSpecificYear":
            $module_id = $_GET["module_id"];
            $vehicleId = $_GET["vehicleId"];
            $yearId = $_POST["yearId"];
            try{ ?>
                <script>window.location="../view/view_specific_vehicle.php?yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/view_specific_vehicle.php?yearId=<?php echo $yearId;?>&vehicle_id=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) View Specific Vehicle Navigation Tab Activate
        case "viewSpecificVehicleNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            $vehicleId = $_GET["vehicleId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/view_specific_vehicle.php?module_id=<?php echo $module_id;?>&vehicleId=<?php echo $vehicleId;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 4) View Vehicles Navigation Tab Activate
        case "viewViewVehiclesNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/view_vehicles.php?module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 5) Update Process Status From Vehicle 
        case "updateProcessStatusFromVehicle":
            $module_id = $_GET["module_id"];
            $processStatusId = $_POST["processStatusId"];
            $clientRequestId = $_POST["clientRequestId"];
            $vehicleTaskId = $_POST["vehicleTaskId"];
            $vehicleId = $_POST["vehicleId"];
            try{
                $modelObj->updateProcessStatusFromDriverOperator($processStatusId, $clientRequestId);
                if($processStatusId==4){
                    $modelObj->vehicleUnassigning($vehicleId);
                }
                if($processStatusId==3 | $processStatusId==5){
                    $modelObj->vehicleAssigning($vehicleId);
                }
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_vehicle_task.php?msgSuccess=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_vehicle_task.php?msgWarning=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6) Update Hire Vehicle Request Income Table
        case "updateHireVehicleRequestIncomeTable":
            $module_id = $_GET["module_id"];
            $vehicleTaskId = $_POST["vehicleTaskId"];
            $hireVehicleRequestIncomeId = $_POST["hireVehicleRequestIncomeId"];
            $odometerValue = $_POST["odometerValue"];
            try{
                $modelObj->updateHireVehicleRequestIncomeTable($hireVehicleRequestIncomeId, $odometerValue);
                $msg = "Odometer Differnece Value Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_vehicle_task.php?msgSuccess=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_vehicle_task.php?msgWarning=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        //
        case "viewVehicleCategoryView":
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $vehicleId = $_GET["vehicleId"];
            $module_id = $_GET["module_id"];
            $getVehicleClass = $modelObj->getVehicleClass($class_of_vehicle_id);
            $getVehicleClass = $getVehicleClass->fetch_assoc();?>     
            <script>window.location="../view/update-vehicle.php?status=<?php echo $getVehicleClass["class_of_vehicle_name"];?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       break;
        //
        case "addVehicleCategoryView":          
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $module_id = $_GET["module_id"];
            $getVehicleClass = $modelObj->getVehicleClass($class_of_vehicle_id);
            $getVehicleClass= $getVehicleClass->fetch_assoc();?>     
            <script>window.location="../view/add-vehicle.php?status=<?php echo $getVehicleClass["class_of_vehicle_name"];?>&module_id=<?php echo $module_id;?>";</script>
<?php       break;  
        //
        case "vehicleCategoryActive":
            $class_of_vehicle_id = $_GET["class_of_vehicle_id"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->vehicleCategoryActive($class_of_vehicle_id);
                $modelObj->vehicleCategoryDisplay($class_of_vehicle_id);
                $modelObj->vehicleCategoryVariableId($class_of_vehicle_id);?>
                <script>window.location="../view/view_vehicles.php?module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break; 
        //
        case "classOfVehicleNavTabsActivationSpecificFleetVehicle":
            $module_id = $_GET["module_id"];
            $classOfVehicleId = $_GET["classOfVehicleId"];
            $fleetId = $_GET["fleetId"];            
            try{
                $modelObj->vehicleCategoryActive($classOfVehicleId);
                $modelObj->vehicleCategoryDisplay($classOfVehicleId);
                $modelObj->vehicleCategoryVariableId($classOfVehicleId);?>
                <script>window.location="../view/specific_fleet_vehicles.php?&fleet_id=<?php echo $fleetId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break; 
        //
        case "vehicleCategoryActive1":
            $class_of_vehicle_id = $_POST["class_of_vehicle_id"];
            $modelObj->vehicleCategoryActive($class_of_vehicle_id);
            $modelObj->vehicleCategoryDisplay($class_of_vehicle_id);
            $modelObj->vehicleCategoryVariableId($class_of_vehicle_id);
            break; 
/*********************************************************************************************************/
/* (40) Vehicle Overview */
        // 1) Updae Specific Vehicle Overview
        case "updateSpecificVehicleOverview":
            $module_id = $_GET["module_id"];
            $vehicleId = $_POST["vehicleId"];
            $vehicleVehicleClassId = $_POST["vehicleVehicleClassId"];
            $vehicleMakeId = $_POST["vehicleMakeId"];
            $vehicleModel = $_POST["vehicleModel"];
            $vehicleColor = $_POST["vehicleColor"];
            $vehicleRegistrationNo = $_POST["vehicleRegistrationNo"];
            $fleetId = $_POST["fleetId"];
            $vehicleImage = $_FILES["vehicleImage"];
            try{
                $vehicleImageEdit = "";  
                if($vehicleImage["name"] != ""){
                    $vehicleImageEdit = $vehicleImage["name"];
                    $path = "../images/vehicle_images/".$vehicleImageEdit;
                    move_uploaded_file($vehicleImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificVehicleOverview(
                    $vehicleId,    
                    $vehicleVehicleClassId,    
                    $vehicleMakeId,    
                    $vehicleModel,    
                    $vehicleColor,    
                    $vehicleRegistrationNo,    
                    $fleetId,       
                    $vehicleImageEdit);
                $msg = "Vehicle Overview Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage()); ?>
                <script>window.location="../view/update_specific_vehicle.php?msgWarning=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*********************************************************************************************/
// (41) Vehicle Manufacturer
        // 1) Update Specif
        case "updateSpecificVehicleManufacturer":
            $module_id = $_GET["module_id"];
            $vehicleManufacturerId = $_POST["vehicleManufacturerId"];
            $vehicleManufacturerName = $_POST["vehicleManufacturerName"];
            try{
                $modelObj->updateSpecificVehicleManufacturer($vehicleManufacturerName, $vehicleManufacturerId);
                $msg = "$vehicleManufacturerName vehicle manufacturer Successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle_manufacturer.php?msgSuccess=<?php echo $msg;?>&updateVehicleManufacturerId=<?php echo $vehicleManufacturerId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_vehicle_manufacturer.php?msgSuccess=<?php echo $msg;?>&updateVehicleManufacturerId=<?php echo $vehicleManufacturerId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Add New Vehicle Manufacturer 
        case "addNewVehicleManufacturer":
            $module_id = $_GET["module_id"];
            $vehicleManufacturerName = $_POST["vehicleManufacturerName"];
            try{
                $modelObj->addNewVehicleManufacturer($vehicleManufacturerName);
                $msg = "$vehicleManufacturerName vehicle manufacturer Successfully added!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_vehicle_manufacturers.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehicle_manufacturer.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/*************************************************************************************************/
/* (42) Vehicle Revenue License */     
        // 1) Get Specific Year in Add Vehicle Revenue License
        case "getSpecificYearAddVehicleRevenueLicense":
            $module_id = $_GET["module_id"];
            $vehicleId = $_POST["vehicleId"];
            $yearId = $_POST["yearId"];
            try{?>
                <script>window.location="../view/add_vehcle_revenue_license.php?yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehcle_revenue_license.php?msgWarning=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Update Specific Vehicle Revenuse License
        case "updateSpecificVehicleRevenueLicense":
            $module_id = $_GET["module_id"];
            $vehicleClassId = $_POST["vehicleClassId"];
            $vehicleRevenueLicenseId = $_POST["vehicleRevenueLicenseId"];
            $yearId = $_POST["yearId"];
            $vehicleId = $_POST["vehicleId"];
            $FuelTypeId = $_POST["FuelTypeId"];
            $VehicleNo = $_POST["VehicleNo"];
            $OwnerName = $_POST["OwnerName"];
            $OwneAddress = $_POST["OwneAddress"];
            $UnladenWeight = $_POST["UnladenWeight"];
            $GrossWeight = $_POST["GrossWeight"];
            $SeatsNo = $_POST["SeatsNo"];
            $LicenseVetNo = $_POST["LicenseVetNo"];
            $AnnualFee = $_POST["AnnualFee"];
            $Arrears = $_POST["Arrears"];
            $FinessPaid = $_POST["FinessPaid"];
            $ValidFrom = $_POST["ValidFrom"];
            $ValidTo = $_POST["ValidTo"];
            try{
                $modelObj->updateSpecificVehicleRevenueLicense(
                    $vehicleClassId, 
                    $vehicleRevenueLicenseId, 
                    $vehicleId, 
                    $FuelTypeId, 
                    $VehicleNo, 
                    $OwnerName, 
                    $OwneAddress, 
                    $UnladenWeight, 
                    $GrossWeight, 
                    $SeatsNo, 
                    $LicenseVetNo, 
                    $AnnualFee, 
                    $Arrears, 
                    $FinessPaid, 
                    $ValidFrom, 
                    $ValidTo);
                $msg = "Vehicle Revenue License Successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_vehicle.php?msgWarning=<?php echo $msg;?>&updateVehicleRevenueLicenseId=<?php echo $vehicleRevenueLicenseId;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Add New Vehicle Revenue License
        case "addVehicleRevenueLicense":
            $module_id = $_GET["module_id"];
            $vehicleRevenueLicenseVehicleClassId = $_POST["vehicleRevenueLicenseVehicleClassId"];
            $vehicleId = $_POST["vehicleId"];
            $yearId = $_POST["yearId"];
            $vehicleRevenueLicenseFuelTypeId = $_POST["vehicleRevenueLicenseFuelTypeId"];
            $vehicleRevenueLicenseVehicleNo = $_POST["vehicleRevenueLicenseVehicleNo"];
            $vehicleRevenueLicenseOwnerName = $_POST["vehicleRevenueLicenseOwnerName"];
            $vehicleRevenueLicenseOwneAddress = $_POST["vehicleRevenueLicenseOwneAddress"];
            $vehicleRevenueLicenseUnladenWeight = $_POST["vehicleRevenueLicenseUnladenWeight"];
            $vehicleRevenueLicenseGrossWeight = $_POST["vehicleRevenueLicenseGrossWeight"];
            $vehicleRevenueLicenseSeatsNo = $_POST["vehicleRevenueLicenseSeatsNo"];
            $vehicleRevenueLicenseVetNo = $_POST["vehicleRevenueLicenseVetNo"];
            $vehicleRevenueLicenseAnnualFee = $_POST["vehicleRevenueLicenseAnnualFee"];
            $vehicleRevenueLicenseArrears = $_POST["vehicleRevenueLicenseArrears"];
            $vehicleRevenueLicenseFinessPaid = $_POST["vehicleRevenueLicenseFinessPaid"];
            $vehicleRevenueLicenseValidFrom = $_POST["vehicleRevenueLicenseValidFrom"];
            $vehicleRevenueLicenseValidTo = $_POST["vehicleRevenueLicenseValidTo"];
            try{
                $modelObj->addVehicleRevenueLicense(
                    $vehicleRevenueLicenseVehicleClassId, 
                    $vehicleId, 
                    $yearId, 
                    $vehicleRevenueLicenseFuelTypeId, 
                    $vehicleRevenueLicenseVehicleNo, 
                    $vehicleRevenueLicenseOwnerName, 
                    $vehicleRevenueLicenseOwneAddress, 
                    $vehicleRevenueLicenseUnladenWeight, 
                    $vehicleRevenueLicenseGrossWeight, 
                    $vehicleRevenueLicenseSeatsNo, 
                    $vehicleRevenueLicenseVetNo, 
                    $vehicleRevenueLicenseAnnualFee, 
                    $vehicleRevenueLicenseArrears, 
                    $vehicleRevenueLicenseFinessPaid, 
                    $vehicleRevenueLicenseValidFrom, 
                    $vehicleRevenueLicenseValidTo);
                $msg = "New Vehicle Revenue License Successfully added";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehcle_revenue_license.php?msgSuccess=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/****************************************************************************************************/
/* (43) Vehicle Insurance */
        // 1) Add New Vehicle Insurance
        case "addVehicleInsurance":
            $module_id = $_GET["module_id"];
            $insuranceCompanyName = $_POST["insuranceCompanyName"];     
            $yearId = $_POST["yearId"];     
            $vehicleId = $_POST["vehicleId"];     
            $insuranceCompanyAddress = $_POST["insuranceCompanyAddress"];     
            $insuranceCompanyNumber = $_POST["insuranceCompanyNumber"];     
            $vehicle_no = $_POST["vehicle_no"];     
            $insuranceNo = $_POST["insuranceNo"];     
            $makeId = $_POST["makeId"];     
            $model = $_POST["model"];     
            $policyNo = $_POST["policyNo"];     
            $name = $_POST["name"];     
            $address = $_POST["address"];     
            $periodOfStart = $_POST["periodOfStart"];     
            $periodOfEnd = $_POST["periodOfEnd"];     
            $engineNo = $_POST["engineNo"];     
            $ChassisNo = $_POST["ChassisNo"];       
            try{
                $modelObj->addVehicleInsurance(
                    $insuranceCompanyName, 
                    $yearId, 
                    $vehicleId, 
                    $insuranceCompanyAddress, 
                    $insuranceCompanyNumber, 
                    $vehicle_no,
                    $insuranceNo, 
                    $makeId, 
                    $model, 
                    $policyNo, 
                    $name, 
                    $address, 
                    $periodOfStart, 
                    $periodOfEnd, 
                    $engineNo, 
                    $ChassisNo);
                $msg = "New Vehicle Insurance Successfully added";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehicle_insurance.php?msgSuccess=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Get Specific Year for Add Vehicle Insurance
        case "getSpecificYearAddVehicleInsurance":
            $module_id = $_GET["module_id"];
            $vehicleId = $_POST["vehicleId"];
            $yearId = $_POST["yearId"];
            try{ ?>
                <script>window.location="../view/add_vehicle_insurance.php?yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehicle_insurance.php?msgWarning=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Update Specific Vehicle Insuranse
        case "updateSpecificVehicleInsurance":
            $module_id = $_GET["module_id"];
            $insuranceCompanyName = $_POST["insuranceCompanyName"];           
            $vehicleInsurancesId = $_POST["vehicleInsurancesId"];           
            $yearId = $_POST["yearId"];           
            $vehicleId = $_POST["vehicleId"];           
            $insuranceCompanyAddress = $_POST["insuranceCompanyAddress"];           
            $insuranceCompanyNumber = $_POST["insuranceCompanyNumber"];           
            $vehicle_no = $_POST["vehicle_no"];           
            $insuranceNo = $_POST["insuranceNo"];           
            $makeId = $_POST["makeId"];           
            $model = $_POST["model"];           
            $policyNo = $_POST["policyNo"];           
            $name = $_POST["name"];           
            $address = $_POST["address"];           
            $periodOfStart = $_POST["periodOfStart"];           
            $periodOfEnd = $_POST["periodOfEnd"];           
            $engineNo = $_POST["engineNo"];           
            $ChassisNo = $_POST["ChassisNo"];           
            try{
                $modelObj->updateSpecificVehicleInsurance(
                    $insuranceCompanyName, 
                    $vehicleInsurancesId, 
                    $vehicleId, 
                    $insuranceCompanyAddress, 
                    $insuranceCompanyNumber, 
                    $vehicle_no,         
                    $insuranceNo,         
                    $makeId,         
                    $model,         
                    $policyNo,         
                    $name,         
                    $address,         
                    $periodOfStart,         
                    $periodOfEnd,         
                    $engineNo,              
                    $ChassisNo);
                $msg = "Vehicle Insurance Successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&updateVehicleInsuranceId=<?php echo $vehicleInsurancesId;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/*************************************************************************************************/
/* (44) Vehicle Emission Test */
        // 1) Add Vehicle Emission Test
        case "addNewVehicleEmissionTest":
            $module_id = $_GET["module_id"];
            $emissionTestCompanyName = $_POST["emissionTestCompanyName"];                                       
            $vehicleId = $_POST["vehicleId"];                     
            $yearId = $_POST["yearId"];                     
            $emissionTestCompanyAddress = $_POST["emissionTestCompanyAddress"];                     
            $emissionTestIdNumber = $_POST["emissionTestIdNumber"];                     
            $emissionTestIdSerialNo = $_POST["emissionTestIdSerialNo"];                     
            $emissionTestRegNo = $_POST["emissionTestRegNo"];                     
            $emissionTestIdDateOfIssue = $_POST["emissionTestIdDateOfIssue"];                     
            $emissionTestVehicleClassId = $_POST["emissionTestVehicleClassId"];                     
            $emissionTestMakeId = $_POST["emissionTestMakeId"];                     
            $emissionTestIdChassisNo = $_POST["emissionTestIdChassisNo"];                     
            $emissionTestIdModel = $_POST["emissionTestIdModel"];                     
            $emissionTestIdEngineNo = $_POST["emissionTestIdEngineNo"];                     
            $emissionTestIdYearOfMFGId = $_POST["emissionTestIdYearOfMFGId"];                     
            $emissionTestIdFuelTypeId = $_POST["emissionTestIdFuelTypeId"];                     
            $emissionTestCenter = $_POST["emissionTestCenter"];                     
            $emissionTestIdOdometer = $_POST["emissionTestIdOdometer"];                     
            $emissionTestTestFee = $_POST["emissionTestTestFee"];                     
            $emissionTestIdLane = $_POST["emissionTestIdLane"];                     
            $emissionTestInstrument = $_POST["emissionTestInstrument"];                     
            $emissionTestIdInspector = $_POST["emissionTestIdInspector"];                     
            $emissionTestTestStart = $_POST["emissionTestTestStart"];                     
            $emissionTestTestEnd = $_POST["emissionTestTestEnd"];                     
            $emissionTestIdelRpm = $_POST["emissionTestIdelRpm"];                     
            $emissionTestIdelHc = $_POST["emissionTestIdelHc"];                     
            $emissionTestIdelCo = $_POST["emissionTestIdelCo"];                     
            $emissionTestIdelL = $_POST["emissionTestIdelL"];                     
            $emissionTestIdelO2 = $_POST["emissionTestIdelO2"];                     
            $emissionTestIdelCo2 = $_POST["emissionTestIdelCo2"];                     
            $emissionTestOverallStatus = $_POST["emissionTestOverallStatus"];                     
            $emissionTestRpmRpm = $_POST["emissionTestRpmRpm"];                     
            $emissionTestRpmHc = $_POST["emissionTestRpmHc"];                     
            $emissionTestRpmCo = $_POST["emissionTestRpmCo"];                     
            $emissionTestRpmL = $_POST["emissionTestRpmL"];                     
            $emissionTestRpmO2 = $_POST["emissionTestRpmO2"];                     
            $emissionTestRpmCo2 = $_POST["emissionTestRpmCo2"];                     
            $emissionTestOiltempRpm = $_POST["emissionTestOiltempRpm"];                     
            $emissionTestReferenceNo = $_POST["emissionTestReferenceNo"];                     
            $emissionTestQRCodeImg = $_FILES["emissionTestQRCodeImg"];                     
            $emissionTestVehicleImg = $_FILES["emissionTestVehicleImg"];                     
            $emissionTestValidTill = $_POST["emissionTestValidTill"];                                         
            try{
                $emissionTestQRCodeImgEdit = "";  
                if($emissionTestQRCodeImg["name"] != ""){
                    $emissionTestQRCodeImgEdit = $emissionTestQRCodeImg["name"];
                    $path = "../images/vehicle_images/".$emissionTestQRCodeImgEdit;
                    move_uploaded_file($emissionTestQRCodeImg["tmp_name"], $path);                                       
                }
                $emissionTestVehicleImgEdit = "";  
                if($emissionTestVehicleImg["name"] != ""){
                    $emissionTestVehicleImgEdit = $emissionTestVehicleImg["name"];
                    $path = "../images/vehicle_images/".$emissionTestVehicleImgEdit;
                    move_uploaded_file($emissionTestVehicleImg["tmp_name"], $path);                                       
                }
                $modelObj->addNewVehicleEmissionTest(
                    $emissionTestCompanyName, 
                    $yearId, 
                    $vehicleId, 
                    $emissionTestCompanyAddress, 
                    $emissionTestIdNumber, 
                    $emissionTestIdSerialNo, 
                    $emissionTestRegNo, 
                    $emissionTestIdDateOfIssue, 
                    $emissionTestVehicleClassId, 
                    $emissionTestMakeId, 
                    $emissionTestIdChassisNo, 
                    $emissionTestIdModel, 
                    $emissionTestIdEngineNo, 
                    $emissionTestIdYearOfMFGId, 
                    $emissionTestIdFuelTypeId, 
                    $emissionTestCenter, 
                    $emissionTestIdOdometer, 
                    $emissionTestTestFee, 
                    $emissionTestIdLane, 
                    $emissionTestInstrument, 
                    $emissionTestIdInspector, 
                    $emissionTestTestStart, 
                    $emissionTestTestEnd, 
                    $emissionTestIdelRpm, 
                    $emissionTestIdelHc, 
                    $emissionTestIdelCo, 
                    $emissionTestIdelL, 
                    $emissionTestIdelO2, 
                    $emissionTestIdelCo2, 
                    $emissionTestOverallStatus, 
                    $emissionTestRpmRpm, 
                    $emissionTestRpmHc, 
                    $emissionTestRpmCo, 
                    $emissionTestRpmL, 
                    $emissionTestRpmO2, 
                    $emissionTestRpmCo2, 
                    $emissionTestOiltempRpm, 
                    $emissionTestReferenceNo, 
                    $emissionTestQRCodeImgEdit, 
                    $emissionTestVehicleImgEdit, 
                    $emissionTestValidTill);
                $msg = "Nre Vehicle Emission Test Successfully Created!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehicle_emission_test.php?msgWarning=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Update Specific Vehicle Emission Test
        case "updateSpecificVehicleEmissionTest":
            $module_id = $_GET["module_id"];
            $emissionTestCompanyName = $_POST["emissionTestCompanyName"];                     
            $emissionTestId = $_POST["emissionTestId"];                     
            $vehicleId = $_POST["vehicleId"];                     
            $yearId = $_POST["yearId"];                     
            $emissionTestCompanyAddress = $_POST["emissionTestCompanyAddress"];                     
            $emissionTestIdNumber = $_POST["emissionTestIdNumber"];                     
            $emissionTestIdSerialNo = $_POST["emissionTestIdSerialNo"];                     
            $emissionTestRegNo = $_POST["emissionTestRegNo"];                     
            $emissionTestIdDateOfIssue = $_POST["emissionTestIdDateOfIssue"];                     
            $emissionTestVehicleClassId = $_POST["emissionTestVehicleClassId"];                     
            $emissionTestMakeId = $_POST["emissionTestMakeId"];                     
            $emissionTestIdChassisNo = $_POST["emissionTestIdChassisNo"];                     
            $emissionTestIdModel = $_POST["emissionTestIdModel"];                     
            $emissionTestIdEngineNo = $_POST["emissionTestIdEngineNo"];                     
            $emissionTestIdYearOfMFGId = $_POST["emissionTestIdYearOfMFGId"];                     
            $emissionTestIdFuelTypeId = $_POST["emissionTestIdFuelTypeId"];                     
            $emissionTestCenter = $_POST["emissionTestCenter"];                     
            $emissionTestIdOdometer = $_POST["emissionTestIdOdometer"];                     
            $emissionTestTestFee = $_POST["emissionTestTestFee"];                     
            $emissionTestIdLane = $_POST["emissionTestIdLane"];                     
            $emissionTestInstrument = $_POST["emissionTestInstrument"];                     
            $emissionTestIdInspector = $_POST["emissionTestIdInspector"];                     
            $emissionTestTestStart = $_POST["emissionTestTestStart"];                     
            $emissionTestTestEnd = $_POST["emissionTestTestEnd"];                     
            $emissionTestIdelRpm = $_POST["emissionTestIdelRpm"];                     
            $emissionTestIdelHc = $_POST["emissionTestIdelHc"];                     
            $emissionTestIdelCo = $_POST["emissionTestIdelCo"];                     
            $emissionTestIdelL = $_POST["emissionTestIdelL"];                     
            $emissionTestIdelO2 = $_POST["emissionTestIdelO2"];                     
            $emissionTestIdelCo2 = $_POST["emissionTestIdelCo2"];                     
            $emissionTestOverallStatus = $_POST["emissionTestOverallStatus"];                     
            $emissionTestRpmRpm = $_POST["emissionTestRpmRpm"];                     
            $emissionTestRpmHc = $_POST["emissionTestRpmHc"];                     
            $emissionTestRpmCo = $_POST["emissionTestRpmCo"];                     
            $emissionTestRpmL = $_POST["emissionTestRpmL"];                     
            $emissionTestRpmO2 = $_POST["emissionTestRpmO2"];                     
            $emissionTestRpmCo2 = $_POST["emissionTestRpmCo2"];                     
            $emissionTestOiltempRpm = $_POST["emissionTestOiltempRpm"];                     
            $emissionTestReferenceNo = $_POST["emissionTestReferenceNo"];                     
            $emissionTestQRCodeImg = $_POST["emissionTestQRCodeImg"];                     
            $emissionTestVehicleImg = $_POST["emissionTestVehicleImg"];                     
            $emissionTestValidTill = $_POST["emissionTestValidTill"];                                         
            try{
                $modelObj->updateSpecificVehicleEmissionTest(
                    $emissionTestCompanyName, 
                    $emissionTestId, 
                    $vehicleId, 
                    $emissionTestCompanyAddress, 
                    $emissionTestIdNumber, 
                    $emissionTestIdSerialNo, 
                    $emissionTestRegNo, 
                    $emissionTestIdDateOfIssue, 
                    $emissionTestVehicleClassId, 
                    $emissionTestMakeId, 
                    $emissionTestIdChassisNo, 
                    $emissionTestIdModel, 
                    $emissionTestIdEngineNo, 
                    $emissionTestIdYearOfMFGId, 
                    $emissionTestIdFuelTypeId, 
                    $emissionTestCenter, 
                    $emissionTestIdOdometer, 
                    $emissionTestTestFee, 
                    $emissionTestIdLane, 
                    $emissionTestInstrument, 
                    $emissionTestIdInspector, 
                    $emissionTestTestStart, 
                    $emissionTestTestEnd, 
                    $emissionTestIdelRpm, 
                    $emissionTestIdelHc, 
                    $emissionTestIdelCo, 
                    $emissionTestIdelL, 
                    $emissionTestIdelO2, 
                    $emissionTestIdelCo2, 
                    $emissionTestOverallStatus, 
                    $emissionTestRpmRpm, 
                    $emissionTestRpmHc, 
                    $emissionTestRpmCo, 
                    $emissionTestRpmL, 
                    $emissionTestRpmO2, 
                    $emissionTestRpmCo2, 
                    $emissionTestOiltempRpm, 
                    $emissionTestReferenceNo, 
                    $emissionTestQRCodeImg, 
                    $emissionTestVehicleImg, 
                    $emissionTestValidTill);
                $msg = "Vehicle Emission Test Successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&yearId=<?php echo $yearId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_vehicle_insurance.php?msgWarning=<?php echo $msg;?>&updateVehicleInsuranceId=<?php echo $vehicleInsurancesId;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Get Specific Year for Add Vehicle Emission Test
        case "getSpecificYearAddVehicleEmissionTest":
            $module_id = $_GET["module_id"];
            $vehicleId = $_POST["vehicleId"];
            $yearId = $_POST["yearId"];
            try{ ?>
                <script>window.location="../view/add_vehicle_emission_test.php?yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_vehicle_emission_test.php?msgWarning=<?php echo $msg;?>&yearId=<?php echo $yearId;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/****************************************************************************************************/
/* (45) Vehicle Book */
        // 1) Update Specific Vehicle Book
        case "updateSpecificVehicleBook":
            $module_id = $_GET["module_id"];
            $registrationNo = $_POST["registrationNo"];           
            $vehicleBookId = $_POST["vehicleBookId"];           
            $vehicleId = $_POST["vehicleId"];           
            $chassisNo = $_POST["chassisNo"];           
            $currentOwner = $_POST["currentOwner"];           
            $currentOwnerAddress = $_POST["currentOwnerAddress"];           
            $currentOwnerID = $_POST["currentOwnerID"];           
            $conditions = $_POST["conditions"];           
            $specialNotes = $_POST["specialNotes"];           
            $absoluteOwner = $_POST["absoluteOwner"];           
            $engineNo = $_POST["engineNo"];           
            $cc = $_POST["cc"];           
            $vehicleClassId = $_POST["vehicleClassId"];           
            $taxationClass = $_POST["taxationClass"];           
            $statusWhenRegistered = $_POST["statusWhenRegistered"];           
            $FuelTypeId = $_POST["FuelTypeId"];           
            $makeId = $_POST["makeId"];           
            $countryOfOrigin = $_POST["countryOfOrigin"];           
            $model = $_POST["model"];           
            $manudacturesDescription = $_POST["manudacturesDescription"];           
            $wheelBase = $_POST["wheelBase"];           
            $overHang = $_POST["overHang"];           
            $typeOfBody = $_POST["typeOfBody"];           
            $yearOfManufactureId = $_POST["yearOfManufactureId"];           
            $color = $_POST["color"];           
            $previousOwnerName = $_POST["previousOwnerName"];           
            $previousOwnerAddress = $_POST["previousOwnerAddress"];           
            $previousOwnerTransferredDate = $_POST["previousOwnerTransferredDate"];           
            $totalPreviousOwners = $_POST["totalPreviousOwners"];           
            $seatingCapacity = $_POST["seatingCapacity"];           
            $weightUnladen = $_POST["weightUnladen"];           
            $weightGross = $_POST["weightGross"];           
            $tyreSizeFront = $_POST["tyreSizeFront"];           
            $tyreSizeRear = $_POST["tyreSizeRear"];           
            $tyreSizeDual = $_POST["tyreSizeDual"];           
            $tyreSizeSingle = $_POST["tyreSizeSingle"];           
            $length = $_POST["length"];           
            $width = $_POST["width"];           
            $height = $_POST["height"];           
            $internalHeight = $_POST["internalHeight"];           
            $provinceCouncilId = $_POST["provinceCouncilId"];           
            $dateOfFirstRegistration = $_POST["dateOfFirstRegistration"];                   
            $taxesPayable = $_POST["taxesPayable"];                   
            try{
                $modelObj->updateSpecificVehicleBook(
                    $registrationNo,                    
                    $vehicleBookId,                                                    
                    $chassisNo,                    
                    $currentOwner,                    
                    $currentOwnerAddress,                    
                    $currentOwnerID,                    
                    $conditions,                    
                    $specialNotes,                    
                    $absoluteOwner,                    
                    $engineNo,                    
                    $cc,                    
                    $vehicleClassId,                    
                    $taxationClass,                    
                    $statusWhenRegistered,                    
                    $FuelTypeId,                    
                    $makeId,                    
                    $countryOfOrigin,                    
                    $model,                    
                    $manudacturesDescription,                    
                    $wheelBase,                    
                    $overHang,                    
                    $typeOfBody,                    
                    $yearOfManufactureId,                    
                    $color,                    
                    $previousOwnerName,                    
                    $previousOwnerAddress,                    
                    $previousOwnerTransferredDate,                    
                    $totalPreviousOwners,                    
                    $seatingCapacity,                    
                    $weightUnladen,                    
                    $weightGross,                    
                    $tyreSizeFront,                    
                    $tyreSizeRear,                    
                    $tyreSizeDual,                    
                    $tyreSizeSingle,                    
                    $length,                    
                    $width,                    
                    $height,                    
                    $internalHeight,                    
                    $provinceCouncilId,                                      
                    $dateOfFirstRegistration,
                    $taxesPayable);
                $msg = "Vehicle Book Successfully updated!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_vehicle.php?msgWarning=<?php echo $msg;?>&vehicleId=<?php echo $vehicleId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Add New Vehicle Book to Vehicle
        case "addNewVehicleBook":
            $updateVehicleId = $_GET["updateVehicleId"];
            $module_id = $_GET["module_id"];
            try{
                $vehicleBookId = $modelObj->addNewVehicleBook();
                $modelObj->updateVehicleVehicleBook($updateVehicleId, $vehicleBookId);
                $msg = "New Vehicle Book Added!";
                $msg = base64_encode($msg)?>            
                <script>window.location = "../view/view_specific_vehicle.php?msgSuccess=<?php echo $msg;?>&vehicleId=<?php echo $updateVehicleId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_vehicle.php?msgWarning=<?php echo $msg;?>&vehicleId=<?php echo $updateVehicleId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/********************************************************************************************************/
/* (46) Province Council */
        // 1) Add New Provice Council
        case "addNewProvinceCouncil":
            $module_id = $_GET["module_id"];
            $proviceCouncilName = $_POST["proviceCouncilName"];
            try{
                $modelObj->addNewProvinceCouncil($proviceCouncilName);
                $msg = "$proviceCouncilName Province Council Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location="../view/view_province_councils.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/add_province_council.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Update Specific Province Council
        case "updateSpecificProvinceCouncil":
            $module_id = $_GET["module_id"];
            $provinceCouncilId = $_POST["provinceCouncilId"];
            $provinceCouncilName = $_POST["provinceCouncilName"];
            try{
                $modelObj->updateSpecificProvinceCouncil($provinceCouncilId ,$provinceCouncilName);
                $msg = "$provinceCouncilName Province Council Successfully Updated!";
                $msg = base64_encode($msg);
?>
                <script>window.location="../view/view_specific_province_council.php?msgSuccess=<?php echo $msg;?>&updateProvinceCouncilId=<?php echo $provinceCouncilId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location="../view/update_specific_province_council.php?msgWarning=<?php echo $msg;?>&updateProvinceCouncilId=<?php echo $provinceCouncilId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/****************************************************************************************************/
/* (47) Class of Vehicle */
        // 1) Activate Class of Vehicle
        case "activateClassOfVehicle":
            $updateClassOfVehicleId = $_GET["updateClassOfVehicleId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateClassOfVehicle($updateClassOfVehicleId);
                $msg = "Class of Vehicle was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_class_of_vehicle.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>                
                <script>window.location = "../view/view_class_of_vehicle.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Deactivate Class of Vehicle
        case "deactivateClassOfVehicle":
            $updateClassOfVehicleId = $_GET["updateClassOfVehicleId"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateClassOfVehicle($updateClassOfVehicleId);
                $msg = "Class of Vehicle was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_class_of_vehicle.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_class_of_vehicle.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Update Specific Class of Vehicle
        case "updateSpecificClassOfVehicle":
            $module_id = $_GET["module_id"];
            $classOfVehicleId = $_POST["classOfVehicleId"];
            $classOfVehicleName = $_POST["classOfVehicleName"];
            $classOfVehicleCode = $_POST["classOfVehicleCode"];
            $classOfVehicleOldClass = $_POST["classOfVehicleOldClass"];
            $classOfVehicleImage = $_FILES["classOfVehicleImage"];
            try{     
                $classOfVehicleImageEdit = "";  
                if($classOfVehicleImage["name"] != ""){
                    $classOfVehicleImageEdit = $classOfVehicleImage["name"];
                    $path = "../images/vehicle_classes_images/".$classOfVehicleImageEdit;
                    move_uploaded_file($classOfVehicleImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificClassOfVehicle(
                    $classOfVehicleId, 
                    $classOfVehicleName, 
                    $classOfVehicleCode, 
                    $classOfVehicleOldClass,
                    $classOfVehicleImageEdit);
                $msg = "$classOfVehicleName was Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_class_of_vehicle.php?msgSuccess=<?php echo $msg;?>&updateClassOfVehicleId=<?php echo $classOfVehicleId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_class_of_vehicle.php?msgWarning=<?php echo $msg;?>&updateClassOfVehicleId=<?php echo $classOfVehicleId;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
        // 4) Add New Class of Vehicle
        case "addNewClassOfVehicle":
            $module_id = $_GET["module_id"];
            $classOfVehicleName = $_POST["classOfVehicleName"];
            $classOfVehicleCode = $_POST["classOfVehicleCode"];
            $classOfVehicleCodeOldClass = $_POST["classOfVehicleCodeOldClass"];
            $classOfVehicleImage = $_FILES["classOfVehicleImage"];
            try{     
                $classOfVehicleImageEdit = "";  
                if($classOfVehicleImage["name"] != ""){
                    $classOfVehicleImageEdit = $classOfVehicleImage["name"];
                    $path = "../images/vehicle_classes_images/".$classOfVehicleImageEdit;
                    move_uploaded_file($classOfVehicleImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewClassOfVehicle(
                    $classOfVehicleName, 
                    $classOfVehicleCode, 
                    $classOfVehicleCodeOldClass, 
                    $classOfVehicleImageEdit);
                $msg = "$classOfVehicleName was Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_class_of_vehicle.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_class_of_vehicle.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>"</script> 
<?php       }
            break;
/***************************************************************************************************/
/* (48) Warehouse Section */
        // 1) Add Warehouse Section In Specific Warehouse      
        case "addNewWarehouseSectionInSpecificWarehouse":
            $module_id = $_GET["module_id"];
            $warehouseSectionName = $_POST["warehouseSectionName"];
            $warehouseId = $_POST["warehouseId"];
            $warehouseSectionImage = $_FILES["warehouseSectionImage"];
            try{
                $warehouseSectionImageEdit = "";  
                if($warehouseSectionImage["name"] != ""){
                    $warehouseSectionImageEdit = $warehouseSectionImage["name"];
                    $path = "../images/warehouse_section_images/".$warehouseSectionImageEdit;
                    move_uploaded_file($warehouseSectionImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewWarehouseSection($warehouseSectionName, $warehouseId, $warehouseSectionImageEdit);
                $msg = "Add New Warehouse Section was Successfully Created!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/access_to_warehouse_section.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/access_to_warehouse_section.php?msgWarning=<?php echo $msg;?>$warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Deactivate Warehouse Section
        case "deactivateWarehouseSection":
            $module_id = $_GET["module_id"];
            $warehouseId = $_GET["warehouseId"];
            $warehouseSectionId = $_GET["warehouseSectionId"];
            try{
                $modelObj->deactivateWarehouseSection($warehouseSectionId);
                $msg = "Warehouse Section Deactivate!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_warehouse_sections.php?msgDanger=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_warehouse_sections.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Activate Warehouse Section
        case "activateWarehouseSection":
            $module_id = $_GET["module_id"];
            $warehouseId = $_GET["warehouseId"];
            $warehouseSectionId = $_GET["warehouseSectionId"];
            try{
                $modelObj->activateWarehouseSection($warehouseSectionId);
                $msg = "Warehouse Section Activated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_warehouse_sections.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_warehouse_sections.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 4) 
        case "updateSpecificWarehouseSection":
            $module_id = $_GET["module_id"];
            $warehouseId = $_POST["warehouseId"];
            $warehouseSectionId = $_POST["warehouseSectionId"];
            $warehouseSectionName = $_POST["warehouseSectionName"];
            try{
                $modelObj->updateSpecificWarehouseSection($warehouseSectionName, $warehouseSectionId, $warehouseId);
                $msg = "Warehouse Section Activated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/access_view_warehouse_section.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/access_view_warehouse_section.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/*******************************************************************************************************/
/* (49) Warehouse */
        // 1) Activate Navigation Tabs in View Specific Warehouse
        case "viewSpecificWarehouseNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            $warehouseId = $_GET["warehouseId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/view_specific_warehouse.php?module_id=<?php echo $module_id;?>&warehouseId=<?php echo $warehouseId;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 2) Add New Warehouse
        case "addNewWarehouse":
            $module_id = $_GET["module_id"];
            $warehouseName = $_POST["warehouseName"];
            $cityId = $_POST["cityId"];
            $warehouseLocationURL = $_POST["warehouseLocationURL"];
            $warehouseImage = $_FILES["warehouseImage"];
            try{
                $warehouseImageEdit = "";  
                if($warehouseImage["name"] != ""){
                    $warehouseImageEdit = $warehouseImage["name"];
                    $path = "../images/warehouse_images/".$warehouseImageEdit;
                    move_uploaded_file($warehouseImage["tmp_name"], $path);                                       
                }
                $modelObj->addNewWarehouse($warehouseName, $cityId, $warehouseLocationURL, $warehouseImageEdit);
                $msg = "Add New Warehouse was Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_warehouses.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_warehouse.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 3) Deactivate Warehouse
        case "deactivateWarehouse":
            $module_id = $_GET["module_id"];
            $warehouseId = $_GET["warehouseId"];
            try{
                $modelObj->deactivateWarehouse($warehouseId);
                $msg = "Warehouse Deactivate!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_warehouses.php?msgDanger=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_warehouses.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 4) Activate Warehouse
        case "activateWarehouse":
            $module_id = $_GET["module_id"];
            $warehouseId = $_GET["warehouseId"];
            try{
                $modelObj->activateWarehouse($warehouseId);
                $msg = "Warehouse Activated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_warehouses.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_warehouse.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 5) Activate Navigation Tabs in View Specific Warehouse
        case "accessViewWarehouseNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            $warehouseId = $_GET["warehouseId"];
            try{
                $modelObj->viewSpecificNavtabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/access_view_warehouses.php?module_id=<?php echo $module_id;?>&warehouseId=<?php echo $warehouseId;?>";</script>
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 6) Activate Navigation Tabs in View Specific Warehouse
        case "updateSpecificWarehouse":
            $module_id = $_GET["module_id"];
            $warehouseName = $_POST["warehouseName"];
            $warehouseId = $_POST["warehouseId"];
            $cityId = $_POST["cityId"];
            try{
                $msg = "Warehouse Successfully Updated!";
                $msg = base64_encode($msg);
                $modelObj->updateSpecificWarehouse($warehouseName, $warehouseId, $cityId);?>
                <script>window.location = "../view/access_view_warehouses.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/access_update_warehouse.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
  <?php     }
            break;
        
/**********************************************************************************************/
/* (50) Supplier */
        // 1) Add Supplier Navigation Tab Activation
        case "addSupplierNavTabActive":
            $module_id = $_GET["module_id"];
            $updateNavTabId = $_GET["updateNavTabId"];
            $navTabTypeId = $_GET["navTabTypeId"];
            try{
                $modelObj->viewSpecificNavTabActive($updateNavTabId, $navTabTypeId);?>
                <script>window.location="../view/add_supplier.php?module_id=<?php echo $module_id;?>";</script>
<?php
            }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());
            }
            break;
        // 2) Add Supplier to Supplier Table
        case "addSupplierToSupplierTable":
            $module_id = $_GET["module_id"]; 
            $supplierUserId = $_GET["supplierUserId"];          
            try{
                $driver_id = $modelObj->addNewSupplier($supplierUserId);
                $msg = "New Supplier Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/add_supplier.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
            $msg = base64_encode($ex->getMessage());?>
            <script>window.location = "../view/add_supplier.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Update Specific Supplier
        case "updateSpecificSupplier":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $userId = $_POST["userId"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $profileImage = $_FILES["profileImage"];           
            $contactMobile = $_POST["contactMobile"];
            $address = $_POST["address"];         
            $roleId = $_POST["roleId"];         
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificUser(
                    $name,
                    $email,   
                    $dob,   
                    $nic,   
                    $profileImageEdit,   
                    $contactMobile,   
                    $address,    
                    $userId,
                    $roleId);               
                $msg = "Supplier Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_supplier.php?msgSuccess=<?php echo $msg;?>&supplierUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>&fafdad=<?php echo $profileImageEdit;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_supplier.php?msgWarning=<?php echo $msg;?>&supplierUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Update Specific Client Client Type
        case "updateSpecificSupplierSupplierType":
        $module_id = $_GET["module_id"]; 
        $supplierUserId = $_POST["supplierUserId"];          
        $supplierTypeId = $_POST["supplierTypeId"];          
            try{
                $modelObj->updateSpecificSupplierSupplierType($supplierUserId, $supplierTypeId);
                $msg = "Supplier Type Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_supplier.php?msgSuccess=<?php echo $msg;?>&supplierUserId=<?php echo $supplierUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_supplier.php?msgWarning=<?php echo $msg;?>&supplierUserId=<?php echo $supplierUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) Update Supplier Password
        case "updateSupplierPassword":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "Supplier Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_supplier.php?msgSuccess=<?php echo $msg;?>&supplierUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_supplier.php?msgWarning=<?php echo $msg;?>&supplierUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 9) Add New Suppllier
        case "addNewSupplierLogin":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["roleId"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $modelObj->addNewSupplier($user_id);
                $msg = "Supplier Successfully Added. Enter the email and password.";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/login.php?msgSuccess=<?php echo $msg;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/login_supplier.php?msgWarning=<?php echo $msg;?>";</script> 
<?php       }
            break;
           
/************************************************************************************************/
/* (51) User Management */
        // 1) Update User Password in User Management
        case "updateUserPasswordUserManagement":
            $module_id = $_GET["module_id"]; 
            $userId = $_POST["userId"];       
            $password = $_POST["password"];  
            $passwordEdit = sha1($password);
            try{
                $modelObj->updatePassword(
                    $passwordEdit,
                    $userId);            
                $msg = "User Password Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_user.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_user.php?msgWarning=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Update Specific User In User Management
        case "updateSpecificUserInUserManagement":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $userId = $_POST["userId"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $profileImage = $_FILES["profileImage"];           
            $contactMobile = $_POST["contactMobile"];
            $address = $_POST["address"];         
            $roleId = $_POST["roleId"];         
            try{
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $modelObj->updateSpecificUser(
                    $name,
                    $email,   
                    $dob,   
                    $nic,   
                    $profileImageEdit,   
                    $contactMobile,   
                    $address,    
                    $userId,
                    $roleId);               
                $msg = "User Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_user.php?msgSuccess=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>&fafdad=<?php echo $profileImageEdit;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_user.php?msgWarning=<?php echo $msg;?>&updateUserId=<?php echo $userId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Deactivate User in User Management
        case "deactivateSpecificUserInUserManagement":
            $updateUserId = $_GET["updateUserId"];
            $userName = $_GET["userName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->deactivateUser($updateUserId);
                $msg = "$userName was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_users.php?msgDanger=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_users.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Activate User in User Management
        case "activateSpecificUserInUserManagement":
            $updateUserId = $_GET["updateUserId"];
            $userName = $_GET["userName"];
            $module_id = $_GET["module_id"];
            try{
                $modelObj->activateUser($updateUserId);
                $msg = "$userName was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_users.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_users.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Add New User In User Management
        case "addNewUserInUserManagement":
            $module_id = $_GET["module_id"]; 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
            $nic = $_POST["nic"];
            $address = $_POST["address"];
            $contactMobile = $_POST["contactMobile"];
            $profileImage = $_FILES["profileImage"];
            $password = $_POST["password"];          
            $role_id = $_POST["role_id"];
            try{
                $patnic = "/^[0-9]{9}[vVxX]{1}$/";
                $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                $patcno1 = "/^\+94[0-9]{9}$/";
                $patcno2 = "/^\+947[0-9]{8}$/";
                $profileImageEdit = "";  
                if($profileImage["name"] != ""){
                    $profileImageEdit = $profileImage["name"];
                    $path = "../images/user_images/".$profileImageEdit;
                    move_uploaded_file($profileImage["tmp_name"], $path);                                       
                }
                $passwordEdit = sha1($password);                            
                $email_id               = $modelObj->addNewEmail($email);
                $date_of_birthday_id    = $modelObj->addNewDob($dob);
                $nic_id                 = $modelObj->addNewNIC($nic);
                $address_id             = $modelObj->addNewAddress($address);
                $contact_id             = $modelObj->addNewContactMobile($contactMobile, "1");
                $profile_image_id       = $modelObj->addNewProfileImage($profileImageEdit);               
                $password_id            = $modelObj->addNewPassword($passwordEdit);                 
                $login_id               = $modelObj->addUserLogin($email_id, $password_id);   
                $user_id = $modelObj->addNewUser(
                    $name, 
                    $email_id, 
                    $date_of_birthday_id, 
                    $nic_id, 
                    $address_id, 
                    $contact_id, 
                    $profile_image_id, 
                    $login_id , 
                    $role_id);
                $msg = "New User Successfully Added!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_users.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_user.php?msgWarning=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/******************************************************************************************************/
/* (52) Specific Inventory Section Specific Product */
        // 1) Update Specific Product Availability
        case "updateSpecificProductAvailability":
            $module_id = $_GET["module_id"]; 
            $warehouseId = $_POST["warehouseId"];
            $warehouseSectionId = $_POST["warehouseSectionId"];
            $inventorySectionsProductsAvailability = $_POST["inventorySectionsProductsAvailability"];
            $productId = $_POST["productId"];
            try{ 
                $modelObj->updateSpecificProductAvailability($productId, $inventorySectionsProductsAvailability, $warehouseId, $warehouseSectionId);
                $msg = "Product Availability was Successfully Updated!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_inventory_section_specific_product.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&productId=<?php echo $productId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_inventory_section_specific_product.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&productId=<?php echo $productId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Add Specific Product To Specific Inventory Section
        case "addSpecificProductToSpecificInventorySection":
            $module_id = $_GET["module_id"]; 
            $warehouseId = $_GET["warehouseId"];
            $warehouseSectionId = $_GET["warehouseSectionId"];
            $productId = $_GET["productId"];
            try{ 
                $modelObj->addSpecificProductToSpecificInventorySection($productId, $warehouseId, $warehouseSectionId);
                $msg = "Product was Successfully Added to Specific Inventory Section!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_inventory_section_products.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/add_specific_product_to_Specific_inventory_section.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Deactivate Specific Inventory Section Specific Product
        case "deactivateSpecificInventorySectionSpecificProduct":
            $module_id = $_GET["module_id"];
            $productId = $_GET["productId"];
            $warehouseId = $_GET["warehouseId"];
            $warehouseSectionId = $_GET["warehouseSectionId"];
            try{
                $modelObj->deactivateSpecificInventorySectionSpecificProduct($productId, $warehouseId, $warehouseSectionId);
                $msg = "Inventory Section Product was deactivated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/specific_inventory_section_products.php?msgDanger=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_inventory_section_products.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Activate Specific Inventory Section Specific Product
        case "activateSpecificInventorySectionSpecificProduct":
            $module_id = $_GET["module_id"];
            $productId = $_GET["productId"];
            $warehouseId = $_GET["warehouseId"];
            $warehouseSectionId = $_GET["warehouseSectionId"];
            try{
                $modelObj->activateSpecificInventorySectionSpecificProduct($productId, $warehouseId, $warehouseSectionId);
                $msg = "Inventory Section Product was activated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/specific_inventory_section_products.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_inventory_section_products.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*********************************************************************************************************/
/* (53) Specific Inventory Section Products */
        
/************************************************************************************************************/
/* (54) Driver Operator */
        // 1) Update Hire Driver Request Income Table
        case "updateHireDriverRequestIncomeTable":
            $module_id = $_GET["module_id"];
            $driverTaskId = $_POST["driverTaskId"];
            $hireDriverRequestIncomeId = $_POST["hireDriverRequestIncomeId"];
            $odometerValue = $_POST["odometerValue"];
            $startTime = $_POST["startTime"];
            $endTime = $_POST["endTime"];
            try{
                $modelObj->updateHireDriverRequestIncomeTable($hireDriverRequestIncomeId, $odometerValue, $startTime, $endTime);
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_your_specific_task_DO.php?msgSuccess=<?php echo $msg;?>&driverTaskId=<?php echo $driverTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_your_specific_task_DO.php?msgWarning=<?php echo $msg;?>&driverTaskId=<?php echo $driverTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Update Process Status From Driver 
        case "updateProcessStatusFromDriverOperator":
            $module_id = $_GET["module_id"];
            $processStatusId = $_POST["processStatusId"];
            $clientRequestId = $_POST["clientRequestId"];
            $driverTaskId = $_POST["driverTaskId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->updateProcessStatusFromDriverOperator($processStatusId, $clientRequestId);
                if($processStatusId==4){
                    $modelObj->driverUnassigning($driverUserId);
                }
                if($processStatusId==3 | $processStatusId==5){
                    $modelObj->driverAssigning($driverUserId);
                }
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_your_specific_task_DO.php?msgSuccess=<?php echo $msg;?>&driverTaskId=<?php echo $driverTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_your_specific_task_DO.php?msgWarning=<?php echo $msg;?>&driverTaskId=<?php echo $driverTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) 
        case "updateProcessStatusFromDriverAndVehicleTaskInDriverOperator":
            $module_id = $_GET["module_id"];
            $processStatusId = $_POST["processStatusId"];
            $clientRequestId = $_POST["clientRequestId"];
            $driverAndVehicleTaskId = $_POST["driverAndVehicleTaskId"];
            $vehicleId = $_POST["vehicleId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->updateProcessStatusFromDriverOperator($processStatusId, $clientRequestId);
                if($processStatusId==4){
                    $modelObj->vehicleUnassigning($vehicleId);
                    $modelObj->driverUnassigning($driverUserId);
                }
                if($processStatusId==3 | $processStatusId==5){
                    $modelObj->vehicleAssigning($vehicleId);
                    $modelObj->driverAssigning($driverUserId);
                }
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_your_specific_driver_and_vehicle_task_DO.php?msgSuccess=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_your_specific_driver_and_vehicle_task_DO.php?msgWarning=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6)
        case "updateHireDriverAndVehicleRequestIncomeTableInDriverOperator":
            $module_id = $_GET["module_id"];
            $driverAndVehicleTaskId = $_POST["driverAndVehicleTaskId"];
            $hireDriverAndVehicleRequestIncomeId = $_POST["hireDriverAndVehicleRequestIncomeId"];
            $odometerValueDifference = $_POST["odometerValueDifference"];
            $startTime = $_POST["startTime"];
            $endTime = $_POST["endTime"];
            try{
                $modelObj->updateDriverAndHireVehicleRequestIncomeTable($hireDriverAndVehicleRequestIncomeId, $odometerValueDifference, $startTime, $endTime);
                $msg = "Odometer Differnece Value, Start Time, End Time Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_your_specific_driver_and_vehicle_task_DO.php?msgSuccess=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_your_specific_driver_and_vehicle_task_DO.php?msgWarning=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/***********************************************************************************************/
/* (55) Client Payment Invoice Request */
        // 1) Update Hire Driver Request Income Table
        case "clientPaymentInvoiceRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $modelObj->clientPaymentInvoiceRequest($clientRequestId, $clientServiceId, $clientUserId);
                $modelObj->updateClientRequestPaymentInvoiceRequestStatus($clientRequestId);
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;        
        // 2) Remove Payment Invoice Form Client Request Table
        case "removePaymentInvoiceFromClientRequestTable":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_GET["clientRequestId"];
            $clientServiceId = $_GET["clientServiceId"];
            $clientUserId = $_GET["clientUserId"];
            $clientPaymentinvoiceRequestId = $_GET["clientPaymentinvoiceRequestId"];
            try{
                $modelObj->removePaymentInvoiceFromClientRequestTable($clientRequestId);
                $msg = "Current Payment Invoice Removed!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_payment_invoice_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&clientPaymentinvoiceRequestId=<?php echo $clientPaymentinvoiceRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_client_payment_invoice_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&clientPaymentinvoiceRequestId=<?php echo $clientPaymentinvoiceRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
       
/*******************************************************************************************************/
/* (56) Vehicle Tasks */
        // 1) Recall Assign Vehicle Task
        case "recallAssignVehcileTask":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->recallAssignDriverTask($hireVehicleRequestId);
                $modelObj->updateHireVehicleRequestVehicleTaskStatusDeactive($hireVehicleRequestId);
                $msg = "Driver Task was Successfull Recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Assign Task For Vehicle
        case "assignTaskForVehicle":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireVehicleRequestId = $_POST["hireVehicleRequestId"];
            $vehicleId = $_POST["vehicleId"];
            try{
                $modelObj->assignTaskForVehicle($clientRequestId, $clientServiceId, $clientUserId, $hireVehicleRequestId, $vehicleId);
                $modelObj->updateHireVehicleRequestVehicleTaskStatusActive($hireVehicleRequestId);
                $modelObj->vehicleAssigning($vehicleId);
                $msg = "Task is Successfully Assigned for Vehicle!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/**********************************************************************************************************/
/* (57) Hire Driver and Vehicle */
        // 1) Return FleetId to Hire Driver and Vehicle
        case "returnFleetIdToHireDriverAndVehicle":
            $module_id = $_GET["module_id"];
            $fleetId = $_POST["fleetId"];
            $clientServiceId = $_POST["clientServiceId"];
            try{
                $msg = "";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/hire_driver_and_vehicle_c.php?fleetId=<?php echo $fleetId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/hire_driver_and_vehicle_c.php?fleetId=<?php echo $fleetId;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2) Hire Vehicle From Client     
        case "addHireDriverAndVehicleClient":
            $module_id = $_GET["module_id"];
            $vehicleClassOfVehicleId = $_POST["vehicleClassOfVehicleId"];
            $fleetId = $_POST["fleetId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $driverClassOfVehicleId = $_POST["driverClassOfVehicleId"];
            try{
                $clientRequestId = $modelObj->addClientRequest($clientUserId, $clientServiceId);
                $modelObj->addHireDriverAndVehicleClient($clientRequestId, $clientServiceId, $clientUserId, $vehicleClassOfVehicleId, $fleetId, $driverClassOfVehicleId);
                $msg = "Client Hire Vehicle Request was Successfully Added!";
                $msg = base64_encode($msg);
?>
                <script>window.location = "../view/your_requests.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/hire_driver_and_vehicle_c.php?msgWarning=<?php echo $msg;?>&clientServiceId=<?php echo $clientServiceId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Hire Driver Requesting for Hire Driver and Vehicle Request
        case "hireDriverRequestRequestingForHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->hireDriverRequestRequestingForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId);
                $msg = "Driver was Requested for Hire Driver and Vehicle Request!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 4) Hire Driver Request Recalling for Hire Driver and Vehicle Request
        case "hireDriverRequestRecallingForHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->hireDriverRequestRecallingForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId);
                $msg = "Driver Request was Recalled in Hire Driver and Vehicle Request!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 7) Assign Driver to Hire Driver and Vehicle Request
        case "assignDriverToHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $driverUserId = $_GET["driverUserId"];
            $clientRequestId = $_GET["clientRequestId"];
            $clientServiceId = $_GET["clientServiceId"];
            $hireDriverAndVehicleRequestId = $_GET["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->assignDriverToHireDriverAndVehicleRequest($driverUserId, $hireDriverAndVehicleRequestId);
                $modelObj->driverAssigning($driverUserId);
                $msg = "Driver Successfully Assigned for Hire Driver & Vehicle Request!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_DM.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_DM.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 8) Driver Resign From Driver Management For Hire Driver and Vehicle Request
        case "driverResigFromDriverManagementForHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->driverResigFromDriverManagementForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId);
                $modelObj->driverUnassigning($driverUserId);
                $msg = "Assigned Driver was Resigned in Hire Driver & Vehicle Request!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_DM.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_DM.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 9) Driver Resign From Driver Management For Hire Driver and Vehicle Request
        case "DriverResignFromDriverManagementForHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->driverResigFromDriverManagementForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId);
                $modelObj->driverUnassigning($driverUserId);
                $msg = "Assigned Driver was Resigned in Hire Driver & Vehicle Request!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 10) Hire Vehicle Requesting
        case "hireVehicleRequestForHireDriverAndVehicle":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestForHireDriverAndVehicle($hireDriverAndVehicleRequestId);
                $msg = "Vehicle was Requested for Hire Driver and Vehicle";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 11) Hire Vehicle Request Recalling
        case "hireVehicleRequestRecallingInHireDriverAndVehicle":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->hireVehicleRequestRecallingInHireDriverAndVehicle($hireDriverAndVehicleRequestId);
                $msg = "Vehicle Request was Recalled!";
                $msg = base64_encode($msg);?>             
                <script>window.location = "../view/update_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/update_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 12) Assign Vehicle to Hire Vehicle Request
        case "assignVehicleForHireDriverAndVehicleRequest":
            $module_id = $_GET["module_id"];
            $vehicleId = $_GET["vehicleId"];
            $clientRequestId = $_GET["clientRequestId"];
            $clientServiceId = $_GET["clientServiceId"];
            $hireDriverAndVehicleRequestId = $_GET["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->assignVehicleForHireDriverAndVehicleRequest($vehicleId, $hireDriverAndVehicleRequestId);
                $modelObj->updateSpecificVehicleAssignStatus($vehicleId);
                $msg = "Vehicle Successfully Assigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_VM.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_VM.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 13) Hire Vehicle Vehicle Resign From Vehicle Management
        case "resignVehicleFromHireDriverAndVehicleRequestInVehicleManagement":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            try{
                $modelObj->resignVehicleInHireDriverAndVehicle($hireDriverAndVehicleRequestId);
                $msg = "Assigned Vehicle was Resigned!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_VM.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_client_hire_driver_and_vehicle_request_VM.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&hireDriverAndVehicleRequestId=<?php echo $hireDriverAndVehicleRequestId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/******************************************************************************************************************/
/* (58) Driver And Vehicle Tasks */
        // 1) Assign Driver For Driver and Vehicle Task
        case "assignDriverVehicleForDriverAndVehicleTask":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            $driverUserId = $_POST["driverUserId"];
            $vehicleId = $_POST["vehicleId"];
            try{
                $modelObj->assignDriverVehicleForDriverAndVehicleTask($clientRequestId, $clientServiceId, $clientUserId, $hireDriverAndVehicleRequestId, $driverUserId, $vehicleId);
                $modelObj->updateHireDriverAndVehicleRequestDriverVehicleTaskStatusActive($hireDriverAndVehicleRequestId);
                $modelObj->driverAssigning($driverUserId);
                $modelObj->vehicleAssigning($vehicleId);
                $msg = "Driver and Vehicle is Successfully Assigned for Driver and Vehicle Task!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2) Recall Assign Driver From Driver and Vehicle Task
        case "recallDriverAssignFromDriverAndVehicleTask":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            $driverUserId = $_POST["driverUserId"];
            $vehicleId = $_POST["vehicleId"];
            try{
                $modelObj->recallAssignDriverVehicleFromDriverAndVehicleTask($hireDriverAndVehicleRequestId);
                $modelObj->updateHireDriverAndVehicleRequestDriverVehicleTaskStatusDeactive($hireDriverAndVehicleRequestId);
                $msg = "Driver Task and Vehicle Task was Successfull Recalled!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_client_request.php?msgDanger=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_client_request.php?msgWarning=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 3) Update Hire Vehicle Request Income Table
        case "updateHireVehicleRequestIncomeTable":
            $module_id = $_GET["module_id"];
            $vehicleTaskId = $_POST["vehicleTaskId"];
            $hireVehicleRequestIncomeId = $_POST["hireVehicleRequestIncomeId"];
            $odometerValue = $_POST["odometerValue"];
            try{
                $modelObj->updateHireVehicleRequestIncomeTable($hireVehicleRequestIncomeId, $odometerValue);
                $msg = "Odometer Differnece Value Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_vehicle_task.php?msgSuccess=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_vehicle_task.php?msgWarning=<?php echo $msg;?>&vehicleTaskId=<?php echo $vehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 5) 
        case "updateProcessStatusFromDriverAndVehicleTaskInVehicleManagement":
            $module_id = $_GET["module_id"];
            $processStatusId = $_POST["processStatusId"];
            $clientRequestId = $_POST["clientRequestId"];
            $driverAndVehicleTaskId = $_POST["driverAndVehicleTaskId"];
            $vehicleId = $_POST["vehicleId"];
            $driverUserId = $_POST["driverUserId"];
            try{
                $modelObj->updateProcessStatusFromDriverOperator($processStatusId, $clientRequestId);
                if($processStatusId==4){
                    $modelObj->vehicleUnassigning($vehicleId);
                    $modelObj->driverUnassigning($driverUserId);
                }
                if($processStatusId==3 | $processStatusId==5){
                    $modelObj->vehicleAssigning($vehicleId);
                    $modelObj->driverAssigning($driverUserId);
                }
                $msg = "Process Status Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_driver_and_vehicle_task_VM.php?msgSuccess=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_driver_and_vehicle_task_VM.php?msgWarning=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 6)
        case "updateHireDriverAndVehicleRequestIncomeTable":
            $module_id = $_GET["module_id"];
            $driverAndVehicleTaskId = $_POST["driverAndVehicleTaskId"];
            $hireDriverAndVehicleRequestIncomeId = $_POST["hireDriverAndVehicleRequestIncomeId"];
            $odometerValueDifference = $_POST["odometerValueDifference"];
            $startTime = $_POST["startTime"];
            $endTime = $_POST["endTime"];
            try{
                $modelObj->updateDriverAndHireVehicleRequestIncomeTable($hireDriverAndVehicleRequestIncomeId, $odometerValueDifference, $startTime, $endTime);
                $msg = "Odometer Differnece Value, Start Time, End Time Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/update_specific_driver_and_vehicle_task_VM.php?msgSuccess=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/update_specific_driver_and_vehicle_task_VM.php?msgWarning=<?php echo $msg;?>&driverAndVehicleTaskId=<?php echo $driverAndVehicleTaskId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/********************************************************************************************************/
/* (59) Product Sell Price */   
        // 1
        case "updateSpecificProductSellPrice":
            $module_id = $_GET["module_id"];
            $productSellUnitPrice = $_POST["productSellUnitPrice"];
            $productId = $_POST["productId"];
            $productCategoryId = $_POST["productCategoryId"];
            try{
                $modelObj->updateSpecificProductSellPrice($productSellUnitPrice, $productId);
                $msg = "Product Sell Price Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_product_sell_price.php?msgSuccess=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_product_sell_price.php?msgWarning=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2)
        case "assignProductForSellPricing":
            $module_id = $_GET["module_id"];
            $productId = $_GET["productId"];
            $productCategoryId = $_GET["productCategoryId"];
            try{
                $modelObj->assignProductForSellPricing($productId);
                $msg = "Product Successfully Assign for Sell Pricing!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/assign_product_for_sell_pricing.php?msgSuccess=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/assign_product_for_sell_pricing.php?msgWarning=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*******************************************************************************************************/
/* (60) Product Buying Price */
        // 1
        case "updateSpecificProductBuyPrice":
            $module_id = $_GET["module_id"];
            $productBuyUnitPrice = $_POST["productBuyUnitPrice"];
            $productId = $_POST["productId"];
            $productCategoryId = $_POST["productCategoryId"];
            try{
                $modelObj->updateSpecificProductBuyingPrice($productBuyUnitPrice, $productId);
                $msg = "Product Buying Price Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_product_buying_price.php?msgSuccess=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_specific_product_buying_price.php?msgWarning=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
        // 2)
        case "assignProductForBuyingPricing":
            $module_id = $_GET["module_id"];
            $productId = $_GET["productId"];
            $productCategoryId = $_GET["productCategoryId"];
            try{
                $modelObj->assignProductForBuyingPricing($productId);
                $msg = "Product Successfully Assign for Buying Pricing!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/assign_product_for_buying_pricing.php?msgSuccess=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/assign_product_for_buying_pricing.php?msgWarning=<?php echo $msg;?>&productId=<?php echo $productId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
/*********************************************************************************************************/
/* (61) Cargo and Shipment */
        // 1) Add New Inventory For Warehouse
        case "addNewCargoAndShipmentForWarehouse":
            $module_id = $_GET["module_id"];            
            $warehouseId = $_GET["warehouseId"];            
            try{
                $modelObj->addNewCargoAndShipmentForWarehouse($warehouseId);
                $modelObj->updateWarehouseCargoAndShipmentStatusActive($warehouseId);
                $msg = "Warehouse Cargo and Shipment was Successfully Created!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_cargo_and_shipment.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_cargo_and_shipment.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/********************************************************************************************************/
/* (62) Cargo and Shipment Section */
        // 1) Add New Inventory Section For Warehouse Section
        case "addNewCargoAndShipmentSectionForWarehouseSection":
            $module_id = $_GET["module_id"];            
            $warehouseId = $_GET["warehouseId"];            
            $warehouseSectionId = $_GET["warehouseSectionId"];            
            try{
                $modelObj->addNewCargoAndShipmentSectionForWarehouseSection($warehouseId, $warehouseSectionId);
                $modelObj->updateWarehouseSectionCargoAndShipmentSectionStatusActive($warehouseSectionId);
                $msg = "Cargo and Shipment Section was Successfully Created in Warehouse Section!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/specific_cargo_and_shipment_section.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/specific_cargo_and_shipment_section.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
/******************************************************************************************************/
/* (63) Product Purchasing */
        // 1) Add New Inventory Section For Warehouse Section
        case "addProductPurchasingDetails":
            $module_id = $_GET["module_id"];            
            $clientUserId = $_POST["clientUserId"];                      
            $clientServiceId = $_POST["clientServiceId"];                      
            $productId = $_POST["productId"];                      
            $productCategoryId = $_POST["productCategoryId"];                      
            $productValue = $_POST["productValue"];                      
            $productSellUnitPrice = $_POST["productSellUnitPrice"];                                         
            $warehouseId = $_POST["warehouseId"];                                         
            $inventorySectionsProductsId = $_POST["inventorySectionsProductsId"];                                         
            $inventorySectionsProductsAvailability = $_POST["inventorySectionsProductsAvailability"];                                         
            try{
                $inventorySectionsProductsAvailabilityNew = $inventorySectionsProductsAvailability - $productValue;
                $modelObj->updateInventorySectionProductAvailability($inventorySectionsProductsAvailabilityNew, $inventorySectionsProductsId);
                $clientRequestId = $modelObj->addClientRequest($clientUserId, $clientServiceId);
                $modelObj->addProductPurchasingDetails($productId, $productCategoryId, $productValue, $clientRequestId, $clientUserId, $clientServiceId, $warehouseId, $productSellUnitPrice, $inventorySectionsProductsId);
                $msg = "Product Purchasing Requested!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/your_requests.php?msgSuccess=<?php echo $msg;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>
                <script>window.location = "../view/view_available_product_categories_C.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&clientServiceId=<?php echo $clientServiceId;?>&productCategoryId=<?php echo $productCategoryId;?>&module_id=<?php echo $module_id;?>";</script>
<?php       }
            break;
        // 2)      
        case "addFinanceIdSpecificClientRequestHireDriverAndVehicle":
            $module_id = $_GET["module_id"];
            $financeTypeId = $_POST["financeTypeId"];
            $hireDriverAndVehicleRequestId = $_POST["hireDriverAndVehicleRequestId"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            try{
                $financeId = $modelObj->addFinanceId($financeTypeId);
                $modelObj->addFinancialIdClientRequest($financeId, $clientRequestId);
                $modelObj->addFinanceIdHireDriverAndVehicleIncome($financeId, $financeTypeId, $hireDriverAndVehicleRequestId);
                $msg = "Financial Details was Successfully Added For Hire Driver Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break; 
/*****************************************************************************************************/
/* (64) Cargo and Shipment Tasks */
        // 1)      
        case "assginTaskForCargoAndShipment":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $clientProductPurchasingRequestId = $_POST["clientProductPurchasingRequestId"];
            $inventorySectionsProductsId = $_POST["inventorySectionsProductsId"];
            $productValue = $_POST["productValue"];
            try{
                $getSpecificInventorySectionsProductResult = $modelObj->getSpecificInventorySectionProduct($inventorySectionsProductsId);
                $getSpecificInventorySectionsProductRow = $getSpecificInventorySectionsProductResult->fetch_assoc();
                
                $warehouseId = $getSpecificInventorySectionsProductRow["warehouseId"];
                $warehouseSectionId = $getSpecificInventorySectionsProductRow["warehouseSectionId"];
                $productId = $getSpecificInventorySectionsProductRow["productId"];
                
                $modelObj->addCargoAndShipmentTask($warehouseId, $warehouseSectionId, $clientProductPurchasingRequestId, $inventorySectionsProductsId, $productId, $productValue);
                $modelObj->updateCargoAndShipmentTaskRequestStatus($clientProductPurchasingRequestId);
                $msg = "Financial Details was Successfully Added For Hire Driver Request!";
                $msg = base64_encode($msg);?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){?>
                <script>window.location = "../view/view_specific_client_request.php?msgSuccess=<?php echo $msg;?>&clientRequestId=<?php echo $clientRequestId;?>&clientServiceId=<?php echo $clientServiceId;?>&clientUserId=<?php echo $clientUserId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break; 
        // 2) Update Specific Client Request        
        case "updateSpecificClientRequestFromCargoAndShimpmetTask":
            $module_id = $_GET["module_id"];
            $clientRequestId = $_POST["clientRequestId"];
            $clientServiceId = $_POST["clientServiceId"];
            $clientUserId = $_POST["clientUserId"];
            $processStatusId = $_POST["processStatusId"];
            $changeStatusId = $_POST["changeStatusId"];
            $warehouseId = $_POST["warehouseId"];
            $warehouseSectionId = $_POST["warehouseSectionId"];
            try{
                $modelObj->updateSpecificClientRequest($clientRequestId, $processStatusId, $changeStatusId);
                $msg = "Client Request was Successfully Updated!";
                $msg = base64_encode($msg);?>            
                <script>window.location = "../view/view_specific_cargo_and_shipment_section_task.php?msgSuccess=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }catch(Exception $ex){
                $msg = base64_encode($ex->getMessage());?>               
                <script>window.location = "../view/view_specific_cargo_and_shipment_section_task.php?msgWarning=<?php echo $msg;?>&warehouseId=<?php echo $warehouseId;?>&warehouseSectionId=<?php echo $warehouseSectionId;?>&module_id=<?php echo $module_id;?>";</script> 
<?php       }
            break;
    }
    
    
