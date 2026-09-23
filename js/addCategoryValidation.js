$(document).ready(function(){

//    alert("User Validation File Loaded!!!");
//    $("#user_role").change(function(){
//        var user_role = $("#user_role").val();
//        var url = "../../controller/controller/user_controller.php?status=get_functions";
//        $.post(url, {role_id:user_role}, function(data){
//           $("#displaydata").html(data);
//        });
//    });
//    $("#updateCategorySelectClick").click(function(){
//        var updateProductCategoryId = $("#updateProductCategoryId").val();
//        if(updateProductCategoryId == ""){
//            $("#alertmsg").addClass("alert alert-danger");
//            $("#alertmsg").html("First Name Must Not Be Empty!!!");
//            $("#updateProductCategoryId").focus();
////            return false;
////            alert(updateProductCategoryId);
//            return false;
//        }
////        alert($(this).val());
//
////        alert("The text has been changed.");
////        alert(updateProductCategoryId);
//    });
    $("#updateCategorySelectClick").click(function(){
        var updateProductCategoryId = $("#updateProductCategoryId").val();
        if(updateProductCategoryId == "0"){
            $("#updateCategorySelectClick").attr("disabled","disabled");
        }
        $("#updateCategorySelectClick").removeAttr("disabled");

//        alert("The text has been changed.");
//        alert(updateProductCategoryId);
    });
});
