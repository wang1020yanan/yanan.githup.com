/**
 * Created by yanan on 2016/1/12.
 */
//审核结果
function sub(){
    var data;
    var card;
    var edu;
    if($("#data").hasClass("isman")){
        data="1"
    }else{
        data="0";
    }
    if($("#card").hasClass("isman")){
        card="1"
    }else{
        card="0";
    }
    if($("#edu").hasClass("isman")){
        edu="1"
    }else{
        edu="0";
    }
    if(data==1&&card==1&&edu==1){
            $("#all").text("通过审核").css("color","#0EB621");
             //$("#all").css("color","#0EB621");
            all=1;
            $(".text").fadeOut(0);
        }else{
        $("#all").text("审核失败").css("color","#FF1A1E");
        $(".text").fadeIn(0);
            all=0;
    }
}
//提交
function sub2(){
    if(all==1){
        $.post("",{},function(msg){
            //审核结果
            alert("提交成功")
        })
    }else{
        var reason=$("#reason").val();
        if(reason==""){
            alert("请输入原因！")
        }else{
            $.post("",{},function(msg){
                //审核结果
                alert("提交成功")
            })
        }
    }
}
$(document).ready(function(){
    //刷新
    setInterval(function(){
        sub();
    },100);
    $("#res_qr").click(function(){
        sub2();
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