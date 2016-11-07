<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/9/14
 * Time: 11:41
 */
class Welcome extends GY_Controller{
    public function index(){
        $page = $this->uri->segment(3);
        if(empty($page)){
            $page = 1;
        }
        $res = $this->getMessage($page);
        $fenye = $this->fy();
        $username = $this->session->userdata('username');
        $this->load->view('welcome_message',array('username'=>$username,'fenye'=>$fenye,'res'=>$res));
    }

    //用户发表留言
    public function giveMsg(){
        $username = $this->session->userdata('username');
        $content = $this->input->post('content');
        if(empty($username)){
            echo 0;
        }else{
            $times = date("Y-m-d H:i:s",intval(time()));
            //根据用户名查询用户的头像
            $row = $this->getAvatar($username);
            $avatar = $row->avatar;

            $data = array(
                'username'=>$username,
                'content'=>$content,
                'avatar'=>$avatar,
                'times'=>$times
            );
           $this->db->insert('messages',$data);
            echo 1;
        }
    }
    public function times(){
        $times = date("Y-m-d H:i:s",intval(time()));
        echo $times;
    }

    //退出登录
    public function tuichu(){
        unset($_SESSION['username']);
        $url = "http://www.25to75.com";
        Header("Location: $url");
    }
}
?>