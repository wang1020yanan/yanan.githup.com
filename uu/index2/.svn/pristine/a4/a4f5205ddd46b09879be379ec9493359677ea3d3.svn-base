/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
$(document).ready(function(){
    //头像属性
    var xxx=$("#image-wrap img").attr("src");
    //字数恢复
    var per_l=200-$("#tc_per").val().length;
    $("#tc_per").next().text("您还可以输入"+per_l+"字");

    var spe_l=200-$("#tc_spe").val().length;
    $("#tc_spe").next().text("您还可以输入"+spe_l+"字");

    var thr_l=200-$("#tc_thr").val().length;
    $("#tc_thr").next().text("您还可以输入"+thr_l+"字");

    var hav_l=200-$("#tc_hav").val().length;
    $("#tc_hav").next().text("您还可以输入"+hav_l+"字");
    //原有教龄-----------------------------------------------------------------------------
    $.post("/index/home/TeacherCenter/getTeachingAge",function(age){
        $("#tc_age option").eq(age-1).attr("selected","selected");
    });
    //个人资料数据
   $("#sub").click(function(){
       var introduce=$("#tc_per").val();
       var features=$("#tc_spe").val();
       if(introduce==""||features==""){
           alert("标记星号的为必填信息且不少于10个字！")
       }else if(xxx=="/index/Public/img/center/def-im.png"){
           alert("请设置头像！");
       }
       else{
           $("#person").submit();
       }
      //var subjectsObj=document.getElementById("tc_age");
      //var first=subjectsObj.value;
      //var sign=$("#sign").val();
      //var introduce=$("#tc_per").val();
      //var features=$("#tc_spe").val();
      //var experience=$("#tc_thr").val();
      //var honor=$("#tc_hav").val();
      //    $.post("http://localhost/test/yuyuetest.php",{sign:sign,first:first,introduce:introduce,features: features,experience:experience,honor:honor},function(msg){
      //        //var obj = eval('(' + msg + ')');
      //        //alert(obj.name);
      //        if(msg!==1){
      //            alert("资料提交成功");
      //        }
      //    });
   });
   $(".goback").click(function(){
       window.history.back();
   })

});