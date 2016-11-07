/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
function Click(){
    window.event.returnValue=false;
}
document.oncontextmenu=Click;
function resetChoice(){
    localStorage.g=0;
    localStorage.s=0;
    localStorage.d=0;
    localStorage.x=0;
    localStorage.so=0;
}
function cg(obj,y){
    var g;
    obj.click(function(){
        //obj.removeClass("active");
        $(this).addClass("active");
        if(y=="g"){
            localStorage.g= $(this).parent().index()-1;
        }else if (y=="s"){
            localStorage.s=$(this).parent().index()-1;
            if($(this).parent().index()-1>=2&&$(this).parent().index()-1<=4) {
                localStorage.aa= 20;
            }else if($(this).parent().index()-1==5){
                localStorage.aa=23 ;
            }else if($(this).parent().index()-1>5&&$(this).parent().index()-1<=7){
                localStorage.aa=30;
            }else if($(this).parent().index()-1==8){
                localStorage.aa=33;
            }else{
                localStorage.aa=$(this).parent().index()-1;
            }
        }else if (y=="d"){
            localStorage.d= $(this).parent().index()-1;
        }
        else if (y=="x"){
            localStorage.x=$(this).parent().index()-1;
            if($(this).parent().index()-2==-1){
                localStorage.bb=2;
            }else{
                localStorage.bb= $(this).parent().index()-2;
            }
        }else if (y=="so"){
            localStorage.so= $(this).parent().index();
        }
        var sj="../index/teacher.html"+'?g='+localStorage.g+'&aa='+localStorage.aa+'&d='+localStorage.d+'&bb='+localStorage.bb+"&so="+localStorage.so;
        window.location.href=sj;
    })
}
$(document).ready(function(){
    //筛选触发
    if(localStorage.g==undefined){
        localStorage.g=0;
        localStorage.s=0;
        localStorage.d=0;
        localStorage.x=0;
        localStorage.aa=0;
        localStorage.bb=0;
        localStorage.so=2;
    }
    $(".choice1 ul li a").eq(localStorage.g).addClass('active');
    $(".choice2 ul li a").eq(localStorage.s).addClass('active');
    $(".choice3 ul li a").eq(localStorage.d).addClass('active');
    $(".choice4 ul li a").eq(localStorage.x).addClass('active');
    $(".sort ul li a").eq(localStorage.so).addClass('active');
    cg($(".choice1 li a"),"g");
    cg($(".choice2 li a"),"s");
    cg($(".choice3 li a"),"d");
    cg($(".choice4 li a"),"x");
    cg($(".sort li a"),"so");
   //性别教员遍历
   var tc_num=$(".tc_all").children().length;
   for(var i=0;i<tc_num;i++){
      var sex=$(".tc_all").children().eq(i).find(".tc_sex").text();
      if(sex=="女"){
          $(".tc_all").children().eq(i).find(".sex_im").addClass("fa-venus");
          $(".tc_all").children().eq(i).find(".sex_im").css("color","hotpink")
      }else{
          $(".tc_all").children().eq(i).find(".sex_im").addClass(" fa-mars");
          $(".tc_all").children().eq(i).find(".sex_im").css("color","#0a74f6")
      }
       //评分
      var lv=$(".tc_all").children().eq(i).find(".tc_core").text();
       if(lv==0){
               $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv>0&&lv<1){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv==1){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv==2){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv==3){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv==4){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv==5){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>');
       }
       else if(lv>1&&lv<2){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv>2&&lv<3){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv>3&&lv<4){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
       }else if(lv>4&&lv<5){
           $(".tc_all").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>');
       }
   }
    //学生性别
    var p_sex=$(".pr_new .tc_sex").text();
    if(p_sex=="女"){
        $(".pr_name .sex_im").addClass("fa-venus").css("color","hotpink");
    }else{
        $(".pr_name .sex_im").addClass("fa-mars").css("color","#0a74f6");
    }
    //找老师弹框
    $("#find").click(function(){
        $(".fix_window").fadeIn(100);
        $("#find_wrap").fadeIn();
    });
    $(".find_close").click(function(){
        $(".fix_window").fadeOut();
        $("#find_wrap").fadeOut(100);
    });
    //发需求弹框
    $("#need").click(function(){
        $(".fix_window").fadeIn(100);
        $("#need_wrap").fadeIn();
    });
    $(".need_close").click(function(){
        $(".fix_window").fadeOut();
        $("#need_wrap").fadeOut(100);
    });
});