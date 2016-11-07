<?php
/**
 * Created by PhpStorm.
 * User: adc
 * Date: 2015/12/16
 * Time: 15:11
 */
class User extends MY_controller{
//     加载注册页面
     public function registered(){
         $this->load->view('registered');
     }
//     验证账户是否注册并且存档
     public function checkName(){
         $name = $this->input->post('name');
         $psw = $this->input->post('psw');
         $haveUser = $this->getUser($name);
         if($haveUser){
             echo 1;
         }else{
             $data = array(
                 'username'=>$name,
                 'password'=>$psw
             );
             $this->db->insert('users',$data);
             $this->session->set_userdata('username',$name);
             echo 0;
         }
     }

//    登陆加载
    public function login(){
        $this->load->view('login');
    }
//     登录处理
    public function doLogin(){
        $uname = $this->input->post('name');
        $psw = $this->input->post('psw');
        $haveName = $this->getUser($uname);
        if($haveName){
            $password= $haveName->password;
        }else{}
        if(!$haveName||$uname==null){
            //            用户不存在
            echo '0';
        }else if($psw!== $password){
            //            密码不正确
            echo"1";
        }else{
//                         成功登陆
            echo"2";
            $this->session->set_userdata('username',$uname);
        }
    }
    //    退出登录
    public function out(){
        $this->session->unset_userdata('username');
        echo"成功退出登录！";
        $url = "http://localhost/be2/";
        Header("Location: $url");
    }
}
