/**
 * Created by yanan on 2016/1/12.
 */
//enter搜索
setInterval(function(){
    $.post("../Verify/getCount",function(msg){
        var ver=eval('('+ msg +')');
        if(ver["verifyCount"]>0){
            $("#ver").text('('+ver["verifyCount"]+')');
        }
        if(ver["detailCount"]>0){
            $("#det").text('('+ver["detailCount"]+')');
        }
    })
},6000);
$(document).ready(function(){
    $.post("../Verify/getCount",function(msg){
        var ver=eval('('+ msg +')');
        if(ver["verifyCount"]>0){
            $("#ver").text('('+ver["verifyCount"]+')');
        }
        if(ver["detailCount"]>0){
            $("#det").text('('+ver["detailCount"]+')');
        }
    });
    $("#search").keyup(function(){
        if(event.keyCode==13){
            alert("暂无此功能");
        }
    });
});