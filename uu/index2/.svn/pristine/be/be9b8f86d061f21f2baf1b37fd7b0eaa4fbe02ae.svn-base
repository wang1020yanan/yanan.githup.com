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
        var sj="http://localhost/thinkphp/index.php/home/index/teacher"+'/'+localStorage.g+'/'+localStorage.aa+'/'+localStorage.d+'/'+localStorage.bb+"/"+localStorage.so;
       window.location.href=sj;
    })
}
$(document).ready(function(){
    //更多信息隐藏
    $(".more").click(function(){
        $(this).next().slideToggle()
    });
    //更多信息隐藏
    $(".less").click(function(){
        $(this).parent().slideToggle()
    });
    //性别教员遍历
    var tc_num=$(".need_wrap").children().length;
    for(var i=0;i<tc_num;i++){
        var sex=$(".need_wrap").children().eq(i).find(".tc_sex").text();
        if(sex=="女"){
            $(".need_wrap").children().eq(i).find(".sex_im").addClass("fa-venus");
            $(".need_wrap").children().eq(i).find(".sex_im").css("color","hotpink")
        }else{
            $(".need_wrap").children().eq(i).find(".sex_im").addClass(" fa-mars");
            $(".need_wrap").children().eq(i).find(".sex_im").css("color","#0a74f6")
        }
        //评分
        var lv=$(".need_wrap").children().eq(i).find(".tc_core").text();
        if(lv==0){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>0&&lv<1){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==1){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==2){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==3){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==4){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv==5){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>');
        }
        else if(lv>1&&lv<2){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>2&&lv<3){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>3&&lv<4){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>&nbsp;<i class="fa fa-star-o"></i>');
        }else if(lv>4&&lv<5){
            $(".need_wrap").children().eq(i).find(".tc_star").append('<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star-half-o"></i>');
        }
    }
    //支付方式
    $(".pay span:nth-child(1)").click(function(){
        $(".pay span i").addClass("hid");
        $(this).find("i").removeClass("hid");
    });
    $(".pay span:nth-child(2)").click(function(){
        $(".pay span i").addClass("hid");
        $(this).find("i").removeClass("hid");
    })
});