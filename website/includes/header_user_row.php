<!DOCTYPE html>
    <head></head>
    <body>
    <?php
        $role_name = $_SESSION["user"]["role_name"];
    ?>
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <h3>
                    <span class="glyphicon glyphicon-user"></span>
                    &nbsp;
    <?php
                    echo ucwords($_SESSION["user"]["user_fname"]);
    ?>
    <?php
                    echo ucwords($_SESSION["user"]["user_lname"]);
    ?>                      
                </h3>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <h3 align="center">
    <?php 
                    //echo $pageName;
                    echo ucwords($role_name);
    ?>
                </h3>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <h3 class="h3">
                    <a href="../controller/login_controller.php?status=logout" class="btn btn-primary">Logout</a>
                </h3>
            </div>
        </div>
    </body>
</html>