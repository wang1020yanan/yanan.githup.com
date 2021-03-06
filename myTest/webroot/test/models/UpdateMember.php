<?php

namespace app\models;

use Yii;
use app\models\Member;

class UpdateMember extends Common
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Member';
    }

    public function rules()
    {
        return [
            [['mid'],'integer'],
            [['addrequest','sex','hidden'],'boolean'],
            [['nickname','sign','birthday','img'],'string'],
            [['longitude','latitude'],'double'],
            ['is_show','in','range'=>[0,1,2]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'mid' => '用户唯一标识',
            'area'=>'国家',
            'nickname'=>'昵称',
            'birthday'=>'生日',
            'sex'=>'性别',
            'ccid'=>'网易云信id',
            'cctoken'=>'网易云信token',
            'create_time'=>'注册时间',
            'last_time'=>'上一次登录时间',
            'first_ip'=>'注册ip',
            'last_ip'=>'上一次登录ip',
            'addrequest'=>'添加好友验证类型',
            'sign'=>'签名',
            'longitude'=>'经度',
            'latitude'=>'纬度',
            'hidden'=>'是否可以通过手机号查找',
        ];
    }

    public function resave(){
        if($this->save())
        {
            $member=(new Member())->loadcache($this->mid,'mid',2);
            return [1,$member];
        }else{
            return [0,$this->errors];
        }
    }
}