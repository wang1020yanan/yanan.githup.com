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
    $(".comments_tip span").click(function(){
        $(this).toggleClass("other")
    });
    $(".eval_star i").click(function(){
        $(this).siblings().removeClass("fa-star").addClass("fa-star-o");
        $(this).removeClass("fa-star-o").addClass("fa-star");
        $(this).prevAll().removeClass("fa-star-o").addClass("fa-star")
    });
    $(".eval_btn").click(function(){
           $(".eval_window").removeClass("hid")
    });
    $(".fa-close").click(function(){
        $(".eval_window").addClass("hid")
    })
});