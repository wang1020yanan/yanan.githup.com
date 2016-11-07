/**

 */
$(document).ready(function(){
    var mySwiper = new Swiper('.swiper-container',{
        effect:'fade',
        loop: true,
        autoplay: 3000,
    });
    $("#cdcd").click(
        function(){
            $(this).hide();
            $("#yccdcd").show();
            $("#yccd").animate(
                {
                   left:'50%'
                },500
            )
        }
    );
    $("#yccdcd").click(
        function(){
            $(this).hide();
            $("#cdcd").show();
            $("#yccd").animate(
                {
                    left:'-50%'
                },500
            );
        }
    );
    $("#zhzh").click(
        function(){
            $(this).hide();
            $("#yczhzh").show();
            $("#yczh").animate(
                {left:'-50%'},500
            )
        }
    );
    $("#yczhzh").click(
        function(){
            $(this).hide();
            $("#zhzh").show();
            $("#yczh").animate(
                {left:'50%'},500
            );
        }
    );


});
