<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		layout(false);
		$this->display();
    }
	
	public function hello($name='thinkphp'){
		/*
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; fonts-family: "微软雅黑"; color: #333;fonts-size:24px} h1{ fonts-size: 100px; fonts-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; fonts-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		*/
		$this->assign('name',$name);
		$this->display();
    }


//测试
	public function teacher(){
		$map=array();
		if(I("bb"))
			$map["basicteacherinformation.usersex"]=I("bb");
		$field="basicteacherinformation.username,basicteacherinformation.usersex,teacherdetailinformation.teachingage,teacherdetailinformation.major,teacherdetailinformation.signiture,
		teacherdetailinformation.schoolname,uploadteachermypictable.imageurl";
		$teacher=M("basicteacherinformation")->field($field)->where($map)->join('uploadteachermypictable on basicteacherinformation.userid=uploadteachermypictable.userid')->join("teacherdetailinformation on basicteacherinformation.userid=teacherdetailinformation.userid")->limit(10)->page(I("page"))->select();
		$this->assign("teacher",$teacher);
		layout(true);
		$this->display("order/teacher");
}
	public function teacher_detail(){
		$this->display("order/teacher_detail");
	}
	public function jx_teacher_detail(){
		$this->display("order/jx_teacher_detail");
	}
	public function jiajiaobu(){
		$this->display();
	}
	public function p_order(){
		$this->display("order/p_order");
	}
	public function choose(){
		$this->display("order/choose");
	}
	public function need_pay(){
		$this->display("order/need_pay");
	}
	public function need_for(){
		$this->display("order/need_for");
	}
	public function wait_pay(){
		$this->display("order/wait_pay");
	}
	public function wait_confirm(){
		$this->display("order/wait_confirm");
	}
	public function wait_teach(){
		$this->display("order/wait_teach");
	}
	public function wait_eval(){
		$this->display("order/wait_eval");
	}
	public function order_complete(){
		$this->display("order/order_complete");
	}
	public function wechatpay(){
		$this->display("order/wechatpay");
	}
	public function payok(){
		$this->display("order/payok");
	}
	public function allorder(){
		$this->display("order/allorder");
	}
	public function data(){
		$this->display("order/data");
	}
	public function record(){
		$this->display("order/record");
	}
	public function allneed(){
		$this->display("order/allneed");
	}
	public function jx_teacher(){
		$this->display("order/jx_teacher");
	}
	public function address(){
		$this->display("order/address");
	}
	public function mm(){
		$this->display("m_index");
	}
	public function test11(){
		$this->display("index/test");
	}
	public function isLog(){
		echo"1";
	}
protected function hello2(){
echo '只是protected方法!';
}
private function hello3(){
echo '这是private方法!';
}
}