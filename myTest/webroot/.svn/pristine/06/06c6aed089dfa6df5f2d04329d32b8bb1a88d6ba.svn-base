<?php

namespace app\controllers;

use app\models\Manager;
use Yii;


class PublicController extends CommonController
{
    //获取问题列表
    public function actionLogin(){
        $arr["Manager"]=$_POST;
        if($arr['Manager']["password"])
            $arr['Manager']['password']=$this->md6($arr['Manager']['password']);
        $member=new Manager();
        $result=$member->login($arr);
        if($result[0]==1){
            $member->password="";
            $this->success($member->attributes);
        }else{
            $this->error($result[1]);
        }
    }

    /*
     * 添加管理账号
     */
    /*
    public function actionAdd(){
        $arr["Manager"]=$_POST;
        if($arr['Manager']["password"])
            $arr['Manager']['password']=$this->md6($arr['Manager']['password']);
        $member=new Manager();
        if($member->load($arr)&&$member->save()){
            $this->success("创建成功");
        }else{
            $this->error($member->errors);
        }

    }
    */


}
