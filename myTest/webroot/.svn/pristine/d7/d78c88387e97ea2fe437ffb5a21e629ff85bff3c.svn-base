<?php

namespace app\models;

use Yii;

class Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'code';
    }

    public function rules()
    {
        return [
            [['phone', 'code','type'], 'required'],
            [['phone','type','create_time','checked'], 'integer'],
            [['create_time'],'default','value'=>time()],
            ['result','string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cid' => '验证码序列号',
            'phone'=>'手机号',
            'code'=>'验证码',
            'result'=>'验证码发送结果',
            'type'=>'验证码类别',
            'create_time'=>'验证码创建时间'
        ];
    }

    public static function check($mobile,$code,$type,$status){
        if(!$mobile||!$code||!$type){
            return false;
        }

        if($status==1) {
            $result=Code::find()->where(['phone' => $mobile, 'type' => $type,'checked'=>1])->orderBy("create_time desc")->one();
            if($result&&$result['code']==$code)
                return true;
            else
                return false;
        }


        $result=Code::find()->where(['phone'=>$mobile,'type'=>$type])->orderBy("create_time desc")->one();
        if($result&&$result['code']==$code&&time()-$result['create_time']<1200){
            if($result->checked==1)
                return true;
            $result->checked=1;
            if($result->save())
                return true;
            else
                return false;
        }else{
            return false;
        }
    }
}