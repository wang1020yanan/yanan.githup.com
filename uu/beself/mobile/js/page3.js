/**
 * Created by adc on 2015/9/17.
 */

$(document).ready(
    function(){
        $(".gman").click(
            function(){
                $(".gmym").animate({top:'27em'},400)
            }
        );
        $(".gmqxan").click(
            function(){
                $(".gmym").animate({top:'-27em'},400)
            }
        );
        $("#fxan").click(
            function(){
                $("#fxym").animate({top:'16em'},400)
            }
        );
        $("#fxqxan").click(
            function(){
                $("#fxym").animate({top:'-16em'},400)
            }
        );
    }
);
