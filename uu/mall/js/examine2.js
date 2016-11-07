/**
 * Created by yanan on 2016/1/12.
 */
//审核结果
function sub(){
    var data;
    if($("#data").hasClass("isman")){
        data="1"
    }else{
        data="0";
    }
    if(data==1){
            $("#all").addClass("isman");
            $("#all").css("background","#0EB621");
            $("#all").next().next().css("background","none");
            all=1;
    }else{
            $("#all").removeClass("isman");
            $("#all").css("background","none");
            $("#all").next().next().css("background","#0EB621");
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