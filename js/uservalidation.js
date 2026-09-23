$(document).ready(function(){

    //alert("User Validation File Loaded!!!");
//    $("#role_id").change(function(){
//        var user_role = $("#role_id").val();
//        var url = "../controller/user_controller.php?status=get_functions";
//        $.post(url, {role_id:user_role}, function(data){
//           $("#displaydata").html(data);
//        });
//    });
    $("form").submit(function(){
        var fname = $("#name").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var date = $("#date").val();
        var nic = $("#nic").val();
        var cno1 = $("#cno1").val();
        var cno2 = $("#cno2").val();
        var user_role = $("#user_role").val();
        
        var patnic = /^[0-9]{9}[vVxX]{1}$/;
        var patemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var patcno1 = /^\+94[0-9]{9}$/;
        var patcno2 = /^\+947[0-9]{8}$/;
        
        if(fname == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("First Name Must Not Be Empty!!!");
            $("#name").focus();
            return false;
        }
        if(lname == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Last Name Must Not Be Empty!!!");
            $("#lname").focus();
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
        
        if(date == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Date of Birth Must Not Be Empty!!!");
            $("#date").focus();
            return false;
        }
        
        if(nic == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("NIC Must Not Be Empty!!!");
            $("#nic").focus();
            return false;
        }
        if(!nic.match(patnic)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Invalid NIC Number!!!");
            $("#nic").focus();
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
        
        if(cno2 == ""){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Contact Mobile Number Must Not Be Empty!!!");
            $("#cno2").focus();
            return false;
        }
        if(!cno2.match(patcno2)){
            $("#alertmsg").addClass("alert alert-danger");
            $("#alertmsg").html("Contact Mobile Number is not valid!!!");
            $("#cno2").focus();
            return false;
        }
    });
});
