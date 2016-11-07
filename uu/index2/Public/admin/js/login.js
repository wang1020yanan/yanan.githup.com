/**
 * Created by yanan on 2016/1/12.
 */
//禁止
//function Click(){
//    window.event.returnValue=false;
//}
//document.oncontextmenu=Click;
//记住密码函数
function saveUserInfo() {
    if ($("#rmbUser").prop("checked")) {
        var userName = $("#user").val();
        var passWord = $("#pass").val();
        $.cookie("rmbUser", "true", { expires: 1 }); // 存储一个带1天期限的 cookie
        $.cookie("userName", userName, { expires: 1 }); // 存储一个带1天期限的 cookie
        $.cookie("passWord", passWord, { expires: 1 }); // 存储一个带1天期限的 cookie
    }
    else {
        $.cookie("rmbUser", "false", { expires: -1 }); // 删除 cookie
        $.cookie("userName", '', { expires: -1 });
        $.cookie("passWord", '', { expires: -1 });
    }
}
//登录
function login(){
    var username=$("#user").val();
    var password=$("#pass").val();
    $.post("/uuuutest/thinkphp/admin/Login/login",{admin_name:username,password:password},function(msg){
         if(msg==1){
             window.location.href="/uuuutest/thinkphp/admin/Verify/verifyList";
         }else{
             alert(msg)
         }
    })
}
$(document).ready(function(){
    //初始化页面时验证是否记住了密码
        if ($.cookie("rmbUser") == "true") {
            $("#rmbUser").attr("checked", true);
            $("#user").val($.cookie("userName"));
            $("#pass").val($.cookie("passWord"));
        }
    $("#sub").click(function(){
        //记住密码设置
        saveUserInfo();
    });
    //登录触发
    $("#pass").keyup(function(){
        if(event.keyCode==13){
            login();
        }
    });
    $("#sub").click(function(){
        login();
    })
});