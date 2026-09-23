/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$(document).ready(function(){
    $("form").submit(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username == ""){
            $("#alertdiv").addClass("alert alert-danger");
            $("#alertdiv").html("Username Cannot Be Empty");
            $("#username").focus();
            return false;
        }
        else if(password == ""){
            $("#alertdiv").addClass("alert alert-danger");
            $("#alertdiv").html("Password Cannot Be Empty");
            $("#password").focus();
            return false;
        }
    });
});