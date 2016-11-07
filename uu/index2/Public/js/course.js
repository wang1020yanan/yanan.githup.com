/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
$(document).ready(function(){
    //原有课程获取
    $.post("/index/Home/TeacherCenter/getCourse",function(msg){
        var getPro=eval('('+msg+ ')');
        if(msg.length==2){
            $("#courseTip").fadeIn(0);
        }else{
            $("#courseTip").fadeOut(0);
        }
        var getNum=getPro.length;
        if(getNum>0){
            $("#submit").css("opacity","1");
            $("#submit").css("cursor","pointer");
        }
        for(var q=0;q<getNum;q++){
            var getCourse=getPro[q].coursetype+''+getPro[q].coursegrade+''+getPro[q].coursemoney;
            if(getCourse=="1145"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/1.png'></div>");
                $("#y11").attr("checked","checked");
            }else if(getCourse=="12055"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/2.png'></div>");
                $("#y22").attr("checked","checked");
            }else if(getCourse=="12365"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/3.png'></div>");
                $("#y33").attr("checked","checked");
            }else if(getCourse=="13075"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/4.png'></div>");
                $("#y44").attr("checked","checked");
            }else if(getCourse=="13395"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/5.png'></div>");
                $("#y55").attr("checked","checked");
            }else if(getCourse=="2145"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/6.png'></div>");
                $("#s11").attr("checked","checked");
            }else if(getCourse=="22055"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/7.png'></div>");
                $("#s22").attr("checked","checked");
            }else if(getCourse=="22365"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/8.png'></div>");
                $("#s33").attr("checked","checked");
            }else if(getCourse=="23075"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/9.png'></div>");
                $("#s44").attr("checked","checked");
            }else if(getCourse=="23395"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/10.png'></div>");
                $("#s55").attr("checked","checked");
            }else if(getCourse=="3145"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/11.png'></div>");
                $("#e11").attr("checked","checked");
            }else if(getCourse=="32055"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/12.png'></div>");
                $("#e22").attr("checked","checked");
            }else if(getCourse=="32365"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/13.png'></div>");
                $("#e33").attr("checked","checked");
            }else if(getCourse=="33075"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/14.png'></div>");
                $("#e44").attr("checked","checked");
            }else if(getCourse=="33395"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/15.png'></div>");
                $("#e55").attr("checked","checked");
            }else if(getCourse=="4145"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/16.png'></div>");
                $("#w11").attr("checked","checked");
            }else if(getCourse=="42055"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/17.png'></div>");
                $("#w22").attr("checked","checked");
            }else if(getCourse=="42365"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/18.png'></div>");
                $("#w33").attr("checked","checked");
            }else if(getCourse=="43075"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/19.png'></div>");
                $("#w44").attr("checked","checked");
            }else if(getCourse=="43395"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/20.png'></div>");
                $("#w55").attr("checked","checked");
            }else if(getCourse=="5145"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/21.png'></div>");
                $("#h11").attr("checked","checked");
            }else if(getCourse=="52055"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/22.png'></div>");
                $("#h22").attr("checked","checked");
            }else if(getCourse=="52365"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/23.png'></div>");
                $("#h33").attr("checked","checked");
            }else if(getCourse=="53075"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/24.png'></div>");
                $("#h44").attr("checked","checked");
            }else if(getCourse=="53395"){
                $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/25.png'></div>");
                $("#h55").attr("checked","checked");
            }
        }
    });
    //弹框//忘记密码弹框
    $("#add").click(function(){
        $(".fix_window").fadeIn(100);
        $(".fix_wrap").fadeIn();
    });
    $("#qx_btn").click(function(){
        $(".fix_window").fadeOut();
        $(".fix_wrap").fadeOut(100);
        window.location.reload();
    });
//tab切换
    $(".cu_menu li").click(function(){
         $(".cu_menu li").css("background","#EAEAEA");
         $(this).css("background","#fff");
         var i=$(this).index();
         $(".cu_con form").fadeOut(0);
         $(".cu_con form").eq(i).fadeIn();
    });
//课程获取并提交后台
    $("#su_sub").click(function(){
        //课程数组
        arr= new Array();
        $("input[type=checkbox]").each(function(){
            if($(this).prop("checked")){
                var a=$(this).val();
                arr.push(a);
            }
        });
        //课程json
        //var project=arr.toString();
        jso = {};
        for(var i=0;i<arr.length;i++)
        {
            jso[i]=arr[i];
        }
        //获取到的结果
        project=JSON.stringify(jso);
        //本地添加卡片
        num=arr.length;

            //清空现有卡片
            $(".con_prook").empty();
            //下一步可用
            //$("#submit").setAttribute("disabled",true);
            $("#submit").css("opacity","1");
            $("#submit").css("cursor","pointer");
            for(var i=0;i<num;i++){
                //添加卡片
                var subject=arr[i];
                //alert(subject[0]+subject[1]);
                if(subject=="1|01|45"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/1.png'></div>");
                }else if(subject=="1|20|55"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/2.png'></div>");
                }else if(subject=="1|23|65"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/3.png'></div>");
                }else if(subject=="1|30|75"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/4.png'></div>");
                }else if(subject=="1|33|95"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/5.png'></div>");
                }else if(subject=="2|01|45"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/6.png'></div>");
                }else if(subject=="2|20|55"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/7.png'></div>");
                }else if(subject=="2|23|65"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/8.png'></div>");
                }else if(subject=="2|30|75"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/9.png'></div>");
                }else if(subject=="2|33|95"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/10.png'></div>");
                }else if(subject=="3|01|45"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/11.png'></div>");
                }else if(subject=="3|20|55"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/12.png'></div>");
                }else if(subject=="3|23|65"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/13.png'></div>");
                }else if(subject=="3|30|75"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/14.png'></div>");
                }else if(subject=="3|33|95"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/15.png'></div>");
                }else if(subject=="4|01|45"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/16.png'></div>");
                }else if(subject=="4|20|55"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/17.png'></div>");
                }else if(subject=="4|23|65"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/18.png'></div>");
                }else if(subject=="4|30|75"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/19.png'></div>");
                }else if(subject=="4|33|95"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/20.png'></div>");
                }else if(subject=="5|01|45"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/21.png'></div>");
                }else if(subject=="5|20|55"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/22.png'></div>");
                }else if(subject=="5|23|65"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/23.png'></div>");
                }else if(subject=="5|30|75"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/24.png'></div>");
                }else if(subject=="5|33|95"){
                    $(".con_prook").append("<div class='c3 course'> <img src='/uuuutest/thinkphp/Public/img/certification/card/25.png'></div>");
                }
            }
            $(".fix_window").fadeOut(0);
            $(".fix_wrap").fadeOut(0);
            //数据提交
            var len=arr.length;
            pro=[];
            for(var j=0;j<len;j++){
                var yw=arr[j][2]+arr[j][3];
                if(yw=="01"){
                    yw="1";
                }
                pro.push({courseType:arr[j][0],courseGrade:yw,courseMoney:arr[j][5]+arr[j][6]});
            }
            ttt=JSON.stringify(pro);
            if(ttt.length==2){
                $("#courseTip").fadeIn(0);
            }else{
                $("#courseTip").fadeOut(0);
            }
            $.post("/index/home/TeacherCenter/setCourse",{project:ttt},function(msg){
                //课程保存后跳转
                //alert("课程保存成功！");
                //window.location="https://www.baidu.com/";
            });


    });

    $(".pic_btn").click(function(){
        $(".pic_btn2").fadeIn(0);
    });
});