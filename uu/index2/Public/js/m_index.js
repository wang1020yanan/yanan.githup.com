/**
 * Created by yanan on 2016/1/12.
 */
//    自动rem
(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);
//禁止


$(document).ready(function(){
    var screenwidth = window.screen.width;
    if(screenwidth > 1000){
        //window.location.href="http://www.uustudy.com.cn/index/";
    }
     $(".menu_btn").click(function(){
         if($(this).css.opacity=="1"){
             $(this).css("opacity","0.8");
         }else{
             $(this).css("opacity","1");
         }
         $(".menu").slideToggle(100);
     });

    //预约窗口
    $("#now_yy").click(function(){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap").fadeIn();
    });
    $("#qx_btn").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap").fadeOut(100);
    });
    //预约数据
    $("#yy_sub").click(function(){
        var subjectsObj=document.getElementById("subjects");
        var classObj=document.getElementById("class");
        var subjects=subjectsObj.value;
        var classOf=classObj.value;
        var tel=$("#tel").val();
        var add=$("#add").val();
        var need=$("#need").val();
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            $("#tel").addClass("shut");
            alert("请输入正确手机号码！");
        }else if(add==""){
            alert("请输入地址");
        }
        else{
            $.post("../need/submit",{subject:subjects, grade:classOf, telephone:tel, address:add, need:need},function(msg){
                //var obj = eval('(' + msg + ')');
                //alert(tel);
                if(msg==1){
                    $(".fix_form .c10").fadeOut(0);
                    $(".ok_wrap").fadeIn(0);
                }else{
                    alert("连接错误，请重试!")
                }
            });
        }
    });
});