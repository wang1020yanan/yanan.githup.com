<?php

namespace app\controllers;

use Yii;

class SiteController extends CommonController
{
    public function actionIndex()
    {
        $this->redirect("./index.html");
    }

    public function actionTest(){
        echo Yii::$app->params['environment'];
    }
}
