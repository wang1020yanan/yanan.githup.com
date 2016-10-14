<?php

namespace app\models;

use Yii;
use yii\db\Query;

class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Answer';
    }

    public function rules()
    {
        return [
            [['openid'],'unique'],
            [['openid','fopenid','answer'], 'string'],
            ['create_time','default','value'=>time()],
            [['aid','create_time','result'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'aid' => '序列号',
            'openid'=>'openid',
            'fopenid'=>'好友fopenid',
            'answer'=>'回答',
            'result'=>'结果',
            'create_time'=>'创建时间'
        ];
    }

    public function answers($openid,$fopenid){
        $query=new Query();
        $data['user']=$query->select(['answer.result','answer.create_time',"user.nickname","user.headimgurl"])->from('answer')->innerJoin("user",'user.openid=answer.openid')->where(['answer.openid'=>$openid,"answer.fopenid"=>$fopenid])->createCommand()->queryAll();
        $query=new Query();
        $data['list']=$query->select(['answer.result','answer.create_time',"user.nickname","user.headimgurl"])->from('answer')->innerJoin("user",'user.openid=answer.openid')->where(["answer.fopenid"=>$fopenid])->orderby(['answer.result'=>SORT_DESC])->createCommand()->queryAll();
        return $data;
    }





}