$(function(){
    //轮播初始化
    $(".flexslider").flexslider({
        animation: "slide",
        directionNav: true,
        controlNav: false,
        initDelay: 0,
        slideshowSpeed: 5000,
        after: function(slide) {
            //因为使用了lazyload，所以在这里手工将这些图置为显示状态
            var img = slide.find('.flex-active-slide img');
            if (img.attr('data-src')) {
                img.attr('src', img.attr('data-src'));
                img.attr('data-src', "");
            }
        }
    });
});