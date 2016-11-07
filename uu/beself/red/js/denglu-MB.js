/**
 * Created by ADC on 2015/8/28.
 */
$(document).ready(
    function(){
        $("#dl").mouseover(
            function(){
                $("#dl").css('background','#FF9900')
            }
        );
        $("#dl").mouseleave(
            function(){
                $("#dl").css('background','#FF7700')
            }
        )
    }
)