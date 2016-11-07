<?php
header("Content-Type: text/html;charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}


		//订单号
		$out_trade_no = $data['out_trade_no'];

//		//付款金额
//		$total_fee = $data['total_fee'];

		//付款时间
		$times = date("Y-m-d H:i:s",intval(time()));

		$con = mysql_connect("localhost","root","403a2e9e76");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("beself", $con);
		mysql_query("set names 'utf8'");//写库 

		mysql_query("update gy_orders set times='$times',zt='已付款' WHERE tradeno='$out_trade_no'");

		mysql_close($con);
		return true;
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
