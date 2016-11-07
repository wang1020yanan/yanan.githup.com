/**
 * Created by Administrator on 2015/8/31.
 */

$(document).ready(
    function(){
        $("#jian").click(function(){
                var num=$("#shuliang").attr("value");
                var  num2=num-1;
                if(num2<1){
                    alert("购买数量不能小于1")
                    return;
                }
                $("#shuliang").attr("value",num2);
                var dj=$("#danjia").html();
                var zj=dj*num2;
                $("#zjzj").html(zj);
                $("#jsjs").html(zj);
            }
        );
        $("#jia").click(
            function(){
                var num=$("#shuliang").attr("value");
                var  num3=++num;
                if(num3>20){
                    alert("购买数量不能大于20")
                    return;
                }
                $("#shuliang").attr("value",num3);
                var dj=$("#danjia").html();
                var zj=dj*num3;
                $("#zjzj").html(zj);
                $("#jsjs").html(zj);
            }
        );
    }
);