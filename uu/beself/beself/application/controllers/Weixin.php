<?php
/**
 * Created by PhpStorm.
 * User: GAOYANG
 * Date: 2015/9/25
 * Time: 10:06
 */
class Weixin extends GY_Controller{
    public function first(){
        $code = $_GET['code'];

        $appid = "wx5d993bddcce4b252";
        $appsecret = "e730bab0dd1f052fd8773b6039939026";

        //获取openid
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";

        $result = $this->https_request($url);

        $jsoninfo = json_decode($result, true);
        $openid = $jsoninfo["openid"];//从返回json结果中读出openid

        //echo $openid; //把openid 送回前端

        //将openid作为用户名查询是否已存入数据库
        $nums = $this->isNameRegister($openid);
        if($nums == 0){
            //将openid作为用户名存到用户表
            $data = array(
                'username'=>$openid
            );
            $this->db->insert('users',$data);
        }
        $this->session->set_userdata('username',$openid);
        $yx = "http://www.25to75.com/weixin/yx";
        Header("Location: $yx");
    }

    function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    //判断用户是否已登陆
    public function checkCj(){
        $openid = $this->session->userdata('username');
        $yx = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5d993bddcce4b252&redirect_uri=http%3a%2f%2fwww.25to75.com%2fweixin%2ffirst&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        if(empty($openid)){
            Header("Location: $yx");
        }else{
            $this->load->view('weixin/choujiang');
        }
    }
    //抽签页面
    public function checkCq(){
        $openid = $this->session->userdata('username');
        $yx = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5d993bddcce4b252&redirect_uri=http%3a%2f%2fwww.25to75.com%2fweixin%2ffirst&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        $num = round(rand(1,4));
        $img = $num.".png";
        if(empty($openid)){
            Header("Location: $yx");
        }else{
            $this->session->unset_userdata('username');
            $this->load->view('weixin/cq',array('img'=>$img));
        }
    }
    public function yx(){
        $openid = $this->session->userdata('username');
        $yx = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5d993bddcce4b252&redirect_uri=http%3a%2f%2fwww.25to75.com%2fweixin%2ffirst&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        if(empty($openid)){
            Header("Location: $yx");
        }else{
            $this->load->view('weixin/index');
        }
    }

    public function xyx(){
        $this->load->view('weixin/index');
    }
    public function xya(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/register');
        }else{
            $this->load->view('weixin/index2');
        }
    }
    public function xyb(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/register');
        }else{
            $this->load->view('weixin/index3');
        }
    }
    public function xyc(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/register');
        }else{
            $this->load->view('weixin/index4');
        }
    }







    //红包分享
    public function fx(){
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5d993bddcce4b252&redirect_uri=http%3a%2f%2fwww.25to75.com%2fweixin%2fhb&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        Header("Location: $url");
    }
    public function hb(){

        $appid = "wx5d993bddcce4b252";
        $appsecret = "e730bab0dd1f052fd8773b6039939026";

        //授权登陆
        $code = $_GET['code'];
        $url3 = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
        $result3 = $this->https_request($url3);
        $jsoninfo3 = json_decode($result3, true);
        $openid = $jsoninfo3["openid"];//从返回json结果中读出openid
        $access_token_user = $jsoninfo3["access_token"];
        $url4 = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token_user&openid=$openid&lang=zh_CN";
        $result4 = $this->https_request($url4);
        $jsoninfo4 = json_decode($result4, true);
        $nickname = $jsoninfo4["nickname"];
        $headimgurl = $jsoninfo4["headimgurl"];
        //微信用户信息存储到数据库
        $nums = $this->isNameRegister($nickname);
        if($nums == 0){
            //将openid作为用户名存到用户表
            $data = array(
                'username'=>$nickname,
                'avatar'=>$headimgurl,
                'openid'=>$openid
            );
            $this->db->insert('users',$data);
        }
        $this->session->set_userdata('username',$nickname);


        //微信分享
        //获取access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $result = $this->https_request($url);
        $jsoninfo = json_decode($result, true);
        $access_token = $jsoninfo["access_token"];

        //获取ticket
        $url2 = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi";
        $result2 = $this->https_request($url2);
        $jsoninfo2 = json_decode($result2, true);
        $jsapiTicket = $jsoninfo2["ticket"];//从返回json结果中读出openid


        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId"     => $appid,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        $this->load->view('weixin/hb_1',array('signPackage'=>$signPackage,'name'=>$nickname,'head'=>$headimgurl));
    }


    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    public function hb_2(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->fx();
        }else{
            $this->load->view('weixin/hb_2');
        }
    }
    public function hb_3(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->fx();
        }else{
            $this->load->view('weixin/hb_3');
        }
    }


    public function hb_2_2(){
            $this->load->view('weixin/hb_2_2');
    }
    public function hb_3_3(){
            $this->load->view('weixin/hb_3');
    }


    public function checkTel(){
        $tel = $this->input->post('tel');
        $username = $this->session->userdata('username');
        $row = $this->getAvatar($username);
        $num2 = $this->isRegister($tel);
        if($num2 > 0){
            $row2 = $this->getUserMsg($tel);
            $data3 = array(
                'username'=>$row2->username,
                'password'=>$row2->password,
                'telphone'=>$tel,
                'avatar'=>$row2->avatar,
                'jf'=>$row2->jf,
                'jy'=>$row2->jy,
                'sj'=>$row2->sj,
                'openid'=>$row->openid
            );
            $this->db->delete('users',array('openid'=>$row->openid,'telphone'=>""));
            $this->db->update('users',$data3,array('telphone'=>$tel));
        }else{
            $data = array(
                'username'=>$username,
                'password'=>$row->password,
                'telphone'=>$tel,
                'avatar'=>$row->avatar,
                'jf'=>$row->jf,
                'jy'=>$row->jy,
                'sj'=>$row->sj,
                'openid'=>$row->openid
            );
            $this->db->update('users',$data,array('username'=>$username));
        }

        //判断是否已经领取过红包
        $query = $this->db->where('tel',$tel)->get('hb');
        $res = $query->result();
        $nums = count($res);
        if($nums==0){
            $data2 = array(
                'hb'=>"100",
                'tel'=>$tel
            );
            $this->db->insert('hb',$data2);
            echo 1;
        }else{
            echo 0;
        }
    }



    public function yx_s(){

        $appid = "wx5d993bddcce4b252";
        $appsecret = "e730bab0dd1f052fd8773b6039939026";


        //微信分享
        //获取access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $result = $this->https_request($url);
        $jsoninfo = json_decode($result, true);
        $access_token = $jsoninfo["access_token"];

        //获取ticket
        $url2 = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi";
        $result2 = $this->https_request($url2);
        $jsoninfo2 = json_decode($result2, true);
        $jsapiTicket = $jsoninfo2["ticket"];//从返回json结果中读出openid


        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId"     => $appid,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        $this->load->view('huodong/guoguan',array('signPackage'=>$signPackage));
    }

}