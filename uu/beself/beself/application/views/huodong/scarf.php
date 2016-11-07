<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/swiper.min.css">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/swiper.min.js"></script>
    <title>BESELF+真丝羊绒围巾</title>
    <script src="<?php echo base_url()?>/public/weixin/jweixin-1.0.0.js"></script>
    <script>
        var imgUrl = 'http://xxx/share_ico.png';  // 分享后展示的一张图片
        var lineLink = 'http://xxx'; // 点击分享后跳转的页面地址
        var descContent = "xx！";  // 分享后的描述信息
        var shareTitle = 'xx';  // 分享后的标题
        var appid = '';  // 应用id,如果有可以填，没有就留空

        function shareFriend() {
            WeixinJSBridge.invoke('sendAppMessage',{
                "appid": appid,
                "img_url": imgUrl,
                "img_width": "200",
                "img_height": "200",
                "link": lineLink,
                "desc": descContent,
                "title": shareTitle
            }, function(res) {
                //_report('send_msg', res.err_msg);  // 这是回调函数，必须注释掉
            })
        }
        function shareTimeline() {
            WeixinJSBridge.invoke('shareTimeline',{
                "img_url": imgUrl,
                "img_width": "200",
                "img_height": "200",
                "link": lineLink,
                "desc": descContent,
                "title": shareTitle
            }, function(res) {
                //_report('timeline', res.err_msg); // 这是回调函数，必须注释掉
            });
        }
        function shareWeibo() {
            WeixinJSBridge.invoke('shareWeibo',{
                "content": descContent,
                "url": lineLink,
            }, function(res) {
                //_report('weibo', res.err_msg);
            });
        }
        // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function(argv){
                shareFriend();
            });
            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function(argv){
                shareTimeline();
            });
            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function(argv){
                shareWeibo();
            });
        }, false);

    </script>
    <style>
        html, body {
            /*position: relative;*/
            height: 100%;
        }
        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#000;
            margin: 0;
            padding: 0;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        @-webkit-keyframes jiantou {
            0%{bottom:20px;opacity: 1}
            20%{bottom:22px ;opacity: 0.9}
            30%{bottom:24px ;opacity: 0.7}
            40%{bottom:28px ;opacity: 0.5}
            50%{bottom:32px ;opacity: 0.1}
            60%{bottom:28px ;opacity: 0.5}
            70%{bottom:24px ;opacity: 0.7}
            80%{bottom:22px ;opacity: 0.9}
            100%{bottom:20px ;opacity: 1}
        }
        .swiper-button-next{
            -webkit-animation: jiantou 1.5s infinite;
            animation: jiantou 1.5s infinite;
            animation-delay:1s;
            -webkit-animation-delay:1s;
            left: 51%;
            bottom: 20px;
            transform:rotate(270deg);
            -webkit-transform:rotate(270deg);
            margin-left: -22px;
            background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23ff9801'%2F%3E%3C%2Fsvg%3E");
        }
    </style>
    <!--<script>-->
    <!--$(document).ready(function(){-->
    <!--$('.start').click(function(){-->
    <!--$(this).fadeOut(1000);-->
    <!--})-->
    <!--})-->
    <!--</script>-->
</head>
<body style="background-image:url('<?php echo base_url()?>/public/image/bg1.jpg');background-size: 100% 100%">
<!--<div class="start" style="width: 100%;height: 100%;background: rgba(0,0,0,0.9);position: absolute;z-index: 100">-->
<!--<div style="width: 300px;height: 300px;position: absolute;top: 60%;left: 50%;margin-left: -150px;margin-top: -150px;text-align: center">-->
<!--<a style="font-size: 2em;color: white;background: #ff9801;border-radius: 10px;padding: 10px">�����ҵ�beself</a>-->

<!--<img src="dj.png" style="width: 150px;margin-top: 10px">-->
<!--</div>-->
<!--</div>-->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- 第一屏-->
        <div class="swiper-slide" >
            <img src="<?php echo base_url()?>/public/image/s-1.jpg" style="width: 100%;height: 100%">
        </div>
        <!-- 第二屏-->
        <div class="swiper-slide" >
            <img src="<?php echo base_url()?>/public/image/s-2.jpg" style="width: 100%;height: 100%">
        </div>
        <!-- 第三屏-->

        <div class="swiper-slide" >
            <img src="<?php echo base_url()?>/public/image/s-3.jpg" style="width: 100%;height: 100%">
        </div>
        <!-- 第四屏-->

        <div class="swiper-slide">
            <img src="<?php echo base_url()?>/public/image/s-4.jpg" style="width: 100%;height: 100%">
        </div>
        <!-- 第五屏-->

        <div class="swiper-slide">
            <img src="<?php echo base_url()?>/public/image/s-5.jpg" style="width: 100%;height: 100%">
        </div>
    </div>
    <!--按钮-->
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>
<!--js-->
<script>
    var swiper = new Swiper('.swiper-container', {
        nextButton:'.swiper-button-next',
        pagination: '.swiper-pagination',
        paginationClickable:true,
        direction: 'vertical'
    });
</script>
</body>
