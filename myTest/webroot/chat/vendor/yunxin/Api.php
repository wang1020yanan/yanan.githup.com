<?php

class YunxinApi {

    //mishi
    protected $appkey="2b5845613ea2401a7d41cbfec1ae7f6d";
    protected $appSecret="85c936a3ea7b";

    protected function header(){
        $header['AppKey']=$this->appkey;
        $header['Nonce']=time().rand(100000,999999);
        $header['CurTime']=time();
        $header['Content-Type']="application/x-www-form-urlencoded";
        $header['CheckSum']=sha1($this->appSecret.$header['Nonce'].$header['CurTime']);
        foreach($header as $n=>$v)
            $headers[]=$n.":".$v;
        return $headers;
    }

    private function curlPost($url,$postFields){
        $postFields = http_build_query($postFields);
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_POST, count($postFields));
        //加入头部信息
        curl_setopt ( $ch,CURLOPT_HTTPHEADER,$this->header());
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
        curl_exec ( $ch );
        $result =curl_multi_getcontent( $ch);
        curl_close ( $ch );
        return $result;
    }

    //创建云信id/账号
    public function create_ccid($arr){
        $arr['accid']=substr(rand(100000000,999999999),1,8);


        $url='http://api.netease.im/nimserver/user/create.action';
        $result=$this->curlPost($url,$arr);
        $result=json_decode($result,true);
        if($result['desc']=='already register'){
            $result=$this->create_ccid($arr);
        }
        return $result;
    }


    //更新云信账号信息
    public function updateUinfo($arr){
        $url='http://api.netease.im/nimserver/user/updateUinfo.action';
        $result=$this->curlPost($url,$arr);
        return $result;
    }

    //获取用户云信账号信息
    public function getUinfos($arr){
        $url='http://api.netease.im/nimserver/user/getUinfos.action';
        $result=$this->curlPost($url,$arr);
        return $result;
    }

    //添加好友请求
    public function add($accid,$faccid,$type=2){
        $url="http://api.netease.im/nimserver/friend/add.action";
        $arr['accid']=$accid;
        $arr['faccid']=$faccid;
        $arr['type']=$type;
        $arr['msg']=$_POST['content'];
        $result=$this->curlPost($url,$arr);

        return json_decode($result,true);
    }

    //删除好友
    public function delete($accid,$faccid){
        $url="http://api.netease.im/nimserver/friend/delete.action";
        $arr['accid']=$accid;
        $arr['faccid']=$faccid;

        $result=$this->curlPost($url,$arr);
        return json_decode($result,true);
    }

    //好友列表
    public function flist($accid,$time=1){
        $url="http://api.netease.im/nimserver/friend/get.action";
        $arr["accid"]=$accid;
        $arr['createtime']=$time;

        $result=$this->curlPost($url,$arr);
        return json_decode($result,true);
    }
}