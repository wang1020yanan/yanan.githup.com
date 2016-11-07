<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page7.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>

    <script>
        $(document).ready(function(){
            $("#gojs").click(function(){
                var tradeno = $('#WIDout_trade_no').val();
                var name = $('#shdz-xm').val();
                var telphone = $('#shdz-tel').val();
                var address = $('#shdz-dz').val();
                var fp = "个人";
                var telReg = !!telphone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
                if(name.length < 1){
                    alert("请您输入收货人姓名");
                }else if(telReg==false){
                    alert("您输入的手机号码错误");
                }else if(address.length <10 ){
                    alert("请输入详细的收获地址");
                }else{
                    $.post("<?php echo site_url('best/preAddress')?>",{name:name,telphone:telphone,address:address,tradeno:tradeno,fp:fp},function(msg){
                        if(msg==1){
                            $("#form2").submit();
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--购物车详情-->
<div class="m-xq">
    <div class="m-xq-a">
        <div class="m-xq-b">
            <span>订单金额</span><span><?php echo $money?><span></span><span>元
                <?php
                if(empty($hb->hb)){
                    echo "";
                }else{
                    echo "（红包已减100元）";
                }
                ?>
                </span>
        </div>
        <div class="m-xq-c">
            <span class="glyphicon glyphicon-list-alt"></span>
            <span>订单号：&nbsp;<?php echo $tradeno?></span>
            <span class="dfk">待付款</span>
        </div>
    </div>
</div>
<!--订单内容-->
<?php foreach($res as $vo):?>
<div class="m-dd">
    <div class="m-dd-a">
        <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo->pic?>" >
    </div>
    <div class="m-dd-b">
        <div class="m-dd-c">
            <p><?php echo $vo->name?></p>
        </div>
        <div class="m-dd-d">
            <span class="m-dd-e"><?php echo $vo->sizes?>尺码</span> &nbsp &nbsp <span class="m-dd-f">￥</span><span  class="m-dd-f"><?php echo $vo->price?></span>
        </div>
        <div class="m-dd-g">
            <span>数量</span>
            <span><?php echo $vo->num?>件</span>
        </div>
    </div>
</div>
<?php endforeach;?>
<!--收货信息和支付信息-->
<div class="m-tc"></div>
<div class="m-sh-a">
    <span>收货人信息</span>
</div>

<div class="sh-a">
    <input id="shdz-xm" type="text" placeholder="收货人姓名">
</div>
<div class="sh-b">
    <input id="shdz-tel" type="tel" placeholder="手机号码">
</div>
<div class="sh-c">
    <textarea id="shdz-dz" placeholder="输入详细地址 省/市/区县/街道等"></textarea>
</div>
<div class="sh-d">
    <span>支付信息</span>
</div>
<!--<div class="sh-e">-->
<!--    <div class="sh-g">-->
<!--        <img src="--><?php //echo base_url()?><!--/public/image/zfb.jpg">-->
<!--    </div>-->
<!--    <div class="sh-h">-->
<!--        <p class="sh-h-a">支付宝客户端支付</p>-->
<!--        <p class="sh-h-b">推荐已安装支付宝客户端的用户使用</p>-->
<!--    </div>-->
<!--</div>-->
<div class="sh-e">
    <div class="sh-g">
        <img src="<?php echo base_url()?>/public/weixin.gif">
    </div>
    <div class="sh-h">
        <p class="sh-h-a">微信客户端支付</p>
        <p class="sh-h-b">暂时只支持在微信内部浏览器购买</p>
    </div>
</div>
<div class="sh-f">
    <button id="gojs">付款</button>
</div>
<!--支付宝需要的数据（隐藏）-->
<form action="<?php echo base_url()?>/public/zfb/alipayapi.php" method="post" id="form1">
    <!--订单号-->
    <input type="hidden" id="WIDout_trade_no" name="WIDout_trade_no" value="<?php echo $tradeno?>" />
    <!--订单名称-->
    <input type="hidden" name="WIDsubject" value="<?php echo $subject?>" />
    <!--付款金额-->
    <input type='hidden' name='WIDtotal_fee' value="<?php echo $money?>" />

</form>

<!--微信支付需要的数据（隐藏）-->
<form action="http://www.25to75.com/public/wxpay/beself/jsapi.php" method="post" id="form2">
    <!--订单号-->
    <input type="hidden" name="out_trade_no" value="<?php echo $tradeno?>" />
    <!--订单名称-->
    <input type="hidden" name="body" value="<?php echo $subject?>" />
    <!--付款金额-->
    <input type='hidden' name='total_fee' value="<?php echo $money?>" />

</form>
<!--结算END-->
<?php require "./public/common/mbmodal.php"?>
</body>
</html>