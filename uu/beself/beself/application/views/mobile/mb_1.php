<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <title>Beself+</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/shouye1.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/swiper.min.js"></script>

    <script>
        $(document).ready(function(){
            var screenwidth = window.screen.width;
            if(screenwidth > 1000){
                window.location.href="<?php echo site_url('welcome/index')?>";
            }
        });
    </script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--轮播-->
<div class="m-lb">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="http://www.25to75.com/huod/moon">
                    <img src="<?php echo base_url()?>/public/image/6.jpg">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="http://www.25to75.com/weixin/yx_s">
                    <img src="<?php echo base_url()?>/public/image/xyx.jpg">
                </a>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url()?>/public/image/5.jpg">
            </div>
            <div class="swiper-slide">
                <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5d993bddcce4b252&redirect_uri=http%3a%2f%2fwww.25to75.com%2fweixin%2fhb&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect">
                    <img src="<?php echo base_url()?>/public/image/3.jpg">
                </a>
            </div>

            <div class="swiper-slide">
                <img src="<?php echo base_url()?>/public/image/1.jpg">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url()?>/public/image/2.jpg">
            </div>
            <div class="swiper-slide">
                    <img src="<?php echo base_url()?>/public/image/4.jpg">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: 5000,
            pagination : '.swiper-pagination',
            paginationClickable :true,
        })
    </script>
</div>
<div class="m-rt" id="fl">
    <div class="m-rt-a">
       <a href="#">热门推荐</a>
    </div>
    <div class="m-rt-b" data-toggle="modal" data-target="#myModal">
        <a href="#">全部商品</a>
    </div>
</div>
<!--热推列表-->
<div class="m-rt">
    <div class="m-rt-a">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB014')?>">
            <img src="<?php echo base_url()?>/public/image/rt/2.jpg">
        </a>
    </div>
    <div class="m-rt-b">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB001')?>">
            <img src="<?php echo base_url()?>/public/image/rt/3.jpg">
        </a>
    </div>
</div>
<div class="m-rt">
    <div class="m-rt-a">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB014')?>">
            <img src="<?php echo base_url()?>/public/image/rt/4.jpg">
        </a>
    </div>
    <div class="m-rt-b">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB013')?>">
            <img src="<?php echo base_url()?>/public/image/rt/6.jpg">
        </a>
    </div>
</div>
<div class="m-rt">
    <div class="m-rt-a">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB020')?>">
            <img src="<?php echo base_url()?>/public/image/rt/7.jpg">
        </a>
    </div>
    <div class="m-rt-b">
        <a href="<?php echo site_url('mobile/getSingleProduct/BB018')?>">
            <img src="<?php echo base_url()?>/public/image/rt/8.jpg">
        </a>
    </div>
</div>

<?php require "./public/common/mbmodal.php"?>
<div style="margin-bottom: 10px">&nbsp;</div>
</body>
</html>