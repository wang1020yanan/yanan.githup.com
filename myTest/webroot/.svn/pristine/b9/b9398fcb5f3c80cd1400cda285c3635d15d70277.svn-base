<?php

namespace app\controllers;

use app\models\Question;
use Yii;


class QuestionController extends CommonController
{
    //获取问题列表
    public function actionList(){
        $data=(new Question())->qlist();
        $this->success($data);
    }


}
