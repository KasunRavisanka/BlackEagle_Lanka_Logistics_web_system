<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center" id="alertmsg">
<?php   if(isset($_REQUEST["msgSuccess"])){ ?>
            <div class="alert alert-success">
<?php            echo base64_decode($_REQUEST["msgSuccess"]);?>
            </div>
<?php   }elseif(isset($_REQUEST["msgDanger"])){ ?>
            <div class="alert alert-danger">
<?php           echo base64_decode($_REQUEST["msgDanger"]);?>
            </div>
<?php   }elseif(isset($_REQUEST["msgWarning"])){ ?>
            <div class="alert alert-warning">
<?php           echo base64_decode($_REQUEST["msgWarning"]);?>
            </div>
<?php   } ?>
    </div>
    <div class="col-md-3"></div>
    
</div>
