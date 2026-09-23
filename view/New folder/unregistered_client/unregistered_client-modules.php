<!doctype html>
<html>
    <head></head>
    <body>
        <?php 
            $module_id_correct = "module_id=".$module_id."&";
        ?>
        <!--<nav id="sidebarMenu" class="d-md-block bg-light sidebar collapse pl-1">-->
                    <!--<div class="sidebar-sticky pt-3">-->
        <div class="sidebar border border-right col-md-12 col-lg-12 p-0 bg-body-tertiary">
            <div class="offcanvas offcanvas-start bg-body-tertiary" tabindex="-1" id="<?php echo $getFunctionsModulesById["functions_modules_idName"];?>" aria-labelledby="<?php echo $getFunctionsModulesById["functions_modules_aria-labelledby"];?>">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel"><?php echo $getSpecificModule["module_name"]?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="<?php echo $getFunctionsModulesById["functions_modules_data-bs-target"];?>" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column mb-auto">    
    <?php
                        
                        while($getSpecificFunctionsColumn = $getSpecificFunctionsResult->fetch_assoc()){
    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $getSpecificFunctionsColumn["functions_url"].$module_id_correct."functions_id=".$getSpecificFunctionsColumn["functions_id"];?>">
                                    <span data-feather="file"></span>
                                    <h6>
    <?php
                                        echo ucwords($getSpecificFunctionsColumn["functions_name"]);
    ?>
                                    </h6>
                                </a>
                            </li>
    <?php
                        }
    ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
