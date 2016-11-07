/**
 * Created by yanan on 2016/1/5.
 */
function load(){
    $("body").fadeIn()
}
$(document).ready(function(){
    $(".pic_btn").click(function(){
        $(".pic_btn2").fadeIn(0);
    });
    $("#submit").click(function(){
        $("#pic").submit();
    })
});