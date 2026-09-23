<!doctype html>
<html>
<?php
    include_once '../../includes/session.php';
    include_once '../../model/module_model.php';
    $moduleObj = new Module();
    $role_id = $_SESSION["user"]["role_id"];
    $moduleResult1 = $moduleObj->getFunctionRole($role_id);
    $pageName = "Report Management";
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
                include_once 'report_navbar.php';
    ?>      
    <?php
                include_once 'report-modules.php';
    ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h6 align="center">
                                        Test
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <h6 align="center">
                                       Number
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h6 align="center">
                                        Test
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <h6 align="center">
                                       Number
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h6 align="center">
                                        Test
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <h6 align="center">
                                       Number
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-4">
                            <div class="card" style="">
                                <div class="card-header">
                                    <h6 align="center">
                                        Test
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <h6 align="center">
                                       Number
                                    </h6>
                                </div>
                            </div>
                        </div>
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