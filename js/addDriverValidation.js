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
        var surname = $("#surname").val();
        var otherNames = $("#otherNames").val();
        var dob = $("#dob").val();
        var issueLicense = $("#issueLicense").val();
        var expiryLicense = $("#expiryLicense").val();
        var issuingAuthority = $("#issuingAuthority").val();
        var NIC = $("#NIC").val();
        var noLicense = $("#noLicense").val();
        var bloodGroup = $("#bloodGroup").val();
        var signatureHolder = $("#signatureHolder").val();
        var address = $("#address").val();
        
        var email = $("#email").val();
        var cno1 = $("#cno1").val();
        var driverImage = $("#driverImage").val();
        
        $patnic = "/^[0-9]{9}[vVxX]{1}$/";
        $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
        $patcno1 = "/^[0-9]{10}$/";
        $patLicenseNo = "/^[A-Z]{1}[0-9]{7}$/";
        
        if(surname == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Surname Must Not Be Empty!!!");
            $("#surname").focus();
            return false;
        }
        if(otherNames == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("otherNames Must Not Be Empty!!!");
            $("#otherNames").focus();
            return false;
        }
        if(dob == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Date of Birthday Must Not Be Empty!!!");
            $("#dob").focus();
            return false;
        }
        if(issueLicense == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Date of issue of the LICENSE Must Not Be Empty!!!");
            $("#issueLicense").focus();
            return false;
        }
        if(expiryLicense == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Date of expiry of the LICENSE Must Not Be Empty!!!");
            $("#expiryLicense").focus();
            return false;
        }
        if(issuingAuthority == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Issuing Authority Must Not Be Empty!!!");
            $("#issuingAuthority").focus();
            return false;
        }
        if(NIC == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Administrative Number(NIC) Must Not Be Empty!!!");
            $("#NIC").focus();
            return false;
        }
        if(!nic.match(patnic)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Invalid NIC Number!!!");
            $("#nic").focus();
            return false;
        }
        if(noLicense == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Number of the LICENSE) Must Not Be Empty!!!");
            $("#noLicense").focus();
            return false;
        }
        if(!noLicense.match($patLicenseNo)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Invalid LICENSE Number!!!");
            $("#noLicense").focus();
            return false;
        }
        if(bloodGroup == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Blood Group Must Not Be Empty!!!");
            $("#bloodGroup").focus();
            return false;
        }
        if(signatureHolder == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Signature of the Holder Must Not Be Empty!!!");
            $("#signatureHolder").focus();
            return false;
        }
        if(address == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Signature of the Holder Must Not Be Empty!!!");
            $("#address").focus();
            return false;
        }     
        if(email == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Email Must Not Be Empty!!!");
            $("#email").focus();
            return false;
        }
        if(!email.match(patemail)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Invalid Email Address!!!");
            $("#email").focus();
            return false;
        }  
        if(cno1 == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Contact Land Number Must Not Be Empty!!!");
            $("#cno1").focus();
            return false;
        }
        if(!cno1.match(patcno1)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Contact Land Number is not valid!!!");
            $("#cno1").focus();
            return false;
        }
        if(driverImage == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Contact Land Number Must Not Be Empty!!!");
            $("#driverImage").focus();
            return false;
        }
    });
});
