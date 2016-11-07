/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
function tip(msg){
    $(".tip_box").text(msg).fadeIn();
    setTimeout(function(){
        $(".tip_box").fadeOut(1500);
    },500)
}
//function Click(){
//    window.event.returnValue=false;
//}
//document.oncontextmenu=Click;

$(document).ready(function(){
     //性别
     $(".woman").click(function(){
         $(".man").removeClass("isman");
         $(this).css("background","#0EB621");
         $(".man").css("background","none");
     });
    $(".man").click(function(){
        $(".man").addClass("isman");
        $(this).css("background","#0EB621");
        $(".woman").css("background","none");
    });
    //登陆下载切换
     $(".login_title .login").click(function(){
         $(this).css("border-bottom"," 2px solid  #0EB621");
         $(".login_title .login span").css("color","#0EB621");
         $(".login_title .down").css("border-bottom"," 2px solid #c5c5c5");
         $(".login_title .down span").css("color","#000");
         $(".down_wrap").addClass("hid");
         $(".con_wrap").removeClass("hid");
     });
     $(".login_title .down").click(function(){
        $(this).css("border-bottom"," 2px solid  #0EB621");
        $(".login_title .down span").css("color","#0EB621");
        $(".login_title .login").css("border-bottom"," 2px solid #c5c5c5");
        $(".login_title .login span").css("color","#000");
        $(".con_wrap").addClass("hid");
        $(".down_wrap").removeClass("hid");
     });
    //注册弹框
     $(".res").click(function(){
         $(".fix_window").fadeIn(100);
         $(".fix_wrap").fadeIn();
     });
    $("#qx_btn").click(function(){
         $(".fix_window").fadeOut();
         $(".fix_wrap").fadeOut(100);
    });
    //忘记密码弹框
    $(".forget p").click(function(){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap2").fadeIn();
    });
    $(".qx_btn").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap2").fadeOut(100);
    });
    //登录数据
    $("#log_btn").click(function(){
        log();
    });
    $("#l_pass").keyup(function(){
        if(event.keyCode==13){
            log();
        }
    });
    function log(){
        var tel=$("#l_tel").val();
        var pass=$("#l_pass").val();
        var pass1=base64encode(utf16to8(pass));
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            tip("请输入正确手机号码")
        }
        else if(pass==""){
            tip("请输入密码！")
        }
        else{
            $.post("../Login/login",{telephone:tel,password:pass1},function(msg){
                if(msg==1){
                    window.location.href="../TeacherCenter/index";
                }
                else {
                    tip(msg);
                }
            });
        }
    }
    //忘记密码验证码
    $(".get_num2").click(function(){
        var tel=$("#f_tel").val();
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            tip("请输入正确手机号码")
        }else{
            //验证码 数据请求
            $.post("../Register/getVerifyCode",{telephone:tel,verifyCodeType:"reset"},function(msg){
                if(msg==0){
                    tip("此号码没有注册")
                }else if(msg==3){
                    tip("验证码获取频繁")
                }else{
                    //倒计时
                    var st=$(".get_num2").text();
                    if(st=="获取验证码"){
                        var x=60;
                        setInterval(function(){
                            if(x<61){
                                x--;
                                $(".get_num2").text(x+"s后获取");
                                $(".get_num2").css("cursor","no-drop");
                                $(".get_num2").attr("disabled","disabled");
                                $(".get_num2").css("opacity","0.6");
                                if(x<=1){
                                    $(".get_num2").text("获取验证码");
                                    $(".get_num2").css("cursor","pointer");
                                    $(".get_num2").css("opacity","1");
                                    $(".get_num2").attr("disabled",false);
                                    x=61
                                }
                            }
                        },1000);
                    }
                }
            });
        }
    });
    //忘记密码数据
    $("#f_ok").click(function(){
        var tel=$("#f_tel").val();
        var y_num=$("#f_yzm").val();
        var pass2=$("#f_pass2").val();
        var pass=$("#f_pass").val();
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            tip("请输入正确手机号码")
        }else if(pass!==pass2||pass==""){
            tip("两次密码输入不一致")
        } else{
			    var pass1=base64encode(utf16to8(pass));
                $.post("../Register/resetPassword/verifyCodeType/reset",{telephone:tel,verifyCode:y_num,password:pass1},function(ms){
                    if(ms==1){
                        tip("密码修改成功");
                        $(".fix_window").fadeOut();
                        $(".fix_wrap2").fadeOut(100);
                        window.location.reload();
                    }else{
                        tip(ms)
                    }
                });
        }
    });
    //注册验证码
    $(".get_num").click(function(){
        var tel=$("#r_tel").val();
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            tip("请输入正确手机号码")
        }else{
            //验证码 数据请求
            $.post("../Register/getVerifyCode",{telephone:tel,verifyCodeType:"register"},function(msg){
                if(msg==1){
                    tip("您的手机号已注册")
                }else if(msg==3){
                    tip("验证码获取频繁")
                }else{
                    //倒计时
                    var st=$(".get_num").text();
                    if(st=="获取验证码"){
                        var x=60;
                        setInterval(function(){
                            if(x<61){
                                x--;
                                $(".get_num").text(x+"s后获取");
                                $(".get_num").css("cursor","no-drop");
                                $(".get_num").attr("disabled","disabled");
                                $(".get_num").css("opacity","0.6");
                                if(x<=1){
                                    $(".get_num").text("获取验证码");
                                    $(".get_num").css("cursor","pointer");
                                    $(".get_num").css("opacity","1");
                                    $(".get_num").attr("disabled",false);
                                    x=61
                                }
                            }
                        },1000);
                    }
                }
            });

        }
    });
    //注册数据
    $("#yy_sub").click(function(){
        var sex;
        if($("#man").hasClass("isman")){
            sex="0"
        }else{
            sex="1";
        }
        var tel=$("#r_tel").val();
        var y_num=$("#y_num").val();
        var name=$("#r_name").val();
        var pass=$("#r_pass").val();
		var pass1=base64encode(utf16to8(pass));
        var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
        if(telReg==false){
            tip("请输入正确手机号码")
        }
		else if(name==""){
            tip("请输入姓名")
        }
		else if(pass==""){
            tip("请输入密码")
        }
		else{
            $.post("../Register/register",{telephone:tel,verifyCode:y_num,userName:name,password:pass1,userSex:sex},function(msg){
                   if(msg==1){
                       $(".fix_form .c10").fadeOut(0);
                       $(".ok_wrap").fadeIn(0);
                       setTimeout(function(){
                           window.location.href="/index.php/home/TeacherCenter/teacherCenter";
                       },3000)
                   }else{
                       tip(msg)
                   }
            });
        }
    });
});
