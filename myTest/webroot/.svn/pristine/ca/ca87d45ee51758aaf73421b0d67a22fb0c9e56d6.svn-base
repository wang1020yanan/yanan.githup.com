<?php

namespace app\models;

use Yii;
use yii\db\Query;

class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    public function rules()
    {
        return [
            [['content','answer1','answer2','answer3','answer4','answer5','img'], 'string'],
            [['qid','status','create_time'], 'integer'],
            [['create_time'],'default','value'=>time()],
        ];
    }

    public function attributeLabels()
    {
        return [
            'qid' => '问题序列号',
            'content'=>'内容',
            'answer1'=>'回答一',
            'answer2'=>'回答二',
            'answer3'=>'回答三',
            'answer4'=>'回答四',
            'answer5'=>'回答五',
            'img'=>'背景图片',
            'status'=>'问题状态',
            'create_time'=>'问题创建时间'
        ];
    }

    public function qlist(){
        $query=new Query();
        $data=$query->from('question')->orderby(['qid'=>SORT_ASC])->createCommand()->queryAll();

        return $data;
    }
}