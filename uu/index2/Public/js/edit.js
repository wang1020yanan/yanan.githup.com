/**
 * Created by yanan on 2016/1/18.
 */
/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
//审核状态
$(document).ready(function(){
    $.post("/index.php/home/TeacherCenter/getDetailVerifyResult",function(msg){
        if(msg==3){
            $("#status").text("您的个人资料由于以下原因审核失败,请修改后重新提交审核！");
            $("#status_wrap").css("background","#fff");
            $("#status_wrap").css("color","#FF1919");
            $("#status_wrap").css("border","1px solid #FF1919")
        }else if(msg==2){
            $("#status").text("您的个人资料已提交审核，请耐心等待！");
            $("#status_wrap").css("background","#fff");
            $("#status_wrap").css("color","#0EB621");
            $(".refresh").fadeIn(0);
            $("#status_wrap").css("border","1px solid #EFDE14");
            $("#edit").attr("onclick","return false").css( "opacity","0.3");
        }else if(msg==1){
            $("#status").text('个人资料已通过审核，如需要更改请点击编辑按钮！');
            $("#status_wrap").css("background","#fff");
            $("#status_wrap").css("color","#0EB621");
            $("#status_wrap").css("border","1px solid #0EB621");
        }
    });
});