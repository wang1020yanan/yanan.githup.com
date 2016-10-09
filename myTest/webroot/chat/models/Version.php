<?php

namespace app\models;

use Yii;

class Version extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Version';
    }

    public function rules(){
        return [
            [['is_force','status'],'boolean'],
            [['type','url'],'string'],
            [['version','min'],'double'],
        ];
    }

    public function attributeLabels(){
        return [
            [
                "vid"=>'版本标识',
                'type'=>'类别',
                'version'=>'版本号',
                'min'=>'最低版本',
                'url'=>'地址',
                'is_force'=>'是否强制安装',
                'status'=>'是否在审查中',
            ]
        ];
    }

    public function getversion(){
        $data=Version::find()->where(['type' =>$_POST['type']])->orderBy("vid desc")->one();
        return $data->attributes;
    }
}