<?php
    include_once '../commons/db_connection.php';
    $dbConnection = new DbConnection();   
    $timeDifference =3.00;
    
    $endTime1 =18;
    $startTime1 =15;
    class Model{  
/****************************************************************************************/
        /* (1) CSS Color */
        /* (2) Change Status */
        /* (3) Process Status */
        /* (4) Module Functions */   
        /* (5) Role Modules */
        /* (6) Modules */
        /* (7) Function */ 
        /* (8) Role */
        /* (9) User */
        /* (10) User Modules */
        /* (11) Role Functions */
        /* (12) User Functions */  
        /* (13) Client */
        /* (14) Functions Modules */
        /* (15) Breadcrumbs */
        /* (16) Navigation Tabs */
        /* (17) Year */
        /* (18) Month */
        /* (19) City */
        /* (20) Reports */
        /* (21) User Roles */
        /* (22) Client Services */
        /* (23) Client Request */        
        /* (24) Hire Driver Request */
        /* (25) Driver */
        /* (26) Driver Class of Vehicle */
        /* (27) Driver ADR Certificates */
        /* (28) ADR Certificates */  
        /* (29) Driver License */
        /* (30) Driver Operator */
        /* (31) Finance */
        /* (32) Vehicle */
        /* (33) Class of Vehicle */
        /* (34) Vehicle Book */
        /* (35) Vehicle Emission Test */
        /* (36) Vehicle Insurance */   
        /* (37) Vehicle Revenue License */
        /* (38) Vehicle Manufacturer */
        /* (39) Fuel */  
        /* (40) Province Councils */
        /* (41) Login */
        /* (42) Warehouse */
        /* (43) Warehouse Sections */
        /* (44) Product Manufacturer */
        /* (45) Product */
        /* (46) Inventory */
        /* (47) Inventory Warehouse */
        /* (48) Product Category */
        /* (49) Inventory Section */ 
        /* (50) Supplier */
        /* (51) Product Unit Types */
        /* (52) Product Unit Measure */
        /* (53) Specific Inventory Section Products */
        /* (54) Specific Inventory Section Specific Product */ 
        /* (55) Specific Inventory Products */
        /* (56) Client Payment Invoice */
        /* (57) Hire Vehicle Request */
        /* (58) Client Hire Driver Payment Invoice */       
        /* (59) Client Hire Vehicle Payment Invoice */
        /* (60) Hire Driver and Vehicle Request */
        /* (61) Driver and Vehicle Tasks */
        /* (62) Client Hire Driver and Vehicle Payment Invoice */
        /* (63) Product Category Products */
        /* (64) Product Selling Prices */ 
        /* (65) Product Buying Prices */ 
        /* (66) Cargo and Shipment */
        /* (67) Cargo and Shipment Section */   
        /* (68) Product Purchasing */
        /* (69) Cargo and Shipment Task */
        /* (70) Barcode Products */
        /* (71) Promotion Hierarchy */     
        /* (72) User Promotions */
        /* (73) Navigation Tab Types */
        /* TEST */
/****************************************************************************************/
/* (1) CSS Colors */       
        public function getAllCSSColorsActive(){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM css_colors cssc WHERE "
                . "cssc.cssColorStatus = '1' "
                . "ORDER BY cssc.cssColorName ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
/****************************************************************************************/
/* (2) Change Status */
        // Get All Active Change Status    
        public function getAllChangeStatusActive(){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM change_status cs WHERE "
                . "Cs.changeStatusStatus = '1' "
                . "ORDER BY cs.changeStatusName ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/****************************************************************************************/
/* (3) Process Status */
        // 1) Add New Process Status    
        public function addNewProcessStatus($processName, $processStatusButtonCSS){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO process_status("
                . "processName," /* 1 */
                . "processStatusButtonCSS)" /* 2 */
                . "VALUES("
                . "'$processName',"
                . "'$processStatusButtonCSS')";
            $result = $con->query($sql);       
            return $result;
        }
        // 2) Get All Process Status
        public function getAllProcessStatus(){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM process_status ps, css_colors cssc WHERE "
                . "ps.cssColorId = cssc.cssColorId "
                . "ORDER BY ps.processName ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 3) Get All Active Process Status
        public function getAllProcessStatusActive(){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM process_status ps, css_colors cssc WHERE "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusStatus = '1' "
                . "ORDER BY ps.processName ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 4) Get Specific Process Status       
        public function getSpecificProcessStatus($updateProcessStatusId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM process_status ps, css_colors cssc WHERE "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = '$updateProcessStatusId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 5) Update Specific Process Status     
        public function updateSpecificProcessStatus($processStatusId, $processName, $cssColorId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE process_status ps SET "
                . "ps.processName = '$processName',"
                . "ps.cssColorId = '$cssColorId' WHERE "
                . "ps.processStatusId = '$processStatusId'";
            $result = $con->query($sql);       
            return $result;
        }      
        // 6) Activate Process Status        
        public function deactivateProcessStatus($updateProcessStatusId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE process_status SET processStatusStatus='0' WHERE "
                . "processStatusId = '$updateProcessStatusId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 7) Deactivate Process Status
        public function activateProcessStatus($updateProcessStatusId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE process_status SET processStatusStatus='1' WHERE "
                . "processStatusId = '$updateProcessStatusId'";
            $result = $con->query($sql);    
            return $result;
        }     
/*****************************************************************************************/
/* (4) Module Functions */        
        // 1) Add Module Functions
        public function addModuleFunctions(
            $updateModule_id, /* 1 */
            $function_id){ /* 2 */
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO module_functions("
                . "module_id," /* 1 */
                . "function_id)" /* 2 */
                . "VALUES("
                . "'$updateModule_id'," /* 1 */
                . "'$function_id')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 2) Get All Module Functions
        public function getAllModuleFunctions($updateModule_id){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM functions WHERE "
                . "module_id = '$updateModule_id' "
                . "ORDER BY functions_name ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 3) Active By Module Functions
        public function activeByModuleFunction($module_id, $functionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM module_functions mf WHERE "
                . "mf.function_id = '$functionId' AND "
                . "mf.module_id = '$module_id'";
            $result = $con->query($sql);
            return $result;
        }
        // 4) Get Specific Module Functions
        public function getModuleFunctions($updateModule_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM module_functions mf, functions f WHERE "
                . "f.functions_id = mf.function_id AND "
                . "mf.module_id='$updateModule_id'";
            $result = $con->query($sql);
            return $result;
        }            
        // 5) Delete All Specific Functions Module
        public function deleteAllSpecificModulesFunctions($updateModule_id){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM module_functions WHERE "
                . "module_id = '$updateModule_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // Get All Active Module Functions
        public function getAllActiveModuleFunctions($updateModule_id){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM functions WHERE "
                . "module_id = '$updateModule_id' AND "
                . "function_status = '1'"
                . "ORDER BY functions_name ASC";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/*****************************************************************************************/
/* (5) Role Modules */
        // 1) Get Role Modules
        public function getRoleModules($roleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role_module rm, module m WHERE "
                . "m.module_id = rm.module_id AND "
                . "rm.role_id='$roleId'";
            $result = $con->query($sql);
            return $result;
        }
        // 2) Get Specific Role Modules
        public function getSpecificRoleModules($updateRole_id){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM role_module WHERE "
                . "role_id='$updateRole_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 3) Add Role Modules
        public function addRoleModules(
            $updateRole_id, /* 1 */
            $module_id){ /* 2 */
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO role_module("
                . "role_id," /* 1 */
                . "module_id)" /* 2 */
                . "VALUES("
                . "'$updateRole_id'," /* 1 */
                . "'$module_id')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 4) Delete All Specific Role Modules
        public function deleteAllSpecificRoleModules($updateRole_id){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM role_module WHERE "
                . "role_id = '$updateRole_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/******************************************************************************************/
/* (6) Modules */
        // 1) Add New Module
        public function addNewModule(
            $moduleName,
            $moduleURL){
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO module("
                . "module_name,"
                . "module_url)"
                . "VALUES("
                . "'$moduleName',"
                . "'$moduleURL')";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 2) Get All Modules
        public function getAllModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM module "
                . "ORDER BY module_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Get All Active Modules
        public function getAllActiveModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM module m WHERE "
                . "m.module_status = '1' "
                . "ORDER BY m.module_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 4) Get Specific Module
        public function getSpecificModule($module_id){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM module WHERE "
                . "module_id = '$module_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }       
        // 5) Update Specific Module
        public function updateSpecificModule($moduleName, $moduleUrlEdit, $updateModuleId){
            $con = $GLOBALS["con"];
            if($moduleUrlEdit==""){
                $sql = "UPDATE module m SET "
                    . "m.module_name='$moduleName' WHERE "
                    . "m.module_id='$updateModuleId'";
            }else{
                $sql = "UPDATE module m SET "
                    . "m.module_name='$moduleName',"
                    . "m.module_url='$moduleUrlEdit' WHERE "
                    . "m.module_id='$updateModuleId'";
            }
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Deactivate Module
        public function deactivateModule($updateModule_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE module SET module_status='0' WHERE "
                . "module_id='$updateModule_id'";
            $result = $con->query($sql);       
            return $result;
        }
        // 7) Activate Module
        public function activateModule($updateModule_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE module SET module_status='1' WHERE "
                . "module_id='$updateModule_id'";
            $result = $con->query($sql);    
            return $result;
        }     
        // 8) Get All Active Module Count
        public function getAllActiveModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM module WHERE module_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 9) Get All Inactive Module Count
        public function getAllDeactiveModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM module WHERE module_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 10) Get All Module Count
        public function getAllModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM module";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 11) Get All Inactive Modules
        public function getAllInactiveModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM module m WHERE "
                . "m.module_status = '0' "
                . "ORDER BY m.module_name ASC";
            $result = $con->query($sql);
            return $result;
        }
/********************************************************************************************/
/* (7) Function */        
        // 1) Add New Function
        public function addNewFunction(
            $functionName,
            $functionUrlEdit,
            $selectedModuleId,
            $functionModuleId){
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO functions("
                . "functions_name,"
                . "functions_url,"
                . "module_id,"
                . "functions_module_id_visible)"
                . "VALUES("
                . "'$functionName',"
                . "'$functionUrlEdit',"
                . "'$selectedModuleId',"
                . "'$functionModuleId')";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        } 
        // 2) Get All Functions
        public function getAllFunctions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions "
                . "ORDER BY functions_name ASC";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 3) Get All Active Functions
        public function getAllActiveFunctions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions f WHERE "
                . "f.function_status = '1' "
                . "ORDER BY functions_name ASC";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 4) Get Specific Function 
        public function getSpecificFunction($updateFunction_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions f, module m, functions_modules fsms WHERE "
                . "f.functions_module_id_visible = fsms.functions_modules_id AND "
                . "m.module_id = f.module_id AND "
                . "f.functions_id = '$updateFunction_id'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 5) Update Specific Function
        public function updateSpecificFunction($functionName, $functionUrlEdit, $selectedModuleId, $functionModuleId, $updateFunctionId){
            $con = $GLOBALS["con"];
            if($functionUrlEdit == ""){
                $sql = "UPDATE functions f SET "
                    . "f.functions_name = '$functionName',"
                    . "f.module_id = '$selectedModuleId',"
                    . "f.functions_module_id_visible = '$functionModuleId' WHERE "
                    . "f.functions_id = '$updateFunctionId'";
            }else{
                $sql = "UPDATE functions f SET "
                    . "f.functions_name = '$functionName',"
                    . "f.functions_url = '$functionUrlEdit',"
                    . "f.module_id = '$selectedModuleId',"
                    . "f.functions_module_id_visible = '$functionModuleId' WHERE "
                    . "f.functions_id = '$updateFunctionId'";
            }
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Deactivate Function
        public function deactivateFunction($updateFunction_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE functions SET function_status = '0' WHERE "
                    . "functions_id='$updateFunction_id'";
            $result = $con->query($sql) or die($conn->error); 
            return $result;
        }
        // 7) Activate Function
        public function activateFunction($updateFunction_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE functions SET function_status = '1' WHERE "
                . "functions_id='$updateFunction_id'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }     
        // 8) Get Specific Functions for Relevent Module
        public function getSpecificFunctionsRelevantModule($module_id, $functions_modules_id){
            $con = $GLOBALS["con"];
            $user_id = $_SESSION["user"]["user_id"];
            $role_id = $_SESSION["user"]["role_id"];
            $sql = "SELECT * FROM functions f, module_functions mf, "
                . "role_functions rf, user_functions uf WHERE "
                . "f.functions_id = mf.function_id AND "
                . "mf.module_id = '$module_id' AND "
                . "f.functions_id = rf.functions_id AND "
                . "rf.role_id = '$role_id' AND "
                . "f.functions_id = uf.functions_id AND "               
                . "uf.user_id = '$user_id' AND "               
                . "f.functions_module_id_visible = '$functions_modules_id' AND "
                . "f.function_status='1' "
                . "ORDER BY f.functions_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 9) Get Active Functions Count
        public function getAllActiveFunctionCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM functions WHERE function_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get Inactive Functions Count
        public function getAllDeactiveFunctionCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM functions WHERE function_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Functions Count
        public function getAllFunctionCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM functions";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // Get All Inactive Functions 
        public function getAllInactiveFunctions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions f WHERE "
                . "f.function_status = '0' "
                . "ORDER BY functions_name ASC";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
/**********************************************************************************************/
/* (8) Role */
        // 1) Add New Role
        public function addRole($roleName){
            $con = $GLOBALS["con"];
            $sql2 = "INSERT INTO role(role_name)"
                . "VALUES('$roleName')";
            $con->query($sql2) or die($con->error);       
        }
        // 2) Get All Roles
        public function getAllRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role "
                . "ORDER BY role_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        } 
        // 3) Get All Active Roles
        public function getAllActiveRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role r WHERE "
                . "r.role_status = '1' "
                . "ORDER BY role_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        } 
        // 4) Get Specific Role
        public function getRole($updateRole_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role WHERE "
                . "role_id='$updateRole_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Update Specific Role        
        public function updateSpecificRole(
/* 1 */     $updateRoleId,  
            $roleName){
            $con = $GLOBALS["con"];
            $sql = "UPDATE role SET "
    /* 15 */    . "role_name = '$roleName'"
                . "WHERE role_id = '$updateRoleId'";
            $con->query($sql) or die($con->error);
        }            
        // 6) Deactivate Role
        public function deactivateRole($updateRole_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE role SET role_status='0' WHERE "
                . "role_id='$updateRole_id'";
            $result = $con->query($sql) or die($con->error);    
            return $result;
        }
        // 7) Activate Role
        public function activateRole($updateRole_id){
            $con = $GLOBALS["con"];
            $sql = "UPDATE role SET role_status='1' WHERE "
                . "role_id='$updateRole_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }  
        // 8) Get Active Roles Count
        public function getAllActiveRolesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM role WHERE role_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 9) Get Inactive Roles Count
        public function getAllInactiveRolesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM role WHERE role_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 10) Get All Roles Count
        public function getAllRolesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM role";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 11) Get All Inactive Roles
        public function getAllInactiveRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role r WHERE "
                . "r.role_status = '0' "
                . "ORDER BY role_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/**********************************************************************************************/
/* (9) User */
        // 1) Get All Users       
        public function getAllUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, role r, profile_image pi, login l, nic n, email e, contact c WHERE "
                . "u.loginId = l.login_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "n.nic_id = u.nic_id AND "
                . "e.email_id = u.email_id AND "
                . "c.contact_id  = u.contact_id AND "
                . "u.role_id = r.role_id";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Deactivate User
        public function deactivateUser($updateUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user SET user_status='0' WHERE "
                . "user_id='$updateUserId'";
            $result = $con->query($sql) or die($con->error);      
        }    
        // 3) Activate User
        public function activateUser($updateUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user SET user_status='1' WHERE "
                . "user_id='$updateUserId'";
            $result = $con->query($sql) or die($con->error);    
        }
        // 4) Get Active User Count
        public function getActiveUserCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                    . "FROM USER WHERE user_status='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 5) Get Deactive User Count
        public function getDeActiveUserCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                    . "FROM USER WHERE user_status='0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 6) Get Specific User By userId
        public function getSpecificUser($userId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic n, "
                . "profile_image pi, "
                . "contact c, "
                . "address ad, "
                . "login l, "
                . "password pass, "
                . "role r WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "u.user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 7) Add New User - name, roleId
        public function addNewUser(
            $name, 
            $email_id, 
            $date_of_birthday_id, 
            $nic_id, 
            $address_id, 
            $contact_id, 
            $profile_image_id, 
            $login_id , 
            $role_id){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO user("
                . "user_name,"
                . "email_id,"
                . "date_of_birthday_id,"
                . "nic_id,"
                . "profile_image_id,"
                . "contact_id,"
                . "address_id,"
                . "role_id,"
                . "loginId)"
                . "VALUES("
                . "'$name',"
                . "'$email_id',"
                . "'$date_of_birthday_id',"
                . "'$nic_id',"
                . "'$profile_image_id',"
                . "'$contact_id',"
                . "'$address_id',"
                . "'$role_id',"
                . "'$login_id')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 8) Add New Email - email
        public function addNewEmail($email){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO email(email)VALUES('$email')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 9) Add New Dob - dob
        public function addNewDob($dob){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO date_of_birthday(date_of_birthday)VALUES('$dob')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 10) Add New NIC - nic
        public function addNewNIC($nic){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO nic(nic)VALUES('$nic')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 11) Add New Address - address
        public function addNewAddress($address){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO address(address)VALUES('$address')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 12) Add New Contact Mobile - contactMobile, ContactTypeId
        public function addNewContactMobile($contactMobile, $contactTypeId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO contact(contact_number, contact_type_id)VALUES('$contactMobile','$contactTypeId')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        // 13) Add New Profile Image - profileImage
        public function addNewProfileImage($profileImage){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO profile_image(profile_image)VALUES('$profileImage')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        } 
        // 14) Add New Password - password
        public function addNewPassword($passwordEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO password(password)VALUES('$passwordEdit')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;    
        }
        
        // 15) Update Existing User Name - name, userId
        public function updateSpecificUser(
            $name,
            $email,   
            $dob,   
            $nic,   
            $profileImageEdit,   
            $contactMobile,   
            $address,    
            $userId,
            $roleId){
            $conn = $GLOBALS["con"];
            if($profileImageEdit == ""){
                $sql = "UPDATE user u, email e, date_of_birthday dob, nic nic, profile_image pi, contact c, address a, role r SET "
                    . "u.user_name = '$name',"
                    . "e.email = '$email',"
                    . "dob.date_of_birthday = '$dob',"
                    . "nic.nic = '$nic',"
                    . "c.contact_number = '$contactMobile',"
                    . "a.address = '$address',"
                    . "u.role_id = '$roleId' WHERE "
                    . "u.email_id = e.email_id AND "
                    . "u.date_of_birthday_id = dob.date_of_birthday_id  AND "
                    . "u.nic_id = nic.nic_id AND "
                    . "u.profile_image_id = pi.profile_image_id AND "
                    . "u.contact_id = c.contact_id  AND "
                    . "u.address_id = a.address_id  AND "
                    . "u.user_id = '$userId'";
            }else{
                $sql = "UPDATE user u, email e, date_of_birthday dob, nic nic, profile_image pi, contact c, address a, role r SET "
                    . "u.user_name = '$name',"
                    . "e.email = '$email',"
                    . "dob.date_of_birthday = '$dob',"
                    . "nic.nic = '$nic',"
                    . "pi.profile_image = '$profileImageEdit',"
                    . "c.contact_number = '$contactMobile',"
                    . "a.address = '$address',"
                    . "u.role_id = '$roleId' WHERE "
                    . "u.email_id = e.email_id AND "
                    . "u.date_of_birthday_id = dob.date_of_birthday_id  AND "
                    . "u.nic_id = nic.nic_id AND "
                    . "u.profile_image_id = pi.profile_image_id AND "
                    . "u.contact_id = c.contact_id  AND "
                    . "u.address_id = a.address_id  AND "
                    . "u.user_id = '$userId'";
            }
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }                           
        // 16) Update Existing Email - email, userId
        public function updateEmail($email, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE email e SET "
                . "email = '$email' WHERE "
                . "user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 17) Update Existing DOB - dob, userId
        public function updateDob($dob, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE date_of_birthday SET "
                . " date_of_birthday = '$dob' WHERE "
                . "user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 18) Update Existing NIC - nic, userId
        public function updateNIC($nic, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE nic SET "
                . "nic = '$nic' WHERE "
                . "user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 19) Update Existing Address - address, userId
        public function updateAddress($address, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE address SET "
                . "address = '$address' WHERE "
                . " user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 20) Update Existing Contact Mobile - contactMobole, contactTypeId, userId
        public function updateContactMobile($contactMobile, $contactTypeId, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE contact SET "
                . "contact_number = '$contactMobile' WHERE "
                . " user_id = '$userId' AND "
                . "contact_type_id = '$contactTypeId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 21) Update Existing Profile Image - profileImageEdit, userId
        public function updateProfileImage($profileImageEdit, $userId){
            $conn = $GLOBALS["con"];
            if($profileImageEdit != ""){
                $sql = "UPDATE profile_image SET "
                    . "profile_image = '$profileImageEdit' WHERE "
                    . " user_id = '$userId'";           
                $result = $conn->query($sql) or die($conn->error);
                return $result;
            }
        }
        // 22) Update Existing Password - passwordEdit, userId
        public function updatePassword($passwordEdit, $userId){
            $conn = $GLOBALS["con"];
            $sql = "UPDATE password p, user u, login l SET "
                . "p.password = '$passwordEdit' WHERE "
                . "l.password_id = p.password_id AND "
                . "u.loginId = l.login_id AND "
                . " user_id = '$userId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }
        // 23) Get All Online User Count
        public function getAllOnlineUserCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as online_count "
                . "FROM user u, login l WHERE "
                . "u.loginId = l.login_id AND "
                . "login_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["online_count"];
            return $activeCount;
        } 
        // 24) Get All Offline User Count
        public function getAllOfflineUserCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as offline_count "
                . "FROM user u, login l WHERE "
                . "u.loginId = l.login_id AND "
                . "login_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["offline_count"];
            return $deactiveCount;
        }
        // 25) Get All Active Users
        public function getAllActiveUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u WHERE "
                . "u.user_status = '1' "
                . "ORDER BY user_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 26) Get All Inactive Users
        public function getAllInactiveUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u WHERE "
                . "u.user_status = '0' "
                . "ORDER BY user_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 27) Get All Online Users
        public function getAllOnlineUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, login l WHERE "
                . "u.loginId = l.login_id AND "
                . "l.login_status = '1' "
                . "ORDER BY user_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 28) Get All Offline Users
        public function getAllOfflineUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, login l WHERE "
                . "u.loginId = l.login_id AND "
                . "l.login_status = '0' "
                . "ORDER BY user_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 29) Get Specific User By User Name
        public function getSpecificUserByUserName($userName){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic n, "
                . "profile_image pi, "
                . "contact c, "
                . "address ad, "
                . "login l, "
                . "password pass, "
                . "role r WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "u.user_name = '$userName'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 30) Get Specific User By NIC
        public function getSpecificUserByNic($nic){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic n, "
                . "profile_image pi, "
                . "contact c, "
                . "address ad, "
                . "login l, "
                . "password pass, "
                . "role r WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "n.nic = '$nic'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 31) Get Specific User By Email
        public function getSpecificUserByEmail($email){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic n, "
                . "profile_image pi, "
                . "contact c, "
                . "address ad, "
                . "login l, "
                . "password pass, "
                . "role r WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "e.email = '$email'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 32) Get Specific User By Contact Number
        public function getSpecificUserByContactNumber($contactMobile){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic n, "
                . "profile_image pi, "
                . "contact c, "
                . "address ad, "
                . "login l, "
                . "password pass, "
                . "role r WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "c.contact_number = '$contactMobile'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
/********************************************************************************************/
/* (10) User Modules */
        // 1) Get User Modules
        public function getUserModules($updateUser_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user_modules um, module m WHERE "
                . "m.module_id = um.module_id AND "
                . "um.user_id='$updateUser_id'";
            $result = $con->query($sql);
            return $result;
        }            
        // 2) Delete All Specific User Modules
        public function deleteAllSpecificUserModules($updateUser_id){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM user_modules WHERE "
                . "user_id = '$updateUser_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }      
        // 3) Add User Modules
        public function addUserModules(
            $updateUser_id, /* 1 */
            $module_id){ /* 2 */
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO user_modules("
                . "user_id," /* 1 */
                . "module_id)" /* 2 */
                . "VALUES("
                . "'$updateUser_id'," /* 1 */
                . "'$module_id')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }             
/*********************************************************************************************/
/* (11) Role Functions */
        // 1) Active By Role Functions
        public function activeByRoleFunction($role_id, $functionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role_functions rf WHERE "
                . "rf.functions_id = '$functionId' AND "
                . "rf.role_id = '$role_id'";
            $result = $con->query($sql);
            return $result;
        }
        // 2) Get Role Functions
        public function getRoleFunctions($updateRole_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role_functions rf, functions f WHERE "
                . "f.functions_id = rf.functions_id AND "
                . "rf.role_id='$updateRole_id'";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Delete All Specific Role Functions
        public function deleteAllSpecificRoleFunctions($updateRole_id){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM role_functions WHERE "
                . "role_id = '$updateRole_id'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 4) Add Role Functions
        public function addRoleFunctions(
            $updateRole_id, /* 1 */
            $function_id){ /* 2 */
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO role_functions("
                . "role_id," /* 1 */
                . "functions_id)" /* 2 */
                . "VALUES("
                . "'$updateRole_id'," /* 1 */
                . "'$function_id')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/**********************************************************************************************/
/* (12) User Functions */       
        // 1) Active By User Functions
        public function activeByUserFunction($user_id, $functionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user_functions uf WHERE "
                . "uf.functions_id = '$functionId' AND "
                . "uf.user_id = '$user_id'";
            $result = $con->query($sql);
            return $result;
        }
        
        // 2) Get User Functions
        public function getUserFunctions($updateUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user_functions uf, functions f WHERE "
                . "f.functions_id = uf.functions_id AND "
                . "uf.user_id='$updateUserId'";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Delete All Specific User Functions
        public function deleteAllSpecificUserFunctions($updateUserId){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM user_functions WHERE "
                . "user_id = '$updateUserId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 4) Add User Functions
        public function addUserFunctions(
            $updateUserId, /* 1 */
            $functions_id){ /* 2 */
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO user_functions("
                . "user_id," /* 1 */
                . "functions_id)" /* 2 */
                . "VALUES("
                . "'$updateUserId'," /* 1 */
                . "'$functions_id')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/*******************************************************************************************/
/* (13) Client */
        // 1) Get Client Type - clientUserId
        public function getClientType($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client c, client_type ct WHERE "
                . "c.client_type_id = ct.client_type_id AND "
                . "c.user_id = '$user_id'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 2) Get All Clients
        public function getAllClients(){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM client c, user u, client_type ct, profile_image pi, login l WHERE "
                . "c.user_id = u.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.loginId = l.login_id AND "
                . "c.client_type_id = ct.client_type_id";
            $result= $con->query($sql) or die($conn->error);
            return $result;
        }
        // 3) Add New Client - clientUserId
        public function addNewClient($userID){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO client(user_id)VALUES('$userID')";
            $con->query($sql1) or die($con->error) or die($conn->error);
            return $insert_id = $con->insert_id;         
        }
        // 4) Get Specific Client - clientUserId
        public function getSpecificClient($user_id){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM client c, user u, email e, date_of_birthday dob, nic nic, profile_image pi, contact con, address a, client_type ct WHERE "
                . "u.user_id = c.user_id AND "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = nic.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = con.contact_id AND "
                . "u.address_id = a.address_id AND "
                . "c.client_type_id = ct.client_type_id AND "
                . "u.user_id = '$user_id'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 5) Get All Client Users
        public function getAllClientUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, profile_image pi, role r WHERE "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.role_id = r.role_id AND "
                . "r.role_id = '18'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 6) Get All Client Types
        public function getAllClientTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_type "
                . "ORDER BY client_type_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Update Specific Client Type
        public function updateSpecificClientType($clientUserId, $clientTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client SET "
                . "client_type_id = '$clientTypeId' WHERE "
                . "user_id = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);     
            return $result;
        }
/***********************************************************************************************/
/* (14) Functions Modules */
        // 1) Get All Functions Modules
        public function getAllFunctionsModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions_modules "
                . "ORDER BY functions_modules_name ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Deactivate Function Modules - functionsModulesId
        public function deactivateFunctionsModules($functionsModulesId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE functions_modules SET "
                . "functions_modules_status = '0' WHERE "
                . "functions_modules_id = '$functionsModulesId'";
            $result = $con->query($sql) or die($con->error);     
            return $result;
        }
        // 3) Activate Functions Modules - functionsModulesId
        public function activateFunctionsModules($functionsModulesId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE functions_modules SET "
                . "functions_modules_status = '1' WHERE "
                . "functions_modules_id = '$functionsModulesId'";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        }     
        // 4) Get Specific Functions Module - functionsModulesId
        public function getSpecificFunctionsModules($functionsModulesId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions_modules fm WHERE "
                . "fm.functions_modules_id = '$functionsModulesId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Get Specific Functions Module Functions - functionsModulesId
        public function getSpecificFunctionsModulesFunctions($functionsModulesId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions f WHERE "
//                . "f.functions_module_id_visible = fm.functions_modules_id AND "
                . "f.functions_module_id_visible = '$functionsModulesId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }       
        // 6) Update Specific Functions Module
        public function updateSpecificFunctionsModule($functionsModuleName, $idName, $sariaLabelledby, $dataBsTarget, $functionsModulesId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE functions_modules fm SET "
                . "fm.functions_modules_name = '$functionsModuleName',"
                . "fm.functions_modules_idName = '$idName',"
                . "fm.functions_modules_aria_labelledby = '$sariaLabelledby',"
                . "fm.functions_modules_data_bs_target = '$dataBsTarget' WHERE "
                . "fm.functions_modules_id = '$functionsModulesId'";
            $result = $con->query($sql) or die($con->error);   
            return $result;
        }   
        // 7) Add New Functions Module
        public function addNewFunctionsModule(
            $functionsModuleName,
            $idName,
            $ariaLabelledby,
            $dataBsTarget){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO functions_modules("
                . "functions_modules_name,"
                . "functions_modules_idName,"
                . "functions_modules_aria_labelledby,"
                . "functions_modules_data_bs_target)"
                . "VALUES("
                . "'$functionsModuleName',"
                . "'$idName',"
                . "'$ariaLabelledby',"
                . "'$dataBsTarget')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }
        // 8) Get Active Functions Count
        public function getAllActiveFunctionsModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM functions_modules WHERE functions_modules_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get Inactive Functions Count
        public function getAllDeactiveFunctionsModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM functions_modules WHERE functions_modules_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Functions Count
        public function getAllFunctionsModuleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM functions_modules";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 12) Get All Active Function Modules
        public function getAllActiveFunctionModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions_modules fm WHERE "
                . "fm.functions_modules_status = '1' "
                . "ORDER BY functions_modules_name ASC";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 12) Get All Inactive Function Modules
        public function getAllInactiveFunctionModules(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM functions_modules fm WHERE "
                . "fm.functions_modules_status = '0' "
                . "ORDER BY functions_modules_name ASC";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
/********************************************************************************************/
/* (15) Breadcrumbs */
        // 1) Get All Breadcrumbs
        public function getAllBreadcrumbs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM breadcrumb b "
                . "ORDER BY breadcrumb_name ASC";
            $result = $con->query($sql);
            return $result;
        }   
        // 2) Get All Active Breadcrumb
        public function getAllActiveBreadcrumbs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM breadcrumb b WHERE "
                . "b.breadcrumb_status = '1' "
                . "ORDER BY breadcrumb_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Deactivate Breadcrumb
        public function deactivateBreadcrumb($updateBreadcrumbId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE breadcrumb SET breadcrumb_status='0' WHERE "
                    . "breadcrumb_id='$updateBreadcrumbId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 4) Activate Breadcrumb
        public function activateBreadcrumb($updateBreadcrumbId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE breadcrumb SET breadcrumb_status='1' WHERE "
                . "breadcrumb_id='$updateBreadcrumbId'";
            $result = $con->query($sql);    
            return $result;
        }  
        // 5) Get Specific Breadcrumb
        public function getSpecificBreadcrumb($updateBreadcrumbId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM breadcrumb WHERE "
                . "breadcrumb_id = '$updateBreadcrumbId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }      
        // 6) Update Specific Breadcrumb
        public function updateSpecificBreadcrumb($breadcrumbName, $liCSS, $liAriaCurrent, $aHrefEdit, $updateBreadcrumbId){
            $con = $GLOBALS["con"];
            if($aHrefEdit==""){
                $sql = "UPDATE breadcrumb b SET "
                    . "b.breadcrumb_name='$breadcrumbName',"
                    . "b.breadcrumb_li_css='$liCSS',"
                    . "b.breadcrumb_li_aria_current='$liAriaCurrent' WHERE "
                    . "b.breadcrumb_id='$updateBreadcrumbId'";
            }else{
                $sql = "UPDATE breadcrumb b SET "
                    . "b.breadcrumb_name='$breadcrumbName',"
                    . "b.breadcrumb_li_css='$liCSS',"
                    . "b.breadcrumb_li_aria_current='$liAriaCurrent',"
                    . "b.breadcrumb_a_href='$aHrefEdit' WHERE "
                    . "b.breadcrumb_id='$updateBreadcrumbId'";
            }
            $result = $con->query($sql);    
            return $result;
        }    
        // 7) Add New Breadcrumb
        public function addNewBreadcrumb(
            $breadcrumbName,
            $liCSS,
            $liAriaCurrent,
            $aHrefEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO breadcrumb("
                . "breadcrumb_name,"
                . "breadcrumb_li_css,"
                . "breadcrumb_li_aria_current,"
                . "breadcrumb_a_href)"
                . "VALUES("
                . "'$breadcrumbName',"
                . "'$liCSS',"
                . "'$liAriaCurrent',"
                . "'$aHrefEdit')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }
        // 8) Get Specific Breadcrumb - breadcrumbId
        public function viewBreadcrumbRow($breadcrumb_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM breadcrumb WHERE "
                . "breadcrumb_id = '$breadcrumb_id'";
            $result = $con->query($sql);
            return $result;
        }
        // 9) Get All Active Breadcrumb Count
        public function getAllActiveBreadcrumCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM breadcrumb WHERE breadcrumb_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get All Deactive Breadcrumb Count
         public function getAllDeactiveBreadcrumCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM breadcrumb WHERE breadcrumb_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Breadcrumb Count
        public function getAllBreadcrumCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM breadcrumb";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 12) Get All Inactive Breadcrumb
        public function getAllInactiveBreadcrumbs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM breadcrumb b WHERE "
                . "b.breadcrumb_status = '0' "
                . "ORDER BY breadcrumb_name ASC";
            $result = $con->query($sql);
            return $result;
        }
/*********************************************************************************************/
/* (16) Navigation Tabs */
        // 1) Get All Navigations Tabs
        public function getAllNavigationTabs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs nt, navtab_type ntt WHERE "
                . "nt.navtab_type_id = ntt.navtab_type_id "
                . "ORDER BY navtab_name ASC";
            $result = $con->query($sql);
            return $result;
        }      
        // 2) Deactivate Navigation Tab - navTabsId
        public function deactivateNavigationTab($navTabsId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtabs SET navtab_status='0' WHERE "
                . "navtab_id='$navTabsId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 3) Activate Navigation Tab - navTabsId
        public function activateNavigationTab($navTabsId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtabs SET navtab_status='1' WHERE "
                . "navtab_id='$navTabsId'";
            $result = $con->query($sql);       
            return $result;
        }       
        // 4) Get Specific Navigation Tab
        public function getSpecificNavigationTab($navTabsId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs nt, navtab_type ntt WHERE "
                . "nt.navtab_type_id = ntt.navtab_type_id AND "
                . "navtab_id = '$navTabsId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }     
        // 5) Update Specific Navigation Tab
        public function updateSpecificNavigationTab($navTabName, $navtabTypeId, $navTabCSS, $navTabDisplay, $navTabId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtabs nt SET "
                . "nt.navtab_name='$navTabName',"
                . "nt.navtab_type_id='$navtabTypeId',"
                . "nt.navtab_css='$navTabCSS',"
                . "nt.navtab_display='$navTabDisplay' WHERE "
                . "nt.navtab_id ='$navTabId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Add New Navigation Tab
        public function addNewNavigationTab(
            $navTabName,
            $navTabCSS,
            $navTabDisplay,
            $navtabTypeId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO navtabs("
                . "navtab_name,"
                . "navtab_css,"
                . "navtab_display,"
                . "navtab_type_id)"
                . "VALUES("
                . "'$navTabName',"
                . "'$navTabCSS',"
                . "'$navTabDisplay',"
                . "'$navtabTypeId')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }           
        // 7) Make Specific Navigation Tab Active
        public function viewSpecificNavtabActive($navTabId, $navTabTypeId){
            $con = $GLOBALS["con"];
            $sql1 = "UPDATE navtabs SET navtab_css='nav-link',"
                . "navtab_display = 'd-inline' WHERE "
                . "navtab_type_id = '$navTabTypeId'";        
            $sql2 = "UPDATE navtabs SET navtab_css = 'nav-link active',"
                . "navtab_display = 'd-inline' WHERE "
                . "navtab_id ='$navTabId'";
            $con->query($sql1);
            $con->query($sql2);           
        }
        // 8) Get Specific Navtabs By navTabTypeId
        public function getSpecificNavTabs($navTabTypeId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs WHERE "
                . "navtab_type_id = '$navTabTypeId' AND "
                . "navtab_status = '1' "
                . "ORDER BY navtab_name ASC";    
            $result = $con->query($sql);
            return $result;
        }
        // 9) Get Specific Active Navtabs By navTabTypeId
        public function getSpecificNavTabsActive($navTabTypeId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs WHERE "
                . "navtab_type_id = '$navTabTypeId' AND "
                . "navtab_status = '1' "
                . "ORDER BY navtab_name ASC"; 
            $result = $con->query($sql);
            return $result;
        }
        // 9) Get All Active Navigation Tabs Count
        public function getAllActiveNavigationTabsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM navtabs WHERE navtab_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get All Inactive Navigation Tabs Count
         public function getAllInactiveNavigationTabsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM navtabs WHERE navtab_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Navigation Tabs Count
        public function getAllNavigationTabsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM navtabs";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 12) Get All Active Navigation Tabs
        public function getAllActiveNavigationTabs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs nt WHERE "
                . "nt.navtab_status = '1'"
                . "ORDER BY nt.navtab_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 13) Get All Inactive Navigation Tabs
        public function getAllInactiveNavigationTabs(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtabs nt WHERE "
                . "nt.navtab_status = '0'"
                . "ORDER BY nt.navtab_name ASC";
            $result = $con->query($sql);
            return $result;
        }
/*********************************************************************************************/
/* (17) Year */
        // 1) Get All Year Decending Order
        public function getAllYears(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year y "
                . "ORDER BY year_name DESC";
            $result = $con->query($sql);
            return $result;
        }  
        // 2) Get Activate All Year
        public function getAllYearsActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year y WHERE "
                . "y.year_status = '1'"
                . "ORDER BY year_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Get Specific Year By yearId
        public function getSpecificYear($yearId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year y WHERE "
                . "y.year_id = '$yearId'";
            $result = $con->query($sql);
            return $result;
        }
        // 4) Get Active Specific Year
        public function getSpecificYearActive($yearId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year y WHERE "
                . "y.year_status = '1' AND "
                . "y.year_id = '$yearId'";
            $result = $con->query($sql);
            return $result;
        }
        // 5) Get Specific Year By Year
        public function getSpecificYearByYear($year){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year y WHERE "
                . "y.year_name = '$year'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 6) Add New Year
        public function addYear($year){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO year(year_name)"
                . "VALUES("
                . "'$year')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        } 
        // 7) Deactivate Year
        public function deactivateYear($updateYearId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE year SET year_status='0' WHERE "
                . "year_id ='$updateYearId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 8) Activate Year
        public function activateYear($updateYearId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE year SET year_status='1' WHERE "
                . "year_id ='$updateYearId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 9) Update Specific Year
        public function updateSpecificYear($year, $yearId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE year SET "
                . "year_name = '$year' WHERE "
                . "year_id = '$yearId'";
            $result = $con->query($sql);    
            return $result;
        }
/**********************************************************************************************/
/* (18) Month */
        // 1) Get All Months
        public function getAllMonths(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m "
                . "ORDER BY m.monthName ASC";
            $result = $con->query($sql);
            return $result;
        } 
        // 2) Get All Active Months
        public function getAllMonthsActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m WHERE "
                . "m.monthStatus = '1'"
                . "ORDER BY m.monthName ASC";
            $result = $con->query($sql);
            return $result;
        } 
        // 3) Deactivate Month
        public function deactivateMonth($updateMonthId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE month m SET m.monthStatus='0' WHERE "
                . "m.monthId ='$updateMonthId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 4) Activate Month
        public function activateMonth($updateMonthId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE month m SET m.monthStatus='1' WHERE "
                . "m.monthId ='$updateMonthId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 5) Get Specific Month
        public function getSpecificMonth($monthId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m WHERE "
                . "m.monthId = '$monthId'";
            $result = $con->query($sql);
            return $result;
        }
        // 6) Get Active Specific Month
        public function getSpecificMonthActive($monthId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m WHERE "
                . "m.monthStatus = '1' AND "
                . "m.monthId = '$monthId'";
            $result = $con->query($sql);
            return $result;
        }
        // 7) Get Specific Month by month
        public function getSpecificMonthByMonth($month){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m WHERE "
                . "m.monthName = '$month'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) Update Specific Month By month and monthId
        public function updateSpecificMonth($monthName, $monthId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE month m SET "
                . "m.monthName = '$monthName' WHERE "
                . "m.monthId = '$monthId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 9) Get All Active Months Count
        public function getAllActiveMonthCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM month WHERE monthStatus = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get All Inactive Months Count
         public function getAllInactiveMonthCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM month WHERE monthStatus = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Months Count
        public function getAllMonthCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM month";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 12) Get All Inactive Months
        public function getAllInactiveMonths(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM month m WHERE "
                . "m.monthStatus = '0'"
                . "ORDER BY m.monthName ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 13) Add New Month
        public function addNewMonth($monthName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO month(monthName)VALUES('$monthName')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }
/***********************************************************************************************/
/* (19) City */
        // 1) Get All Cities
        public function getAllCities(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cities c "
                . "ORDER BY c.cityName ASC";
            $result = $con->query($sql);
            return $result;
        } 
        // 2) Get All Active Cities
        public function getAllActiveCities(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cities c WHERE "
                . "c.cityStatus = '1' "
                . "ORDER BY c.cityName ASC";
            $result = $con->query($sql);
            return $result;
        } 
        // 3) Add New City
        public function addNewCity($cityName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO cities(cityName)VALUES('$cityName')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }
        // 4) Get Specific City       
        public function getSpecificCity($cityId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cities c WHERE "
                . "c.cityId = '$cityId'";
            $result = $con->query($sql);
            return $result;
        } 
        // 5) Update Specific City
        public function updateSpecificCity($cityId, $cityName){
            $con = $GLOBALS["con"];
            $sql = "UPDATE cities c SET "
                . "c.cityName = '$cityName' WHERE "
                . "c.cityId  = '$cityId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Get All Active City Count
        public function getAllActiveCityCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM cities WHERE cityStatus = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 7) Get All Deactive City Count
         public function getAllInactiveCityCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM cities WHERE cityStatus = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 8) Get All City Count
        public function getAllCityCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM cities";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 9) Get All Inactive Cities
        public function getAllInativeCities(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cities c WHERE "
                . "c.cityStatus = '0' "
                . "ORDER BY c.cityName ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 10) Deactivate Specific City
        public function deactivateSpecificCity($cityId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE cities c SET c.cityStatus='0' WHERE "
                . "c.cityId ='$cityId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 4) Activate Specific City
        public function activateSpecificCity($cityId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE cities c SET c.cityStatus='1' WHERE "
                . "c.cityId ='$cityId'";
            $result = $con->query($sql);    
            return $result;
        }
/**********************************************************************************************/
/* (20) Reports */
        // View All Reports 
        public function getAllReports(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM reports r "
                . "ORDER BY r.reportName ASC";
            $result = $con->query($sql);
            return $result;
        }
/************************************************************************************************/
/* (21) User Roles */
        // Get User Roles
        function getUserRoles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM role r WHERE "
                . "r.role_status = '1'";
            $result = $con->query($sql) or die($con->error());
            return $result;
        }
/**********************************************************************************************/
/* (22) Client Services */
        // 1) Update Specific Client Service - clientServiceId, clientServiceName 
        public function updateSpecificClientService($clientServiceId, $clientServiceName, $clientServiceURLEdit){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_services cs SET "
                . "cs.clientServiceName = '$clientServiceName',"
                . "cs.clientServiceURL = '$clientServiceURLEdit' WHERE "
                . "cs.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 2) Get Specific Client Service - clientServiceId  
        public function getSpecificClientService($updateClientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_services cs WHERE "
                . "cs.clientServiceId = '$updateClientServiceId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Add New Client Service
        public function addNewClientService($clientServiceName, $clientServiceURLEdit){ 
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO client_services("
                . "clientServiceName,"
                . "clientServiceURL)" /* 2 */
                . "VALUES("
                . "'$clientServicesnName',"
                . "'$clientServiceURLEdit')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);     
        }
        // 4) Get All Client Services
        public function getAllClientServices(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_services cs";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Get All Active Client Services
        public function getAllClientServicesActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_services cs WHERE "
                . "cs.clientServiceStatus = '1'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 6) Deactivate Client Service - clientServiceId
         public function deactivateClientService($updateClientService){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_services SET clientServiceStatus='0' WHERE "
                . "clientServiceId='$updateClientService'";
            $result = $con->query($sql);       
            return $result;
        }
        // 7) Activate Client Service - clientServiceId
        public function activateClientService($updateClientService){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_services SET clientServiceStatus='1' WHERE "
                . "clientServiceId='$updateClientService'";
            $result = $con->query($sql);    
            return $result;
        }
/************************************************************************************************/
/* (23) Client Request */
        // 1) Get Specific Client Booking Requests - clientBookingRequestId
        public function getSpecificClientBookingRequests($clientBookingRequestsId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_booking_requests cbr, client c, tasks_type tt, districts d, user u WHERE "
                    . "cbr.user_id = c.user_id AND "
                    . "c.user_id = u.user_id AND "
                    . "cbr.tasks_type_id = tt.tasks_type_id AND "
                    . "cbr.districts_id = d.districts_id AND "
                    . "cbr.client_booking_requests_id = '$clientBookingRequestsId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Disable Add Driver Button - clientBookingRequestId
        public function disableAddDriverBtn($clientBookingRequestsId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_booking_requests SET "
                . "addDriverBtnCSS = 'disabled' WHERE "
                . "client_booking_requests_id = '$clientBookingRequestsId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Disable Add Vehicle Button - clientBookingRequestId
        public function disableAddVehicleBtn($clientBookingRequestsId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_booking_requests SET "
                . "addVehicleBtnCSS = 'disabled' WHERE "
                . "client_booking_requests_id = '$clientBookingRequestsId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }       
        // 4) Get Specific Client Driver Booking Requests - clientBookingRequestId
        public function getSpecificClientDriverBookingRequests($clientBookingRequestsId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_driver_booking_requests cdbr WHERE "
                . "cdbr.client_driver_booking_requests_id = '$clientBookingRequestsId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Update Hire Driver Request From Client
        public function updateHireDriverRequestClient(
            $clientRequestId, 
            $clientServiceId, 
            $hireDriverRequestId, 
            $classOfVehicleId, 
            $hireDriverRequestLocationURL){
            $con = $GLOBALS["con"];
                $sql = "UPDATE client_requests cr, hire_driver_request hdr, client_services cs SET "
                    . "hdr.classOfVehicleId = '$classOfVehicleId',"
                    . "hdr.hireDriverRequestLocation = '$hireDriverRequestLocationURL' WHERE "
                    . "cs.clientServiceId = '$clientServiceId' AND "
                    . "cr.clientRequestId = '$clientRequestId' AND "
                    . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Get All Cancelled Client Requests
        public function getAllClientRequestsCancelled(){
            $con= $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, client c, user u, "
                    . "profile_image pi, process_status ps, css_colors cssc WHERE "
                    . "cr.clientUserId = u.user_id AND "
                    . "cssc.cssColorId = ps.cssColorId AND "
                    . "c.user_id = u.user_id AND "
                    . "u.profile_image_id = pi.profile_image_id AND "
                    . "ps.processStatusId = cr.processStatusId AND "
                    . "cs.clientServiceId = cr.clientServiceId AND "
                    . "cr.clientRequestCancelStatus = '1'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Get All Client Requests
        public function getAllClientRequestsWithoutCompleteAndCancelled(){
            $con= $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, client c, user u, "
                    . "profile_image pi, process_status ps, css_colors cssc WHERE "
                    . "cr.clientUserId = u.user_id AND "
                    . "cssc.cssColorId = ps.cssColorId AND "
                    . "c.user_id = u.user_id AND "
                    . "u.profile_image_id = pi.profile_image_id AND "
                    . "ps.processStatusId = cr.processStatusId AND "
                    . "cs.clientServiceId = cr.clientServiceId AND "
                    . "cr.clientRequestCompleted = '0' AND "
                    . "cr.clientRequestCancelStatus = '0'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) Get Assigned Driver Details - driverUserId    
        public function getAssignedDriverDetails($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, driver d, profile_image pi WHERE "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "u.user_id = d.user_id AND "
                . "u.user_id = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }    
        // 9) Update Specific Client Request - clientRequestId, processStatusId, changeStatusId
        public function updateSpecificClientRequest($clientRequestId, $processStatusId, $changeStatusId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.processStatusId = '$processStatusId',"
                . "cr.changeStatusId = '$changeStatusId' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 10) Recall Client Request - clientRequestId
        public function recallClientRequest($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestCancelStatus = '0' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        }    
        // 11) Cancel Client Request - clientRequestId
        public function cancelClientRequest($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestCancelStatus = '1' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 12) Add to Client Request - clientUserId, clientServiceId      
        public function addClientRequest($clientUserId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO client_requests("
                . "clientUserId,"
                . "clientServiceId)"
                . "VALUES("
                . "'$clientUserId',"
                . "'$clientServiceId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 13) Get Specific Hire Driver Client Request - clientRequestId, clientServiceId, clientUserId      
        public function getSpecificHireDriverClientRequestByClientRequestIdClientServiceIdClientUserId($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_request hdr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hdr.classOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 14) Get Specific Hire Vehicle Client Request - clientRequestId, clientServiceId, clientUserId      
        public function getSpecificHireVehicleClientRequestByClientRequestIdClientServiceIdClientUserId($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_vehicle_request hvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, fleet f WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hvr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "f.fleet_id = hvr.fleetId AND "
                . "cov.class_of_vehicle_id = hvr.classOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }       
        // 15) Get Specific Client Request - clientRequestId, clientServiceId, hireVehicleRequestId
        public function getSpecificHireVehicleRequest($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_vehicle_request hvr, class_of_vehicles cov, fleet f WHERE "
                . "hvr.classOfVehicleId = cov.class_of_vehicle_id AND "
                . "hvr.fleetId = f.fleet_id AND "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 16) Get Specific Client Request - clientRequestId, clientServiceId, hireDriverRequestId
        public function getSpecificHireDriverRequest($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_request hdr, class_of_vehicles cov WHERE "
                . "hdr.classOfVehicleId = cov.class_of_vehicle_id AND "
                . "hdr.hireDriverRequestId  = '$hireDriverRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 17) Get All Not Cancelled Client Request of Specific Client - clientUserId      
        public function getAllNotCancelledClientRequestOfSpecificClient($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, css_colors cssc WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientUserId = '$user_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        } 
        // 18) Get All Client Request of Specific Client - clientUserId      
        public function getAllClientRequestOfSpecificClient($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, client_request_status crs WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "crs.clientRequestStatusId   = cr.clientRequestStatusId AND "
                . "cr.clientUserId = '$user_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        } 
        // 19) Get All Drivers of Specific Class of Vehicle - classOfVehicleId 
        public function getAllDriversSpecificClassOfVehicle($classOfVehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, driver d, class_of_vehicles cov, driver_class_of_vehicles dcov, "
                . "profile_image pi WHERE "
                . "u.user_id = d.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "d.user_id = dcov.driverUserId AND "
                . "d.assignStatus = '0' AND "
                . "cov.class_of_vehicle_id = dcov.classOfVehicleId AND "
                . "cov.class_of_vehicle_id = '$classOfVehicleId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 20) Get All Vehicles of Specific Class of Vehicle - classOfVehicleId, fleetId
        public function getAllVehicleSpecificClassOfVehicleNFleet($classOfVehicleId, $fleetId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, class_of_vehicles cov, fleet f, vehicle_manufacturers vm WHERE "
                . "v.vehicleVehicleClassId = cov.class_of_vehicle_id AND "
                . "v.fleetId = f.fleet_id AND "
                . "v.vehicleMakeId = vm.vehicleManufacturerId  AND "
                . "V.vehicleVehicleClassId = '$classOfVehicleId' AND "
                . "v.fleetId = '$fleetId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 21) Get All Cancelled Client Request of Specific Client - clientUserId      
        public function getAllCancelldClientRequestOfSpecificClient($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.processStatusId    = cr.processStatusId AND "
                . "cr.clientRequestCancelStatus = '1' AND "
                . "cr.clientUserId = '$user_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 22) Add to Client Request Hire Driver Requests - client
        public function addHireDriverRequest(            
            $clientRequestId,
            $classOfVehicleId,
            $linkURL){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO  hire_driver_request("
                . "classOfVehicleId,"
                . "hireDriverRequestLocation,"
                . "clientRequestId)"
                . "VALUES("
                . "'$classOfVehicleId',"
                . "'$linkURL',"
                . "'$clientRequestId')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 23) Add to Client Request Hire Vehicle Requests - clientRequestId, classOfVehicleId, fleetId
        public function addHireVehicleRequest($clientRequestId, $classOfVehicleId, $fleetId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO hire_vehicle_request("
                . "classOfVehicleId,"
                . "fleetId,"
                . "clientRequestId)"
                . "VALUES("
                . "'$classOfVehicleId',"
                . "'$fleetId',"
                . "'$clientRequestId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 24) Get Client Request Driver Measure Outcomes - financeId, hireDriverRequestId      
        public function getClientRequestDriverMeasureOutcomes($financeId, $hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_request_income hdri WHERE "
                . "hdri.financeId = '$financeId' AND "
                . "hdri.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 25) Get Client Request Driver Measure Outcomes - hireDriverRequestId      
        public function getClientRequestDriverMeasureOutcomes1($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_request_income hdri WHERE "
                . "hdri.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 26) 
        public function updateClientRequestPaymentInvoiceRequestStatus($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestPaymentInvoiceRequestStatus = '1' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        }        
        // 27) 
        public function addPaymentInvoiceToClientRequestTable($filename, $clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestPaymentInvoice = '$filename' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 28) 
        public function removePaymentInvoiceFromClientRequestTable($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestPaymentInvoice = '',"
                . "cr.clientRequestPaymentInvoiceStatus = '0' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 29)
        public function updateClientRequestPaymentInvoiceRequestStatusAndPayment($clientRequestId, $payment){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestPaymentInvoiceStatus = '1',"
                . "cr.payment = '$payment' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 30)
        public function updatePaymentStatusAndClientCompletedStatus($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.clientRequestCompleted = '1',"
                . "cr.paidStatus = '1' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 31) Get All Not Cancelled Client Request of Specific Client - clientUserId      
        public function getAllCompletedClientRequestOfSpecificClient($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, css_colors cssc WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '1' AND "
                . "cr.clientUserId = '$user_id'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 32) Get All Client Requests
        public function getAllCompletedClientRequests(){
            $con= $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, client c, user u, "
                    . "profile_image pi, process_status ps, css_colors cssc WHERE "
                    . "cr.clientUserId = u.user_id AND "
                    . "cssc.cssColorId = ps.cssColorId AND "
                    . "c.user_id = u.user_id AND "
                    . "u.profile_image_id = pi.profile_image_id AND "
                    . "ps.processStatusId = cr.processStatusId AND "
                    . "cs.clientServiceId = cr.clientServiceId AND "
                    . "cr.clientRequestCompleted = '1' AND "
                    . "cr.clientRequestCancelStatus = '0'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 33)    
        public function getSpecificHireDriverAndVehicleClientRequestVehicleDetails($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, fleet f WHERE "
                . "f.fleet_id = hdvr.fleetId AND "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hdvr.vehicleClassOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 34)      
        public function getSpecificHireDriverAndVehicleClientRequestDriverDetails($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hdvr.driverClassOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
//        getSpecificClientRequestByClientRequestIdClientServiceIdClientUserId
/*****************************************************************************/
/* (24) Hire Driver Request */
        // Update Hire Driver Request Driver Task Status Deactive
        public function updateHireDriverRequestDriverTaskStatusDeactive($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.driverTaskStatus = '0' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // Update Hire Driver Request Driver Task Status Active   
        public function updateHireDriverRequestDriverTaskStatusActive($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.driverTaskStatus = '1' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // Recall Assign Driver Task   
        public function recallAssignDriverTask($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "DELETE FROM driver_tasks WHERE "
                . "hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        
        // Recall Assign Hire Driver Income   
        public function recallAssignHireDriverIncome($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "DELETE FROM hire_driver_request_income WHERE "
                . "hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // Assign Taks For Driver   
        public function assignTaskForDriver($clientRequestId, $clientServiceId, $clientUserId, $hireDriverRequestId, $driverUserId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO driver_tasks("
                . "clientRequestId,"
                . "clientUserId,"
                . "clientServiceId,"
                . "hireDriverRequestId,"
                . "driverUserId)"
                . "VALUES("
                . "'$clientRequestId',"
                . "'$clientUserId',"
                . "'$clientServiceId',"
                . "'$hireDriverRequestId',"
                . "'$driverUserId')";
            $result = $con->query($sql);    
            return $result;
        }
        // Hire Driver Requesting    
        public function hireDriverRequestRequesting($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.hireDriverRequestRequestedStatus = '1' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }       
        // Hire Driver Request Recalling
        public function hireDriverRequestRecalling($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.hireDriverRequestRequestedStatus = '0' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }         
        // Hire Driver Driver Resigning
        public function hireDriverRequestResignDriver($hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.assignedDriverUserId = '0' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }      
        // Assign Driver to Hire Driver Request
         public function assignDriverHireDriverRequest($driverUserId, $hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request hdr SET "
                . "hdr.assignedDriverUserId = '$driverUserId' WHERE "
                . "hdr.hireDriverRequestId = '$hireDriverRequestId'";
            $result = $con->query($sql);    
            return $result;
        }        
        // Get All Hire Driver Request By Requested Status     
        public function getAllNotCompletedNotCancelledClientHireDriverRequestsByRequested(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_request hdr, client_requests cr, client_services cs, "
                . "class_of_vehicles cov, user u, profile_image pi WHERE "
                . "cr.clientRequestId = hdr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hdr.classOfVehicleId AND "
                . "u.user_id  = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "cr.clientRequestCompleted  = '0' AND "
                . "cr.clientRequestCancelStatus  = '0' AND "
                . "hdr.hireDriverRequestRequestedStatus = '1'";
            $result= $con->query($sql);
            return $result;
        }
        // Get All Hire Driver Request By Requested Status     
        public function getAllCompletedClientHireVehicleRequestsByRequested(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_vehicle_request hvr, client_requests cr, client_services cs, "
                . "class_of_vehicles cov, user u, profile_image pi WHERE "
                . "cr.clientRequestId = hvr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hvr.classOfVehicleId AND "
                . "u.user_id  = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "hvr.hireVehicleRequestRequestedStatus = '1' AND "
                . "cr.clientRequestCompleted = '1'";
            $result= $con->query($sql);
            return $result;
        }
        // Get All Hire Driver Request By Requested Status     
        public function getAllNotCompletedNotCancelledClientHireVehicleRequestsByRequested(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_vehicle_request hvr, client_requests cr, client_services cs, "
                . "class_of_vehicles cov, user u, profile_image pi WHERE "
                . "cr.clientRequestId = hvr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hvr.classOfVehicleId AND "
                . "u.user_id  = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "hvr.hireVehicleRequestRequestedStatus = '1' AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientRequestCompleted = '0'";
            $result= $con->query($sql);
            return $result;
        }
        // Get All Hire Driver Request By Requested Status     
        public function getAllCompletedClientHireDriverAndVehicleRequestsByRequested(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_request hdvr, client_requests cr, client_services cs, "
                . "class_of_vehicles cov, user u, profile_image pi WHERE "
                . "cr.clientRequestId = hdvr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hdvr.vehicleClassOfVehicleId AND "
                . "u.user_id  = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "hdvr.hireVehicleRequestRequestedStatus = '1' AND "
                . "cr.clientRequestCompleted = '1'";
            $result= $con->query($sql);
            return $result;
        }
/* (25) Driver */
        // 1) Get All Class of Vehicles of Specific Driver - driverUserId
        public function getAllSpecificDriverClassOfVehicles($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM class_of_vehicles cof, driver d, user u, driver_class_of_vehicles dcof WHERE "
                . "u.user_id = d.user_id AND "
                . "cof.class_of_vehicle_id = dcof.classOfVehicleId AND "
                . "dcof.driverUserId = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get All Drivers
        public function getAllDrivers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver d, user u, profile_image pi, login l WHERE "
                . "u.user_id = d.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.loginId = l.login_id";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Driver Assigning - driverUserId
        public function driverAssigning($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user u, driver d SET "
                . "d.assignStatus = '1' WHERE "
                . "d.user_id = u.user_id AND "
                . "u.user_id = '$driverUserId'";
            $con->query($sql) or die($con->error);    
        }
        // 4) Driver Unassigning - driverUserId
        public function driverUnassigning($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user u, driver d SET "
                . "d.assignStatus = '0' WHERE "
                . "d.user_id = u.user_id AND "
                . "u.user_id = '$driverUserId'";
            $con->query($sql) or die($con->error);    
        }
        // 5) Deactive Driver - driverUserId
        public function deactivateDriver($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user u, driver d SET "
                . "u.user_status = '0' WHERE "
                . "d.user_id = u.user_id AND "
                . "u.user_id = '$driverUserId'";
            $con->query($sql) or die($con->error);    
        }
        // 6) Activate Driver - driverUserId
        public function activateDriver($updateDriverUserId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE user u, driver d SET "
                . "u.user_status = '1' WHERE "
                . "d.user_id = u.user_id AND "
                . "u.user_id = '$updateDriverUserId'";
            $con->query($sql) or die($con->error);   
        } 
        // 7) Get Specific Driver - driverUserId
        public function getSpecificDriver($user_idDriver){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, "
                . "email e, "
                . "date_of_birthday dob, "
                . "nic nic, "
                . "profile_image pi, "
                . "contact con, "
                . "address adr, "
                . "password p, "
                . "login l, "
                . "driver d WHERE "
                . "u.user_id = d.user_id AND "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = nic.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = con.contact_id AND "
                . "u.address_id = adr.address_id AND "
                . "u.loginId = l.login_id AND "
                . "p.password_id = l.password_id AND "
                . "u.user_id='$user_idDriver'";
            $result = $con->query($sql) or die($con->error);
            return $result;       
        } 
        // 8) Get All Driver Users
        public function getAllDriverUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, profile_image pi, role r WHERE "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.role_id = r.role_id AND "
                . "r.role_id = '20'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 10) Get All Driver Count
        public function getAllDriverCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(driver_id) FROM driver";
            $result = $con->query($sql);
            return $result;      
        }
/* (26) Driver Class of Vehicle */
        // Delete All Specific Driver Class of Vehicle - driverUserId
        public function deleteAllSpecificDriverClassOfVehicle($driverUserId){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM driver_class_of_vehicles WHERE "
                . "driverUserId = '$driverUserId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // Add Driver Class of Vehicle - driverUserId, classOfVehicleId
        public function addDriverClassOfVehicle($driverUserId, $classOfVehicleId){
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO driver_class_of_vehicles("
                . "driverUserId," /* 1 */
                . "classOfVehicleId)" /* 2 */
                . "VALUES("
                . "'$driverUserId'," /* 1 */
                . "'$classOfVehicleId')"; /* 2 */
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/* (27) Driver ADR Certificates */
        // 1) Delete All Specific Driver ADR Certificates - driverUserId
        public function deleteAllSpecificdriverADRCertificates($driverUserId){
            $conn = $GLOBALS["con"];
            $sql = "DELETE FROM driver_adr_certificates WHERE "
                . "user_idDriver = '$driverUserId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
        // 2) Add Driver ADR Functions - driverUserId, $ADRcertificateId
        public function addDriverADRCertificates($driverUserId, $ADRCertificateId){
            $conn = $GLOBALS["con"];
            $sql = "INSERT INTO driver_adr_certificates("
                . "user_idDriver," 
                . "adr_certificate_id)" 
                . "VALUES("
                . "'$driverUserId',"
                . "'$ADRCertificateId')";
            $result = $conn->query($sql) or die($conn->error);
            return $result;        
        }
/* (28) ADR Certificates */  
        // 1) Deactive ADR Certificates - ADRCertificateId
        public function deactivateADRCertificate($ADRCertificateId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE adr_certificates SET "
                . "ADRCertificateStatus='0' WHERE "
                . "driverADRCertificate_id = '$ADRCertificateId'";
            $result = $con->query($sql) or die($conn->error);  
            return $result;
        }
        // 2) Activate ADR Certificates - ADRCertificateId
        public function activateADRCertificate($ADRCertificateId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE adr_certificates SET "
                . "ADRCertificateStatus='1' WHERE "
                . "driverADRCertificate_id = '$ADRCertificateId'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        } 
        // 3) Add New ADR Certificate - ADRCertificateName, ADRCertificateName, ADRCertificateImageEdit
        public function addNewADRCertificate($ADRCertificateName, $ADRCertificateDescription, $ADRCertificateImageEdit){
            $con = $GLOBALS["con"];
            $sql2 = "INSERT INTO adr_certificates("
    /* 1 */     . "driverADRCertificate_name,"
    /* 1 */     . "driverADRCertificate_discription,"
                . "driverADRCertificate_image)"
                . "VALUES("
    /* 1 */     . "'$ADRCertificateName',"
    /* 1 */     . "'$ADRCertificateDescription',"
                . "'$ADRCertificateImageEdit')";
            $con->query($sql2) or die($con->error);
            return $insert_id = $con->insert_id;         
        }  
        // 4) Get All Active ADR Certificates
        public function getAllADRCertificatesActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM adr_certificates WHERE "
                . "ADRCertificateStatus = '1'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 5) Get All ADR Certificates
        public function getAllADRCertificates(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM adr_certificates";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 6) Get All Specific Driver ADR Certificates - driverUserId
        public function getAllSpecificDriverADRCertificates($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM adr_certificates adrc, driver d, user u, driver_adr_certificates dadrc WHERE "
                . "u.user_id = d.user_id AND "
                . "adrc.driverADRCertificate_id  = dadrc.adr_certificate_id AND "
                . "dadrc.user_idDriver = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Update Specific ADR Certificate
        public function updateSpecificADRCertificate(
/* 1 */     $ADRCertificateName,
/* 2 */     $ADRCertificateDescription,
/* 2 */     $profileImageEdit,
            $updateADRCertificateId){
            $con = $GLOBALS["con"];
            if($profileImageEdit == ""){
                $sql = "UPDATE adr_certificates SET "
        /* 1 */     . "driverADRCertificate_name = '$ADRCertificateName',"
        /* 2 */     . "driverADRCertificate_discription = '$ADRCertificateDescription' WHERE "
                    . "driverADRCertificate_id = '$updateADRCertificateId'"; 
            }else{
                $sql = "UPDATE adr_certificates SET "
        /* 1 */     . "driverADRCertificate_name = '$ADRCertificateName',"
        /* 1 */     . "driverADRCertificate_image = '$profileImageEdit',"
        /* 2 */     . "driverADRCertificate_discription = '$ADRCertificateDescription' WHERE "
                    . "driverADRCertificate_id = '$updateADRCertificateId'"; 
            }
            $con->query($sql) or die($con->error);
        }
        // 8) Get Specific ADR Certificate - ADRCertificateId
        public function getSpecificADRCertificate($ADRCertificateId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM adr_certificates WHERE "
                . "driverADRCertificate_id ='$ADRCertificateId'";
            $result = $con->query($sql);
            return $result;
        }  
/* (29) Driver License */
        // 1) Update Specific Driver License 
        public function updateSpecificDriverLicense(
/* 1 */     $surname,
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
            $driverLicenseId){
            $con = $GLOBALS["con"];
            if($signatureHolder_==""){
                $sql = "UPDATE driver_licenses SET "
        /* 1 */     . "surname = '$surname',"
        /* 2 */     . "otherNames = '$otherNames',"
        /* 3 */     . "dob = '$dob',"
        /* 4a */    . "issueLicense = '$issueLicense',"
        /* 4b */    . "expiryLicense = '$expiryLicense',"
        /* 4c */    . "issuingAuthority = '$issuingAuthority',"
        /* 4d */    . "NIC = '$NIC',"
        /* 5 */     . "noLicense = '$noLicense',"
        /* 6 */     . "bloodGroup = '$bloodGroup',"
        /* 8 */     . "address = '$address',"
        /* 10a1 */  . "a1Issue = '$a1Issue',"
        /* 11a1 */  . "a1Expiry = '$a1Expiry',"
        /* 12a1 */  . "a1Code = '$a1Code',"
        /* 10a */   . "aIssue = '$aIssue',"
        /* 11a */   . "aExpiry = '$aExpiry',"
        /* 12a */   . "aCode = '$aCode',"
        /* 10b1 */  . "b1Issue = '$b1Issue',"
        /* 11b1 */  . "b1Expiry = '$b1Expiry',"
        /* 12b1 */  . "b1Code = '$b1Code',"
        /* 10b */   . "bIssue = '$bIssue',"
        /* 11b */   . "bExpiry = '$bExpiry',"
        /* 12b */   . "bCode = '$bCode',"
        /* 10c1 */  . "c1Issue = '$c1Issue',"
        /* 11c1 */  . "c1Expiry = '$c1Expiry',"
        /* 12c1 */  . "c1Code = '$c1Code',"
        /* 10c */   . "cIssue = '$cIssue',"
        /* 11c */   . "cExpiry = '$cExpiry',"
        /* 12c */   . "cCode = '$cCode',"
        /* 10ce */  . "ceIssue = '$ceIssue',"
        /* 11ce */  . "ceExpiry = '$ceExpiry',"
        /* 12ce */  . "ceCode = '$ceCode',"
        /* 10d1 */  . "d1Issue = '$d1Issue',"
        /* 11d1 */  . "d1Expiry = '$d1Expiry',"
        /* 12d1 */  . "d1Code = '$d1Code',"
        /* 10d */   . "dIssue = '$dIssue',"
        /* 11d */   . "dExpiry = '$dExpiry',"
        /* 12d */   . "dCode = '$dCode',"
        /* 10de */  . "deIssue = '$deIssue',"
        /* 11de */  . "deExpiry = '$deExpiry',"
        /* 12de */  . "deCode = '$deCode',"
        /* 10ge */  . "g1Issue = '$g1Issue',"
        /* 11ge */  . "g1Expiry = '$g1Expiry',"
        /* 12ge */  . "g1Code = '$g1Code',"
        /* 10g */   . "gIssue = '$gIssue',"
        /* 11g */   . "gExpiry = '$gExpiry',"
        /* 12g */   . "gCode = '$gCode',"
        /* 10j */   . "jIssue = '$jIssue',"
        /* 11j */   . "jExpiry = '$jExpiry',"
        /* 12j */   . "jCode = '$jCode'"
                    . "WHERE driver_licenses_id = '$driverLicenseId'";
            }else{
                $sql = "UPDATE driver_licenses SET "
                . "surname = '$surname',"
    /* 2 */     . "otherNames = '$otherNames',"
    /* 3 */     . "dob = '$dob',"
    /* 4a */    . "issueLicense = '$issueLicense',"
    /* 4b */    . "expiryLicense = '$expiryLicense',"
    /* 4c */    . "issuingAuthority = '$issuingAuthority',"
    /* 4d */    . "NIC = '$NIC',"
    /* 5 */     . "noLicense = '$noLicense',"
    /* 6 */     . "bloodGroup = '$bloodGroup',"
    /* 7 */     . "signatureHolder = '$signatureHolder_',"
    /* 8 */     . "address = '$address',"
    /* 10a1 */  . "a1Issue = '$a1Issue',"
    /* 11a1 */  . "a1Expiry = '$a1Expiry',"
    /* 12a1 */  . "a1Code = '$a1Code',"
    /* 10a */   . "aIssue = '$aIssue',"
    /* 11a */   . "aExpiry = '$aExpiry',"
    /* 12a */   . "aCode = '$aCode',"
    /* 10b1 */  . "b1Issue = '$b1Issue',"
    /* 11b1 */  . "b1Expiry = '$b1Expiry',"
    /* 12b1 */  . "b1Code = '$b1Code',"
    /* 10b */   . "bIssue = '$bIssue',"
    /* 11b */   . "bExpiry = '$bExpiry',"
    /* 12b */   . "bCode = '$bCode',"
    /* 10c1 */  . "c1Issue = '$c1Issue',"
    /* 11c1 */  . "c1Expiry = '$c1Expiry',"
    /* 12c1 */  . "c1Code = '$c1Code',"
    /* 10c */   . "cIssue = '$cIssue',"
    /* 11c */   . "cExpiry = '$cExpiry',"
    /* 12c */   . "cCode = '$cCode',"
    /* 10ce */  . "ceIssue = '$ceIssue',"
    /* 11ce */  . "ceExpiry = '$ceExpiry',"
    /* 12ce */  . "ceCode = '$ceCode',"
    /* 10d1 */  . "d1Issue = '$d1Issue',"
    /* 11d1 */  . "d1Expiry = '$d1Expiry',"
    /* 12d1 */  . "d1Code = '$d1Code',"
    /* 10d */   . "dIssue = '$dIssue',"
    /* 11d */   . "dExpiry = '$dExpiry',"
    /* 12d */   . "dCode = '$dCode',"
    /* 10de */  . "deIssue = '$deIssue',"
    /* 11de */  . "deExpiry = '$deExpiry',"
    /* 12de */  . "deCode = '$deCode',"
    /* 10ge */  . "g1Issue = '$g1Issue',"
    /* 11ge */  . "g1Expiry = '$g1Expiry',"
    /* 12ge */  . "g1Code = '$g1Code',"
    /* 10g */   . "gIssue = '$gIssue',"
    /* 11g */   . "gExpiry = '$gExpiry',"
    /* 12g */   . "gCode = '$gCode',"
    /* 10j */   . "jIssue = '$jIssue',"
    /* 11j */   . "jExpiry = '$jExpiry',"
    /* 12j */   . "jCode = '$jCode'"
                . "WHERE driver_licenses_id = '$driverLicenseId'";
            }
            $con->query($sql) or die($con->error);
        }           
        // 2) Add New Driver License
        public function addNewDriverLicense(){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO driver_licenses()VALUES()";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 3) Add New Driver
        public function addNewDriver($user_id){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO driver(user_id)VALUES('$user_id')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }  
        // 4)
        public function updateDriverDrivingLicense($driverUserId, $driverLicenseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE driver d SET "
                . "d.driver_licenses_id='$driverLicenseId' WHERE "
                . "d.user_id = '$driverUserId'";
            $con->query($sql) or die($con->error);        
        }
        // 5)
        public function getSpecificDrivingLicense($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver d, driver_licenses dl WHERE "
                . "dl.driver_licenses_id = d.driver_licenses_id AND "
                . "d.user_id = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/* (30) Driver Operator */
        // 1) Get Specific Driver Operator - driverUserId
        public function getSpecificDriverOperator($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver WHERE user_id = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get Specific Driver Driver Tasks Requests without complete and cancel - driverUserId
        public function getSpecificDriverDriverTasksRequestsWithoutCompleteAndCancel($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver_tasks dt, hire_driver_request_income hdri, user u, driver d, client_requests cr, client_services cs WHERE "
                . "u.user_id = d.user_id AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientRequestId = dt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "hdri.hireDriverRequestId = dt.hireDriverRequestId AND "
                . "u.user_id = dt.driverUserId AND "
                . "dt.driverUserId = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Get specific Driver Tasks Request - driverUserId
        public function getSpecificDriverTasksRequest($driverTaskId){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM driver_tasks dt, hire_driver_request_income hdri, user u, client_requests cr, client_services cs, "
                . "hire_driver_request hdr, profile_image pi, class_of_vehicles coc, process_status ps, css_colors cssc WHERE "
                . "u.user_id = cr.clientUserId AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "cr.clientRequestId = dt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cssc.cssColorId = ps.cssColorId AND "
                . "hdri.hireDriverRequestId = dt.hireDriverRequestId AND "
                . "hdr.hireDriverRequestId = dt.hireDriverRequestId AND "
                . "hdr.classOfVehicleId = coc.class_of_vehicle_id AND "
                . "dt.driverTaskId = '$driverTaskId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 4) Get Specific Driver - driverId 
        public function getSpecificDriverDriverId($driverId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver d, user u, profile_image pi WHERE "
                . "u.user_id = d.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "d.driver_id = '$driverId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }       
        // 5) Update Process Status From Driver Operator
        public function updateProcessStatusFromDriverOperator($processStatusId, $clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.processStatusId = '$processStatusId' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $con->query($sql) or die($con->error);        
        }
        // 6) Update Hire Driver Request Income Table
        public function updateHireDriverRequestIncomeTable($hireDriverRequestIncomeId, $odometerValue, $startTime, $endTime){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_request_income hdri SET "
                . "hdri.odometerValue = '$odometerValue',"
                . "hdri.startTime = '$startTime',"
                . "hdri.endTime = '$endTime' WHERE "
                . "hdri.hireDriverRequestIncomeId = '$hireDriverRequestIncomeId'";
            $con->query($sql) or die($con->error);        
        }
        // 7) Get Specific Driver Finised Driver Tasks Requests - driverUserId
        public function getSpecificDriverFinishedDriverTasksRequests($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver_tasks dt, hire_driver_request_income hdri, user u, driver d, client_requests cr, client_services cs WHERE "
                . "u.user_id = d.user_id AND "
                . "cr.clientRequestId = dt.clientRequestId AND "
                . "cr.clientRequestCompleted = '1' AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "hdri.hireDriverRequestId = dt.hireDriverRequestId AND "
                . "u.user_id = dt.driverUserId AND "
                . "dt.driverUserId = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) 
        public function getSpecificDriverDriverAndVehicleTasksRequestsWithoutCompleteAndCancel($driverUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver_and_vehicle_tasks dvt, hire_driver_and_vehicle_income hdvri, user u, driver d, client_requests cr, client_services cs WHERE "
                . "u.user_id = d.user_id AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientRequestId = dvt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "hdvri.hireDriverAndVehicleRequestId = dvt.hireDriverAndVehicleRequestId AND "
                . "u.user_id = dvt.driverUserId AND "
                . "dvt.driverUserId = '$driverUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/* (31) Finance */
        // 1) Add financeId
        public function addFinanceId($financeTypeId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO finance(financeTypeId)"
                . "VALUES('$financeTypeId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 2) Add financeId to Client Request - financeId, clientRequestId
        public function addFinancialIdClientRequest($financeId, $clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.financeId = '$financeId' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 3) Add financeId Hire Driver Income - financeId, financeTypeId, $hireDriverRequestId
        public function addFinanceIdHireDriverIncome($financeId, $financeTypeId, $hireDriverRequestId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO hire_driver_request_income("
                . "financeId,"
                . "financeTypeId,"
                . "hireDriverRequestId)"
                . "VALUES("
                . "'$financeId',"
                . "'$financeTypeId',"
                . "'$hireDriverRequestId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 4) Add financeId Hire Vehicle Income - financeId, financeTypeId, $hireDriverRequestId
        public function addFinanceIdHireVehicleIncome($financeId, $financeTypeId, $hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO hire_vehicle_request_income("
                . "financeId,"
                . "financeTypeId,"
                . "hireVehicleRequestId)"
                . "VALUES("
                . "'$financeId',"
                . "'$financeTypeId',"
                . "'$hireVehicleRequestId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        } 
        // 5) Get Specific financeTypeId of financeId
        public function getSpecificFinanceTypeIdOfFinanceId($financeId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM finance f WHERE "
                . "f.financeId = '$financeId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 6) Get Payment of Client Request
        public function getPaymentOfClientRequest($clientRequestId, $financeId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr WHERE "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.financeId = '$financeId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Add Payment to Money Income
        public function AddPaymentToMoneyIncome($payment, $financeId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO money_incomes("
                . "financeId,"
                . "moneyValue)"
                . "VALUES("
                . "'$financeId',"
                . "'$payment')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 8) Add financeId Hire Driver Income - financeId, financeTypeId, $hireDriverRequestId
        public function addFinanceIdHireDriverAndVehicleIncome($financeId, $financeTypeId, $hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO hire_driver_and_vehicle_income("
                . "financeId,"
                . "financeTypeId,"
                . "hireDriverAndVehicleRequestId)"
                . "VALUES("
                . "'$financeId',"
                . "'$financeTypeId',"
                . "'$hireDriverAndVehicleRequestId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
/**************************************************************************************/
/* (32) Vehicle */
        // 1) Add New Vehicle
        public function addNewVehicle(
            $vehicleVehicleClassId,
            $vehicleMakeId,
            $vehicleModel,
            $vehicleColor,
            $vehicleRegistrationNo,
            $vehicleImageEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle("
                . "vehicleVehicleClassId,"
                . "vehicleMakeId,"
                . "vehicleModel,"
                . "vehicleColor,"
                . "vehicleRegistrationNo,"
                . "vehicleImage)"
                . "VALUES("
                . "'$vehicleVehicleClassId',"
                . "'$vehicleMakeId',"
                . "'$vehicleModel',"
                . "'$vehicleColor',"
                . "'$vehicleRegistrationNo',"
                . "'$vehicleImageEdit')";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 2) Get All Vehicles
        public function getAllVehicle(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_manufacturers vm, class_of_vehicles vc WHERE "
                . "v.vehicleMakeId = vm.vehicleManufacturerId AND "
                . "v.vehicleVehicleClassId = vc.class_of_vehicle_id "
                . "ORDER BY vm.vehicleManufacturerName ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Get Specific Vehicle - vehicleId
        public function getSpecificVehicle($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, emission_test et, fuel_type ft, class_of_vehicles vc, "
                . "year y, vehicle_manufacturers vm WHERE "
                . "v.vehicleId = et.vehicle_id AND "
                . "v.vehicleMakeId = vm.vehicleManufacturerId AND "
                . "ft.fuel_type_id  = et.emissionTestIdFuelTypeId AND "
                . "vc.class_of_vehicle_id  = et.emissionTestVehicleClassId AND "
                . "y.year_id  = et.year_id AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;       
        } 
        // 4) Update Specific Vehicle Overview
        public function updateSpecificVehicleOverview(
            $vehicleId,    
            $vehicleVehicleClassId,    
            $vehicleMakeId,    
            $vehicleModel,    
            $vehicleColor,    
            $vehicleRegistrationNo,    
            $fleetId,       
            $vehicleImageEdit){
            $con = $GLOBALS["con"];
            if($vehicleImageEdit==""){
                $sql = "UPDATE vehicle v SET "
                    . "v.vehicleVehicleClassId='$vehicleVehicleClassId',"
                    . "v.vehicleMakeId='$vehicleMakeId',"
                    . "v.vehicleModel='$vehicleModel',"
                    . "v.vehicleColor='$vehicleColor',"
                    . "v.vehicleRegistrationNo='$vehicleRegistrationNo',"
                    . "v.fleetId='$fleetId' WHERE "
                    . "v.vehicleId ='$vehicleId'";
            }else{
                $sql = "UPDATE vehicle v SET "
                    . "v.vehicleVehicleClassId='$vehicleVehicleClassId',"
                    . "v.vehicleMakeId='$vehicleMakeId',"
                    . "v.vehicleModel='$vehicleModel',"
                    . "v.vehicleColor='$vehicleColor',"
                    . "v.vehicleRegistrationNo='$vehicleRegistrationNo',"
                    . "v.fleetId='$fleetId',"
                    . "v.vehicleImage = '$vehicleImageEdit' WHERE "
                    . "v.vehicleId ='$vehicleId'";
            }
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Get Specific Vehicle Overview By vehicleId
        public function getSpecificVehicleOverview($vehicleId){   
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_manufacturers vm, "
                . "class_of_vehicles vc, fleet f WHERE "
                . "v.vehicleMakeId = vm.vehicleManufacturerId AND "
                . "f.fleet_id = v.fleetId AND "
                . "v.vehicleVehicleClassId = vc.class_of_vehicle_id AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;
        }
        // 6) Update Specific Vehicle Assign Status
        public function updateSpecificVehicleAssignStatus($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle v SET "
                . "v.vehicleAssignStatus = '1' WHERE "
                . "v.vehicleId = '$vehicleId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Vehicle Assigning - vehicleId
        public function vehicleAssigning($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle v SET "
                . "v.vehicleAssignStatus = '1' WHERE "
                . "v.vehicleId = '$vehicleId'";
            $con->query($sql) or die($con->error);    
        }
        // 5) Get All Not Completed Not Cancelled Vehicle Tasks in Vehicle Management
        public function getAllNotCompletedNotCaancelledTaskAssignedVehicle(){   
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_tasks vt, vehicle v, client_services cs, class_of_vehicles cov, client_requests cr, "
                . "vehicle_manufacturers vm, hire_vehicle_request hdr WHERE "
                . "vt.vehicleId = v.vehicleId AND "
                . "vt.clientRequestId = cr.clientRequestId AND "
                . "vt.clientServiceId = cs.clientServiceId AND "
                . "vm.vehicleManufacturerId = v.vehicleMakeId AND "
                . "hdr.clientRequestId = cr.clientRequestId AND "
                . "v.vehicleVehicleClassId = cov.class_of_vehicle_id AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientRequestCancelStatus = '0'";
            $result = $con->query($sql);
            return $result;
        }
        // 6) Get specific Vehicle Task Request - driverUserId
        public function getSpecificVehicleTasksRequest($vehicleTaskId){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM vehicle_tasks vt, hire_vehicle_request_income hvri, user u, client_requests cr, client_services cs, "
                . "hire_vehicle_request hvr, profile_image pi, class_of_vehicles coc, process_status ps, css_colors cssc,"
                . "fleet f, vehicle v, vehicle_manufacturers vm WHERE "
                . "u.user_id = cr.clientUserId AND "
                . "v.vehicleMakeId = vm.vehicleManufacturerId  AND "
                . "v.vehicleId = hvr.assignedVehicleId AND "
                . "f.fleet_id = hvr.fleetId AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "cr.clientRequestId = vt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cssc.cssColorId = ps.cssColorId AND "
                . "hvri.hireVehicleRequestId = vt.hireVehicleRequestId AND "
                . "hvr.hireVehicleRequestId = vt.hireVehicleRequestId AND "
                . "hvr.classOfVehicleId = coc.class_of_vehicle_id AND "
                . "vt.vehicleTaskId = '$vehicleTaskId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 7) Update Process Status From Driver Operator
        public function updateProcessStatusFromVehicleManagement($processStatusId, $clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_requests cr SET "
                . "cr.processStatusId = '$processStatusId' WHERE "
                . "cr.clientRequestId  = '$clientRequestId'";
            $con->query($sql) or die($con->error);        
        }
        // 7) Update Hire Vehicle Request Income Table
        public function updateHireVehicleRequestIncomeTable($hireVehicleRequestIncomeId, $odometerValue){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request_income hvri SET "
                . "hvri.odometerValue = '$odometerValue',"
                . "hvri.hireVehicleRequestIncomeId = '$hireVehicleRequestIncomeId'";
            $con->query($sql) or die($con->error);        
        }
        // 7) Vehicle Unassigning - vehicleId
        public function vehicleUnassigning($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle v SET "
                . "v.vehicleAssignStatus = '0' WHERE "
                . "v.vehicleId = '$vehicleId'";
            $con->query($sql) or die($con->error);    
        }
        // 8) Get All Completed Not Cancelled Vehicle Tasks in Vehicle Management
        public function getAllCompletedNotCancelledTaskAssignedVehicle(){   
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_tasks vt, vehicle v, client_services cs, class_of_vehicles cov, client_requests cr, "
                . "vehicle_manufacturers vm WHERE "
                . "vt.vehicleId = v.vehicleId AND "
                . "vt.clientRequestId = cr.clientRequestId AND "
                . "vt.clientServiceId = cs.clientServiceId AND "
                . "vm.vehicleManufacturerId = v.vehicleMakeId AND "
                . "v.vehicleVehicleClassId = cov.class_of_vehicle_id AND "
                . "cr.clientRequestCompleted = '1' AND "
                . "cr.clientRequestCancelStatus = '0'";
            $result = $con->query($sql);
            return $result;
        }
        // 9) Get All Not Completed Not Cancelled Driver and Vehicle Tasks in Vehicle Management
        public function getAllNotCompletedNotCaancelledDriverAndVehicleTasks(){   
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM driver_and_vehicle_tasks dvt, vehicle v, client_services cs, class_of_vehicles cov, client_requests cr, "
                . "vehicle_manufacturers vm WHERE "
                . "dvt.vehicleId = v.vehicleId AND "
                . "dvt.clientRequestId = cr.clientRequestId AND "
                . "dvt.clientServiceId = cs.clientServiceId AND "
                . "vm.vehicleManufacturerId = v.vehicleMakeId AND "
                . "v.vehicleVehicleClassId = cov.class_of_vehicle_id AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "cr.clientRequestCancelStatus = '0'";
            $result = $con->query($sql);
            return $result;
            
        }
        public function getAllHeavyMotorLorryCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllMotorLorryLorryCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllLightMotorLorryCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllLightMotorCycleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '4'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllMotorTricycleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '5'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllMotorCycleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '6'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
         public function getAllDualPurposeMotorVehicleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '7'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllLightMotorCoachCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '8'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllMotorCoachCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '9'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllHeavyMotorCoachCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '10'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllHandTractorsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '11'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllLandVehiclesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '12'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllSpecialPurposeVehicleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM vehicle WHERE vehicleVehicleClassId = '13'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
/*****************************************************************************************/
/* (33) Class of Vehicle */
        // 1) Get Active Class of Vehicle
        public function getAllClassOfVehicleActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM class_of_vehicles vc WHERE "
                . "vc.classOfVehicleStatus = '1'"
                . "ORDER BY vc.class_of_vehicle_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 2) Get All Class of Vehicle
        public function getAllClassOfVehicle(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM class_of_vehicles vc "
                . "ORDER BY vc.class_of_vehicle_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 3) Get Active Class of Vehicle Navigation Tab
        public function getActiveTabClassOfVehicle(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM class_of_vehicles WHERE "
                . "class_of_vehicle_status='nav-link active'";
            $result = $con->query($sql);
            return $result;
        }
        // 4) Get Specific Class of Vehicle - classOfVehicleId
        public function getSpecificClassOfVehicle($classOfVehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM class_of_vehicles WHERE "
                . "class_of_vehicle_id = '$classOfVehicleId'";
            $result = $con->query($sql);  
            return $result;
        } 
        // 5) Deactive Class of Vehicle - classOfVehicleId
        public function deactivateClassOfVehicle($classOfVehicleId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE class_of_vehicles cv SET "
                . "cv.classOfVehicleStatus = '0' WHERE "
                . "cv.class_of_vehicle_id ='$classOfVehicleId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 6) Activate Class of Vehicle - 
        public function activateClassOfVehicle($classOfVehicleId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE class_of_vehicles cv SET "
                . "cv.classOfVehicleStatus='1' WHERE "
                . "cv.class_of_vehicle_id ='$classOfVehicleId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 7) Update Specific Class of Vehicle 
        public function updateSpecificClassOfVehicle(
            $classOfVehicleId, 
            $classOfVehicleName, 
            $classOfVehicleCode, 
            $classOfVehicleOldClass,
            $classOfVehicleImageEdit){
            $con = $GLOBALS["con"];
            if($classOfVehicleImageEdit == ""){
                $sql = "UPDATE class_of_vehicles cv SET "
                    . "cv.class_of_vehicle_name = '$classOfVehicleName',"
                    . "cv.class_of_vehicle_code = '$classOfVehicleCode',"
                    . "cv.class_of_vehicle_oldClass = '$classOfVehicleOldClass' WHERE "
                    . "cv.class_of_vehicle_id  = '$classOfVehicleId'";
            }else{
                $sql = "UPDATE class_of_vehicles cv SET "
                    . "cv.class_of_vehicle_name = '$classOfVehicleName',"
                    . "cv.class_of_vehicle_code = '$classOfVehicleCode',"
                    . "cv.class_of_vehicle_image = '$classOfVehicleImageEdit',"
                    . "cv.class_of_vehicle_oldClass = '$classOfVehicleOldClass' WHERE "
                    . "cv.class_of_vehicle_id  = '$classOfVehicleId'";
            }
            $result = $con->query($sql);    
            return $result;
        }      
        // 8) Add New Class of Vehicle
        public function addNewClassOfVehicle(
            $classOfVehicleName,
            $classOfVehicleCode,
            $classOfVehicleCodeOldClass,
            $classOfVehicleImageEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO class_of_vehicles("
                . "class_of_vehicle_name,"
                . "class_of_vehicle_code,"
                . "class_of_vehicle_oldClass,"
                . "class_of_vehicle_image)"
                . "VALUES('$classOfVehicleName',"
                . "'$classOfVehicleCode',"
                . "'$classOfVehicleCodeOldClass',"
                . "'$classOfVehicleImageEdit')";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        public function vehicleCategoryActive($class_of_vehicle_id){
            $con= $GLOBALS["con"];
            $sql1="UPDATE class_of_vehicles SET class_of_vehicle_status='nav-link'";
            $result1= $con->query($sql1);
            $sql2="UPDATE class_of_vehicles SET class_of_vehicle_status='nav-link active' WHERE class_of_vehicle_id='$class_of_vehicle_id'";
            $result2= $con->query($sql2);           
        }
        public function vehicleCategoryDisplay($class_of_vehicle_id){
            $con= $GLOBALS["con"];
            $sql1="UPDATE class_of_vehicles SET class_of_vehicle_display='d-none'";
            $result1= $con->query($sql1);
            $sql2="UPDATE class_of_vehicles SET class_of_vehicle_display='d-block' WHERE class_of_vehicle_id='$class_of_vehicle_id'";
            $result2= $con->query($sql2);           
        }
        public function vehicleCategoryVariableId($class_of_vehicle_id){
            $con= $GLOBALS["con"];
            $sql1="UPDATE class_of_vehicles SET class_of_vehicle_variable_id='0'";
            $result1= $con->query($sql1);
            $sql2="UPDATE class_of_vehicles SET class_of_vehicle_variable_id='$class_of_vehicle_id' WHERE class_of_vehicle_id='1'";
            $result2= $con->query($sql2);           
        }
               
        public function getAllAvailableVehicles(){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM Vehicle v, class_of_vehicles cof WHERE "
                    . "v.vehicle_availabilityStatus = '0' AND "
                    . "v.class_of_vehicle_id = cof.class_of_vehicle_id";
            $result= $con->query($sql);
            return $result;
        } 
/***********************************************************************************************/
/* (34) Vehicle Book */
        // 1) Add New Vehicle Book
        public function addNewVehicleBook(){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle_book()"
                . "VALUES()";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        } 
        // 2) Update Specific Vehicle Book Status
        public function updateVehicleVehicleBook($updateVehicleId, $vehicleBookId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle v SET "
                . "v.vehicleBookId='$vehicleBookId' WHERE "
                . "v.vehicleId = '$updateVehicleId'";
            $con->query($sql) or die($con->error);        
        }
        // 3) Get Specific Vehicle Book Overview - vehicleId
        public function getSpecificVehicleBookOverview($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_book vb, vehicle_manufacturers vm, fuel_type ft, "
                . "class_of_vehicles vc, year y, province_council pc WHERE "
                . "vb.makeId = vm.vehicleManufacturerId AND "
                . "vb.fuelTypeId = ft.fuel_type_id  AND "
                . "vb.class_of_vehicle_id = vc.class_of_vehicle_id AND "
                . "v.vehicleBookId = vb.vehicleBookId AND "
                . "y.year_id = vb.yearOfManufactureId AND "
                . "pc.provinceCouncilId = vb.provincialCouncilId AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;       
        }
        // 4) Update Specific Vehicle Book Overview
        public function updateSpecificVehicleBook(
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
            $provincialCouncil,                                      
            $dateOfFirstRegistration,
            $taxesPayable){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle_book vb SET "
                . "vb.registrationNo = '$registrationNo',"
                . "vb.chassisNo = '$chassisNo',"
                . "vb.currentOwner = '$currentOwner',"
                . "vb.currentOwnerAddress = '$currentOwnerAddress',"
                . "vb.currentOwnerID = '$currentOwnerID',"
                . "vb.conditions = '$conditions',"
                . "vb.specialNotes = '$specialNotes',"
                . "vb.absoluteOwner = '$absoluteOwner',"
                . "vb.engineNo = '$engineNo',"
                . "vb.cc = '$cc',"
                . "vb.class_of_vehicle_id = '$vehicleClassId',"
                . "vb.taxationClass = '$taxationClass',"
                . "vb.statusWhenRegistered = '$statusWhenRegistered',"
                . "vb.fuelTypeId = '$FuelTypeId',"
                . "vb.makeId = '$makeId',"
                . "vb.countryOfOrigin = '$countryOfOrigin',"
                . "vb.model = '$model',"
                . "vb.manudacturesDescription = '$manudacturesDescription',"
                . "vb.wheelBase = '$wheelBase',"
                . "vb.overHang = '$overHang',"
                . "vb.typeOfBody = '$typeOfBody',"
                . "vb.yearOfManufactureId = '$yearOfManufactureId',"
                . "vb.color = '$color',"
                . "vb.previousOwnerName = '$previousOwnerName',"
                . "vb.previousOwnerAddress = '$previousOwnerAddress',"
                . "vb.previousOwnerTransferredDate = '$previousOwnerTransferredDate',"
                . "vb.totalPreviousOwners = '$totalPreviousOwners',"
                . "vb.seatingCapacity = '$seatingCapacity',"
                . "vb.weightUnladen = '$weightUnladen',"
                . "vb.weightGross = '$weightGross',"
                . "vb.tyreSizeFront = '$tyreSizeFront',"
                . "vb.tyreSizeRear = '$tyreSizeRear',"
                . "vb.tyreSizeDual = '$tyreSizeDual',"
                . "vb.tyreSizeSingle = '$tyreSizeSingle',"
                . "vb.length = '$length',"
                . "vb.width = '$width',"
                . "vb.height = '$height',"
                . "vb.internalHeight = '$internalHeight',"
                . "vb.provincialCouncilId = '$provincialCouncil',"
                . "vb.dateOfFirstRegistration = '$dateOfFirstRegistration',"
                . "vb.taxesPayable = '$taxesPayable' WHERE "
                . "vb.vehicleBookId  = '$vehicleBookId'";
            $result = $con->query($sql);        
        }
/*************************************************************************************************/
/* (35) Vehicle Emission Test */
        // 1) Get Specific Vehicle Emission Tests - vehicleId, yearId
        public function getSpecificVehicleEmissionByYear($vehicleId, $yearId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, emission_test et, fuel_type ft, class_of_vehicles vc, "
                . "year y, vehicle_manufacturers vm WHERE "
                . "v.vehicleId = et.vehicle_id AND "
                . "ft.fuel_type_id  = et.emissionTestIdFuelTypeId AND "
                . "vc.class_of_vehicle_id  = et.emissionTestVehicleClassId AND "
                . "y.year_id  = et.emissionTestIdYearOfMFGId AND "
                . "vm.vehicleManufacturerId = et.emissionTestMakeId AND "
                . "et.year_id = '$yearId' AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;       
        }  
        // 2) Add New Emission Test
        public function addNewVehicleEmissionTest(
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
            $emissionTestValidTill){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO emission_test("
                . "emissionTestVehicleClassId,"
                . "emissionTestRegNo,"
                . "emissionTestIdChassisNo,"
                . "emissionTestIdEngineNo,"
                . "emissionTestIdSerialNo,"
                . "emissionTestIdDateOfIssue,"
                . "emissionTestMakeId,"
                . "emissionTestIdModel,"
                . "emissionTestIdYearOfMFGId,"
                . "emissionTestIdFuelTypeId,"
                . "emissionTestIdOdometer,"
                . "emissionTestIdLane,"
                . "emissionTestIdInspector,"
                . "emissionTestInstrument,"
                . "emissionTestCenter,"
                . "emissionTestTestFee,"
                . "emissionTestTestStart,"
                . "emissionTestTestEnd,"
                . "emissionTestIdelRpm,"
                . "emissionTestIdelHc,"
                . "emissionTestIdelCo,"
                . "emissionTestIdelL,"
                . "emissionTestIdelO2,"
                . "emissionTestIdelCo2,"
                . "emissionTestRpmRpm,"
                . "emissionTestRpmHc,"
                . "emissionTestRpmCo,"
                . "emissionTestRpmL,"
                . "emissionTestRpmO2,"
                . "emissionTestRpmCo2,"
                . "emissionTestOverallStatus,"
                . "emissionTestOiltempRpm,"
                . "emissionTestReferenceNo,"
                . "emissionTestQRCodeImg,"
                . "emissionTestVehicleImg,"
                . "emissionTestValidTill,"
                . "emissionTestCompanyName,"
                . "emissionTestCompanyAddress,"
                . "emissionTestIdNumber,"
                . "vehicle_id,"
                . "year_id)"
                . "VALUES('$emissionTestVehicleClassId',"
                . "'$emissionTestRegNo',"
                . "'$emissionTestIdChassisNo',"
                . "'$emissionTestIdEngineNo',"
                . "'$emissionTestIdSerialNo',"
                . "'$emissionTestIdDateOfIssue',"
                . "'$emissionTestMakeId',"
                . "'$emissionTestIdModel',"
                . "'$emissionTestIdYearOfMFGId',"
                . "'$emissionTestIdFuelTypeId',"
                . "'$emissionTestIdOdometer',"
                . "'$emissionTestIdLane',"
                . "'$emissionTestIdInspector',"
                . "'$emissionTestInstrument',"
                . "'$emissionTestCenter',"
                . "'$emissionTestTestFee',"
                . "'$emissionTestTestStart',"
                . "'$emissionTestTestEnd',"
                . "'$emissionTestIdelRpm',"
                . "'$emissionTestIdelHc',"
                . "'$emissionTestIdelCo',"
                . "'$emissionTestIdelL',"
                . "'$emissionTestIdelO2',"
                . "'$emissionTestIdelCo2',"
                . "'$emissionTestRpmRpm',"
                . "'$emissionTestRpmHc',"
                . "'$emissionTestRpmCo',"
                . "'$emissionTestRpmL',"
                . "'$emissionTestRpmO2',"
                . "'$emissionTestRpmCo2',"
                . "'$emissionTestOverallStatus',"
                . "'$emissionTestOiltempRpm',"
                . "'$emissionTestReferenceNo',"
                . "'$emissionTestQRCodeImgEdit',"
                . "'$emissionTestVehicleImgEdit',"
                . "'$emissionTestValidTill',"
                . "'$emissionTestCompanyName',"
                . "'$emissionTestCompanyAddress',"
                . "'$emissionTestIdNumber',"
                . "'$vehicleId',"
                . "'$yearId')";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 3) Get Vehicle Emission Test yeadIds - vehicleId 
        public function getYearIdByVehicleIdEmissionTest($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM emission_test et WHERE "
                . "et.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);
            return $result;  
        }
        // 4) Get All Years of Vehicle Emission Tests - vehicleId
        public function getAllYearsVehicleEmissionByVehicleId($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, emission_test et, fuel_type ft, class_of_vehicles vc, year y WHERE "
                . "v.vehicleId = et.vehicle_id AND "
                . "ft.fuel_type_id  = et.emissionTestIdFuelTypeId AND "
                . "vc.class_of_vehicle_id  = et.emissionTestVehicleClassId AND "
                . "y.year_id  = et.year_id AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;       
        }  
        // 5) Update Specific Vehicle Emission Test
        public function updateSpecificVehicleEmissionTest(
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
            $emissionTestValidTill){
            $con = $GLOBALS["con"];
            $sql = "UPDATE emission_test et SET "
                . "et.emissionTestCompanyName = '$emissionTestCompanyName',"
                . "et.emissionTestCompanyAddress = '$emissionTestCompanyAddress',"
                . "et.emissionTestIdNumber = '$emissionTestIdNumber',"
                . "et.emissionTestVehicleClassId = '$emissionTestVehicleClassId',"
                . "et.emissionTestRegNo = '$emissionTestRegNo',"
                . "et.emissionTestIdChassisNo = '$emissionTestIdChassisNo',"
                . "et.emissionTestIdEngineNo = '$emissionTestIdEngineNo',"
                . "et.emissionTestIdSerialNo = '$emissionTestIdSerialNo',"
                . "et.emissionTestIdDateOfIssue = '$emissionTestIdDateOfIssue',"
                . "et.emissionTestMakeId = '$emissionTestMakeId',"
                . "et.emissionTestIdModel = '$emissionTestIdModel',"
                . "et.emissionTestIdYearOfMFGId = '$emissionTestIdYearOfMFGId',"
                . "et.emissionTestIdFuelTypeId = '$emissionTestIdFuelTypeId',"
                . "et.emissionTestIdOdometer = '$emissionTestIdOdometer',"
                . "et.emissionTestIdLane = '$emissionTestIdLane',"
                . "et.emissionTestIdInspector = '$emissionTestIdInspector',"
                . "et.emissionTestInstrument = '$emissionTestInstrument',"
                . "et.emissionTestCenter = '$emissionTestCenter',"
                . "et.emissionTestTestFee = '$emissionTestTestFee',"
                . "et.emissionTestTestStart = '$emissionTestTestStart',"
                . "et.emissionTestTestEnd = '$emissionTestTestEnd',"
                . "et.emissionTestIdelRpm = '$emissionTestIdelRpm',"
                . "et.emissionTestIdelHc = '$emissionTestIdelHc',"
                . "et.emissionTestIdelCo = '$emissionTestIdelCo',"
                . "et.emissionTestIdelL = '$emissionTestIdelL',"
                . "et.emissionTestIdelO2 = '$emissionTestIdelO2',"
                . "et.emissionTestIdelCo2 = '$emissionTestIdelCo2',"
                . "et.emissionTestRpmRpm = '$emissionTestRpmRpm',"
                . "et.emissionTestRpmHc = '$emissionTestRpmHc',"
                . "et.emissionTestRpmCo = '$emissionTestRpmCo',"
                . "et.emissionTestRpmL = '$emissionTestRpmL',"
                . "et.emissionTestRpmO2 = '$emissionTestRpmO2',"
                . "et.emissionTestRpmCo2 = '$emissionTestRpmCo2',"
                . "et.emissionTestOverallStatus = '$emissionTestOverallStatus',"
                . "et.emissionTestOiltempRpm = '$emissionTestOiltempRpm',"
                . "et.emissionTestReferenceNo = '$emissionTestReferenceNo',"
                . "et.emissionTestQRCodeImg = '$emissionTestQRCodeImg',"
                . "et.emissionTestVehicleImg = '$emissionTestVehicleImg',"
                . "et.emissionTestValidTill = '$emissionTestValidTill' WHERE "
                . "et.emissionTestId = '$emissionTestId' AND "
                . "et.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);        
        }
/***************************************************************************************************/
/* (36) Vehicle Insurance */         
        // 1) Add New Vehicle Insurance
        public function addVehicleInsurance(
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
            $ChassisNo){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle_insurances("
                . "vehicle_no,"
                . "insuranceNo,"
                . "makeId,"
                . "model,"
                . "policyNo,"
                . "name,"
                . "address,"
                . "periodOfStart,"
                . "periodOfEnd,"
                . "engineNo,"
                . "ChassisNo,"
                . "insuranceCompanyName,"
                . "insuranceCompanyAddress,"
                . "insuranceCompanyNumber,"
                . "vehicle_id,"
                . "year_id)"
                . "VALUES('$vehicle_no',"
                . "'$insuranceNo',"
                . "'$makeId',"
                . "'$model',"
                . "'$policyNo',"
                . "'$name',"
                . "'$address',"
                . "'$periodOfStart',"
                . "'$periodOfEnd',"
                . "'$engineNo',"
                . "'$ChassisNo',"
                . "'$insuranceCompanyName',"
                . "'$insuranceCompanyAddress',"
                . "'$insuranceCompanyNumber',"
                . "'$vehicleId',"
                . "'$yearId')";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 2) Get Vehicle Isurance yeadIds - vehicleId 
        public function getYearIdByVehicleIdInsurance($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_insurances vi WHERE "
                . "vi.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);
            return $result;  
        }
        // 3) Get Specific Vehicle Insurance - vehicleId, yearId
        public function getSpecificVehicleInsuranceByYear($vehicleId, $yearId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_insurances vi, year y, vehicle_manufacturers vm WHERE "
                . "v.vehicleId = vi.vehicle_id AND "
                . "y.year_id  = vi.year_id AND "
                . "vm.vehicleManufacturerId = vi.makeId AND "
                . "vi.year_id = '$yearId' AND "
                . "v.vehicleId = '$vehicleId'";
            $result=$con->query($sql);
            return $result;       
        }       
        // 4) Get All Years of Insurance - vehicleId
        public function getAllYearsInsuranceByVehicleId($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_insurances vi, year y WHERE "
                . "v.vehicleId = vi.vehicle_id AND "
                . "y.year_id  = vi.year_id AND "
                . "v.vehicleId = '$vehicleId'";
            $result=$con->query($sql);
            return $result;       
        }
        // 5) Update Specific Vehicle Insurance
        public function updateSpecificVehicleInsurance(
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
            $ChassisNo){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle_insurances vi SET "
                . "vi.insuranceCompanyName = '$insuranceCompanyName',"
                . "vi.insuranceCompanyAddress = '$insuranceCompanyAddress',"
                . "vi.insuranceCompanyNumber = '$insuranceCompanyNumber',"
                . "vi.vehicle_no = '$vehicle_no',"
                . "vi.insuranceNo = '$insuranceNo',"
                . "vi.makeId = '$makeId',"
                . "vi.model = '$model',"
                . "vi.policyNo = '$policyNo',"
                . "vi.name = '$name',"
                . "vi.address = '$address',"
                . "vi.periodOfStart = '$periodOfStart',"
                . "vi.periodOfEnd = '$periodOfEnd',"
                . "vi.engineNo = '$engineNo',"
                . "vi.ChassisNo = '$ChassisNo' WHERE "
                . "vi.vehicle_insurances_id  = '$vehicleInsurancesId' AND "
                . "vi.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);        
        }
/*********************************************************************************************/
/* (37) Vehicle Revenue License */
        // 1) Add Vehicle Revenue license
        public function addVehicleRevenueLicense(
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
            $vehicleRevenueLicenseValidTo){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle_revenue_license("
                . "vehicleRevenueLicenseVehicleClassId,"
                . "vehicleRevenueLicenseFuelTypeId,"
                . "vehicleRevenueLicenseVehicleNo,"
                . "vehicleRevenueLicenseOwnerName,"
                . "vehicleRevenueLicenseOwneAddress,"
                . "vehicleRevenueLicenseUnladenWeight,"
                . "vehicleRevenueLicenseGrossWeight,"
                . "vehicleRevenueLicenseSeatsNo,"
                . "vehicleRevenueLicenseVetNo,"
                . "vehicleRevenueLicenseAnnualFee,"
                . "vehicleRevenueLicenseArrears,"
                . "vehicleRevenueLicenseFinessPaid,"
                . "vehicleRevenueLicenseValidFrom,"
                . "vehicleRevenueLicenseValidTo,"
                . "vehicle_id,"
                . "year_id)"
                . "VALUES('$vehicleRevenueLicenseVehicleClassId',"
                . "'$vehicleRevenueLicenseFuelTypeId',"
                . "'$vehicleRevenueLicenseVehicleNo',"
                . "'$vehicleRevenueLicenseOwnerName',"
                . "'$vehicleRevenueLicenseOwneAddress',"
                . "'$vehicleRevenueLicenseUnladenWeight',"
                . "'$vehicleRevenueLicenseGrossWeight',"
                . "'$vehicleRevenueLicenseSeatsNo',"
                . "'$vehicleRevenueLicenseVetNo',"
                . "'$vehicleRevenueLicenseAnnualFee',"
                . "'$vehicleRevenueLicenseArrears',"
                . "'$vehicleRevenueLicenseFinessPaid',"
                . "'$vehicleRevenueLicenseValidFrom',"
                . "'$vehicleRevenueLicenseValidTo',"
                . "'$vehicleId',"
                . "'$yearId')";   
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 2) Get Specific Vehicle Revenue License - vehicleId, yearId
        public function getSpecificVehicleRevenueLicenseByYear($vehicleId, $yearId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_revenue_license vrl, year y, fuel_type ft, class_of_vehicles vc WHERE "
                . "v.vehicleId = vrl.vehicle_id AND "
                . "ft.fuel_type_id  = vrl.vehicleRevenueLicenseFuelTypeId AND "
                . "vc.class_of_vehicle_id  = vrl.vehicleRevenueLicenseVehicleClassId AND "
                . "y.year_id  = vrl.year_id AND "
                . "vrl.year_id = '$yearId' AND "
                . "v.vehicleId = '$vehicleId'";
            $result=$con->query($sql);
            return $result;       
        }
        // 3) Get All Years of Revenue License - vehicleId
        public function getAllYearsRevenueLicenseByVehicleId($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle v, vehicle_revenue_license vrl, year y, fuel_type ft, class_of_vehicles vc WHERE "
                . "v.vehicleId = vrl.vehicle_id AND "
                . "ft.fuel_type_id  = vrl.vehicleRevenueLicenseFuelTypeId AND "
                . "vc.class_of_vehicle_id  = vrl.vehicleRevenueLicenseVehicleClassId AND "
                . "y.year_id  = vrl.year_id AND "
                . "v.vehicleId = '$vehicleId'";
            $result = $con->query($sql);
            return $result;       
        }
        // 4) Update Specific Vehicle Revenue License
        public function updateSpecificVehicleRevenueLicense(
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
            $ValidTo){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle_revenue_license vrl SET "
                . "vrl.vehicleRevenueLicenseVehicleClassId = '$vehicleClassId',"
                . "vrl.vehicleRevenueLicenseFuelTypeId = '$FuelTypeId',"
                . "vrl.vehicleRevenueLicenseVehicleNo = '$VehicleNo',"
                . "vrl.vehicleRevenueLicenseOwnerName = '$OwnerName',"
                . "vrl.vehicleRevenueLicenseOwneAddress = '$OwneAddress',"
                . "vrl.vehicleRevenueLicenseUnladenWeight = '$UnladenWeight',"
                . "vrl.vehicleRevenueLicenseGrossWeight = '$GrossWeight',"
                . "vrl.vehicleRevenueLicenseSeatsNo = '$SeatsNo',"
                . "vrl.vehicleRevenueLicenseVetNo = '$LicenseVetNo',"
                . "vrl.vehicleRevenueLicenseAnnualFee = '$AnnualFee',"
                . "vrl.vehicleRevenueLicenseArrears = '$Arrears',"
                . "vrl.vehicleRevenueLicenseFinessPaid = '$FinessPaid',"
                . "vrl.vehicleRevenueLicenseValidFrom = '$ValidFrom',"
                . "vrl.vehicleRevenueLicenseValidTo = '$ValidTo' WHERE "
                . "vrl.vehicleRevenueLicenseId = '$vehicleRevenueLicenseId' AND "
                . "vrl.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);        
        }
        // 5) Get Vehicle Isurance yeadIds - vehicleId 
        public function getYearIdByVehicleIdRevenuLicense($vehicleId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_revenue_license vri WHERE "
                . "vri.vehicle_id = '$vehicleId'";
            $result = $con->query($sql);
            return $result;  
        }
/******************************************************************************************/
/* (38) Vehicle Manufacturer */
        // 1) Get All Vehicle Manufacturers
        public function getAllVehicleManufacturers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_manufacturers vm "
                . "ORDER BY vm.vehicleManufacturerName ASC";
            $result = $con->query($sql);  
            return $result;
        } 
        // 2) Get Specific Vehicle Manufacturer vehicleManufacturerId
        public function getSpecificVehicleManufacturer($vehicleManufacturerId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM vehicle_manufacturers vm WHERE "
                . "vm.vehicleManufacturerId = '$vehicleManufacturerId'";
            $result = $con->query($sql);  
            return $result;
        }       
        // 3) Update Specific Vehicle Manufacturer
        public function updateSpecificVehicleManufacturer($vehicleManufacturerName, $vehicleManufacturerId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE vehicle_manufacturers vm SET "
                . "vm.vehicleManufacturerName = '$vehicleManufacturerName' WHERE "
                . "vm.vehicleManufacturerId = '$vehicleManufacturerId'";
            $con->query($sql) or die($con->error);    
        }      
        // 4) Add New Vehicle Manufacturer
        public function addNewVehicleManufacturer($vehicleManufacturerName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle_manufacturers(vehicleManufacturerName)"
                . "VALUES('$vehicleManufacturerName')";   
            $con->query($sql) or die($con->error);
//            return $insert_id = $con->insert_id; 
        }
/***********************************************************************************************/
/* (39) Fuel Type */      
        // 1) Add New Fuel Type
        public function addNewFuelType($fuelTypeName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO fuel_type(fuel_type_name)"
                . "VALUES('$fuelTypeName')";   
            $con->query($sql) or die($con->error);
//            return $insert_id = $con->insert_id; 
        }
        // 2) Get Specific Fuel Type - fuelTypeId
        public function getSpecificFuelType($fuelTypeId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM fuel_type ft WHERE "
                . "ft.fuel_type_id = '$fuelTypeId'";
            $result = $con->query($sql);  
            return $result;
        } 
        // 3) Get All Fuel Types Acending Order
        public function getAllFuelTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM fuel_type ft "
                . "ORDER BY ft.fuel_type_name ASC";
            $result = $con->query($sql);  
            return $result;
        }
        // 4) Get All Active Fuel Types Acending Order
        public function getAllFuelTypesActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM fuel_type ft WHERE "
                . "ft.fuel_type_status = '1'"
                . "ORDER BY ft.fuel_type_name ASC";
            $result = $con->query($sql);  
            return $result;
        }
        // 5) Deactive Fuel Type - fuelTypeId
        public function deactivateFuelType($fuelTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE fuel_type SET "
                . "fuel_type_status='0' WHERE "
                . "fuel_type_id = '$fuelTypeId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 6) Activate Fuel Type - fuelTypeId
        public function activateFuelType($fuelTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE fuel_type SET "
                . "fuel_type_status='1' WHERE "
                . "fuel_type_id = '$fuelTypeId'";
            $result = $con->query($sql);    
            return $result;
        }       
        // 7) Deactive Fuel Type By fuelTypeId
        public function updateSpecificFuelType($fuelTypeId, $fuelTypeName){
            $con = $GLOBALS["con"];
            $sql = "UPDATE fuel_type SET "
                . "fuel_type_name ='$fuelTypeName' WHERE "
                . "fuel_type_id = '$fuelTypeId'";
            $result = $con->query($sql);       
            return $result;
        }
/*********************************************************************************************/
/* (40) Province Councils */
        // Get All Province Councils
        public function getAllProvinceCouncils(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM province_council pc "
                . "ORDER BY pc.provinceCouncilName ASC";
            $result = $con->query($sql);  
            return $result;
        }        
        // Add New Province Council
        public function addNewProvinceCouncil($proviceCouncilName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO province_council(provinceCouncilName)"
                . "VALUES('$proviceCouncilName')";   
            $con->query($sql) or die($con->error);
//            return $insert_id = $con->insert_id; 
        }      
        // Get Specific Province Council By provinceCouncilId
        public function getSpecificProvinceCouncil($updateProvinceCouncilId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM province_council pc WHERE "
                . "pc.provinceCouncilId = '$updateProvinceCouncilId'";
            $result = $con->query($sql);  
            return $result;
        }     
        // Update Specific Provice Council
        public function updateSpecificProvinceCouncil($provinceCouncilId, $provinceCouncilName){
            $con = $GLOBALS["con"];
            $sql = "UPDATE province_council pc SET "
                . "pc.provinceCouncilName = '$provinceCouncilName' WHERE "
                . "pc.provinceCouncilId = '$provinceCouncilId'";
            $con->query($sql) or die($con->error);    
        }
/*********************************************************************************************/
/* (41) Login */
        // 1) Login Validation
        function validateLogin($login_username, $login_password){
            $login_username1 = addslashes($login_username);
            $login_password1 = addslashes($login_password);                                     
            $login_password2 = sha1($login_password1);
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, login l, role r, email e, password p, profile_image pi WHERE "
                . "u.loginId = l.login_id AND "
                . "r.role_id = u.role_id AND "
                . "u.email_id = l.email_id AND "
                . "e.email_id = u.email_id AND "
                . "p.password_id = l.password_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.user_status = '1' AND "
                . "r.role_status = '1' AND "
                . "e.email = '$login_username1' AND "
                . "p.password = '$login_password2'";
            $result = $con->query($sql) or die($con->error());
            return $result;
        }
        // 2) Add New User Login
        public function addUserLogin($email_id, $password_id){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO login(email_id, password_id)"
                . "VALUES('$email_id','$password_id')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;
        }
        // 3) Update Login Status to Online
        public function makeOnlineLoginStatus($userId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE login l, user u SET "
                . "l.login_status = '1' WHERE "
                . "u.loginId = l.login_id AND "
                . "u.user_id = '$userId'";
            $con->query($sql) or die($con->error);
        }
        // 4) Update Login Status to Offline
        public function makeOfflineLoginStatus($userId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE login l, user u SET "
                . "l.login_status = '0' WHERE "
                . "u.loginId = l.login_id AND "
                . "u.user_id = '$userId'";
            $con->query($sql) or die($con->error);
        }
        // 5) Get Specific Login Status
        function getloginStatus($userId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM login l, user u WHERE "
                . "u.loginId = l.login_id AND "
                . "user_id = '$userId'";
            $result = $con->query($sql) or die($con->error());
            return $result;
        }
/*************************************************************************************/
/* (42) Warehouse */
        // Get Specific Warehouse
        public function getSpecificWarehouse($warehouse_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, cities c WHERE "
                . "w.cityId = c.cityId AND "
                . "w.warehouseId = '$warehouse_id' "
                . "ORDER BY w.warehouseName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;       
        }
        // Update Warehouse Inventory Status Active    
        public function updateWarehouseInventoryStatusActive($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse SET "
                . "warehouseInventoryStatus = '1' WHERE "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
        // Get All Active Warehouses
        public function getAllWarehouseActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, cities c WHERE "
                . "w.cityId = c.cityId AND "
                . "w.warehouseStatus = '1' "
                . "ORDER BY w.warehouseName ASC";
            $result= $con->query($sql) or die($con->error);
            return $result;
        // Get All Warehouses
        }public function getAllWarehouse(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, cities c WHERE "
                . "w.cityId = c.cityId "
                . "ORDER BY w.warehouseName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Add New Warehouse
        public function addNewWarehouse($warehouseName, $cityId, $warehouseLocationURL, $warehouseImageEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO warehouse("
                . "warehouseName,"
                . "cityId,"
                . "warehouseLocationURL,"
                . "warehouseImage)VALUES("
                . "'$warehouseName',"
                . "'$cityId',"
                . "'$warehouseLocationURL',"
                . "'$warehouseImageEdit')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }       
        // Deactivate Warehouse    
        public function deactivateWarehouse($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse SET "
                . "warehouseStatus = '0' WHERE "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
        // Activate Warehouse    
        public function activateWarehouse($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse SET "
                . "warehouseStatus = '1' WHERE "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
        //
        public function getAllClientAvailableWarehouseActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, cities c WHERE "
                . "w.cityId = c.cityId AND "
                . "w.warehouseStatus = '1' AND "
                . "w.warehouseStatus = '1' AND "
                . "w.warehouseInventoryStatus = '1' AND "
                . "w.warehouseCargoAndShipmentStatus = '1' "
                . "ORDER BY w.warehouseName ASC";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        //     
        public function updateSpecificWarehouse($warehouseName, $warehouseId, $cityId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse SET "
                . "warehouseName = '$warehouseName',"
                . "cityId = '$cityId' WHERE "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
        // Update Warehouse Inventory Status Active    
        public function updateWarehouseCargoAndShipmentStatusActive($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse SET "
                . "warehouseCargoAndShipmentStatus = '1' WHERE "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
/*****************************************************************************************************/
/* (43) Warehouse Sections */
        // Get Specific Warehouse Section
        public function getSpecificWarehouseSection($warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM warehouse w, warehouse_sections ws WHERE "
                . "ws.warehouseId = w.warehouseId AND "
                . "ws.warehouseSectionId = '$warehouseSectionId'";
            $result = $con->query($sql);
            return $result;       
        }
        // Update Warehouse Section Inventory Section Status Active    
        public function updateWarehouseSectionInventorySectionStatusActive($warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse_sections SET "
                . "warehouseSectionInventorySectionId = '1' WHERE "
                . "warehouseSectionId = '$warehouseSectionId'";     
            $con->query($sql) or die($con->error);
        }
        // Get All Specific Warehouse Sections
        public function getAllSpecificWarehouseSections($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, warehouse_sections ws, cities c WHERE "
                . "w.warehouseId = ws.warehouseId AND "
                . "w.cityId = c.cityId AND "
                . "ws.warehouseId = '$warehouseId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Get All Active Specific Warehouse Sections
        public function getAllActiveSpecificWarehouseSections($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, warehouse_sections ws WHERE "
                . "w.warehouseId = ws.warehouseId AND "
                . "ws.warehouseSectionStatus = '1' AND "
                . "ws.warehouseId = '$warehouseId' "
                . "ORDER BY ws.warehouseSectionName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }   
        // Add New Warehouse Section
        public function addNewWarehouseSection($warehouseSectionName, $warehouseId, $warehouseSectionImageEdit){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO warehouse_sections("
                . "warehouseSectionName,"
                . "warehouseSectionImage,"
                . "warehouseId)VALUES("
                . "'$warehouseSectionName',"
                . "'$warehouseSectionImageEdit',"
                . "'$warehouseId')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }       
        // Deactivate Warehouse Section   
        public function deactivateWarehouseSection($warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse_sections SET "
                . "warehouseSectionStatus = '0' WHERE "
                . "warehouseSectionId  = '$warehouseSectionId'";     
            $con->query($sql) or die($con->error);
        }
        // Activate Warehouse Section
        public function activateWarehouseSection($warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse_sections SET "
                . "warehouseSectionStatus = '1' WHERE "
                . "warehouseSectionId  = '$warehouseSectionId'";     
            $con->query($sql) or die($con->error);
        }
        // Activate Warehouse Section
        public function updateSpecificWarehouseSection($warehouseSectionName, $warehouseSectionId, $warehouseId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse_sections SET "
                . "warehouseSectionName = '$warehouseSectionName' WHERE "
                . "warehouseSectionId  = '$warehouseSectionId' AND "
                . "warehouseId = '$warehouseId'";     
            $con->query($sql) or die($con->error);
        }
        // Update Warehouse Section Inventory Section Status Active    
        public function updateWarehouseSectionCargoAndShipmentSectionStatusActive($warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE warehouse_sections SET "
                . "warehouseSectionCargoAndShipmentStatus = '1' WHERE "
                . "warehouseSectionId = '$warehouseSectionId'";     
            $con->query($sql) or die($con->error);
        }
        
/*******************************************************************************************/
/* (44) Product Manufacturer */
        // Add New Product Manufacturer      
        public function addNewProductManufacturer($productManufacturerName){ /* 3 */
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO product_manufacturer(productManufacturerName)" 
                . "VALUES('$productManufacturerName')"; 
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // Update Specific Product Manufacturer        
        public function updateSpecificProductManufacturer($productManufacturerId, $productManufacturerName){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_manufacturer SET "
                . "productManufacturerName = '$productManufacturerName' WHERE "
                . "productManufacturerId  = '$productManufacturerId'";
            $result = $con->query($sql) or die($con->error);      
            return $result;
        }
        // Get Specific Product Manufacturer
        public function getSpecificProductManufacturer($updateProductManufacturerId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_manufacturer pm WHERE "
                . "pm.productManufacturerId = '$updateProductManufacturerId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Get All Product Manufacturer
        public function getAllProductManufacturer(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_manufacturer pm "
                . "ORDER BY pm.productManufacturerName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Get All Active Product Manufacturer
        public function getAllActiveProductManufacturer(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_manufacturer pm WHERE "
                . "pm.productManufacturerStatus = '1' "
                . "ORDER BY pm.productManufacturerName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }      
        // Deactivate Product Manufactuerer
        public function deactivateProductManufacturer($updateProductManufacturerId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_manufacturer SET "
                . "productManufacturerStatus = '0' WHERE "
                . "productManufacturerId  = '$updateProductManufacturerId'";
            $result = $con->query($sql) or die($con->error);      
            return $result;
        }
        // Activate Product Manufactuerer   
        public function activateProductManufacturer($updateProductManufacturerId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_manufacturer SET "
                . "productManufacturerStatus = '1' WHERE "
                . "productManufacturerId  = '$updateProductManufacturerId'";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        }  
/*******************************************************************************************/
/* (45) Product */
        // 1) Get All Active Products
        public function getAllActiveProducts(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm WHERE "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "p.productStatus = '1' "
                . "ORDER BY p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get All Products
        public function getAllProducts(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm WHERE "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Get Specific Product
        public function getSpecificProduct($productId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum WHERE "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "p.productId = '$productId'";
            $result = $con->query($sql) or die($con->error); 
            return $result;
        }
        // 4) Deactivate Product
        public function deactivateProduct($productId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE products SET "
                . "productStatus = '0' WHERE "
                . "productId = '$productId'";
            $result = $con->query($sql) or die($con->error);      
            return $result;
        }
        // 5) Activate Product   
        public function activateProduct($productId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE products SET "
                . "productStatus = '1' WHERE "
                . "productId = '$productId'";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        } 
        // 6) Update Specific Product        
        public function updateSpecificProduct(
            $productId, 
            $productUnitPrice, 
            $productName, 
            $productManufacturerId, 
            $productCategoryId, 
            $productImageEdit,
            $productUnitMeasureValue){
            $con = $GLOBALS["con"];
            if($productImageEdit==""){
                $sql = "UPDATE products SET "
                    . "productName = '$productName',"
                    . "productUnitPrice = '$productUnitPrice',"
                    . "productCategoryId = '$productCategoryId',"
                    . "productManufacturerId = '$productManufacturerId',"
                    . "productUnitMeasureValue = '$productUnitMeasureValue' WHERE "
                    . "productId = '$productId'";
            }else{
                $sql = "UPDATE products SET "
                    . "productName = '$productName',"
                    . "productUnitPrice = '$productUnitPrice',"
                    . "productImage = '$productImageEdit',"
                    . "productCategoryId = '$productCategoryId',"
                    . "productManufacturerId = '$productManufacturerId',"
                    . "productUnitMeasureValue = '$productUnitMeasureValue' WHERE "
                    . "productId = '$productId'";
            }
            $result = $con->query($sql) or die($con->error);  
            return $result;
        } 
        // 7) Add New Product
        public function addNewProduct(
            $productName, 
            $productUnitPrice, 
            $productManufacturerId, 
            $productCategoryId, 
            $productImageEdit,
            $productUnitMeasureValue){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO products("
                . "productName,"
                . "productImage,"
                . "productCategoryId,"
                . "productManufacturerId,"
                . "productUnitPrice,"
                . "productUnitMeasureValue)"
                . "VALUES("
                . "'$productName',"
                . "'$productImageEdit',"
                . "'$productCategoryId',"
                . "'$productManufacturerId',"
                . "'$productUnitPrice',"
                . "'$productUnitMeasureValue')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // 8) Get All Active Products
        public function getAllClientAvailableActiveProducts(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm WHERE "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "p.productStatus = '1' AND "
                . "p.productClientStatus = '1' "
                . "ORDER BY p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/************************************************************************************************/
/* (46) Inventory */    
        // Add New Inventory For a Warehouse
        public function addNewInventoryForWarehouse($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO inventory(warehouseId)VALUES('$warehouseId')"; 
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        } 
/*************************************************************************************************/
/* (47) Inventory Warehouse */
        // Get Specific Inventory of Warehouse
        public function getSpecificInventoryOfWarehouse($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM warehouse w, inventory i WHERE "
                . "w.warehouseId = i.warehouseId AND "
                . "i.warehouseId = '$warehouseId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/***********************************************************************************************/
/* (48) Product Category */      
        // Add New Product Category
        public function addNewProductCategory($productCategoryName){ /* 2 */
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO product_category(productCategoryName)VALUES('$productCategoryName')"; /* 2 */
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // Get All Product Categories
        public function getAllProductsCategories(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_category pc "
                . "ORDER BY pc.productCategoryName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Get All Active Product Categories
        public function getAllActiveProductsCategories(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_category pc WHERE "
                . "productCategoryStatus = '1' "
                . "ORDER BY pc.productCategoryName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Deactivate Product Category
        public function deactivateProductCategory($updateProductCategoryId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_category SET "
                . "productCategoryStatus = '0' WHERE "
                . "productCategoryId = '$updateProductCategoryId'";
            $result = $con->query($sql) or die($con->error);      
            return $result;
        }
        // Activate Product Category
        public function activateProductCategory($updateProductCategoryId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_category SET "
                . "productCategoryStatus = '1' WHERE "
                . "productCategoryId = '$updateProductCategoryId'";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        }  
        // Get Specific Product Category
        public function getSpecificProductCategory($updateProductCategoryId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_category pc, product_unit_types put, product_unit_measure pum WHERE "
                . "pc.productUnitTypeId = put.productUnitTypeId AND "
                . "pc.productUnitMeasureId = pum.productUnitMeasureId AND "
                . "pc.productCategoryId = $updateProductCategoryId";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Update Specific Product Category
        public function updateProductCategory($productCategoryId, $productCategoryName, $productUnitTypeId, $productUnitMeasureId){ /* 1 */
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_category SET "
                . "productCategoryName = '$productCategoryName',"
                . "productUnitTypeId = '$productUnitTypeId',"
                . "productUnitMeasureId = '$productUnitMeasureId' WHERE "
                . "productCategoryId  = '$productCategoryId'";
            $con->query($sql) or die($con->error);
        }
        // 
        public function getAllProductsCategoriesActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_category pc WHERE "
                . "pc.productCategoryStatus = '1' "
                . "ORDER BY pc.productCategoryName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 
        public function getAllClientAvailableProductsCategoriesActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_category pc WHERE "
                . "pc.productCategoryStatus = '1' AND "
                . "pc.productCategoryClientStatus = '1' "
                . "ORDER BY pc.productCategoryName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/*************************************************************************************************/
/* (49) Inventory Section */     
        // 1) Add New Inventory Section for Warehouse Section
        public function addNewInventorySectionForWarehouseSection($warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO inventory_sections(warehouseId,warehouseSectionId)VALUES('$warehouseId','$warehouseSectionId')"; 
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }  
/*********************************************************************************************/
/* (50) Supplier */
        // 1) Get All Supplier Users
        public function getAllSupplierUsers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, profile_image pi, role r WHERE "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.role_id = r.role_id AND "
                . "r.role_id = '21'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get Client Type - clientUserId
        public function getSupplierType($user_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM supplier s, client_type ct WHERE "
                . "s.supplierTypeId = ct.client_type_id AND "
                . "s.user_id = '$user_id'";
            $result = $con->query($sql) or die($conn->error);
            return $result;
        }
        // 3) Get All Suppliers
        public function getAllSuppliers(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM supplier s, user u, email e, date_of_birthday dob, nic nic, profile_image pi, contact c, address a, role r, login l, client_type ct WHERE "
                . "u.user_id = s.user_id AND "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id  = dob.date_of_birthday_id AND "
                . "u.nic_id  = nic.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = a.address_id AND "
                . "u.role_id = r.role_id AND "
                . "s.supplierTypeId = ct.client_type_id  AND "
                . "u.loginId = l.login_id";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 4) Add New Supplier
        public function addNewSupplier($user_id){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO supplier(user_id)VALUES('$user_id')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        } 
        // 5) Get Specific Supplier - userId
        public function getSpecificSupplier($supplierUserId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM "
                . "user u, email e, date_of_birthday dob, nic n, profile_image pi, contact c, address ad, "
                . "login l, password pass, role r, supplier s, client_type ct WHERE "
                . "u.email_id = e.email_id AND "
                . "u.date_of_birthday_id = dob.date_of_birthday_id AND "
                . "u.nic_id = n.nic_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.contact_id = c.contact_id AND "
                . "u.address_id = ad.address_id AND "
                . "u.role_id = r.role_id AND "
                . "u.loginId = l.login_id AND "
                . "l.password_id = pass.password_id AND "
                . "u.user_id = s.user_id AND "
                . "s.supplierTypeId = ct.client_type_id AND "
                . "u.user_id = '$supplierUserId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result; 
        }
        // 6) Update Specific Supplier Supplier Type
        public function updateSpecificSupplierSupplierType($supplierUserId, $supplierTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE supplier SET "
                . "supplierTypeId = '$supplierTypeId' WHERE "
                . "user_id = '$supplierUserId'";
            $result = $con->query($sql) or die($con->error);     
            return $result;
        }
/************************************************************************************************/
/* (51) Product Unit Types */
        // 1) Get All Active Product Unit Types
        public function getAllActiveProductUnitTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_unit_types WHERE "
                . "productUnitTypeStatus = '1' "
                . "ORDER BY productUnitTypeName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get All Product Unit Types
        public function getAllProductUnitTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_unit_types "
                . "ORDER BY productUnitTypeName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/****************************************************************************************************/
/* (52) Product Unit Measure */
        // 1) Get All Active Product Unit Measures
        public function getAllActiveProductUnitMeasure(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_unit_measure WHERE "
                . "productUnitMeasureStaus = '1' "
                . "ORDER BY productUnitMeasureName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get All Product Unit Types
        public function getAllProductUnitMeasures(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_unit_measure  "
                . "ORDER BY productUnitMeasureName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/*****************************************************************************************************/
/* (53) Specific Inventory Section Products */     
        // 1) Get Specific Inventory Section Products
        public function getSpecificInventorySectionProducts($warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp, products p, warehouse w, warehouse_sections ws, "
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum WHERE "
                . "isp.warehouseId = w.warehouseId AND "
                . "isp.warehouseSectionId = ws.warehouseSectionId AND "
                . "isp.productId = p.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "isp.warehouseId  = '$warehouseId' AND " 
                . "isp.warehouseSectionId  = '$warehouseSectionId' " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // Deactivate Specific Inventory Section Specific Product
        public function deactivateSpecificInventorySectionSpecificProduct($productId, $warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE inventory_sections_products SET "
                . "inventorySectionsProductsStatus = '0' WHERE "
                . "productId = '$productId' AND "
                . "warehouseId = '$warehouseId' AND "
                . "warehouseSectionId = '$warehouseSectionId'";
            $result = $con->query($sql) or die($con->error);      
            return $result;
        }
        // Activate Specific Inventory Section Specific Product
        public function activateSpecificInventorySectionSpecificProduct($productId, $warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE inventory_sections_products SET "
                . "inventorySectionsProductsStatus = '1' WHERE "
                . "productId = '$productId' AND "
                . "warehouseId = '$warehouseId' AND "
                . "warehouseSectionId = '$warehouseSectionId'";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        }  
        // Activate Specific Inventory Section Specific Product
        public function updateInventorySectionProductAvailability($inventorySectionsProductsAvailabilityNew, $inventorySectionsProductsId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE inventory_sections_products SET "
                . "inventorySectionsProductsAvailability = '$inventorySectionsProductsAvailabilityNew' WHERE "
                . "inventorySectionsProductsId  = '$inventorySectionsProductsId '";
            $result = $con->query($sql) or die($con->error);  
            return $result;
        } 
        // 1) Get Specific Inventory Section Products
        public function getSpecificInventorySectionProduct($inventorySectionsProductsId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp WHERE " 
                . "isp.inventorySectionsProductsId = '$inventorySectionsProductsId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/*************************************************************************************************/
/* (54) Specific Inventory Section Specific Product */ 
        // 1) Get Specific Inventory Section Specific Product
        public function getSpecificInventorySectionSpecificProduct($productId, $warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp, products p, warehouse w, warehouse_sections ws, "
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum WHERE "
                . "isp.warehouseId = w.warehouseId AND "
                . "isp.warehouseSectionId = ws.warehouseSectionId AND "
                . "isp.productId = p.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "isp.productId = '$productId' AND " 
                . "isp.warehouseId  = '$warehouseId' AND " 
                . "isp.warehouseSectionId  = '$warehouseSectionId' " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Update Specific Product Availability
        public function updateSpecificProductAvailability($productId, $inventorySectionsProductsAvailability, $warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE inventory_sections_products SET "
                . "inventorySectionsProductsAvailability = '$inventorySectionsProductsAvailability' WHERE "
                . "productId = '$productId' AND "
                . "warehouseSectionId = '$warehouseSectionId' AND "
                . "warehouseId = '$warehouseId'";
            $result = $con->query($sql) or die($con->error);     
            return $result;
        }
        // 3) Add Specific Product to Specific Inventory Section     
        public function addSpecificProductToSpecificInventorySection($productId, $warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO inventory_sections_products"
                . "(warehouseId,"
                . "warehouseSectionId,"
                . "productId)"
                . "VALUES"
                . "('$warehouseId',"
                . "'$warehouseSectionId',"
                . "'$productId')"; 
            $result = $con->query($sql) or die($con->error);     
            return $insert_id = $con->insert_id; 
        }
/*****************************************************************************************************/
/* (55) Specific Inventory Products */
        // 1) Get Specific Inventory Products
        public function getSpecificInventoryProducts($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp, products p, warehouse w, warehouse_sections ws, "
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum WHERE "
                . "isp.warehouseId = w.warehouseId AND "
                . "isp.warehouseSectionId = ws.warehouseSectionId AND "
                . "isp.productId = p.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "isp.warehouseId  = '$warehouseId' " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/****************************************************************************************************/
/* (56) Client Payment Invoice */
        // 1) client Payment Invoice Request    
        public function clientPaymentInvoiceRequest($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO client_payment_invoice_requests"
                . "(clientRequestId,"
                . "clientServicesId,"
                . "clientUserId)"
                . "VALUES"
                . "('$clientRequestId',"
                . "'$clientServiceId',"
                . "'$clientUserId')"; 
            $result = $con->query($sql) or die($con->error);     
            return $insert_id = $con->insert_id; 
        }        
        // 2) Get All Client Payment Invoice Requests without Completed and Cancelled
        public function getAllClientPaymentInvoiceRequestsWithoutCompleteAndCancel(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_payment_invoice_requests cpir, client_services cs, client_requests cr WHERE "
                . "cr.clientRequestId = cpir.clientRequestId AND " 
                . "cr.clientServiceId = cs.clientServiceId AND " 
                . "cr.clientRequestCompleted = '0' AND " 
                . "cr.clientRequestCancelStatus = '0' AND " 
                . "cs.clientServiceId = cpir.clientServicesId " 
                . "ORDER BY cpir.clientPaymentinvoiceRequestId ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) Get All Client Payment Invoice Requests
        public function getAllCompletedClientPaymentInvoiceRequestsWithoutCancel(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_payment_invoice_requests cpir, client_services cs, client_requests cr WHERE "
                . "cr.clientRequestId = cpir.clientRequestId AND " 
                . "cr.clientServiceId = cs.clientServiceId AND " 
                . "cr.clientRequestCompleted = '1' AND " 
                . "cr.clientRequestCancelStatus = '0' AND " 
                . "cs.clientServiceId = cpir.clientServicesId " 
                . "ORDER BY cpir.clientPaymentinvoiceRequestId ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        
/************************************************************************************************************/
/* (57) Hire Vehicle Request */
        // 1) Hire Vehicle Requesting    
        public function hireVehicleRequestRequesting($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.hireVehicleRequestRequestedStatus = '1' WHERE "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 2) Hire Vehicle Request Recalling
        public function hireVehicleRequestRecalling($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.hireVehicleRequestRequestedStatus = '0' WHERE "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 3) Hire Vehicle Vehicle Resigning
        public function hireVehicleRequestResignVehicle($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.assignedVehicleId = '0' WHERE "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 4) Assign Vehicle to Hire Vehicle Request
         public function assignVehicleHireVehicleRequest($vehicleId, $hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.assignedVehicleId = '$vehicleId' WHERE "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 5) Assign Taks For Driver   
        public function assignTaskForVehicle($clientRequestId, $clientServiceId, $clientUserId, $hireVehicleRequestId, $vehicleId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO vehicle_tasks("
                . "clientRequestId,"
                . "clientUserId,"
                . "clientServiceId,"
                . "hireVehicleRequestId,"
                . "vehicleId)"
                . "VALUES("
                . "'$clientRequestId',"
                . "'$clientUserId',"
                . "'$clientServiceId',"
                . "'$hireVehicleRequestId',"
                . "'$vehicleId')";
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Update Hire Vehicle Request Vehicle Task Status Active   
        public function updateHireVehicleRequestVehicleTaskStatusActive($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.vehicleTaskStatus = '1' WHERE "
                . "hvr.hireVehicleRequestId  = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 7) Get Client Request Driver Measure Outcomes - hireDriverRequestId      
        public function getClientRequestVehicleMeasureOutcomes($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_vehicle_request_income hvri WHERE "
                . "hvri.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) Recall Assign Vehicle Task   
        public function recallAssignVehicleTask($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "DELETE FROM vehicle_tasks WHERE "
                . "hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 9) Update Hire Driver Request Driver Task Status Deactive
        public function updateHireVehicleRequestVehicleTaskStatusDeactive($hireVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_vehicle_request hvr SET "
                . "hvr.vehicleTaskStatus = '0' WHERE "
                . "hvr.hireVehicleRequestId = '$hireVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
/**************************************************************************************************/
/* (58) Client Hire Driver Payment Invoice */
        // 1) Get Specific Hire Driver Client Request for Client Payment Request Invoice    
        public function getSpecificHireDriverClientRequestForClientPaymentRequestInvoice($clientRequestId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_request hdr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, hire_driver_request_income hdri WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdr.clientRequestId = cr.clientRequestId  AND "
                . "hdr.hireDriverRequestId = hdri.hireDriverRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hdr.classOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2)  Get Specific Hire Driver Client Request for Client Payment Request Invoice Driver Details     
        public function getSpecificHireDriverClientRequestForClientPaymentRequestInvoiceDriverDetails($clientRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, user u, hire_driver_request hdr WHERE "
                . "cr.clientRequestId = hdr.clientRequestId  AND "
                . "u.user_id = hdr.assignedDriverUserId AND "
                . "cr.clientRequestId = '$clientRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/*******************************************************************************************************/
/* (59) Client Hire Vehicle Payment Invoice */
        // 1) Get Specific Hire Vehicle Client Request for Client Payment Request Invoice    
        public function getSpecificHireVehicleClientRequestForClientPaymentRequestInvoice($clientRequestId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_vehicle_request hvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, hire_vehicle_request_income hvri, vehicle_manufacturers vm, vehicle v WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "v.vehicleId  = hvr.assignedVehicleId AND "
                . "v.vehicleMakeId  = vm.vehicleManufacturerId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hvr.clientRequestId = cr.clientRequestId  AND "
                . "hvr.hireVehicleRequestId = hvri.hireVehicleRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hvr.classOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/* (60) Hire Driver and Vehicle Request */       
        // 1) Add Client Request for Hire Driver and Vehicle Requests - clientRequestId, classOfVehicleId, fleetId
        public function addHireDriverAndVehicleClient($clientRequestId, $clientServiceId, $clientUserId, $vehicleClassOfVehicleId, $fleetId, $driverClassOfVehicleId){
            $con = $GLOBALS["con"];
            $sql1 = "INSERT INTO hire_driver_and_vehicle_request("
                . "clientRequestId,"
                . "clientServicesId,"
                . "clientUserId,"
                . "driverClassOfVehicleId,"
                . "vehicleClassOfVehicleId,"
                . "fleetId)"
                . "VALUES("
                . "'$clientRequestId',"
                . "'$clientServiceId',"
                . "'$clientUserId',"
                . "'$vehicleClassOfVehicleId',"
                . "'$driverClassOfVehicleId',"
                . "'$fleetId')";
            $con->query($sql1) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
        // 2) Get Specific Hire Vehicle Client Request (Driver) - clientRequestId, clientServiceId, clientUserId      
        public function getSpecificHireDriverAndVehicleClientRequestByClientRequestIdClientServiceIdClientUserIdDriver($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, fleet f WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "f.fleet_id = hdvr.fleetId AND "
                . "cov.class_of_vehicle_id = hdvr.driverClassOfVehicleId AND "
//                . "cov.class_of_vehicle_id = hdvr.vehicleClassOfVehicleId AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) Get Specific Hire Vehicle Client Request (Vehicle) - clientRequestId, clientServiceId, clientUserId      
        public function getSpecificHireDriverAndVehicleClientRequestByClientRequestIdClientServiceIdClientUserIdVehicle($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, fleet f WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "f.fleet_id = hdvr.fleetId AND "
//                . "cov.class_of_vehicle_id = hdvr.driverClassOfVehicleId AND "
                . "cov.class_of_vehicle_id = hdvr.vehicleClassOfVehicleId AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId' AND "
                . "cr.clientUserId = '$clientUserId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 4) Hire Driver Requesting for Hire Driver and Vehicle Request
        public function hireDriverRequestRequestingForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.hireDriverRequestRequestedStatus = '1' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId  = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        } 
        // 5) Hire Driver Request Recalling for Hire Driver and Vehicle Request
        public function hireDriverRequestRecallingForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.hireDriverRequestRequestedStatus = '0' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 6) Get All Hire Driver Request in Hire Driver and Vehicle Request     
        public function getAllNotCompletedNotCancelledClientHireDriverRequestsInHireDriverAndVehicleRequest(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_request hdvr, client_requests cr, client_services cs, "
                . "class_of_vehicles cov, user u, profile_image pi WHERE "
                . "cr.clientRequestId = hdvr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hdvr.driverClassOfVehicleId AND "
                . "u.user_id  = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "cr.clientRequestCompleted  = '0' AND "
                . "cr.clientRequestCancelStatus  = '0' AND "
                . "hdvr.hireDriverRequestRequestedStatus = '1'";
            $result= $con->query($sql);
            return $result;
        }
        // 7) Get Specific Hire Driver & Vehicle Request
        public function getSpecificHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_request hdvr, class_of_vehicles cov WHERE "
                . "hdvr.driverClassOfVehicleId = cov.class_of_vehicle_id AND "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) Assign Driver to Hire Driver & Vehicle Request
         public function assignDriverToHireDriverAndVehicleRequest($driverUserId, $hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.assignedDriverUserId = '$driverUserId' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId  = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }  
        // 9) Hire Driver Driver Resigning
        public function driverResigFromDriverManagementForHireDriverAndVehicleRequest($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.assignedDriverUserId = '0' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }  
        // 10) Update Hire Driver & Vehicle Request Driver Task Status Active   
        public function updateHireDriverAndVehicleRequestDriverVehicleTaskStatusActive($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.driverTaskStatus = '1',"
                . "hdvr.vehicleTaskStatus = '1' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId  = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 11) Update Hire Driver & Vehicle Request Driver Task Status Deactive
        public function updateHireDriverAndVehicleRequestDriverVehicleTaskStatusDeactive($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.driverTaskStatus = '0',"
                . "hdvr.vehicleTaskStatus = '0' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 12) Hire Vehicle Requesting    
        public function hireVehicleRequestForHireDriverAndVehicle($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.hireVehicleRequestRequestedStatus = '1' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId  = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 13) Hire Vehicle Request Recalling in Hire Driver and Vehicle Request
        public function hireVehicleRequestRecallingInHireDriverAndVehicle($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.hireVehicleRequestRequestedStatus = '0' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 14) Get All Hire Driver and Vehicle Request By Requested Status     
        public function getAllNotCompletedNotCancelledClientHireDriverAndVehicleRequestsByRequested(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_request hdvr, client_requests cr, client_services cs, user u, profile_image pi, class_of_vehicles cov WHERE "
                . "cr.clientRequestId = hdvr.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cov.class_of_vehicle_id  = hdvr.vehicleclassOfVehicleId AND "
                . "u.user_id = cr.clientUserId AND "
                . "u.profile_image_id  = pi.profile_image_id AND "
                . "hdvr.hireDriverRequestRequestedStatus = '1' AND "
                . "cr.clientRequestCancelStatus = '0' AND "
                . "cr.clientRequestCompleted = '0' AND "
                . "hdvr.hireVehicleRequestRequestedStatus = '1'";
            $result= $con->query($sql);
            return $result;
        }
        // 15) Get Specific Hire Driver & Vehicle Request
        public function getSpecificHireDriverAndVehicleRequestVehicle($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, fleet f WHERE "
                . "hdvr.vehicleClassOfVehicleId = cov.class_of_vehicle_id AND "
                . "hdvr.fleetId = f.fleet_id AND "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 16) Assign Vehicle to Hire Driver and Vehicle Request
         public function assignVehicleForHireDriverAndVehicleRequest($vehicleId, $hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.assignedVehicleId = '$vehicleId' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId  = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 17) Vehicle Resigning in Hire Driver and Vehicle Request
        public function resignVehicleInHireDriverAndVehicle($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_request hdvr SET "
                . "hdvr.assignedVehicleId = '0' WHERE "
                . "hdvr.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
/************************************************************************************************************/
/* (61) Driver & Vehicle Tasks */        
        // 1) Assign Driver For Driver & Vehicle Task  
        public function assignDriverVehicleForDriverAndVehicleTask($clientRequestId, $clientServiceId, $clientUserId, $hireDriverAndVehicleRequestId, $driverUserId, $vehicleId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO driver_and_vehicle_tasks("
                . "clientRequestId,"
                . "clientUserId,"
                . "clientServiceId,"
                . "hireDriverAndVehicleRequestId,"
                . "driverUserId,"
                . "vehicleId)"
                . "VALUES("
                . "'$clientRequestId',"
                . "'$clientUserId',"
                . "'$clientServiceId',"
                . "'$hireDriverAndVehicleRequestId',"
                . "'$driverUserId',"
                . "'$vehicleId')";
            $result = $con->query($sql);    
            return $result;
        }
        // 2) Recall Assign Driver From Driver & Vehicle Task  
        public function recallAssignDriverVehicleFromDriverAndVehicleTask($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "DELETE FROM driver_and_vehicle_tasks WHERE "
                . "hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 3) 
        public function getSpecificDriverAndVehicleTasksRequestVehicleAndClient($driverAndVehicleTaskId){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM driver_and_vehicle_tasks dvt, hire_driver_and_vehicle_income hdvri, user u, client_requests cr, client_services cs, "
                . "hire_driver_and_vehicle_request hdvr, profile_image pi, class_of_vehicles coc, process_status ps, css_colors cssc,"
                . "fleet f, vehicle v, vehicle_manufacturers vm WHERE "
                . "u.user_id = cr.clientUserId AND "
                . "v.vehicleMakeId = vm.vehicleManufacturerId  AND "
                . "v.vehicleId = hdvr.assignedVehicleId AND "
                . "f.fleet_id = hdvr.fleetId AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "cr.clientRequestId = dvt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cssc.cssColorId = ps.cssColorId AND "
                . "hdvri.hireDriverAndVehicleRequestId = dvt.hireDriverAndVehicleRequestId AND "
                . "hdvr.hireDriverAndVehicleRequestId = dvt.hireDriverAndVehicleRequestId AND "
                . "hdvr.vehicleClassOfVehicleId = coc.class_of_vehicle_id AND "
                . "dvt.driverAndVehicleTaskId  = '$driverAndVehicleTaskId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 4)
        public function getSpecificDriverAndVehicleTasksRequestDriver($driverAndVehicleTaskId){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM driver_and_vehicle_tasks dvt, hire_driver_and_vehicle_income hdvri, user u, client_requests cr, client_services cs, "
                . "hire_driver_and_vehicle_request hdvr, profile_image pi, class_of_vehicles coc, process_status ps, css_colors cssc,"
                . "fleet f, driver d WHERE "
                . "u.user_id = d.user_id AND "
                . "u.user_id = hdvr.assignedDriverUserId AND "
                . "f.fleet_id = hdvr.fleetId AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "cr.clientRequestId = dvt.clientRequestId AND "
                . "cr.clientServiceId = cs.clientServiceId AND "
                . "cssc.cssColorId = ps.cssColorId AND "
                . "hdvri.hireDriverAndVehicleRequestId = dvt.hireDriverAndVehicleRequestId AND "
                . "hdvr.hireDriverAndVehicleRequestId  = dvt.hireDriverAndVehicleRequestId AND "
                . "hdvr.driverClassOfVehicleId = coc.class_of_vehicle_id AND "
                . "dvt.driverAndVehicleTaskId  = '$driverAndVehicleTaskId'";
            $result= $con->query($sql) or die($con->error);
            return $result;
        }
        // 5) Update Hire Vehicle Request Income Table
        public function updateDriverAndHireVehicleRequestIncomeTable($hireDriverAndVehicleRequestIncomeId, $odometerValueDifference, $startTime, $endTime){
            $con = $GLOBALS["con"];
            $sql = "UPDATE hire_driver_and_vehicle_income hdvri SET "
                . "hdvri.odometerValueDifference = '$odometerValueDifference',"
                . "hdvri.startTime = '$startTime',"
                . "hdvri.endTime = '$endTime' WHERE "
                . "hdvri.hireDriverAndVehicleRequestIncomeId  = '$hireDriverAndVehicleRequestIncomeId'";
            $con->query($sql) or die($con->error);        
        }
        // 6)   
        public function getClientRequestDriverAndVehicleTaskMeasureOutcomes($financeId, $hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_income hdvri WHERE "
                . "hdvri.financeId = '$financeId' AND "
                . "hdvri.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 6)   
        public function getClientRequestDriverAndVehicleTaskMeasureOutcomes1($hireDriverAndVehicleRequestId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM hire_driver_and_vehicle_income hdvri WHERE "
                . "hdvri.hireDriverAndVehicleRequestId = '$hireDriverAndVehicleRequestId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/**********************************************************************************************************/
/* (62) Client Hire Driver and Vehicle Payment Invoice */
        // 1)    
        public function getSpecificHireDriverAndVehicleClientRequestForClientPaymentRequestInvoiceDriver($clientRequestId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, hire_driver_and_vehicle_income hdvri, driver d WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "hdvr.hireDriverAndVehicleRequestId = hdvri.hireDriverAndVehicleRequestId AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "hdvr.assignedDriverUserId = u.user_id AND "
                . "d.user_id = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cov.class_of_vehicle_id = hdvr.driverClassOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2)   
        public function getSpecificHireDriverAndVehicleClientRequestForClientPaymentRequestInvoiceClient($clientRequestId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, change_status chs, css_colors cssc, "
                . "user u, profile_image pi, hire_driver_and_vehicle_income hdvri, client c WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "hdvr.hireDriverAndVehicleRequestId = hdvri.hireDriverAndVehicleRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cr.clientUserId = u.user_id AND "
                . "c.user_id = u.user_id AND "
                . "pi.profile_image_id = u.profile_image_id AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 1)   
        public function getSpecificHireDriverAndVehicleClientRequestForClientPaymentRequestInvoiceVehicle($clientRequestId, $clientServiceId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_services cs, process_status ps, "
                . "hire_driver_and_vehicle_request hdvr, class_of_vehicles cov, change_status chs, css_colors cssc, "
                . "hire_driver_and_vehicle_income hdvri, vehicle_manufacturers vm, vehicle v WHERE "
                . "cs.clientServiceId  = cr.clientServiceId AND "
                . "v.vehicleId  = hdvr.assignedVehicleId AND "
                . "v.vehicleMakeId  = vm.vehicleManufacturerId AND "
                . "ps.cssColorId = cssc.cssColorId AND "
                . "ps.processStatusId = cr.processStatusId AND "
                . "hdvr.clientRequestId = cr.clientRequestId  AND "
                . "hdvr.hireDriverAndVehicleRequestId = hdvri.hireDriverAndVehicleRequestId  AND "
                . "chs.changeStatusId = cr.changeStatusId AND "
                . "cov.class_of_vehicle_id = hdvr.vehicleClassOfVehicleId  AND "
                . "cr.clientRequestId = '$clientRequestId' AND "
                . "cr.clientServiceId = '$clientServiceId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/**********************************************************************************************************/
/* (63) Product Category Products */
        // 1) 
        public function getAllClientAvailableActiveSpecificProductCategorySpecificInventoryProducts($productCategoryId, $warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp, products p, warehouse w, warehouse_sections ws, "
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum WHERE "
                . "isp.warehouseId = w.warehouseId AND "
                . "isp.warehouseSectionId = ws.warehouseSectionId AND "
                . "isp.productId = p.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "isp.warehouseId  = '$warehouseId' AND " 
                . "pc.productCategoryId = '$productCategoryId' AND " 
                . "p.productClientStatus = '1' AND " 
                . "p.productStatus = '1' " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2) 
        public function getAllClientAvailableActiveSpecificProductCategorySpecificInventorySpecificProducts($productCategoryId, $warehouseId,$productId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM inventory_sections_products isp, products p, warehouse w, warehouse_sections ws, "
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum,"
                . "product_sell_unit_price psup WHERE "
                . "isp.warehouseId = w.warehouseId AND "
                . "isp.warehouseSectionId = ws.warehouseSectionId AND "
                . "isp.productId = p.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND " 
                . "isp.warehouseId  = '$warehouseId' AND " 
                . "pc.productCategoryId = '$productCategoryId' AND " 
                . "p.productClientStatus = '1' AND " 
                . "p.productId = '$productId' AND " 
                . "p.productId = psup.productId AND " 
                . "p.productStatus = '1' " 
                . "ORDER BY pm.productManufacturerName ASC, p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/**************************************************************************************************************/
/* (64) Product Selling Prices */       
        // 1)   
        public function getAllProductPricesInProductCategory($productCategoryId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_sell_unit_price psup, product_category pc, product_manufacturer pm WHERE "
                . "p.productId = psup.productId AND "
                . "p.productCategoryId  = pc.productCategoryId  AND "
                . "p.productManufacturerId = pm.productManufacturerId AND "
                . "p.productCategoryId = '$productCategoryId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2)   
        public function getSpecificProductPrices($productId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_sell_unit_price psup, product_category pc, product_manufacturer pm,"
                . "product_unit_types put, product_unit_measure pum WHERE "
                . "p.productId = psup.productId AND "
                . "p.productCategoryId  = pc.productCategoryId  AND "
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND "
                . "p.productId = '$productId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }        
        // 3) 
        public function updateSpecificProductSellPrice($productSellUnitPrice, $productId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_sell_unit_price SET "
                . "productSellUnitPrice = '$productSellUnitPrice' WHERE "
                . "productId  = '$productId'";
            $con->query($sql) or die($con->error);        
        }
        // 4) Get All Active Products
        public function getAllActiveCategoryProducts($productCategoryId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm WHERE "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "p.productCategoryId = '$productCategoryId' AND " 
                . "p.productStatus = '1' "
                . "ORDER BY p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }        
        // 5) Assign Driver For Driver & Vehicle Task  
        public function assignProductForSellPricing($productId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO product_sell_unit_price("
                . "productId)"
                . "VALUES("
                . "'$productId')";
            $result = $con->query($sql);    
            return $result;
        }
/*********************************************************************************************************/
/* (65) Product Buying Prices */ 
        // 1)   
        public function getAllProductBuyingPricesInProductCategory($productCategoryId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_buy_unit_price pbup, product_category pc, product_manufacturer pm WHERE "
                . "p.productId = pbup.productId AND "
                . "p.productCategoryId  = pc.productCategoryId  AND "
                . "p.productManufacturerId = pm.productManufacturerId AND "
                . "p.productCategoryId = '$productCategoryId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        } 
        // 2)   
        public function getSpecificProductBuyingPrices($productId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_buy_unit_price pbup, product_category pc, product_manufacturer pm,"
                . "product_unit_types put, product_unit_measure pum WHERE "
                . "p.productId = pbup.productId AND "
                . "p.productCategoryId  = pc.productCategoryId  AND "
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND "
                . "p.productId = '$productId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3) 
        public function updateSpecificProductBuyingPrice($productBuyUnitPrice, $productId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_buy_unit_price SET "
                . "productBuyUnitPrice = '$productBuyUnitPrice' WHERE "
                . "productId  = '$productId'";
            $con->query($sql) or die($con->error);        
        }
        // 5) Assign Driver For Driver & Vehicle Task  
        public function assignProductForBuyingPricing($productId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO product_buy_unit_price("
                . "productId)"
                . "VALUES("
                . "'$productId')";
            $result = $con->query($sql);    
            return $result;
        }
/***********************************************************************************************/
/* (66) Cargo and Shipment */
        // Add New Inventory For a Warehouse
        public function addNewCargoAndShipmentForWarehouse($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO cargo_and_shipment(warehouseId)VALUES('$warehouseId')"; 
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }  
/*************************************************************************************************/
/* (67) Cargo and Shipment Section */     
        // 1) Add New Inventory Section for Warehouse Section
        public function addNewCargoAndShipmentSectionForWarehouseSection($warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO cargo_and_shipment_section(warehouseId,warehouseSectionId)VALUES('$warehouseId','$warehouseSectionId')"; 
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        } 
/*******************************************************************************************************/
/* (68) Product Purchasing */
        // 1)
        public function addProductPurchasingDetails($productId, $productCategoryId, $productValue, $clientRequestId, $clientUserId, $clientServiceId, $warehouseId, $productSellUnitPrice, $inventorySectionsProductsId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO client_product_purchasing_request("
                . "productId,"
                . "productCategoryId,"
                . "productValue,"
                . "clientRequestId,"
                . "clientUserId,"
                . "clientServiceId,"
                . "warehouseId,"
                . "productSellUnitPrice,"
                . "inventorySectionsProductsId)"
                . "VALUES("
                . "'$productId',"
                . "'$productCategoryId',"
                . "'$productValue',"
                . "'$clientRequestId',"
                . "'$clientUserId',"
                . "'$clientServiceId',"
                . "'$warehouseId',"
                . "'$productSellUnitPrice',"
                . "'$inventorySectionsProductsId')";
            $result = $con->query($sql);    
            return $result;
        }      
        // 2)   
        public function getSpecificProductPurchasingRequestByClientRequestIdClientServiceIdClientUserId($clientRequestId, $clientServiceId, $clientUserId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM client_requests cr, client_product_purchasing_request cppr, client_services cs, user u, products p,"
                . "product_category pc, product_manufacturer pm, product_unit_types put, product_unit_measure pum, profile_image pi,"
                . "change_status chns, process_status ps, css_colors cssc, warehouse w  WHERE "
                . "cr.clientServiceId = cs.clientServiceId  AND "
                . "cppr.warehouseId = w.warehouseId  AND "
                . "cr.clientRequestId = cppr.clientRequestId  AND "
                . "cr.processStatusId  = ps.processStatusId   AND "
                . "cssc.cssColorId  = ps.cssColorId   AND "
                . "cr.changeStatusId  = chns.changeStatusId   AND "
                . "u.user_id = cppr.clientUserId AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "p.productId  = cppr.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND "
                . "pc.productUnitTypeId = put.productUnitTypeId  AND " 
                . "pc.productUnitMeasureId  = pum.productUnitMeasureId";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 8) Add financeId Hire Driver Income - financeId, financeTypeId, $hireDriverRequestId
        public function addFinanceIdToProductPurchasingRequest($financeId, $financeTypeId, $clientProductPurchasingRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_product_purchasing_request SET "
                . "financeId = '$financeId',"
                . "financeTypeId = '$financeTypeId' WHERE "
                . "clientProductPurchasingRequestId = '$clientProductPurchasingRequestId'";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;  
        }        
        // 8) Add financeId Hire Driver Income - financeId, financeTypeId, $hireDriverRequestId
        public function updateCargoAndShipmentTaskRequestStatus($clientProductPurchasingRequestId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE client_product_purchasing_request SET "
                . "cargoAndShipmentTaskRequestStatus = '1' WHERE "
                . "clientProductPurchasingRequestId = '$clientProductPurchasingRequestId'";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;  
        }
/**********************************************************************************************************/
/* (69) Cargo and Shipment Task */
        // 1)
        public function addCargoAndShipmentTask($warehouseId, $warehouseSectionId, $clientProductPurchasingRequestId, $inventorySectionsProductsId, $productId, $productValue){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO cargo_and_shipment_tasks("
                . "warehouseId,"
                . "warehouseSectionId,"
                . "clientProductPurchasingRequestId,"
                . "inventorySectionsProductsId,"
                . "productValue,"
                . "productId)"
                . "VALUES("
                . "'$warehouseId',"
                . "'$warehouseSectionId',"
                . "'$clientProductPurchasingRequestId',"
                . "'$inventorySectionsProductsId',"
                . "'$productId',"
                . "'$productValue')";
            $result = $con->query($sql);    
            return $result;
        }  
        // 2)
        public function getAllCargoAndShipmentTasks(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cargo_and_shipment_tasks cst, warehouse w, warehouse_sections ws, client_product_purchasing_request cppr, client_services cs WHERE "
                . "cst.warehouseId = w.warehouseId AND "
                . "cppr.clientProductPurchasingRequestId  = cst.clientProductPurchasingRequestId AND "
                . "cppr.clientServiceId  = cs.clientServiceId AND "
                . "cst.warehouseSectionId = ws.warehouseSectionId";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3)
        public function getAllSpecificCargoAndShipmentTasks($warehouseId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cargo_and_shipment_tasks cst, warehouse w, warehouse_sections ws, client_product_purchasing_request cppr, client_services cs WHERE "
                . "cst.warehouseId = w.warehouseId AND "
                . "cppr.clientProductPurchasingRequestId  = cst.clientProductPurchasingRequestId AND "
                . "cppr.clientServiceId  = cs.clientServiceId AND "
                . "cst.warehouseSectionId = ws.warehouseSectionId AND "
                . "w.warehouseId = '$warehouseId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        //
        // 3)
        public function getAllSpecificCargoAndShipmentSectionTasks($warehouseId, $warehouseSectionId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM cargo_and_shipment_tasks cst, warehouse w, warehouse_sections ws, client_product_purchasing_request cppr, client_services cs, "
                . "products p , product_manufacturer pm, client_requests cr  WHERE "
                . "cst.warehouseId = w.warehouseId AND "
                . "cppr.clientProductPurchasingRequestId = cst.clientProductPurchasingRequestId AND "
                . "cppr.clientServiceId = cs.clientServiceId AND "
                . "cppr.clientRequestId = cr.clientRequestId AND "
                . "cst.warehouseSectionId = ws.warehouseSectionId AND "
                . "cppr.productId = p.productId AND "
                . "pm.productManufacturerId = p.productManufacturerId AND "
                . "w.warehouseId = '$warehouseId' AND "
                . "ws.warehouseSectionId = '$warehouseSectionId'";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/*********************************************************************************************************/
/* (70) Barcode Products */
        //
        public function getBarcodeProducts(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM product_barcode ";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }       
        // 1) Get All Active Products
        public function getDetailedBarcodeProducts(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM products p, product_category pc, product_manufacturer pm, product_barcode pb WHERE "
                . "p.productId = pb.productId AND "
                . "p.productCategoryId = pc.productCategoryId AND "
                . "p.productManufacturerId = pm.productManufacturerId AND " 
                . "p.productStatus = '1' "
                . "ORDER BY p.productName ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        public function insertProductBarcode($productId){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO product_barcode("
                . "productId)"
                . "VALUES("
                . "'$productId')";
            $result = $con->query($sql);    
            return $result;
        }
        //
        public function updateAddBarcodeToProduct($productId, $profileImageEdit){
            $con = $GLOBALS["con"];
            $sql = "UPDATE product_barcode SET "
                . "barcodeImage = '$profileImageEdit' WHERE "
                . "productId = '$productId'";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id;  
        } 
/********************************************************************************************************/
/* (71) Promotion Hierarchy */        
        // 1)
        public function getAllActivePromotionHierarchies(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM promotion_hierarchy WHERE "
                . "promotionHierarchyStatus = '1' "
                . "ORDER BY promotionHierarchyPriorityNumber ASC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/************************************************************************************************************/
/* (72) User Promotions */
        // 1)
        public function getAllClientUserPromotions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, client c, user_promotions up, profile_image pi WHERE "
                . "u.user_id = c.user_id AND "
                . "up.user_id = c.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.user_id = up.user_id "
                . "ORDER BY up.loyaltyPoints DESC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 2)
        public function getAllDriverUserPromotions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, driver d, user_promotions up, profile_image pi WHERE "
                . "u.user_id = d.user_id AND "
                . "up.user_id = d.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.user_id = up.user_id "
                . "ORDER BY up.loyaltyPoints DESC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
        // 3)
        public function getAllSupplierUserPromotions(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM user u, supplier s, user_promotions up, profile_image pi WHERE "
                . "u.user_id = s.user_id AND "
                . "up.user_id = s.user_id AND "
                . "u.profile_image_id = pi.profile_image_id AND "
                . "u.user_id = up.user_id "
                . "ORDER BY up.loyaltyPoints DESC";
            $result = $con->query($sql) or die($con->error);
            return $result;
        }
/**********************************************************************************************************/
/* (73) Administrator Settings */              
        public function getAllActiveRoleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM role WHERE role_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
         public function getAllDeactiveRoleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM role WHERE role_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        public function getAllRoleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM role";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
/***********************************************************************************************************/
/* (73) Navigation Tab Types */
        // 1) Get All Navigation Tab Types
        public function getAllNavigationTabTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtab_type ntt "
                . "ORDER BY navtab_type_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 2) Get Specific Navigation Tab Type
        public function getSpecificNavigationTabType($navTabTypeId){
            $conn = $GLOBALS["con"];
            $sql = "SELECT * FROM navtab_type WHERE "
                . "navtab_type_id = '$navTabTypeId'";
            $result = $conn->query($sql) or die($conn->error);
            return $result;
        }    
        // 3) Update Specific Navigation Tab Type
        public function updateSpecificNavigationTabType($navTabTypeName, $navTabTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtab_type SET "
                . "navtab_type_name = '$navTabTypeName' WHERE "
                . "navtab_type_id = '$navTabTypeId'";
            $result = $con->query($sql);    
            return $result;
        }
        // 4) Add New Navigation Tab Type
        public function addNewNavigationTabType($navTabTypeName){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO navtab_type(navtab_type_name)"
                . "VALUES("
                . "'$navTabTypeName')";
            $result = $con->query($sql) or die($con->error);
            return $result;        
        }
        // 9) Get All Active Navigation Tab Types Count
        public function getAllActiveNavigationTabTypesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as active_count "
                . "FROM navtab_type WHERE navtab_type_status = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $activeCount = $countRow["active_count"];
            return $activeCount;
        } 
        // 10) Get All Inactive Navigation Tab Types Count
         public function getAllInactiveNavigationTabTypesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as deactive_count "
                . "FROM navtab_type WHERE navtab_type_status = '0'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $deactiveCount = $countRow["deactive_count"];
            return $deactiveCount;
        }
        // 11) Get All Navigation Tab Types Count
        public function getAllNavigationTabTypesCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM navtab_type";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        // 12) Get All Active Navigation Tab Types
        public function getAllActiveNavigationTabTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtab_type ntt WHERE "
                . "ntt.navtab_type_status = '1'"
                . "ORDER BY ntt.navtab_type_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 13) Get All Inactive Navigation Tab Types
        public function getAllInactiveNavigationTabTypes(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM navtab_type ntt WHERE "
                . "ntt.navtab_type_status = '0'"
                . "ORDER BY ntt.navtab_type_name ASC";
            $result = $con->query($sql);
            return $result;
        }
        // 14) Deactivate Navigation Tab Type - navTabsId
        public function deactivateNavigationTabType($navTabTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtab_type SET navtab_type_status='0' WHERE "
                . "navtab_type_id ='$navTabTypeId'";
            $result = $con->query($sql);       
            return $result;
        }
        // 15) Activate Navigation Tab Type - navTabsId
        public function activateNavigationTabType($navTabTypeId){
            $con = $GLOBALS["con"];
            $sql = "UPDATE navtab_type SET navtab_type_status='1' WHERE "
                . "navtab_type_id ='$navTabTypeId'";
            $result = $con->query($sql);       
            return $result;
        } 
       
      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
/* TEST */
        //
        public function addFleet(
/* 1 */     $fleetName,
/* 2 */     $cityOfTheFleetLocated,
/* 3 */     $totalHeavyMotorLorrySlotCapacity,
/* 4 */     $totalMotorLorrySlotCapacity,
/* 5 */     $totalLightMotorLorrySlotCapacity,
/* 6 */     $fleetImage_,
            $totalVehicleSlotCapacity){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO Fleet("
    /* 1 */     . "fleetName,"
    /* 2 */     . "cityOfTheFleetLocated,"
    /* 3 */     . "totalHeavyMotorLorrySlotCapacity,"
    /* 4 */     . "totalMotorLorrySlotCapacity,"
    /* 5 */     . "totalLightMotorLorrySlotCapacity,"
    /* 6 */     . "fleetImage_,"
                . "totalVehicleSlotCapacity)"
                . "VALUES("
    /* 1 */     . "'$fleetName',"
    /* 2 */     . "'$cityOfTheFleetLocated',"
    /* 3 */     . "'$totalHeavyMotorLorrySlotCapacity',"
    /* 4 */     . "'$totalMotorLorrySlotCapacity',"
    /* 5 */     . "'$totalLightMotorLorrySlotCapacity',"
    /* 6 */     . "'$fleetImage_',"
                . "'$totalVehicleSlotCapacity')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        // Get All Fleets
        public function getAllFleet(){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM Fleet";
            $result= $con->query($sql);
            return $result;
        }
        // Get All Active Fleet
        public function getAllFleetActive(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM fleet f, cities c WHERE "
                . "f.cityId = c.cityId AND "
                . "f.fleetStatus = '1' "
                . "ORDER BY c.cityName ASC";
            $result= $con->query($sql);
            return $result;
        }
        // Get All Active Fuel Types
//        public function getAllFuelTypesActive(){
//            $con = $GLOBALS["con"];
//            $sql = "SELECT * FROM fuel_type WHERE "
//                . "fuel_type_status = '1' "
//                . "ORDER BY fuel_type_name ASC";
//            $result= $con->query($sql);
//            return $result;
//        }
        //
        public function getSpecificFleet($fleet_id){
            $con= $GLOBALS["con"];
            $sql="SELECT fleetName FROM Fleet WHERE fleet_id='$fleet_id'";
            $result= $con->query($sql);
            return $result;       
        } 
        //
        public function getSpecificFleetActive($fleetId){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM fleet f, cities c WHERE "
                . "f.cityId = c.cityId AND "
                . "f.fleet_id = '$fleetId'";
            $result = $con->query($sql);
            return $result;       
        }
        //
        public function getFleetNameById($fleet_id){
            $con= $GLOBALS["con"];
            $sql="SELECT * FROM Fleet WHERE fleet_id='$fleet_id'";
            $result= $con->query($sql);
            return $result;       
        }
        //
        public function getSpecificFleetName($fleet_id){
            $con= $GLOBALS["con"];
            $sql="SELECT fleetName FROM Fleet WHERE fleet_id='$fleet_id'";
            $result= $con->query($sql);
            return $result;       
        }
        //
        public function getSpecificPetrolTank($fleet_id){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM fuel_stocks WHERE fleet_id='$fleet_id' AND fuel_type_id='1'";
            $result = $con->query($sql);
            return $result;       
        }
        //
        public function getSpecificDieselTank($fleet_id){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM fuel_stocks WHERE fleet_id='$fleet_id' AND fuel_type_id='2'";
            $result = $con->query($sql);
            return $result;       
        }
        //
        public function getPetrolTanks(){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM fuel_stocks fs, fleet f WHERE fs.fuel_type_id='1' AND fs.fleet_id=f.fleet_id";
            $result = $con->query($sql);
            return $result;       
        }
        //
        public function getDieselTanks(){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM fuel_stocks fs, fleet f WHERE fs.fuel_type_id='2' AND fs.fleet_id=f.fleet_id";
            $result = $con->query($sql);
            return $result;      
        }
        //
        public function getSpecificFleetFuelStock($fuel_stocks_id){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM fuel_stocks fs, fuel_type ft, fleet f WHERE "
                    . "fs.fuel_stocks_id ='$fuel_stocks_id' AND "
                    . "f.fleet_id = fs.fleet_id AND "
                    . "fs.fuel_type_id = ft.fuel_type_id";
            $result = $con->query($sql);
            return $result;       
        }
        //
        public function addFuel(
/* 1 */     $fleet_id,
/* 2 */     $fuel_stocks_id,
/* 3 */     $updateFuelStock){
            $con= $GLOBALS["con"];
            $sql = "UPDATE fuel_stocks SET "
                . "fuel_stocks_availability = '$updateFuelStock'"
                . "WHERE fleet_id = '$fleet_id' AND fuel_stocks_id = '$fuel_stocks_id'"; 
            $con->query($sql) or die($con->error);
        }
        //
        public function removeFuel(
/* 1 */     $fleet_id,
/* 2 */     $fuel_stocks_id,
/* 3 */     $updateFuelStock){
            $con= $GLOBALS["con"];
            $sql = "UPDATE fuel_stocks SET "
                . "fuel_stocks_availability = '$updateFuelStock'"
                . "WHERE fleet_id = '$fleet_id' AND fuel_stocks_id = '$fuel_stocks_id'"; 
            $con->query($sql) or die($con->error);
        }
        //addFuelStock
        public function addFuelStock(
/* 1 */     $stockName,
/* 2 */     $stockCapacity,
/* 2 */     $fuelTypeId,
/* 3 */     $fleet_id){
            $con = $GLOBALS["con"];
            $sql = "INSERT INTO fuel_stocks("
    /* 1 */     . "fuel_stocks_name,"
    /* 2 */     . "fuel_stocks_capacity,"
    /* 2 */     . "fuel_type_id,"
    /* 3 */     . "fleet_id)"
                . "VALUES("
    /* 1 */     . "'$stockName',"
    /* 2 */     . "'$stockCapacity',"
    /* 2 */     . "'$fuelTypeId',"
    /* 3 */     . "'$fleet_id')";
            $con->query($sql) or die($con->error);
            return $insert_id = $con->insert_id; 
        }
        //
        public function removeFuelStock(
/* 1 */     $fleet_id,
/* 2 */     $fuel_stocks_id){
            $con = $GLOBALS["con"];
            $sql = "DELETE FROM fuel_stocks WHERE "
                . "fuel_stocks_id='$fuel_stocks_id'";
            $con->query($sql) or die($con->error);
        }       
        //
        public function getAllFleetDieselUsage($all_fleet_diesel_usage_id){
            $con = $GLOBALS["con"];
            $sql ="SELECT * FROM all_fleet_diesel_usage WHERE "
                    . "all_fleet_diesel_usage_id = '$all_fleet_diesel_usage_id '";
            $result = $con->query($sql);
            return $result;      
        }
        //
        public function getAllFleetOutOfServiceVehicles(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                . "vehicle_status_id = '1' AND "
                . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        public function getAllFleetOnDutyVehicles(){
            $con = $GLOBALS["con"];
            $sql ="SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                    . "vehicle_status_id = '2' AND "
                    . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        public function getAllFleetIdleVehicles(){
            $con = $GLOBALS["con"];
            $sql ="SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                    . "vehicle_status_id = '3' AND "
                    . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        public function getAllGoodFleetVehicles(){
            $con = $GLOBALS["con"];
            $sql ="SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                    . "vehicle_condition_id = '1' AND "
                    . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        public function getAllCriticalFleetVehicles(){
            $con = $GLOBALS["con"];
            $sql ="SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                    . "vehicle_condition_id = '2' AND "
                    . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        public function getAllSatisfactoryFleetVehicles(){
            $con = $GLOBALS["con"];
            $sql ="SELECT COUNT(vehicle_id) FROM vehicle WHERE "
                    . "vehicle_condition_id = '3' AND "
                    . "assigned_fleet_id != '0'";
            $result = $con->query($sql);
            return $result;      
        }
        
        //
        public function updateSpecificFleet(                
/* 1 */     $fleetName,
/* 2 */     $cityOfTheFleetLocated,
/* 3 */     $totalHeavyMotorLorrySlotCapacity,
/* 4 */     $totalMotorLorrySlotCapacity,
/* 5 */     $totalLightMotorLorrySlotCapacity,
/* 6 */     $fleetImage_,
            $totalVehicleSlotCapacity,
            $fleet_id){
            $con= $GLOBALS["con"];
            if($fleetImage_!=""){
                $sql = "UPDATE Fleet SET "
        /* 1 */     . "fleetName = '$fleetName',"
        /* 2 */     . "cityOfTheFleetLocated = '$cityOfTheFleetLocated',"
        /* 3 */     . "totalHeavyMotorLorrySlotCapacity = '$totalHeavyMotorLorrySlotCapacity',"
        /* 4 */     . "totalMotorLorrySlotCapacity = '$totalMotorLorrySlotCapacity',"
        /* 5 */     . "totalLightMotorLorrySlotCapacity = '$totalLightMotorLorrySlotCapacity',"
        /* 6 */     . "fleetImage_ = '$fleetImage_',"
                    . "totalVehicleSlotCapacity = '$totalVehicleSlotCapacity'"
                    . "WHERE fleet_id = '$fleet_id'"; 
            }else{
                $sql = "UPDATE Fleet SET "
        /* 1 */     . "fleetName = '$fleetName',"
        /* 2 */     . "cityOfTheFleetLocated = '$cityOfTheFleetLocated',"
        /* 3 */     . "totalHeavyMotorLorrySlotCapacity = '$totalHeavyMotorLorrySlotCapacity',"
        /* 4 */     . "totalMotorLorrySlotCapacity = '$totalMotorLorrySlotCapacity',"
        /* 5 */     . "totalLightMotorLorrySlotCapacity = '$totalLightMotorLorrySlotCapacity',"
                    . "totalVehicleSlotCapacity = '$totalVehicleSlotCapacity'"
                    . "WHERE fleet_id = '$fleet_id'"; 
            }
            $con->query($sql) or die($con->error);
        }
        public function getAllWarhouse1GamCatgoSectionsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM cargo_and_shipment_section WHERE "
                . "warehouseId='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllWarhouseColCatgoSectionsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM cargo_and_shipment_section WHERE "
                . "warehouseId='2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllWarhouseNeCatgoSectionsCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM cargo_and_shipment_section WHERE "
                . "warehouseId='3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllyearMonth1SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='1' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth2SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='2' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth3SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='3' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth4SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='4' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth5SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='5' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth6SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='6' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth7SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='7' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth8SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='8' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth9SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='9' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth10SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='10' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth11SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='11' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        public function getAllyearMonth12SaleCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT * FROM year_month_sales WHERE "
                . "month='12' AND "
                . "2025";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["sale"];
            return $allCount;
        }
        
        public function getAllClassOfVehicleDriverCount1(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount2(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount3(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount4(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='4'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount5(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='5'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount6(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='6'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount7(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='7'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount8(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='8'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount9(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='9'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount10(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='10'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount11(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='11'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount12(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='12'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getAllClassOfVehicleDriverCount13(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM driver_class_of_vehicles WHERE "
                . "classOfVehicleId='13'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        
        
        public function getWarehouseSectionsCount1(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM warehouse_sections WHERE "
                . "warehouseId='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseSectionsCount2(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM warehouse_sections WHERE "
                . "warehouseId='2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseSectionsCount3(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM warehouse_sections WHERE "
                . "warehouseId='3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        
        public function getWarehouseCargoSectionsCount1(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  cargo_and_shipment_section WHERE "
                . "warehouseId='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseCargoSectionsCount2(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  cargo_and_shipment_section WHERE "
                . "warehouseId='2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseCargoSectionsCount3(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  cargo_and_shipment_section WHERE "
                . "warehouseId='3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        
        public function getWarehouseinventorySectionsCount1(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  inventory_sections WHERE "
                . "warehouseId='1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseinventorySectionsCount2(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  inventory_sections WHERE "
                . "warehouseId='2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function getWarehouseinventorySectionsCount3(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  inventory_sections WHERE "
                . "warehouseId='3'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        
        public function yourfunctions($user_id, $role_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  user_functions uf, role_functions rf WHERE "
                . "uf.functions_id = rf.functions_id AND "
                . "uf.user_id = '$user_id' AND "
                . "rf.role_id = '$role_id'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function yourModule($user_id, $role_id){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  user_modules um, role_module rm WHERE "
                . "um.module_id = rm.module_id AND "
                . "um.user_id = '$user_id' AND "
                . "rm.role_id = '$role_id'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        
        
        public function clientServices1(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  client_requests WHERE "
                . "clientServiceId = '1'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function clientServices2(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  client_requests WHERE "
                . "clientServiceId = '2'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function clientServices6(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  client_requests WHERE "
                . "clientServiceId = '6'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function clientServices7(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  client_requests WHERE "
                . "clientServiceId = '7'";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function sellingProductCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  product_sell_unit_price";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
        public function buyingProductCount(){
            $con = $GLOBALS["con"];
            $sql = "SELECT COUNT(*) as all_count "
                . "FROM  product_buy_unit_price";
            $result = $con->query($sql);
            $countRow = $result->fetch_assoc();
            $allCount = $countRow["all_count"];
            return $allCount;
        }
    }