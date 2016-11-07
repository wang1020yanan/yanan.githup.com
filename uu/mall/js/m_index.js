/**
 * Created by yanan on 2016/1/12.
 */
//禁止

$(document).ready(function(){
     $(".menu_btn").click(function(){
         $(this).css("opacity","0.8");
         $(".menu").slideToggle();
     });
});