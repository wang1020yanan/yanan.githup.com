/**
 * Created by yanan on 2016/1/5.
 */

//信息提示
function tip(msg){
    $(".tip_box").text(msg).fadeIn();
    setTimeout(function(){
        $(".tip_box").fadeOut(1500);
    },500)
}
//登录状态
var xxx=8;
(function isLogin(){
    var xxx=8;
    //alert(xxx);
    $.ajax
    ({ //请求验证用户是否登录
        url: "http://localhost/thinkphp/index.php/home/index/islog",
        type: "post",
        //传送请求数据
        data: { txtNum:xxx },
        success: function (strValue) { //登录成功后返回的数据
            //根据返回值进行状态显示
            if (strValue == "1") {
                $(".pr_new").removeClass("hid");
                $(".log_wrap").addClass("hid");
            }
            else {
                $(".log_wrap").removeClass("hid");
                $(".pr_new").addClass("hid");
            }
        }
    })
})();


function load(){
    $("body").fadeIn();
}
function Click(){
    window.event.returnValue=false;
}
document.oncontextmenu=Click;
$(document).ready(function(){
    //           获取IP
    $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(_result) {
        if (remote_ip_info.ret == '1') {
//                 alert(  '省：' + remote_ip_info.province + '市：' + remote_ip_info.city );
//            alert(remote_ip_info.province);
//                 alert(remote_ip_info.city);
            $("#address").text(remote_ip_info.city);
        } else {
            //alert('没有找到匹配的IP地址信息！');
        }
    });
    //移动端过滤
    var browser={
        versions:function(){
            var u = navigator.userAgent, app = navigator.appVersion;
            return {//移动终端浏览器版本信息
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
            };
        }(),
        language:(navigator.browserLanguage || navigator.language).toLowerCase()
    };
//        document.writeln("语言版本: "+browser.language);
//        document.writeln(" 是否为移动终端: "+browser.versions.mobile);
//        document.writeln(" ios终端: "+browser.versions.ios);
//        document.writeln(" android终端: "+browser.versions.android);
//        document.writeln(" 是否为iPhone: "+browser.versions.iPhone);
//        document.writeln(" 是否iPad: "+browser.versions.iPad);
//        document.writeln(navigator.userAgent);

    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    if( isAndroid){
        window.location.href="/index/home/index/m_index.html";
    }else if(isiOS){
        //$(document).write("");
        window.location.href="/index/home/index/m_index.html";
    }
    //登陆下载切换
    $(".login_title .login").hover(function(){
        $(this).css("border-bottom"," 2px solid  #54C5F5");
        $(".login_title .login span").css("color","#54C5F5");
        $(".login_title .down").css("border-bottom"," 2px solid #c5c5c5");
        $(".login_title .down span").css("color","#c5c5c5");
        $(".down_wrap").fadeOut();
        $(".con_wrap_l").fadeIn();
    });
    $(".login_title .down").hover(function(){
        $(this).css("border-bottom"," 2px solid  #54C5F5");
        $(".login_title .down span").css("color","#54C5F5");
        $(".login_title .login").css("border-bottom"," 2px solid #c5c5c5");
        $(".login_title .login span").css("color","#c5c5c5");
        $(".con_wrap_l").fadeOut(200);
        $(".down_wrap").fadeIn(100);
    });
    //账号密码图标
    $(".input input").focus(function(){
       $(this).prev().css("color","#54C5F5")
    });
    $(".input input").blur(function(){
        $(this).prev().css("color","#A1A1A1")
    });



//移动端跳转
//    var u = navigator.userAgent;
//    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
//    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
//    if( isAndroid){
//        window.location.href="http://shouji.baidu.com/soft/item?docid=8754940&from=web_alad_6&f=search_app_%E4%BC%98%E4%BC%98%E8%80%81%E5%B8%88%40list_1_title%401%40header_software_input_btn_search";
//    }else if(isiOS){
//        //$(document).write("");
//        window.location.href="https://itunes.apple.com/cn/app/you-you-jia-jiao/id1044036646?mt=8";
//    }
    //移动端跳转
    //var screenwidth = window.screen.width;
    //if(screenwidth < 1000){
    //    $(".body_content1 img").css("top","0px");
    //    //window.location.href="/index/home/index/m_index.html";
    //}
    //找老师弹框
    $("#find").click(function(){
        $(".fix_window").fadeIn(100);
        $("#find_wrap").fadeIn();
    });
    $(".find_close").click(function(){
        $(".fix_window").fadeOut();
        $("#find_wrap").fadeOut(100);
    });
    $(".findbutton a").click(function(){
        $(".fix_window").fadeOut();
        $("#find_wrap").fadeOut(100);
    });
    //需求弹框
    $("#need").click(function(){
        $(".fix_window").fadeIn(100);
        $("#need_wrap").fadeIn();
    });
    $(".need_close2").click(function(){
        $(".fix_window").fadeOut();
        $("#need_wrap").fadeOut(100);
    });
    $(".findbutton a").click(function(){
        $(".fix_window").fadeOut();
        $("#find_wrap").fadeOut(100);
    });
    //注册弹框
    $("#needb").click(function(){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap").fadeIn();
    });
    $(".need_close").click(function(){
        $(".fix_window").fadeOut();
        $("#need_wrap").fadeOut(100);
    });
    //需求数据
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
            tip("请输入正确手机号")
        }else if(add==""){
            tip("请输入地址");
        }
        else{
            $.post("/index/home/need/submit",{subject:subjects, grade:classOf, telephone:tel, address:add, need:need},function(msg){
                //var obj = eval('(' + msg + ')');
                //alert(tel);
                $("#loader").fadeIn(0);
                if(msg==1){
                    setTimeout(function(){
                        $("#loader").fadeOut(0);
                        $(".fix_form .c10").fadeOut(0);
                        $(".ok_wrap").fadeIn(0);
                    },1000)
                }else{
                    $("#loader").fadeOut(0);
                    tip("连接错误，请重试!")
                }
            });
        }
    });

    $(".tipto").mouseover(function(){
        $(this).children().addClass("tipdo");
    });
    $(".tipto").mouseleave(function(){
        $(this).children().removeClass("tipdo");
    });
    jQuery(window).scroll( function () {
        var lea=$(".liu_nav").offset().top-250;
        if(jQuery(window).scrollTop()>600){
            $('.header').addClass('addfix');
            $(".addfix").fadeIn(1000);
        }
        else{
            //$(".addfix").fadeOut(0);
            $('.header').removeClass('addfix');
            $(".header").fadeIn(0);
        }
    });
    //$("#func").click(function(){
    //    var lea=$(".body_content4").offset().top;
    //    $("html,body").animate({scrollTop:lea },500);
    //});
    //$("#home").click(function(){
    //    //alert(document.body.scrollTop);
    //    $("html,body").animate({scrollTop: '0px'},500);
    //});
    //$("#abou").click(function(){
    //    //alert($(".gy").offset().top)
    //    //alert(document.documentElement.clientHeight);
    //    var lea=$(".gy").offset().top-220;
    //    $("html,body").animate({scrollTop:lea },500);
    //});
    //回到顶部
    var topbtn = document.getElementById("btnb");
    var timer = null;
    var pagelookheight = document.documentElement.clientHeight;
    window.onscroll = function(){
        var backtop = document.body.scrollTop;
        if(backtop >= pagelookheight){
            $(".btnb").addClass("btnb_ani");
            $(".btnb").removeClass("btnb_ani2");
            topbtn.style.display = "block";
        }else if($(".btnb").hasClass("btnb_ani")){
                topbtn.style.display = "block";
                //topbtn.style.display = "none";
                //$(".btnb").css("left","100%");
                $(".btnb").addClass("btnb_ani2");
                $(".btnb").removeClass("btnb_ani");
        }
    };
    topbtn.onclick = function () {
//        alert("Hello")
        timer = setInterval(function () {
            var backtop = document.body.scrollTop;
            var speedtop = backtop/5;
            document.body.scrollTop = backtop -speedtop;
            if(backtop ==0){
                clearInterval(timer);
            }
        }, 30);
    };
    //导航滑动
    $("#func").click(function(){
        var lea=$(".body_content4").offset().top-120;
        $("html,body").animate({scrollTop:lea },500);
    });
    $("#home").click(function(){
        //alert(document.body.scrollTop);
        $("html,body").animate({scrollTop: '0px'},500);
    });
    $("#abou").click(function(){
        //alert($(".gy").offset().top)
        //alert(document.documentElement.clientHeight);
        var lea=$(".gy").offset().top-130;
        $("html,body").animate({scrollTop:lea },500);
    });
    //注册弹框
    $("#res_btn").click(function(){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap").fadeIn();
    });
    $("#qx_btn").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap").fadeOut(100);
    });
    //注册验证码
    //$(".get_num").click(function(){
    //    var tel=$("#r_tel").val();
    //    var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
    //    if(telReg==false){
    //        tip("请输入正确手机号码")
    //    }else{
    //        //验证码 数据请求
    //        $.post("../Register/getVerifyCode",{telephone:tel,verifyCodeType:"register"},function(msg){
    //            if(msg==1){
    //                tip("您的手机号已注册")
    //            }else if(msg==3){
    //                tip("验证码获取频繁")
    //            }else{
    //                //倒计时
    //                var st=$(".get_num").text();
    //                if(st=="获取验证码"){
    //                    var x=60;
    //                    setInterval(function(){
    //                        if(x<61){
    //                            x--;
    //                            $(".get_num").text(x+"s后获取");
    //                            $(".get_num").css("cursor","no-drop");
    //                            $(".get_num").attr("disabled","disabled");
    //                            $(".get_num").css("opacity","0.6");
    //                            if(x<=1){
    //                                $(".get_num").text("获取验证码");
    //                                $(".get_num").css("cursor","pointer");
    //                                $(".get_num").css("opacity","1");
    //                                $(".get_num").attr("disabled",false);
    //                                x=61
    //                            }
    //                        }
    //                    },1000);
    //                }
    //            }
    //        });
    //
    //    }
    //});
    //注册数据
    //$("#yy_sub").click(function(){
    //    var tel=$("#r_tel").val();
    //    var y_num=$("#y_num").val();
    //    var name=$("#r_name").val();
    //    var grade=$("#r_grade").val();
    //    var pass=$("#r_pass").val();
    //    var pass1=base64encode(utf16to8(pass));
    //    var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
    //    if(telReg==false){
    //        tip("请输入正确手机号码")
    //    }
    //    else if(name==""){
    //        tip("请输入姓名")
    //    }
    //    else if(pass==""){
    //        tip("请输入密码")
    //    }
    //    else{
    //        $.post("../Register/register",{telephone:tel,verifyCode:y_num,userName:name,password:pass1,userGrade:grade},function(msg){
    //            if(msg==1){
    //                $(".fix_form .c10").fadeOut(0);
    //                $(".ok_wrap").fadeIn(0);
    //                setTimeout(function(){
    //                    window.location.href="/index.php/home/TeacherCenter/teacherCenter";
    //                },3000)
    //            }else{
    //                tip(msg)
    //            }
    //        });
    //    }
    //});
    //登录数据
    //$("#log_btn").click(function(){
    //    log();
    //});
    //$("#l_pass").keyup(function(){
    //    if(event.keyCode==13){
    //        log();
    //    }
    //});
    //function log(){
    //    var tel=$("#l_tel").val();
    //    var pass=$("#l_pass").val();
    //    var pass1=base64encode(utf16to8(pass));
    //    var telReg = !!tel.match(/0?(13|14|15|17|18)[0-9]{9}/);
    //    if(telReg==false){
    //        tip("请输入正确手机号码")
    //    }
    //    else if(pass==""){
    //        tip("请输入密码！")
    //    }
    //    else{
    //        $.post("../Login/login",{telephone:tel,password:pass1},function(msg){
    //            if(msg==1){
    //                window.location.href="../TeacherCenter/index";
    //            }
    //            else {
    //                tip(msg);
    //            }
    //        });
    //    }
    //}
    //




    //关于我们
    $(".zp_tp1 img").mouseover(function(){
        $(this).attr("src","/index/Public/img/about/4-2.png")
    });
    $(".zp_tp1 img").mouseleave(function(){
        $(this).attr("src","/index/Public/img/about/4-1.png")
    });
    $(".zp_tp2 img").mouseover(function(){
        $(this).attr("src","/index/Public/img/about/5-2.png")
    });
    $(".zp_tp2 img").mouseleave(function(){
        $(this).attr("src","/index/Public/img/about/5-1.png")
    });

    //加载动画
    $(window).scroll(function(){
        var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
        if(scrollTop>300){
             $(".body_content3 .con_wrap .c4:nth-child(1) .ih-item").animate({"left":"0px","opacity":"1"},50);
             $(".body_content3 .con_wrap .c4:nth-child(3) .ih-item").animate({"left":"0px","opacity":"1"},50);
            $(".body_content3 .con_wrap .c4:nth-child(2) .ih-item").animate({"opacity":"1"},50)
        }
        if(scrollTop>1200){
            $(".liu_nav").animate({"opacity":"1"},200);
            setTimeout(function(){
                $(" .server .li_nav:nth-child(1)").animate({"opacity":"1"},500)
            },200);
            setTimeout(function(){
                $(" .server .li_nav:nth-child(2)").animate({"opacity":"1"},500)
            },300);
            setTimeout(function(){
                $(" .server .li_nav:nth-child(3)").animate({"opacity":"1"},500)
            },400)

        }
    });
    //预约动画
    //if(document.documentElement.clientHeight>$(".set").offset().top){
    //    setTimeout(function(){
    //        //$(".yy_tit").animate({"left":"-10px","opacity":"1"},{easing:"easeOutSine"},1000)
    //        $(".header").animate({"left":"0px","opacity":"1"},{easing:"easeOutSine"},1000)
    //    },400);
    //     setTimeout(function(){
    //         $(".set").animate({"left":"-10px","opacity":"1"},{easing:"easeOutBounce"},500)
    //     },1000)
    //}
    setTimeout(function(){
        //$(".yy_tit").animate({"left":"-10px","opacity":"1"},{easing:"easeOutSine"},1000)
        $(".header").animate({"left":"0px","opacity":"1"},300,'swing');
        $(".body_content1").animate({"right":"0px","opacity":"1"},400,'swing');
        $(".body_content3").animate({"left":"0px","opacity":"1"},300,'swing')
    },2000);

});

(function($){
    $.fn.lubo=function(options){

        // var defaults={

        // }

        // //通过覆盖来传参数
        // var options=$.extend(defaults,options);

        return this.each(function(){

            var _lubo=jQuery('.lubo');

            var _box=jQuery('.lubo_box');

            var _this=jQuery(this); //

            var luboHei=_box.height();

            var Over='mouseover';

            var Out='mouseout';

            var Click='click';

            var Li="li";

            var _cirBox='.cir_box';

            var cirOn='cir_on';

            var _cirOn='.cir_on';

            var cirlen=_box.children(Li).length; //圆点的数量  图片的数量

            var luboTime=2000; //轮播时间

            var switchTime=400;//图片切换时间

            cir();

            Btn();

            //根据图片的数量来生成圆点

            function cir(){

                _lubo.append('<ul class="cir_box"></ul>');

                var cir_box=jQuery('.cir_box');

                for(var i=0; i<cirlen;i++){

                    cir_box.append('<li style="" value="'+i+'"></li>');
                }

                var cir_dss=cir_box.width();

                cir_box.css({

                    left:'44%',

                    marginLeft:-cir_dss/2,

                    bottom:'10%'

                });

                cir_box.children(Li).eq(0).addClass(cirOn);

            }

            //生成左右按钮

            function Btn(){

                _lubo.append('<div class="lubo_btn"></div>');

                var _btn=jQuery('.lubo_btn');

                _btn.append('<div class="left_btn"><</div><div class="right_btn">></div>');

                var leftBtn=jQuery('.left_btn');

                var rightBtn=jQuery('.right_btn');

                //点击左面按钮

                leftBtn.bind(Click,function(){

                    var cir_box=jQuery(_cirBox);

                    var onLen=jQuery(_cirOn).val();

                    _box.children(Li).eq(onLen).stop(false,false).animate({

                        opacity:0

                    },switchTime);

                    if(onLen==0){

                        onLen=cirlen;

                    }

                    _box.children(Li).eq(onLen-1).stop(false,false).animate({

                        opacity:1

                    },switchTime);

                    cir_box.children(Li).eq(onLen-1).addClass(cirOn).siblings().removeClass(cirOn);

                });

                //点击右面按钮

                rightBtn.bind(Click,function(){

                    var cir_box=jQuery(_cirBox);

                    var onLen=jQuery(_cirOn).val();

                    _box.children(Li).eq(onLen).stop(false,false).animate({

                        opacity:0

                    },switchTime);

                    if(onLen==cirlen-1){

                        onLen=-1;

                    }

                    _box.children(Li).eq(onLen+1).stop(false,false).animate({

                        opacity:1

                    },switchTime);

                    cir_box.children(Li).eq(onLen+1).addClass(cirOn).siblings().removeClass(cirOn);

                })
            }

            //定时器

            int=setInterval(clock,luboTime);

            function clock(){

                var cir_box=jQuery(_cirBox);

                var onLen=jQuery(_cirOn).val();

                _box.children(Li).eq(onLen).stop(false,false).animate({

                    opacity:0

                },switchTime);

                if(onLen==cirlen-1){

                    onLen=-1;

                }

                _box.children(Li).eq(onLen+1).stop(false,false).animate({

                    opacity:1

                },switchTime);

                cir_box.children(Li).eq(onLen+1).addClass(cirOn).siblings().removeClass(cirOn);

            }

            // 鼠标在图片上 关闭定时器

            _lubo.bind(Over,function(){

                clearTimeout(int);

            });

            _lubo.bind(Out,function(){

                int=setInterval(clock,luboTime);

            });

            //鼠标划过圆点 切换图片

            jQuery(_cirBox).children(Li).bind(Over,function(){

                var inde = jQuery(this).index();

                jQuery(this).addClass(cirOn).siblings().removeClass(cirOn);

                _box.children(Li).stop(false,false).animate({

                    opacity:0

                },switchTime);

                _box.children(Li).eq(inde).stop(false,false).animate({

                    opacity:1

                },switchTime);

            });


        });

    }

})(jQuery);
