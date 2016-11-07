<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}
$a = $_POST['out_trade_no'];
$b = $_POST['body'];
$c = $_POST['total_fee'];

//①、获取用户openid
$tools = new JsApiPay();
$arr = $tools->GetOpenid($b, $a, $c);
$openId = $arr['openid'];
$state = $arr['state'];
$dd = json_decode($state);

$bb = $dd->{'body'};
$aa = $dd->{'out_trade_no'};
$ccx = $dd->{'total_fee'};
$cc = $ccx."00";

//②、统一下单
$input = new WxPayUnifiedOrder();


$input->SetBody($bb);       //商品描述
$input->SetOut_trade_no($aa);     //订单号
$input->SetTotal_fee($cc);    //付款金额
//$input->SetAttach("test");   //附加数据
//$input->SetTime_start(date("YmdHis"));    //交易起始时间
//$input->SetTime_expire(date("YmdHis", time() + 600));   //交易结束时间
//$input->SetGoods_tag("test");   //商品标记


$input->SetNotify_url("http://www.25to75.com/public/wxpay/beself/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
//echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//printf_info($order);



$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<script src="http://www.25to75.com/public/js/jquery-2.1.4.min.js"></script>
    <title>微信支付</title>
    <script type="text/javascript">
		//var address = "";
		var aa = <?php echo $aa?>;
		var cc = <?php echo $cc?>;
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
//				alert(res.err_msg);
				if(res.err_msg=="get_brand_wcpay_request:ok"){
//					$.post("http://www.25to75.com/wxpay/notify", {aa:aa,cc:cc}, function(msg){
//						if(msg==1){
//							window.location.href="http://www.25to75.com/mobile/ddlb";
//						}
//					});
				}else{
					alert("支付取消");
				}
//				alert(res.err_code+res.err_desc+res.err_msg);
//				alert(address);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>

</head>
<body style="background: #f0f0f0">
   <div style="text-align: center">
	   <div style="font-size: 20px;font-weight: bold">Beself+订单-<?php echo $aa?></div>
	   <div style="font-size: 35px;margin-top: 0;padding-top: 0">￥<?php echo $ccx?></div>
	   <div style="background: #FFF;height: 50px;line-height: 50px;font-size: 15px;padding: 0 10px 0 10px;margin-top: 20px">
		   <div style="float: left;width: 50%;height: 50px;text-align: left;color: #858585">收款方</div>
		   <div style="float: left;width: 50%;height: 50px;text-align: right">Beself+官网</div>
	   </div>
	   <div align="center" style="margin-top: 25px">
		   <button style="width:100%; height:45px;-webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;background-color:#008B00; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
	   </div>
   </div>
</body>
</html>