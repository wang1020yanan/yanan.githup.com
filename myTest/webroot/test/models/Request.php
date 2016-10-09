<?php

namespace app\models;

use Yii;
use yii\db\Query;

class Request extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'request';
    }

    public function rules()
    {
        return [
            [['accid','faccid'],'required'],
            [['accid','faccid','content'],'string'],
            ['create_time','default','value'=>time()],
            [['type','status'],'default','value'=>0],
            [['content'],'default','value'=>''],
            [['type','status'],'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'rid'=>'序号',
            'accid'=>"发送请求云信id",
            'faccid'=>'被请求云信id',
            'type'=>'请求类别',
            'status'=>'请求结果',
            'create_time'=>'请求时间',
            'handling_time'=>'接受时间'
        ];
    }

    public function log($accid){
        $arr["Request"]=$_POST;
        $arr['Request']['accid']=$accid;
        $this->load($arr);

        //直接相互添加好友
        /*
        if($this->type==1) {
            $this->status = 1;
            $this->handling_time=time();
            $friend=new Friends();
            $friend->double($this->accid,$this->faccid)?: $this->status=3;
        }*/
        if($this->save()){
            return true;
        }else{
            return false;
        }
    }

    public function handle($arr){
        $this->load($arr);
        Request::updateAll(['status'=>3,'handling_time'=>time()],"status=0 and accid=".$this->accid." and faccid=".$this->faccid."  and create_time<".$this->create_time);
        $this->status?:$this->status=1;
        if($this->status==1) {
            $this->handling_time =time();
            $friend = new Friends();
            //更新好友关系
            $friend->double($this->accid, $this->faccid) ?: $this->status = 3;
        }

        if ($this->save()) {
            return true;
        }else{
            return false;
        }
    }

    public static function applylist($faccid){
        $query=new Query;
        $data=$query->select([
            'request.rid','request.accid','request.faccid','request.content','request.type','request.status','request.create_time','request.handling_time'
            ,'member.phone','member.img','member.nickname'
        ])->from('request')->innerJoin('member','member.accid=request.accid')->where("request.faccid='".$faccid."' and status in (0,1)")->createCommand()->queryAll();
        return $data;
    }

}