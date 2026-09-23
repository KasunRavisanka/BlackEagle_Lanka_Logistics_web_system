
$functionUrlStatus = 0;
                    $getSpecificFunctionByFunctionNameResult = $modelObj->getSpecificFunctionByFunctionName($functionName);     
                    $getSpecificFunctionByFunctionNameRow = $getSpecificFunctionByFunctionNameResult->fetch_assoc();
                       // 0                                                               
                    if (!isset($getSpecificFunctionByFunctionNameRow["functions_name"])) {
                        $modelObj->updateSpecificFunction($updateFunctionId,
                                                                $functionName, 
                                                                $functionUrlEdit, 
                                                                $selectedModuleId, 
                                                                $functionModuleIdBelong, 
                                                                $functionModuleIdExpansion, 
                                                                $breadcrumbColumn1Id,
                                                                $breadcrumbColumn2Id,
                                                                $breadcrumbColumn3Id,
                                                                $breadcrumbColumn4Id,
                                                                $breadcrumbColumn5Id,
                                                                $breadcrumbColumn6Id,
                                                                $breadcrumbColumn7Id,
                                                                $breadcrumbColumn8Id,
                                                                $breadcrumbColumn9Id,
                                                                $breadcrumbColumn10Id,
                                                                $functionUrlStatus);
                        $msg = "Previous Function Name is Successfully Changed to $functionName!";                
                        $msg = base64_encode($msg); ?>                               
                        <script>window.location = "../view/view_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
<?php                         // 0                                                              
                    } else if (isset($getSpecificFunctionByFunctionNameRow["functions_name"])) {
                           // 0                                                                                                // 0
                        if (!in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] != $updateFunctionId) {          
                            $msg = "$functionName is Already Used!";       
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId;?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                     // 0                                                                                                // 1
                        } else if (!in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] == $updateFunctionId) {
                            $modelObj->updateSpecificFunction($updateFunctionId,
                                                                $functionName, 
                                                                $functionUrlEdit, 
                                                                $selectedModuleId, 
                                                                $functionModuleIdBelong, 
                                                                $functionModuleIdExpansion, 
                                                                $breadcrumbColumn1Id,
                                                                $breadcrumbColumn2Id,
                                                                $breadcrumbColumn3Id,
                                                                $breadcrumbColumn4Id,
                                                                $breadcrumbColumn5Id,
                                                                $breadcrumbColumn6Id,
                                                                $breadcrumbColumn7Id,
                                                                $breadcrumbColumn8Id,
                                                                $breadcrumbColumn9Id,
                                                                $breadcrumbColumn10Id,
                                                                $functionUrlStatus);
                            $msg = "Function was successfully updated!";                  
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/view_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                     // 1                                                                                               // 0
                        } else if (in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] != $updateFunctionId) { 
                            $msg = "$functionName is Already Used!";                
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                     // 1                                                                                               // 1     
                        } else if (in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] == $updateFunctionId) { 
                            $modelObj->updateSpecificFunction($updateFunctionId,
                                                                $functionName, 
                                                                $functionUrlEdit, 
                                                                $selectedModuleId, 
                                                                $functionModuleIdBelong, 
                                                                $functionModuleIdExpansion, 
                                                                $breadcrumbColumn1Id,
                                                                $breadcrumbColumn2Id,
                                                                $breadcrumbColumn3Id,
                                                                $breadcrumbColumn4Id,
                                                                $breadcrumbColumn5Id,
                                                                $breadcrumbColumn6Id,
                                                                $breadcrumbColumn7Id,
                                                                $breadcrumbColumn8Id,
                                                                $breadcrumbColumn9Id,
                                                                $breadcrumbColumn10Id,
                                                                $functionUrlStatus);
                            $msg = "Function was successfully updated!";                    
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/view_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php           }
                              // 1                                                              
                    } else if (isset($getSpecificFunctionByFunctionNameRow["functions_name"])) {
                            // 0                                                                                               // 0                                                                                                             
                        if (!in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] != $updateFunctionId) {        
                            $msg = "$functionName is Already Used!";                 
                            $msg = base64_encode($msg); ?>                               
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
<?php                             // 0                                                                                                // 1                                                                                                                                                                                   
                        } else if (!in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] == $updateFunctionId) { 
                            $msg = "Function was successfully updated!";               
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                      // 1                                                                                               // 0                                                                                                    
                        } else if (in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] != $updateFunctionId) { 
                            $msg = "$functionName is Already Used!";                    
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                     // 1                                                                                               // 1                                                                                                     
                        } else if (in_array($functionName, $allFunctionName) & $getSpecificFunctionByFunctionNameRow["functions_id"] == $updateFunctionId) { 
                            $msg = "Function was successfully updated!";                       
                            $msg = base64_encode($msg); ?>
                            <script>window.location = "../view/update_specific_function.php?msgSuccess=<?php echo $msg; ?>&updateFunctionId=<?php echo $updateFunctionId; ?>&module_id=<?php echo $module_id; ?>";</script>
        <?php                                                                                                               // 1                                                                                     
                        } 
                    }