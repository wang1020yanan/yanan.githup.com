<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
//$url1 = $notify->GetPrePayUrl("123456789");
//
////模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */

$a = $_POST['out_trade_no'];
$b = $_POST['subject'];
$cx = $_POST['total_fee'];
$c = $cx."00";
$input = new WxPayUnifiedOrder();

$input->SetBody($b);
//$input->SetAttach("test");
$input->SetOut_trade_no($a);
$input->SetTotal_fee($c);
//$input->SetTime_start(date("YmdHis"));
//$input->SetTime_expire(date("YmdHis", time() + 600));
//$input->SetGoods_tag("test");
$input->SetNotify_url("http://www.25to75.com/public/wxpay/beself/notify.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>微信支付</title>
    <link rel="stylesheet" href="http://www.25to75.com/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://www.25to75.com/public/css/wechat.css" />
    <script src="http://www.25to75.com/public/js/bootstrap.min.js"></script>
</head>
<body>
<div class="nav">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-1">
                <a href="http://www.25to75.com">
                <img class="logo" src="http://www.25to75.com/public/image/mb.svg">
                </a>
            </div>
            <div class="col-md-11 col-sm-11 col-xs-11">
                <p class="weshouyin">收银台</p>
            </div>
        </div>
    </div>
</div>
<div class="nav" style="background: #F0F0F0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 dd">
                        <p>订单编号：<?php echo $a?></p>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12 dd">
                        <p>订单类型：Beself+订单</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="col-md-12 col-sm-12 col-xs-12 ee">
                    <p>应付金额：￥<?php echo $cx?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav" style="margin:20px 0;">
    <div class="container" style="border: 3px solid #FF3300">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: right">
                  <span>
                       <img src="http://www.25to75.com/public/image/WePayLogo.png" style="height: 45px;padding: 10px">
                       <img src="http://www.25to75.com/public/image/tuijian.png" style="height:20px">
                  </span>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5">
                <p class="weanquan">亿万用户的选择，更快更安全</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center">
                <p class="wezhifu">支付<span style="color: #FF3300"><?php echo $cx?></span>元</p>
            </div>

        </div>
    </div>
</div>
<div class="nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <img src="http://www.25to75.com/public/wxpay/beself/qrcode.php?data=<?php echo urlencode($url2);?>" style="width: 200px">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <img src="http://www.25to75.com/public/image/shuoming.png" style="width: 200px">
            </div>
        </div>
    </div>
</div>
</body>
</html>