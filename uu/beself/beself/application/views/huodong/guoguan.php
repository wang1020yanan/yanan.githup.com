<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
    <title>过关拿红包</title>
    <script src="<?php echo base_url()?>/public/weixin/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/weixin/jweixin-1.0.0.js"></script>

    <script>
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: '<?php echo $signPackage['appId']?>', // 必填，公众号的唯一标识
            timestamp:<?php echo $signPackage['timestamp']?> , // 必填，生成签名的时间戳
            nonceStr: '<?php echo $signPackage['nonceStr']?>', // 必填，生成签名的随机串
            signature: '<?php echo $signPackage['signature']?>',// 必填，签名，见附录1
            jsApiList: [
                "onMenuShareAppMessage",
                "onMenuShareTimeline"
            ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        wx.ready(function(){
            wx.onMenuShareAppMessage({
                title: 'Beself+游戏你敢来战？', // 分享标题
                desc: '总关卡为4关，4关都过不了，还想拿奖品？做自己，不将就！', // 分享描述
                link: 'http://www.25to75.com/weixin/yx_s', // 分享链接
                imgUrl: 'http://www.25to75.com/public/image/hb.jpg', // 分享图标
                type: '', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {

                },
                cancel: function () {

                }
            });
            wx.onMenuShareTimeline({
                title: 'Beself+游戏你敢来战？连通4关，有神秘大礼！你猜！', // 分享标题
                link: 'http://www.25to75.com/weixin/yx_s', // 分享链接
                imgUrl: 'http://www.25to75.com/public/image/hb.jpg', // 分享图标
                success: function () {

                },
                cancel: function () {

                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".start").click(function(){
                $(this).fadeOut();
                $(".ele11").addClass("ele1");
                $(".ele22").addClass("ele2");
                $(".ele33").addClass("ele3");
                $(".ele44").addClass("ele4")
            })
        })
    </script>
</head>
<style>
    html{
        width: 100%;
        height: 100%;
    }
    *{
        margin:0;
        padding:0;
        list-style: none;
        border: 0;
    }
    body{
        background-image: url("<?php echo base_url()?>/public/image/link1.jpg");
        background-size: 100% 100%;
    }
    .ele{
        opacity: 0;
        position: absolute;
        transform: rotateX(-100deg);
        margin-top: -100px;
        width: 30%;
        height: 20%;

    }
    .ele11{
        left: 13%;
    }
    .ele22{
        left: 57%;
    }
    .ele33{
        left: 13%;
    }
    .ele44{
        left: 57%;
    }
    .ele img{
        width:100%;
        height: 100%;
        border-radius: 150px;
    }
    .active .ele1{
        -webkit-animation: ele-show1 .3s linear forwards;
        -webkit-animation-delay: .2s;
    }
    .active .ele2{
        -webkit-animation: ele-show2 .3s linear forwards;
        -webkit-animation-delay: .6s;
    }
    .active .ele3{
        -webkit-animation: ele-show3 .3s linear forwards;
        -webkit-animation-delay: .8s;
    }
    .active .ele4{
        -webkit-animation: ele-show4 .3s linear forwards;
        -webkit-animation-delay: 1s;
    }

    @keyframes ele-show1 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 35%;left: 13%}
        90%{opacity: 0;transform: rotateX(0deg);top: 30%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 35%;left: 13%}
    }
    @keyframes ele-show2 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 35%;left:57%}
        90%{opacity: 0;transform: rotateX(0deg);top: 30%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 35%;left:57%}
    }
    @keyframes ele-show3 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 60%;left: 13%}
        90%{opacity: 0;transform: rotateX(0deg);top: 50%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 60%;left: 13%}
    }
    @keyframes ele-show4 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 60%;left:57%}
        90%{opacity: 0;transform: rotateX(0deg);top: 50%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 60%;left:57%}
    }
    @-webkit-keyframes ele-show1 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 35%;left: 13%}
        90%{opacity: 0;transform: rotateX(0deg);top: 30%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 35%;left: 13%}
    }
    @-webkit-keyframes ele-show2 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 35%;left:57%}
        90%{opacity: 0;transform: rotateX(0deg);top: 30%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 35%;left:57%}
    }
    @-webkit-keyframes ele-show3 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 60%;left: 13%}
        90%{opacity: 0;transform: rotateX(0deg);top: 50%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 60%;left: 13%}
    }
    @-webkit-keyframes ele-show4 {
        0%{opacity: 0.2;transform: rotateX(-100deg);top: 10%;}
        50%{opacity: 1;transform: rotateX(-40deg);top: 20%;}
        70%{opacity: 1;transform: rotateX(0deg);top: 60%;left:57%}
        90%{opacity: 0;transform: rotateX(0deg);top: 50%;}
        100%{opacity: 1;transform: rotateX(0deg);top: 60%;left:57%}
    }

</style>
<body>
<div class="active" >

    <div class="ele11 ele"><a href="http://www.25to75.com/weixin/xyx"> <img src="<?php echo base_url()?>/public/image/a1.png" ></a></div>
    <div class="ele22 ele"><img src="<?php echo base_url()?>/public/image/an.png" onclick="alert('请先通关第一关解锁')"></div>
    <div class="ele33 ele"><img src="<?php echo base_url()?>/public/image/an.png" onclick="alert('请先通关前两关解锁')"></div>
    <div class="ele44 ele"><img src="<?php echo base_url()?>/public/image/an.png" onclick="alert('请先通关前三关解锁')"></div>
    <button class="start" style="width: 40%;position: fixed;left: 30%;top: 40%;height: 50px;font-size: 18px;border-radius: 5px;background: #ff9801">选择关卡</button>

</div>
</body>
</html>