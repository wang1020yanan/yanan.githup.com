<?php

namespace app\controllers;

use app\models\Code;
use app\models\Member;
use app\models\Version;
use Yii;


class PublicController extends CommonController
{

    //public $enableCookieValidation=false;
    public function actionSms()
    {
        if($_GET['mobile']) {
            $mobile=$_GET['mobile'];

            !$_GET['type']? $type=1:$type=$_GET['type'];

            preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile)?:$this->error("手机号格式有误");


            if($type==1){
                if(Member::is_register($mobile))
                    $this->error("已经注册");
            }else{
                if(!Member::is_register($mobile))
                    $this->error("该用户未注册");
            }


            //通过缓存判断验证码是否已发送
            $name="m".$type.$mobile;
            if($this->getcache($name))
                $this->error("已发送验证码");

            $codes=rand(100000, 999999);

            /*
            if($_GET['super']==1)
                $codes='666666';
            */

            if($type==1) {
                $content = "您注册的验证码是" . $codes . "。";
            }elseif($type==2){
                $content = "您的验证码是" . $codes . "。";
            }else{
                $this->error("验证类型有误");
            }
            $result = $this->code($mobile, $content);


            //设置缓存
            $name="m".$type.$mobile;
            $vaule=$codes;
            $this->setcache($name,$vaule,120);


            //存入数据库
            $code=new Code();
            $code->phone=$mobile;
            $code->code=$codes;
            $code->result=json_encode($result);
            $code->type=$type;
            $code->save()? ($result[3]==0? $this->success("发送成功"):$this->error($result)):$this->error($code->errors);
        }else{
            $this->error("请输入您的手机号");
        }
    }

    public function actionChecksms(){
        if(Code::check($_POST['phone'],$_POST['code'],1)){
            $this->success("验证码正确");
        }else{
            $this->error("验证码有误");
        }
    }



    public function actionTestsms()
    {
        if($_GET['mobile']) {
            $mobile=$_GET['mobile'];

            !$_GET['type']? $type=1:$type=$_GET['type'];

            preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile)?:$this->error("手机号格式有误");


            $code=new Code();
            $result=$code->find()->where(['phone'=>$mobile,'type'=>$type])->orderBy("create_time desc")->one();

            if($result&&time()-$result->create_time<120){
                $this->error("已发送验证码");
            }

            $codes=rand(100000, 999999);
            if($type==1) {
                $content = "您注册的验证码是" . $codes . "。";
            }elseif($type==2){
                $content = "您的验证码是" . $codes . "。";
            }else{
                $this->error("验证类型有误");
            }
            $result = $this->code($mobile, $content);
            $code=new Code();
            $code->phone=$mobile;
            $code->code=$codes;
            $code->result=json_encode($result);
            $code->type=$type;
            $code->save()? ($result[3]==0? $this->success($codes):$this->error($result)):$this->error($code->errors);
        }else{
            $this->error("请输入您的手机号");
        }
    }


    public function actionRegister(){
        $this->checkPost();
        if(Code::check($_POST['phone'],$_POST['code'],1,1)){
            $member=new Member();
            $arr['Member']=$_POST;
            //密码加密
            if($arr['Member']["pwd"]) {
                $arr['Member']["pwd"] = $this->md6($arr['Member']["pwd"]);
            }

            if(!isset($arr['Member']["nickname"])||!isset($arr['Member']["sex"])||!isset($arr['Member']["birthday"]))
                $this->error("请填写个人信息");

            $img=$this->upload();
            if($img)
                $arr['Member']["img"]=$img;
            else
                $this->error("请上传头像");



            #用户云信信息
            $arr['name']=$arr['Member']["nickname"];
            $arr['icon']=$this->fillurl($arr['Member']["img"]);

            //注册网易云信
            require_once(Yii::$app->basePath.'/vendor/yunxin/Api.php');
            $yunxin=new \YunxinApi();
            $result=$yunxin->create_ccid($arr);
            if($result['code']==200){
                $arr['Member']["accid"]=$result['info']['accid'];
                $arr['Member']["acctoken"]=$result['info']['token'];

                $member->load($arr);

                $member->save()?$this->success("注册成功"):$this->error($member->errors);
            }else
                $this->error("服务器异常");
        }else{
            $this->error("验证码有误");
        }
    }

    public function actionLogin(){
        $this->checkPost();
        $arr["Member"]=$_POST;
        if($arr['Member']["pwd"])
            $arr['Member']['pwd']=$this->md6($arr['Member']['pwd']);
        $member=new Member();
        $result=$member->login($arr);
        if($result[0]==1){
            $member->pwd="";
            $this->success($member->attributes);
        }else{
            $this->error($result[1]);
        }
    }

    public function actionReset(){
        $this->checkPost();
        if(Code::check($_POST['phone'],$_POST['code'],2)){
            if($_POST['phone']&&$_POST['pwd']) {
                $member = Member::find()->where(['phone' => $_POST['phone']])->one();
                if($member){
                    $member->pwd=$this->md6($_POST['pwd']);
                    $member->token=base64_encode(md5(time().rand(100000,999999)));

                    $member->save()?$this->success("修改成功,请重新登录"):$this->error("修改失败");
                }else  {
                    $this->error("账号未注册");
                }
            }else{
                $this->error("输入参数有误");
            }
        }else{
            $this->error("验证码有误");
        }
    }

    public function actionVersion(){
        if(!$_POST['type']){
            $this->error("参数有误");
        }

        $data=Version::getversion();
        $this->success($data);
    }
}
