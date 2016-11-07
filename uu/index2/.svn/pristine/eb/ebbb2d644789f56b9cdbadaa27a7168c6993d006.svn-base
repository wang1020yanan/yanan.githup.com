<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
		$this->display();
    }
	
	public function hello($name='thinkphp'){
		/*
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; fonts-family: "微软雅黑"; color: #333;fonts-size:24px} h1{ fonts-size: 100px; fonts-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; fonts-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		*/
		$this->assign('name',$name);
		$this->display();
    }
	
	public function test(){
echo '这是一个测试方法!';
}
protected function hello2(){
echo '只是protected方法!';
}
private function hello3(){
echo '这是private方法!';
}
}