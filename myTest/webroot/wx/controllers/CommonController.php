<?php

namespace app\controllers;

use app\models\Member;
use Yii;
use yii\web\Controller;
use app\models\Upload;
use yii\web\UploadedFile;

require_once(Yii::$app->basePath.'/vendor/yunxin/Api.php');

class CommonController extends Controller
{
    public $enableCsrfValidation = false;

    public function init()
    {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type:application/json; charset=utf-8');

        //接口访问计数
        $name=date("Y-m-d",time())."-".$_GET['r'];
        $val=$this->getcache($name);
        !$val?$val=1:$val+=1;
        $this->setcache($name,$val);

        //接口访问超限通知
        if($val==1000||$val==5000||$val==10000||$val==20000||$val==50000||$val==1000000||$val==2000000||$val==5000000||$val==10000000)
        {
            $content="接口:".$name."访问达到".$val."次,请注意服务运行。";
            $this->code(15367496826,$content);
        }


        //接口调用日志存储

        $text="\n\n".date("y-m-d H:i:s",time())."\n".$_SERVER["REMOTE_ADDR"]."\n".$_SERVER["QUERY_STRING"]."\rpost:\r".var_export(file_get_contents('php://input', 'r'),true)."\rpost:\r".var_export($_POST,true)."\rget:\r".var_export($_GET,true)."\rfile:\r".var_export($_FILES,true)."\r访问次数:".$val;
        $this->logs($text);

        if(json_decode(file_get_contents('php://input', 'r'),true)){
            $_POST=json_decode(file_get_contents('php://input', 'r'),true);
        }


    }

    protected  function  success($arr){
        $result['status']="1";
        if(!$arr)
            $arr=[];
        $result['data']=$arr;

        //填充url
        if(is_array($result["data"]))
            if(!$result["data"][0]){
                if ($result['data']['img'])
                    $result['data']['img'] = $this->fillurl($result['data']['img']);
            }
            else {
                for ($i = 0; $i < count($result['data']); $i++) {
                    if ($result['data'][$i]['img'])
                        $result['data'][$i]['img'] = $this->fillurl($result['data'][$i]['img']);
                }
            }

        echo json_encode($result);


        $text="\r".var_export($result,true)."\r";
        $this->logs($text);

        exit();
    }


    protected function error($arr){
        $result['status']="0";
        if(!$arr)
            $arr='';
        if(is_array($arr)){
            $str="";
            $keys=array_keys($arr);
            $values=array_values($arr);
            if(is_array($keys)){
                for($i=0;$i<count($keys);$i++) {
                    is_array($values[$i])?
                        $str = $str . $keys[$i] . $values[$i][0]:
                        $str = $str . $keys[$i] . $values[$i];
                }
            }else{
                for($i=0;$i<count($values);$i++) {
                    is_array($values[$i])?
                        $str = $str  . $values[$i][0]:
                        $str = $str  . $values[$i];
                }
            }
            $arr=$str;
        }
        $result['message']=$arr;
        echo json_encode($result);


        $text="\r".var_export($result,true)."\r";
        $this->logs($text);
        exit();
    }

    protected function code($mobile,$content){
        require_once(Yii::$app->basePath.'/vendor/sms/sms.php');
        $sms=new \sms();
        $result=$sms->sendmessage($mobile,$content);
        return $result;
    }

    protected function md6($str){
        return md5("youyou".md5($str));
    }

    protected function settoken(){
        return base64_encode(md5(time().rand(100000,999999)));
    }

    protected function checkPost(){
        if($_POST){
            return true;
        }else{
            $this->error("非法操作");
        }
    }

    protected function checklogin(){
        $this->checkPost();
        $member=new Member();
        $arr['Member']=$_POST;
        if($member->islogin($arr)){
            return $member;
        }else{
            $this->error("token值无效,请重新登录");
        }
    }

    protected function upload(){
        if ($_FILES) {
            if(!$_FILES['Upload'])
                $_FILES['Upload']=$_FILES;
            $model = new Upload();
            $model->image = UploadedFile::getInstance($model, 'image');
            return $model->uploadImage();
        }
    }

    protected function toarray($data){
        for($i=0;$i<count($data);$i++){
            $arr[$i]=$data[$i]->attributes;
        }
        return $arr;
    }

    protected function fillurl($str,$url=null){
        if($str == null || trim($str) == "")
            return "";

        if(!$url)
            $url=$_SERVER['HTTP_HOST']."/";



        if (strpos($str, "http") > -1)
            return $str;
        else
            return "http://".$url.$str;
    }



    //redis 缓存设置
    protected function setcache($name,$value,$time=null){
        if(Yii::$app->params['environment'])
            $name=Yii::$app->params['environment'].$name;
        Yii::$app->redis->set($name,$value);
        if(!$time)
            Yii::$app->redis->expire($name,24*60*60);
        else
            Yii::$app->redis->expire($name,$time);
    }

    //redis 缓存读取
    protected function getcache($name){
        if(Yii::$app->params['environment'])
            $name=Yii::$app->params['environment'].$name;
        return Yii::$app->redis->get($name);
    }

    protected function logs($str){
        if(Yii::$app->params['environment'])
            file_put_contents("../logo/".Yii::$app->params['environment']."/logo".date("Y-m-d",time()).".txt", $str, FILE_APPEND);
        else
            file_put_contents("../logo/logo".date("Y-m-d",time()).".txt", $str, FILE_APPEND);
    }

    protected function debugs($str){
        if(Yii::$app->params['environment'])
            file_put_contents("../logo/".Yii::$app->params['environment']."/debug.txt", $str, FILE_APPEND);
        else
            file_put_contents("../logo/debug.txt", $str, FILE_APPEND);;
    }
}
