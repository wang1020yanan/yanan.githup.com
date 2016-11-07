/**
 * Created by GaoYang on 2015/8/31.
 */
$(document).ready(function(){
    jQuery(window).scroll( function () {
        if(jQuery(window).scrollTop()>50){
            $('.menu2').addClass('add');
        }else{
            $('.menu2').removeClass('add');
        }
    });

    var mySwiper = new Swiper('#s1',{
        effect:'fade',
        loop: true,
        autoplay: 3000,
        pagination : '.swiper-pagination',
        paginationClickable :true
    });
});