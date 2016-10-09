<?php

namespace app\models;

use Yii;
use app\models\Member;

class Local extends Member
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_log';
    }

    public function rules()
    {
        return [
            [['mid','location'],'required'],
            [['mid'],'integer'],
            [['sign','location','city'],'string'],
            [['longitude','latitude'],'double'],
            ['create_time','default','value'=>time()]
        ];
    }

    public function attributeLabels()
    {
        return [
            'mid' => '用户唯一标识',
            'sign'=>'签名',
            'longitude'=>'经度',
            'latitude'=>'纬度',
            'localtion'=>'位置',
            'city'=>'城市',
            'create_time'=>'创建时间'

        ];
    }
}