<?php
namespace Home\Widget;
use Think\Controller;
class PublicWidget extends Controller{
    
    // 头部   带区域选择的头部
    public function head1(){
        $city=M("city_info")->where("is_open=1")->select();
        $this->assign('city',$city);
        //layout(false);
        $this->display("Public/head");
    }
    
    //子页头部  
    public function head2(){
        $this->display("Public/head2");
    }
}