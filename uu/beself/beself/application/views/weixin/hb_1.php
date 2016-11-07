<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beself红包</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/weixin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/weixin/css/M-homepage.css" />
    <script src="<?php echo base_url()?>/public/weixin/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/weixin/jweixin-1.0.0.js"></script>
    <script>
        $(document).ready(function(){
            $("#fx").click(function(){
                $("#fxjt").show();
            });
            $("#fxjt").click(function(){
                $(this).hide();
            });
        });
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
                title: 'Beself+时尚红包一触即发', // 分享标题
                desc: '专享红包可在Beself+商城购物折价使用，我们不做时尚，我们就是时尚', // 分享描述
                link: 'http://www.25to75.com/weixin/fx', // 分享链接
                imgUrl: 'http://www.25to75.com/public/image/hb.jpg', // 分享图标
                type: '', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {
                    // 用户确认分享后执行的回调函数
                    window.location.href="<?php echo site_url('weixin/hb_2')?>";
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                    window.location.href="http://www.25to75.com/weixin/fx";
                }
            });
            wx.onMenuShareTimeline({
                title: 'Beself+时尚红包一触即发', // 分享标题
                link: 'http://www.25to75.com/weixin/fx', // 分享链接
                imgUrl: 'http://www.25to75.com/public/image/hb.jpg', // 分享图标
                success: function () {
                    // 用户确认分享后执行的回调函数
                    window.location.href="<?php echo site_url('weixin/hb_2')?>";
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                    window.location.href="http://www.25to75.com/weixin/fx";
                }
            });
        });
    </script>
</head>
<body style="background:#000000;font-size: 2em">
<div class="fxjt2" id="fxjt" style="width: 100%;position: fixed;z-index: 9999;background:rgba(0,0,0,0.6);height: 1000px;display: none;top: 0">
    <img src="<?php echo base_url()?>/public/weixin/image/weixin.png" style="width: 100%">
</div>
<div style="width: 100%;">
    <img id="fx" src="<?php echo base_url()?>/public/weixin/image/hb1.jpg" style="width: 100%">
</div>
</body>
</html>