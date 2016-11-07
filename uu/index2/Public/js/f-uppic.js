/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
$(document).ready(function(){
    //$(".pic_btn").click(function(){
    //    $(".pic_btn2").fadeIn(0);
    //});
    $("#submit").click(function(){
        var dydz=$("#file").val();
        var dydz2=$("#file2").val();
        var img1= $("#image-wrap img").attr("src");
        var img2= $("#image-wrap2 img").attr("src");
        var name=$("#name").val();
        var card=$("#card").val();
        var record=$("#record").val();
        var college=$("#college").val();
        var professional=$("#professional").val();
        var cardReg = !!card.match(/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/);
        if(cardReg==false){
            alert("不合法身份证")
        }else if(name.length<2){
            alert("请输入真实姓名")
        }else if(record==""||college==""||professional==""){
            alert("学校信息不完整")
        }else if(img1==""){
            alert("请设置身份认证图片")
        }else if(img2==""){
            alert("请设置学校认证图片")
        }else if(professional.length>10){
            alert("专业名称不得超过十个字")
        }else{
            $("#form").submit();
        }
        //}else{
        //    $.post("http://localhost/test/yuyuetest.php",{name:name,card:card},function(e){
        //        if(e!==1){
        //            alert("成功");
        //            $("#pic").submit();
        //        }
        //    });
        //}
    })
});