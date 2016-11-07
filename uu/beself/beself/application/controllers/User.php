<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/8/28
 * Time: 14:19
 */
class User extends GY_Controller{
    //登陆页面
    public function login(){
        $this->load->view('user/login');
    }

    //注册页面
    public function register(){
        $this->load->view('user/register');
    }

    //判断手机号码是否已注册
    public function checkTel(){
        $number = $this->GetRandStr(4);
        $telphone = $this->input->post('tel');
        $nums = $this->isRegister($telphone);
        if($nums > 0){
            echo 1;
        }else{
            $times = date("YmdHis",intval(time()));
            $taskId = "SHbatan915_".$times."_http_".round(rand(1,999999));
            $url = "http://sms.huoni.cn:8080/smshttp/infoSend?account=SHbatan915&password=gaotan999&content=【Beself】您的验证码为$number&sendtime=&phonelist=$telphone&taskId=$taskId";
            //Header("Location: $url");
            //echo round(rand(1,999999));
            //echo date("YmdHis",intval(time()));
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            //curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HEADER, 1);//返回response头部信息
            curl_setopt($ch, CURLOPT_NOBODY, 1);//不返回response body内容
            //curl_setopt($ch, CURLOPT_MAXREDIRS, 1);//设置请求最多重定向的次数
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//不直接输出response
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);//如果返回的response 头部中存在Location值，就会递归请求
            $content=curl_exec($ch);
            $rinfo=curl_getinfo($ch);
            echo $number;
        }
    }
    //注册处理
    public function doRegister(){
        $telphone = $this->input->post('telphone');
        $password = $this->input->post('pwd');

        $nums = $this->isRegister($telphone);
        if($nums > 0){
            echo 1;
        }else{
            $data = array(
                'username'=>$telphone,
                'password'=>$password,
                'telphone'=>$telphone,
                'avatar'=>"avatar.jpg"
            );
            $this->db->insert('users',$data);
            $this->session->set_userdata('username',$telphone);
            echo 0;
        }
    }

    //登陆处理
    public function doLogin(){
        $telphone = $this->input->post('telphone');
        $password = $this->input->post('password');
        $nums = $this->checkLogin($telphone,$password);
        if($nums > 0){
            $res = $this->getUserMsg($telphone);
            $username = $res->username;
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('avatar',$res->avatar);
            echo 1;
        }else{
            echo 0;
        }
    }



    //修改密码
    public function changePwd(){
        $this->load->view('user/changePwd');
    }

    //判断手机号码是否已注册
    public function checkChange(){
        $number = $this->GetRandStr(4);
        $telphone = $this->input->post('tel');
        $nums = $this->isRegister($telphone);
        if($nums > 0){
            $times = date("YmdHis",intval(time()));
            $taskId = "SHbatan915_".$times."_http_".round(rand(1,999999));
            $url = "http://sms.huoni.cn:8080/smshttp/infoSend?account=SHbatan915&password=gaotan999&content=【Beself】您的验证码为$number&sendtime=&phonelist=$telphone&taskId=$taskId";
            //Header("Location: $url");
            //echo round(rand(1,999999));
            //echo date("YmdHis",intval(time()));
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            //curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HEADER, 1);//返回response头部信息
            curl_setopt($ch, CURLOPT_NOBODY, 1);//不返回response body内容
            //curl_setopt($ch, CURLOPT_MAXREDIRS, 1);//设置请求最多重定向的次数
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//不直接输出response
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);//如果返回的response 头部中存在Location值，就会递归请求
            $content=curl_exec($ch);
            $rinfo=curl_getinfo($ch);
            echo $number;
        }else{
            echo 0;
        }
    }
    //处理修改密码
    public function doChange(){
        $telphone = $this->input->post('telphone');
        $password = $this->input->post('pwd');

        $row = $this->getUserMsg($telphone);
        $data = array(
            'username'=>$row->username,
            'password'=>$password,
            'telphone'=>$telphone
        );
        $this->db->update('users',$data,array('telphone'=>$telphone));
        echo 1;

    }

    //用户中心
    public function ucenter(){
        $username = $this->session->userdata('username');
        $row = $this->getAvatar($username);
        //根据用户名查询已付款订单
        $query = $this->db->select('*')->from('orders')
            ->group_start()
            ->where('telphone', $row->telphone)
            ->where('zt', '已付款')
            ->or_group_start()
            ->where('telphone', $row->telphone)
            ->where('zt',"已发货")
            ->group_end()
            ->group_end()
            ->group_by('tradeno')->order_by('id desc')->get();
        $res = $query->result();
        $len = count($res);
        $gwc = $this->session->userdata('gwc');
        $res = $this->getAllGwc($gwc);
        $len2 = count($res);

        //根据手机号码查询是否有红包
        $res2 = $this->db->where('tel',$row->telphone)->get('hb');
        $hb = $res2->row();
        $res = $this->getAvatar($username);
        if(empty($res->avatar)){
            $avatar = "avatar.jpg";
        }else{
            $avatar = $res->avatar;
        }
        $this->load->view('user/me',array('username'=>$username,'res'=>$res,'avatar'=>$avatar,'len'=>$len,'len2'=>$len2,'hb'=>$hb));
    }

    //修改昵称
    public function nicheng(){

        $username = $this->input->post('nicheng');
        $query = $this->db->where('username',$username)->get('users');
        $res2 = $query->result();
        $nums = count($res2);
        if($nums > 0){
            echo 0;
        }else{
            $old = $this->session->userdata('username');
            $res = $this->getAvatar($old);
            $data = array(
                'username'=>$username,
                'password'=>$res->password,
                'telphone'=>$res->telphone,
                'avatar'=>$res->avatar,
                'jf'=>$res->jf,
                'jy'=>$res->jy,
                'sj'=>$res->sj
            );
            $this->db->update('users',$data,array('username'=>$old));
            $this->session->set_userdata('username',$username);
            echo 1;
        }
    }

    public function testAvatar(){
        $this->load->view('test/test2');
    }



    //领取红包自动注册
    public function checkTel2(){
        $number = $this->GetRandStr(6);
        $telphone = $this->input->post('tel');
        $nums2 = $this->isRegister($telphone);
        if($nums2 == 0){
            $times = date("YmdHis",intval(time()));
            $taskId = "SHbatan915_".$times."_http_".round(rand(1,999999));
            $url = "http://sms.huoni.cn:8080/smshttp/infoSend?account=SHbatan915&password=gaotan999&content=【Beself】恭喜能成为Beself+会员，您的初始密码为$number&sendtime=&phonelist=$telphone&taskId=$taskId";
            //Header("Location: $url");
            //echo round(rand(1,999999));
            //echo date("YmdHis",intval(time()));
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            //curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HEADER, 1);//返回response头部信息
            curl_setopt($ch, CURLOPT_NOBODY, 1);//不返回response body内容
            //curl_setopt($ch, CURLOPT_MAXREDIRS, 1);//设置请求最多重定向的次数
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//不直接输出response
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);//如果返回的response 头部中存在Location值，就会递归请求
            $content=curl_exec($ch);
            $rinfo=curl_getinfo($ch);

        }


        //判断是否已经领取过红包
        $query = $this->db->where('tel',$telphone)->get('hb');
        $res = $query->result();
        $nums = count($res);
        if($nums==0){
            $data2 = array(
                'hb'=>"100",
                'tel'=>$telphone
            );
            $this->db->insert('hb',$data2);
            echo 1;
        }else{
            echo 0;
        }
    }
}
?>