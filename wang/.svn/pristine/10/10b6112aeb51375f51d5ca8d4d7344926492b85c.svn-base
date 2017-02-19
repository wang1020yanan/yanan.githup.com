$(function(){
    //懒加载
    $(".home_chunk img").each(function () {
        var src=$(this).attr("src");
        $(this).attr("original",src).addClass("lazy");
    });
    $("img.lazy").lazyload({
        effect: "fadeIn",
        threshold:"0"
    });

});