/**
 * Created by yanan on 2016/1/12.
 */
//审核结果
function sub(){
    if($("#data").hasClass("isman")){
        dataa="1"
    }else{
        dataa="3";
    }
    //if($("#card").hasClass("isman")){
    //    card="1"
    //}else{
    //    card="3";
    //}
    //if($("#edu").hasClass("isman")){
    //    edu="1"
    //}else{
    //    edu="3";
    //}
    if(dataa==1){
        $("#all").text("通过审核").css("color","#0EB621");
        //$("#all").css("color","#0EB621");
        all=1;
        $(".text").fadeOut(0);
    }else{
        $("#all").text("审核失败").css("color","#FF1A1E");
        $(".text").fadeIn(0);
        all=3;
    }
}
//提交
function post_ok(){
    userId=$("#username").text();
    //alert(userId);
    $.post("http://www.uustudy.com.cn/uuuutest/thinkphp/index.php/Admin/verify/detailDetermine",{userID:userId,ifUploadProfile:dataa,verifyDesciption:reason},function(msg){
        //alert(msg);
        if(msg==1){
            window.location.href="http://www.uustudy.com.cn/uuuutest/thinkphp/index.php/admin/Verify/detailList"
        }else{
            alert("此教师已经被审核");
            window.location.href="http://www.uustudy.com.cn/uuuutest/thinkphp/index.php/admin/Verify/detailList"
        }
    })
}
function sub3(){
    if(all==1){
        reason="";
        post_ok();
    }else{
        reason=$("#reason").val();
        if(reason==""){
            alert("请输入原因！")
        }else{
            post_ok();
        }
    }
}
//确认提交
function sub2(){
    if(all==1){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap").fadeIn();
    }else{
        var reason=$("#reason").val();
        if(reason==""){
            alert("请输入原因！")
        }else{
            $(".fix_window").fadeIn(100);
            $(".fix_wrap").fadeIn();
        }
    }
}
$(document).ready(function(){
    //注册弹框
    $("#qx_btn").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap").fadeOut(100);
    });
    $("#sub_no").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap").fadeOut(100);
    });
    //刷新
    setInterval(function(){
        sub();
    },100);
    $("#res_qr").click(function(){
        sub2();
    });
    $("#sub_ok").click(function(){
        sub3();
    });
    //审核
    $(".woman").click(function(){
        $(this).prev().prev().removeClass("isman");
        $(this).css("background","#0EB621");
        $(this).prev().prev().css("background","none");
    });
    $(".man").click(function(){
        $(this).addClass("isman");
        $(this).css("background","#0EB621");
        $(this).next().next().css("background","none");
    });

});