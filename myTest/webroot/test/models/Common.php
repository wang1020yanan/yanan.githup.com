<?php

namespace app\models;

use Yii;

class Common extends \yii\db\ActiveRecord{
    protected function setcache($name,$value,$time=null){
        if(is_array($value))
            $value=json_encode($value);
        Yii::$app->redis->set($name,$value);
        if(!$time)
            Yii::$app->redis->expire($name,24*60*60);
        else
            Yii::$app->redis->expire($name,$time);
    }

    protected function getcache($name,$time=null){
        //获取缓存
        $result=Yii::$app->redis->get($name);

        //更新过期时间
        if($result){
            $time?:$time=24*60*60;
            Yii::$app->redis->expire($name,$time);
        }


        if(is_array(json_decode($result,true)))
            //转为json数组
            return json_decode($result,true);
        else
            return $result;
    }

    protected function md6($str){
        return md5("youyou".md5($str));
    }
}