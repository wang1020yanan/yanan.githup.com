<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="screen-orientation" content="portrait">
    <title>据说地球上只有2%的人能吃到30个橘子，看你身边谁是这样的2%</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/public/game/static/css/index.css">
    <script src="<?php echo base_url()?>/public/game/static/js/WeixinApi.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url()?>/public/game/static/js/zepto.min.js"></script>
</head>
<body style="background-image: url(<?php echo base_url()?>/public/game/static/img/bg.jpg)">
<div id="container">

    <div id="guidePanel"></div>
    <div id="gamepanel">
        <div class="score-wrap">
            <div class="heart"></div>
            <span id="score">0</span>
        </div>
        <canvas id="stage" width="320" height="568"></canvas>
    </div>
    <div id="gameoverPanel"></div>
    <div id="resultPanel">
        <div class="weixin-share"></div>
        <a href="javascript:void(0)" class="replay"></a>
        <div id="fenghao"></div>
        <div id="scorecontent" class="yc" style="width: 300px;margin: 5px auto">
            <h3>游戏成绩</h3>
            您在<span id="stime" class="lighttext">2378</span>秒内抢到了<span id="sscore" class="lighttext">21341</span>个宝箱<br>超过了<span id="suser" class="lighttext">31%</span>的用户!
        </div>
        <div class="textc yc" style="text-align: center;margin: 0 auto">
            <div class="lqlu" style="z-index: 999999;color: white;text-align: center;margin-top: 20px">
                <button  style="border-radius: 5px;;border: none;background: #00ccdd;height: 50px;width: 200px"><a href="http://www.25to75.com/weixin/checkCj" style="font-size: 29px">领取礼物>></a></button>
                <span class="btn1 share">在朋友圈晒分数</span>
                <img src="<?php echo base_url()?>/public/game/static/img/sb.jpg" style="width: 100%">
            </div>
            <!--<div class="sssq sssqyc" style="z-index: 999999;color: white;text-align: center;margin-top: 20px">-->
            <!--<button style="border-radius: 5px;border: none; background: #00ccdd;height: 50px;width: 200px"><a href="//www.      " style="font-size: 29px;color: white">试试手气>></a></button>-->
            <!--</div>-->
            <span class="btn1 share">在朋友圈晒分数</span>

        </div>
    </div>
</div>

<script src="<?php echo base_url()?>/public/game/static/js/index.js"></script>
<!--统计代码-->
<script type="text/javascript" src="<?php echo base_url()?>/public/game/static/js/yxtj.js" ></script>
<script type="text/javascript">monitor.setProject('360_dev').getTrack();</script>
</body>
</html>