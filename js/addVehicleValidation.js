$(document).ready(function(){

    //alert("User Validation File Loaded!!!");
//    $("#user_role").change(function(){
//        var user_role = $("#user_role").val();
//        var url = "../../controller/controller/user_controller.php?status=get_functions";
//        $.post(url, {role_id:user_role}, function(data){
//           $("#displaydata").html(data);
//        });
//    });
    $("form").submit(function(){
        var registrationNo = $("#registrationNo").val();
        var chassisNo = $("#chassisNo").val();
        var currentOwner = $("#currentOwner").val();
        var currentOwnerAddress = $("#currentOwnerAddress").val();
        var currentOwnerID = $("#currentOwnerID").val();
        var conditions = $("#conditions").val();
        var specialNotes = $("#specialNotes").val();
        var absoluteOwner = $("#absoluteOwner").val();
        var engineNo = $("#engineNo").val();
        var cc = $("#cc").val();
        var classOfVehicleId = $("#classOfVehicleId").val();      
        var taxationClass = $("#taxationClass").val();
        var statusWhenRegistered = $("#statusWhenRegistered").val();
        var fuelType = $("#fuelType").val();
        var make = $("#make").val();
        var countryOfOrigin = $("#countryOfOrigin").val();
        var model = $("#model").val();
        var manudacturesDescription = $("#manudacturesDescription").val();
        var wheelBase = $("#wheelBase").val();
        var overHang = $("#overHang").val();
        var typeOfBody = $("#typeOfBody").val();
        var yearOfManufacture = $("#yearOfManufacture").val();
        var color = $("#color").val();
        var previousOwnerName = $("#previousOwnerName").val();
        var previousOwnerAddress = $("#previousOwnerAddress").val();
        var previousOwnerTransferredDate = $("#previousOwnerTransferredDate").val();
        var totalPreviousOwners = $("#totalPreviousOwners").val();
        var seatingCapacity = $("#seatingCapacity").val();
        var weightUnladen = $("#weightUnladen").val();
        var weightGross = $("#weightGross").val();
        var tyreSizeFront = $("#tyreSizeFront").val();
        var tyreSizeRear = $("#tyreSizeRear").val();
        var tyreSizeDual = $("#tyreSizeDual").val();
        var tyreSizeSingle = $("#tyreSizeSingle").val();
        var length = $("#length").val();
        var width = $("#width").val();
        var height = $("#height").val();
        var internalHeight = $("#internalHeight").val();
        var provincialCouncil = $("#provincialCouncil").val();
        var dateOfFirstRegistration = $("#dateOfFirstRegistration").val();
        var vehicleImage = $("#vehicleImage").val();
        
        $patnic = "/^[0-9]{9}[vVxX]{1}$/";
        $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
        $patcno1 = "/^[0-9]{10}$/";
        $patLicenseNo = "/^[A-Z]{1}[0-9]{7}$/";
        
        if(registrationNo == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Registration No. Must Not Be Empty!!!");
            $("#registrationNo").focus();
            return false;
        }
        if(chassisNo == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Chassis No. Must Not Be Empty!!!");
            $("#chassisNo").focus();
            return false;
        }
        if(currentOwner == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Current Owner Must Not Be Empty!!!");
            $("#currentOwner").focus();
            return false;
        }
        if(currentOwnerAddress == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Current Owner Address Must Not Be Empty!!!");
            $("#currentOwnerAddress").focus();
            return false;
        }
        if(conditions == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Conditions Must Not Be Empty!!!");
            $("#conditions").focus();
            return false;
        }
        if(engineNo == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Engine No. Must Not Be Empty!!!");
            $("#engineNo").focus();
            return false;
        }
        if(cc == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Cylinder Capacity(cc) Must Not Be Empty!!!");
            $("#cc").focus();
            return false;
        }
        if(classOfVehicleId == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Class of Vehicle Must Not Be Empty!!!");
            $("#classOfVehicleId").focus();
            return false;
        }
        if(taxationClass == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Taxation Class Must Not Be Empty!!!");
            $("#taxationClass").focus();
            return false;
        }
        if(statusWhenRegistered == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Status when Registered Must Not Be Empty!!!");
            $("#statusWhenRegistered").focus();
            return false;
        }
        if(fuelType == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Fuel Type Must Not Be Empty!!!");
            $("#fuelType").focus();
            return false;
        }     
        if(make == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Make Must Not Be Empty!!!");
            $("#make").focus();
            return false;
        } 
        if(countryOfOrigin == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Country of Origin Must Not Be Empty!!!");
            $("#countryOfOrigin").focus();
            return false;
        }
        if(model == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Model Must Not Be Empty!!!");
            $("#model").focus();
            return false;
        }
        if(manudacturesDescription == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Manufactures Description Must Not Be Empty!!!");
            $("#manudacturesDescription").focus();
            return false;
        }
        if(typeOfBody == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Type of Body Must Not Be Empty!!!");
            $("#typeOfBody").focus();
            return false;
        }
        if(yearOfManufacture == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Year of Manufacture Must Not Be Empty!!!");
            $("#yearOfManufacture").focus();
            return false;
        }
        if(color == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Color Must Not Be Empty!!!");
            $("#color").focus();
            return false;
        }
        if(seatingCapacity == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Seating Capacity(Ex/Driver) Must Not Be Empty!!!");
            $("#seatingCapacity").focus();
            return false;
        }
        if(provincialCouncil == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Provincial Council Must Not Be Empty!!!");
            $("#provincialCouncil").focus();
            return false;
        }
        if(dateOfFirstRegistration == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Date of First Registration Must Not Be Empty!!!");
            $("#dateOfFirstRegistration").focus();
            return false;
        }
        if(vehicleImage == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Vehicle Image Must Not Be Empty!!!");
            $("#vehicleImage").focus();
            return false;
        }
    });
});
