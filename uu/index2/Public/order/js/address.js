/**
 * Created by yanan on 2016/1/5.
 */
(function($) {
    $.imageFileVisible = function(options) {
        var defaults = {
            wrapSelector: null,
            fileSelector:  null ,
            width : '200px',
            height: '200px',
            errorMessage: "请上传正确的图片格式"
        };
        // Extend our default options with those provided.
        var opts = $.extend(defaults, options);
        $(opts.fileSelector).on("change",function(){
            var file = this.files[0];
            var imageType = /image.*/;
            if (file.type.match(imageType)) {
                var reader = new FileReader();
                reader.onload = function(){
                    $("#image-wrap img").remove();
                    var img = new Image();
                    img.src = reader.result;
                    $(img).width( opts.width);
                    $(img).height( opts.height);
                    $( opts.wrapSelector ).append(img);
                    //$("#image-wrap img").fadeOut(0);
                };
                reader.readAsDataURL(file);
            }else{
                alert(opts.errorMessage);
            }
        });
    };
})(jQuery);
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
        var sj="http://localhost/thinkphp/index.php/home/index/allorder"+"/"+localStorage.so;
       window.location.href=sj;
    })
}
$(document).ready(function(){
    $("#result").on("click",function(){
        var x=$(this).find("td").find("h3").text();
       $(".all_id").val(x);
    });
    $(".address_wrap h3").click(function(){
        $(".add_win").slideToggle();
    });
    $(".add_ok a").click(function(){
        var add=$(".all_id").val();
        $(".add_add").append('<p>'+add+'</p>')
    });
    //图片显示
    $.imageFileVisible({wrapSelector: "#image-wrap",
        fileSelector: "#file",
//                width:444,
    });

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
    //筛选触发
    if(localStorage.so==undefined){
        localStorage.g=0;
        localStorage.s=0;
        localStorage.d=0;
        localStorage.x=0;
        localStorage.aa=0;
        localStorage.bb=0;
        localStorage.so=0;
    }
    //$(".choice1 ul li a").eq(localStorage.g).addClass('active');
    //$(".choice2 ul li a").eq(localStorage.s).addClass('active');
    //$(".choice3 ul li a").eq(localStorage.d).addClass('active');
    //$(".choice4 ul li a").eq(localStorage.x).addClass('active');
    $(".sort ul li a").eq(localStorage.so).css("background","#ffffff");
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
});