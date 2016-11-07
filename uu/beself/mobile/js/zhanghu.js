/**
 * Created by Administrator on 2015/9/1.
 */

$(document).ready(function(){
    $('#search').click(function(){
        $('.nav-a').hide();
        $('.nav-b').show();
        $('.nav-b input').focus();
    });
    $('#xx').click(function(){
        $('.nav-b').hide();
        $('.nav-a').show();
    });
    $('.lun img').mouseover(function(){
        $('.nav-b').hide();
        $('.nav-a').show();
    });

    $('#yone-1').hover(function(){
        $('.menu').show();
        $('#y-1').show();
        $('#y-2').hide();
    });
    $('#yone-2').hover(function(){
        $('.menu').show();
        $('#y-2').show();
        $('#y-1').hide();
    });

    $('#cycle').hover(function(){
        $('.menu').hide();
    });
});