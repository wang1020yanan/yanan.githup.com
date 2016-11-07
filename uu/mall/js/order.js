/**
 * Created by yanan on 2016/2/1.
 */
/**
 * Created by yanan on 2016/2/1.
 */
$(document).ready(function(){
    $("#userId").val(localStorage.score);
    $("#product").val($(".tit").text());
    var price=$("#price").text();
    var score=localStorage.score;
    //alert(price);
    //alert(score);
    if(price/score>1){
        $(".btn").text("积分不足").css("background","#787C80").attr("disabled","disabled");
    }
    //请求用户积分数量
    //var userId=$("#userId").val();
    //$.post("",{userId:userId},function(msg){
    //    msg=2;
    //    var price=$("#price").text();
    //     if(msg<price){
    //         $(".btn").text("积分不足").css("background","#787C80").attr("disabled","disabled");
    //     }
    //});
    $(".btn").click(function(){
        var product=$("#product").val();
        var address=$("#address").val();
        var name=$("#name").val();
        var telephone=$("#telephone").val();
        var zip=$("#zip").val();
        if(address.length<1||name.length<1||telephone.length<1||zip.length<1){
            $(".tips").fadeIn(0);
        }else{
            $(".tips").fadeOut(0);
            $("#receivingInformation").submit();
        }
    });
    $("input").click(function(){
        $(".tips").fadeOut(0);
    })
});
