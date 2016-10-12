<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

require_once(Yii::$app->basePath.'/vendor/weixin/weixin.php');

class WeixinController extends CommonController
{

    //接入微信
    public function actionIndex()
    {
        $weixin = new \wechatCallbackapi();
        $weixin->valid();
    }

    //获取access_token

}
