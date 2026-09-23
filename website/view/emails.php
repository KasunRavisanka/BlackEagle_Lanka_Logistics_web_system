<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.122.0">
        <title>Carousel Template · Bootstrap v5.3</title>
        <!--<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">-->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">-->
        <?php include_once '../includes/bootstrap_header_includes.php';?>
        <!-- Custom styles for this template -->
        <link href="../css/carousel.css" rel="stylesheet">
        <link href="../css/common1.css" rel="stylesheet">
<?php
        include_once '../common/objects.php';
        $getAllEmailRolesResult = $websiteObj->getAllEmailRoles();
?>
    </head>
    <body>
        <div class="container">
            <?php include_once '../common/theme.php';?>      
            <?php include_once '../common/symbols.php';?>      
            <header data-bs-theme="dark">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">BlackEagle Lanka Logistics</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Locations</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                                <!--<li class="nav-item"><a class="nav-link" href="#">Emails</a></li>-->
                                <!--<li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Disabled</a></li>-->
                            </ul>
    <!--                        <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>-->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="../../view/login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="container bg-body">
                <div class="row"><h4 style="text-align:center">Emails and Roles</h4></div>     
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <ul>
<?php
                        while($getAllEmailRolesRow = $getAllEmailRolesResult->fetch_assoc()){
?>
                            <li><?php echo $getAllEmailRolesRow["email"]." - ".$getAllEmailRolesRow["role_name"]." - ".$getAllEmailRolesRow["password"];?></li>
<?php
                        }
?>
                    </ul>
                </div>
            </div>
            <footer class="bg-body">
                <div class="container">
                    <div class="row">&nbsp;</div>
                    <div class="row p-0 m-0"><hr class="m-0 p-0"></div>
                    <div class="row">&nbsp;</div>
                </div>
            </footer>
        </div>
    </body>
    <?php include_once '../includes/bootstrap_footer.php';?>
    <?php include_once '../includes/jquery_includes.php';?>
</html>
