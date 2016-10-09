<?php

namespace app\controllers;

use app\models\Friends;
use app\models\Member;
use app\models\UpdateMember;
use app\models\Upload;
use Yii;
use yii\web\UploadedFile;


class GroupController extends CommonController
{
    public function actionSearch(){
        $this->checklogin();
        if($_POST['content'])
            $content=$_POST['content'];
        else
            $this->error("请输入要查询的内容");
        if($_POST['type']==2){
            $map=[
                'like','nickname',$content
            ];
        }elseif($_POST['type']==3){
            $map['accid']=$content;
        }else{
            $map['phone']=$content;
            $map['hidden']=1;
        }

        $data=Member::getmessage(null,2,$map);
        $this->success($data);
    }

    public function actionCheck(){
        $member=$this->checklogin();
        $mobile=json_decode($_POST['mobile'],true);
        if(is_array($mobile)){
            $result=array();
            foreach ($mobile as $val){
                $map['phone']=$val;
                $mem=Member::getmessage(null,null,$map);
                if($mem) {
                    if(Friends::check($member->accid,$mem['accid']))
                        $mem['is_friend']=1;
                    else
                        $mem['is_friend']=0;
                    array_push($result, $mem);
                }
            }
            $this->success($result);
        }else{
            $this->error("数据有误");
        }
    }


    //获得用户信息接口
    public function actionFind(){
        $this->checklogin();
        $accids=json_decode($_POST['accids'],true);
        if(!$accids)
            $this->error("用户信息有误");

        $data=array();
        for($i=0;$i<count($accids);$i++){
            $member=Member::getmessage($accids[$i]);

            array_push($data,$member);
        }
        $this->success($data);
    }

}