/**
 * Created by ADC on 2015/8/28.
 */
$(document).ready(
    function(){
        $("#an1").click(
            function(){
                $(this).fadeOut(0);
                $("#a-sq").animate({width:"50px"},2000);
                setTimeout(
                    function(){
                        $("#a-sq").fadeOut(100)
                    },2000
                );
                setTimeout(
                    function(){
                        $("#jp").fadeIn()
                    },2100
                );
            }
        );
        $("#lq").click(
            function(){
                alert("领取成功")
            }
        )
    }
);