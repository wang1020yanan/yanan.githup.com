<?php

namespace app\models;

use Yii;

class Member extends Common
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Member';
    }

    public function rules()
    {
        return [
            [['phone','pwd','area','accid','acctoken'], 'required'],
            [['phone','mid'],'unique'],
            [['addrequest'],'boolean'],
            [['mid','phone','create_time','last_time','update_time'], 'integer'],
            [['pwd','nickname','sign','birthday','area','accid','acctoken','first_ip','last_ip','location'],'string'],
            [['longitude','latitude'],'double'],
            [['img','nickname','birthday'],'default','value'=>' '],
            [['last_time','create_time'],'default','value'=>time()],
            [['last_ip','first_ip'],'default','value'=>$_SERVER['REMOTE_ADDR']],
            ['token','default','value'=>$this->gettoken()],
            [['img'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg'],
            [['sex','hidden'],'boolean'],
            ['is_show','in','range'=>[0,1,2]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'mid' => '用户唯一标识',
            'phone'=>'手机号',
            'pwd'=>'密码',
            'token'=>'用户token值',
            'area'=>'国家',
            'nickname'=>'昵称',
            'birthday'=>'生日',
            'sex'=>'性别',
            'ccid'=>'网易云信id',
            'cctoken'=>'网易云信token',
            'create_time'=>'注册时间',
            'last_time'=>'上一次登录时间',
            'first_ip'=>'注册ip',
            'last_ip'=>'上一次登录ip',
            'addrequest'=>'添加好友验证类型',
            'is_show'=>'是否对好友显示位置',
            'sign'=>'签名',
            'longitude'=>'经度',
            'latitude'=>'纬度',
            'location'=>'位置',
            'update_time'=>'上传时间',
            'hidden'=>'是否能通过手机号查找'
        ];
    }

    public function login()
    {
        if(!$_POST['phone']||!$_POST['pwd'])
            return [0,"参数填写有误"];

        $member=Member::findOne(['phone'=>$_POST['phone'],'pwd'=>Member::md6($_POST['pwd'])]);;
        if($member){
            $member->last_ip=$_SERVER['REMOTE_ADDR'];
            $member->last_time=time();
            $member->token=$member->gettoken();
            if( $member->save()){
                $member->cache();
                return [1,$member->attributes];
            }
            else {
                return [0,$this->errors];
            }
        }else{
            return [0,"账号密码有误"];
        }
    }


    //检查登录状态
    public function islogin($arr){
        if(!$this->load($arr)||!$this->mid||!$this->token)
            return ['0','参数有误'];

        $cache['Member']=$this->loadcache($this->mid,"mid");
        if($cache['Member']['token']==$this->token){
            if($this->load($cache)) {
                return [1];
            }else{
                return [0,$this->errors];
            }
        }else{
            return [0,'请重新登录'];
        }

        /*
        $member=$this->findOne(['mid'=>$this->mid,'token'=>$this->token]);
        if($member){
            $this->load(['Member'=>$member->attributes]);
            $this->oldAttributes=$this->attributes;
            return true;
        }else{
            return false;
        }*/
    }

    protected function gettoken(){
        return base64_encode(md5(time().rand(100000,999999)));
    }

    public function getRequest()
    {
        //同样第一个参数指定关联的子表模型类名
        //
        return $this->hasMany(Request::className(), ['accid' => 'accid']);
    }

    public static function getmessage($accid=null,$type=null,$map=null){
        if(!$map)
            $map['accid']=$accid;

        if($type==1)
            $member=(new \yii\db\Query())
                ->select(['mid','phone','area','img','nickname','birthday','sex','accid','acctoken','sign','latitude','longitude'])
                ->from('member')
                ->where($map)
                ->one();
        elseif($type==2)
            $member=(new \yii\db\Query())
                ->select(['mid','phone','area','img','nickname','birthday','sex','accid','sign'])
                ->from('member')
                ->where($map)
                ->all();
        else
            $member=(new \yii\db\Query())
                ->select(['mid','phone','area','img','nickname','birthday','sex','accid','sign'])
                ->from('member')
                ->where($map)
                ->one();



        return $member;
    }


    //查询是否注册
    public static function is_register($mobile){
        if((new \yii\db\Query())
            ->select(['mid'])
            ->from('member')
            ->where(['phone'=>$mobile])
            ->one())
            return true;
        else
            return false;
    }


    //设置用户缓存,分别对mid、mobile、accid设置缓存,方便查询
    //密码统一制空,不进入缓存
    public function cache(){
        $this->pwd="";
        //添加至缓存
        $name="member"."mid".$this->mid;
        $value=$this->attributes;
        $this->setcache($name,$value);
        $name="member"."phone".$this->phone;
        $this->setcache($name,$value);
        $name="member"."accid".$this->accid;
        $this->setcache($name,$value);
    }

    //获取缓存
    /*
     * $content值
     * $name    类别,mid、phone、accid
     * $status  0返回数组、1返回对象
     */
    public function loadcache($content,$type,$status=0){
        $name="member".$type.$content;
        $value=$this->getcache($name);

        //status 存在时返回member对象
        if($status){
            if(!$value){
                $map[$type]=$content;
                if($this->findOne($map)){
                    //更新缓存
                    $this->cache();
                    return $this;
                }else{
                    return false;
                }
            }elseif($this->load(['Member'=>$value])){
                return $this;
            }
        }

        //否则返回缓存数组
        return $value;
    }


    //保存并更新缓存
    public function resave(){
        if($this->save()){
            $this->cache();
            return [1];
        }else{
            return [0,$this->errors];
        }
    }


    //重置密码并更新缓存
    public function reset($pwd,$phone){
        $member=$this->loadcache($phone,"phone",1);
        if(!$member){
            return [0,"该用户未注册"];
        }

        $member->oldAttributes=$member->attributes;
        $member->pwd=$this->md6($pwd);
        $member->token=base64_encode(md5(time().rand(100000,999999)));
        if($member->save()){
            //更新缓存
            $member->cache();
            return [1];
        }else{
            return [0,$this->errors];
        }
    }
}