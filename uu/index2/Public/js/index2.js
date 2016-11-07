/**
 * Created by yanan on 2016/1/5.
 */
function tip(msg){
    $(".tip_box").text(msg).fadeIn();
    setTimeout(function(){
        $(".tip_box").fadeOut(1500);
    },500)
}
function load(){
    $("body").fadeIn();
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 5000,
        pagination : '.swiper-pagination',
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
        paginationClickable :true,
        effect : 'fade',
        fade: {
            crossFade: false,
        }
//            effect : 'fade',
//            fade: {
//                crossFade: false,
//            }
    })
}
function Click(){
    window.event.returnValue=false;
}
document.oncontextmenu=Click;
$(document).ready(function(){
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
    //var screenwidth = window.screen.width;
    //if(screenwidth < 1000){
    //    $(".body_content1 img").css("top","0px");
    //    //window.location.href="/index/home/index/m_index.html";
    //}
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
    //添加抖动
    //$(".body_content3 img").mouseover(function(){
    //    $(this).addClass("shut");
    //});
    //$(".body_content3 img").mouseleave(function(){
    //    $(this).removeClass("shut");
    //});
    $(".tipto").mouseover(function(){
        $(this).children().addClass("tipdo");
    });
    $(".tipto").mouseleave(function(){
        $(this).children().removeClass("tipdo");
    });
    jQuery(window).scroll( function () {
        if(jQuery(window).scrollTop()>600){
            $('.header').addClass('addfix');
            $(".addfix").fadeIn(1000);
        }
        else{
            $(".addfix").fadeOut(0);
            $('.header').removeClass('addfix');
            $(".header").fadeIn(0);
        }
    });
    $("#func").click(function(){
        var lea=$(".body_content4").offset().top-60;
        $("html,body").animate({scrollTop:lea },500);
    });
    $("#home").click(function(){
        //alert(document.body.scrollTop);
        $("html,body").animate({scrollTop: '0px'},500);
    });
    $("#abou").click(function(){
        //alert($(".gy").offset().top)
        //alert(document.documentElement.clientHeight);
        var lea=$(".gy").offset().top-100;
        $("html,body").animate({scrollTop:lea },500);
    });
    //回到顶部
    var topbtn = document.getElementById("btnb");
    var timer = null;
    var pagelookheight = document.documentElement.clientHeight;

    window.onscroll = function(){
//        alert("hello");
        var backtop = document.body.scrollTop;
        if(backtop >= pagelookheight){
            topbtn.style.display = "block";
        }else{
            topbtn.style.display = "none";
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
        if(scrollTop>1400){
            $(".liu_nav").animate({"opacity":"1"},500)
            setTimeout(function(){
                $(" .server .li_nav:nth-child(1)").animate({"opacity":"1"},300)
            },200);
            setTimeout(function(){
                $(" .server .li_nav:nth-child(2)").animate({"opacity":"1"},300)
            },400);
            setTimeout(function(){
                $(" .server .li_nav:nth-child(3)").animate({"opacity":"1"},300)
            },600)

        }
    });
    //预约动画
    if(document.documentElement.clientHeight>$(".set").offset().top){
        setTimeout(function(){
            $(".yy_tit").animate({"left":"-10px","opacity":"1"},{easing:"easeOutSine"},1000)
        },400);
         setTimeout(function(){
             $(".set").animate({"left":"-10px","opacity":"1"},{easing:"easeOutBounce"},500)
         },1000)
    }
});
