<?php

namespace app\models;

use Yii;

class Complaint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Complaint';
    }

    public function rules()
    {
        return [
            [['is_handle'], 'boolean'],
            [['mid', 'coid', 'create_time'], 'integer'],
            [['content','remark'], 'string'],
            ['create_time','default','value'=>time()],
            ['is_handle','default','value'=>0]
        ];
    }

    public function attributeLabels(){
        return [
            'coid'=>'序列号',
            'mid'=>'用户id',
            'content'=>'内容',
            'create_time'=>'创建时间',
            'is_handle'=>'是否处理',
            'remark'=>'备注',
        ];
    }

}