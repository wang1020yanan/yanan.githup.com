/**

 */
$(document).ready(function(){
    var mySwiper = new Swiper('.swiper-container',{
        effect:'fade',
        loop: true,
        autoplay: 3000,
    });
    $("#dpcsan").click(
        function(){
            $("#dpcsan").css("color","#ff9801");
            $("#dpxqan").css("color","black");
            $("#dpxq").hide();
            $("#dpcs").show()
        }
    );
    $("#dpxqan").click(
        function(){
            $("#dpxqan").css("color","#ff9801");
            $("#dpcsan").css("color","black");
            $("#dpcs").hide();
            $("#dpxq").show()
        }
    )
});
