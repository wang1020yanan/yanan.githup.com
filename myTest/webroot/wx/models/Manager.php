<?php

namespace app\models;

use Yii;
use yii\db\Query;

class Manager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager';
    }

    public function rules()
    {
        return [
            [['account','password'],'required'],
            [['account','password','token'], 'string'],
            ['token','default','value'=>$this->gettoken()],
            [['mid'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mid' => '序列号',
            'account'=>'用户账号',
            'password'=>'密码',
            'token'=>'token值'
        ];
    }

    public function login($arr)
    {
        if(!$this->load($arr)||!$this->account||!$this->password)
            return [0,"参数填写有误"];
        $member=$this->findOne(['account'=>$this->account,'password'=>$this->password]);
        if($member){
            $this->load(['Manager'=>$member->attributes]);
            $this->oldAttributes=$this->attributes;;
            $this->token=$this->gettoken();
            if( $this->save()){
                return [1];
            }
            else {
                return [0,$this->errors];
            }
        }else{
            return [0,"账号密码有误"];
        }
    }


    //获取token
    protected function gettoken(){
        return base64_encode(md5(time().rand(100000,999999)));
    }

}