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
                localStorage.aa=33 ;
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
        var sj="http://localhost/thinkphp/index.php/home/index/teacher"+'/'+localStorage.g+'/'+localStorage.aa+'/'+localStorage.d+'/'+localStorage.bb+"/"+localStorage.so;
       window.location.href=sj;
    })
}
$(document).ready(function(){
     $(".p_order").hover(function(){
         $(this).find(".sanjiao").css("border-color","#fff #54C5F5 #fff #fff")
     });
    $(".p_order").mouseleave(function(){
        $(this).find(".sanjiao").css("border-color","#fff #F4F4F4 #fff #fff")
    });
    //性别教员遍历
    var tc_num=$(".p_order_wrap").children().length;
    for(var i=0;i<tc_num;i++){
        //var sex=$(".tc_all").children().eq(i).find(".tc_sex").text();
        //if(sex=="女"){
        //    $(".tc_all").children().eq(i).find(".sex_im").addClass("fa-venus");
        //    $(".tc_all").children().eq(i).find(".sex_im").css("color","hotpink")
        //}else{
        //    $(".tc_all").children().eq(i).find(".sex_im").addClass(" fa-mars");
        //    $(".tc_all").children().eq(i).find(".sex_im").css("color","#0a74f6")
        //}
        //评分
        var lv=$(".p_order_wrap").children().eq(i).find(".tc_core").text();
        if(lv==0){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>0&&lv<1){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==1){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==2){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==3){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==4){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==5){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>');
        }
        else if(lv>1&&lv<2){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>2&&lv<3){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>3&&lv<4){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>4&&lv<5){
            $(".p_order_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>');
        }
    }
});