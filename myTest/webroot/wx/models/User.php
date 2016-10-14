<?php

namespace app\models;

use Yii;
use yii\db\Query;

class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    public function rules()
    {
        return [
            [['openid'],'unique'],
            [['openid','nickname','language','city','province','country','headimgurl','question','answer'], 'string'],
            ['create_time','default','value'=>time()],
            [['uid','sex','create_time'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'uid' => '序列号',
            'openid'=>'openid',
            'nickname'=>'昵称',
            'sex'=>'性别',
            'language'=>'语言',
            'city'=>'城市',
            'province'=>'省份',
            'country'=>'国家',
            'create_time'=>'创建时间'
        ];
    }


    //存储信息
    public function resave(){
        if($this->openid){
            $user=User::find()->where(['openid'=>$this->openid])->one();
            if($user){
                $this->oldAttributes=$user->attributes;
            }

            if($this->save()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //登录
    public function Login($openid){
        $user=User::find()->where(['openid'=>$openid])->one();
        if($user)
            return $user;
        else
            return false;
    }

    //设置问题
    public function upquestion(){
        //if(count($question)==10&&count($answer)==10){
            if($this->save()){
                return [1];
            }else{
                return [0,$this->errors];
            }
            /*
        }else{
            return [0,"问题信息有误"];
        }
            */
    }



}