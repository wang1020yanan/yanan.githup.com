<?php

namespace app\controllers;

use Yii;


class YunxinController extends CommonController
{

    //更新云信信息
    public function actionYunxinup(){
        $member=$this->checklogin();
        $arr=$_POST;
        $arr['accid']=$member->accid;

        $yunxin=new \YunxinApi();
        $result=$yunxin->updateUinfo($arr);
        if($result['code']=200) {
            $this->success("用户云信信息更新成功");
        }else{
            $this->error("用户云信信息更新失败");
        }
    }

    //云信好友信息
    public function actionGetinfos(){
        $this->checkPost();
        if($_POST['accids']){
            $yunxin=new \YunxinApi();
            $result=$yunxin->getUinfos($_POST);
            echo $result;
            exit;
        }else{
            $this->error("请输入要查询的用户");
        }
    }

    //获取云信好友列表
    public function actionFriends(){
        $member=$this->checklogin();

        $yunxin=new \YunxinApi();
        $result=$yunxin->flist($member->accid);


        $this->success($result);
    }
}