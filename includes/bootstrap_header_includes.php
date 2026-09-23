<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta name="description" content="">-->
        <!--<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">-->
        <!--<meta name="generator" content="Hugo 0.122.0">-->
<!--        <style>
            .selector-for-some-widget {
                box-sizing: content-box;
            } 
        </style>-->
        <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-grid.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-grid.rtl.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-reboot.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-reboot.rtl.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-utilities.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap-5.3.3/dist/css/bootstrap-utilities.rtl.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.3.3/dist/css/bootstrap.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap-5.3.3/dist/css/bootstrap.rtl.min.css"/>-->
        <link rel="stylesheet" href="../css/datatables.min.css">
        <link rel="stylesheet" href="../css/common1.css">
        
        <!--<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>-->
        <!--<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css"/>-->
        
        <!--Latest compiled and minified CSS--> 
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">-->
         <!--Optional theme--> 
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">-->
    
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">-->
    </head>
    <body></body>
<?php
    $e1=""; $e2=""; $e3=""; $e4=""; $e5=""; $e6=""; $e7=""; $e8=""; $e9=""; $e10="";
    $column1 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign1);
    $column1 = $column1->fetch_assoc();   

    $column2 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign2);
    $column2 = $column2->fetch_assoc();   

    $column3 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign3);
    $column3 = $column3->fetch_assoc();  

    $column4 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign4);
    $column4 = $column4->fetch_assoc();  

    $column5 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign5);
    $column5 = $column5->fetch_assoc();    

    $column6 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign6);
    $column6 = $column6->fetch_assoc();  

    $column7 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign7);
    $column7 = $column7->fetch_assoc();  

    $column8 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign8);
    $column8 = $column8->fetch_assoc(); 

    $column9 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign9);
    $column9 = $column9->fetch_assoc(); 

    $column10 = $modelObj->getSpecificBreadcrumbByBreadcrumbId($columnAssign10);
    $column10 = $column10->fetch_assoc(); 

    if (isset($IdPass1Column1Assign) & isset($IdPass1______________Column2Assign)) {
        $e1 = "?".$IdPass1Column1Assign."=".$IdPass1______________Column2Assign;
    }
    if (isset($IdPass2Column1Assign) & isset($IdPass2______________Column2Assign)) {
        $e2 = "&".$IdPass2Column1Assign."=".$IdPass2______________Column2Assign;
    }
    if (isset($IdPass3Column1Assign) & isset($IdPass3______________Column2Assign)) {
        $e3 = "&".$IdPass3Column1Assign."=".$IdPass3______________Column2Assign;
    }
    if (isset($IdPass4Column1Assign) & isset($IdPass4______________Column2Assign)) {
        $e4 = "&".$IdPass4Column1Assign."=".$IdPass4______________Column2Assign;
    }
    if (isset($IdPass5Column1Assign) & isset($IdPass5______________Column2Assign)) {
        $e5 = "&".$IdPass5Column1Assign."=".$IdPass5______________Column2Assign;
    }
    if (isset($IdPass6Column1Assign) & isset($IdPass6______________Column2Assign)) {
        $e6 = "&".$IdPass6Column1Assign."=".$IdPass6______________Column2Assign;
    }
    if (isset($IdPass7Column1Assign) & isset($IdPass7______________Column2Assign)) {
        $e7 = "&".$IdPass7Column1Assign."=".$IdPass7______________Column2Assign;
    }
    if (isset($IdPass8Column1Assign) & isset($IdPass8______________Column2Assign)) {
        $e8 = "&".$IdPass8Column1Assign."=".$IdPass8______________Column2Assign;
    }
    if (isset($IdPass9Column1Assign) & isset($IdPass9______________Column2Assign)) {
        $e9 = "&".$IdPass9Column1Assign."=".$IdPass9______________Column2Assign;
    }
    if (isset($IdPass10Column1Assign) & isset($IdPass10______________Column2Assign)) {
        $e10 = "&".$IdPass10Column1Assign."=".$IdPass10______________Column2Assign;
    }
    $a1 = $column1["breadcrumbLiCss"];
    $a2 = $column2["breadcrumbLiCss"];
    $a3 = $column3["breadcrumbLiCss"];
    $a4 = $column4["breadcrumbLiCss"];
    $a5 = $column5["breadcrumbLiCss"];
    $a6 = $column6["breadcrumbLiCss"];
    $a7 = $column7["breadcrumbLiCss"];   
    $a8 = $column8["breadcrumbLiCss"];   
    $a9 = $column9["breadcrumbLiCss"];   
    $a10 = $column10["breadcrumbLiCss"];   
    $b1 = $column1["breadcrumbLiAriaCurrent"];
    $b2 = $column2["breadcrumbLiAriaCurrent"];
    $b3 = $column3["breadcrumbLiAriaCurrent"];
    $b4 = $column4["breadcrumbLiAriaCurrent"];
    $b5 = $column5["breadcrumbLiAriaCurrent"];
    $b6 = $column6["breadcrumbLiAriaCurrent"];
    $b7 = $column7["breadcrumbLiAriaCurrent"];   
    $b8 = $column8["breadcrumbLiAriaCurrent"];   
    $b9 = $column9["breadcrumbLiAriaCurrent"];   
    $b10 = $column10["breadcrumbLiAriaCurrent"];   
    if ($columnAssign1 != 102) {
        $c1 = $column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;       
    }
    if ($columnAssign2 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = $column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;      
    }
    if ($columnAssign3 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = $column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign4 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = $column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign5 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = $column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign6 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = 'href="'.$column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c6 = $column6["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign7 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = 'href="'.$column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c6 = 'href="'.$column6["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c7 = $column7["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign8 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = 'href="'.$column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c6 = 'href="'.$column6["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c7 = 'href="'.$column7["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c8 = $column8["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign9 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = 'href="'.$column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c6 = 'href="'.$column6["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c7 = 'href="'.$column7["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c8 = 'href="'.$column8["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c9 = $column9["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    if ($columnAssign10 != 102) {
        $c1 = 'href="'.$column1["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c2 = 'href="'.$column2["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c3 = 'href="'.$column3["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c4 = 'href="'.$column4["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c5 = 'href="'.$column5["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c6 = 'href="'.$column6["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c7 = 'href="'.$column7["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c8 = 'href="'.$column8["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c9 = 'href="'.$column9["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
        $c10 = $column10["breadcrumbURL"].$e1.$e2.$e3.$e4.$e5.$e6.$e7.$e8.$e9.$e10;
    }
    $d1 = $column1["breadcrumbName"];
    $d2 = $column2["breadcrumbName"];
    $d3 = $column3["breadcrumbName"];
    $d4 = $column4["breadcrumbName"];
    $d5 = $column5["breadcrumbName"];
    $d6 = $column6["breadcrumbName"];
    $d7 = $column7["breadcrumbName"];
    $d8 = $column8["breadcrumbName"];
    $d9 = $column9["breadcrumbName"];
    $d10 = $column10["breadcrumbName"];
?>
</html>

