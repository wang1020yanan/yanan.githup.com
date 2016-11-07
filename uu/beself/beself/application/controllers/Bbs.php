<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/10/16
 * Time: 11:21
 */
class Bbs extends GY_Controller{
    //帖子首页
    public function sqone(){
        $username = $this->session->userdata('username');
        $styler = $this->uri->segment(3);
        if($styler=="ring"){
            $abc = "戒指";
        }
        if($styler=="pendant"){
            $abc = "吊坠";
        }
        if($styler=="necklace"){
            $abc = "项链";
        }
        if($styler=="wristlet"){
            $abc = "腕饰";
        }
        if($styler=="earrings"){
            $abc = "耳饰";
        }
        $page = $this->uri->segment(4);
        if(empty($page)){
            $page = 1;
        }
        if(empty($styler)){
            $styler = "ring";
            $url = "http://www.25to75.com/bbs/sqone/".$styler."/".$page;
            Header("Location: $url");
        }else{
//            $query = $this->db->where('styler',$styler)->get('bbsone');
//            $res = $query->result();
            $res = $this->bbsgetMessage($page,$styler);
            $len = count($res);
            for($i=0;$i<$len;$i++){
                $bytiezi = $res[$i]->id;
                $query2 = $this->db->where('bytiezi',$bytiezi)->get('bbsread');
                $res2 = $query2->row();
                if(count($res2)==0){
                    $nums = 0;
                }else{
                    $nums = $res2->nums;
                }

                $ress[$i]=array(
                    'res'=>$res[$i],
                    'nums'=>$nums
                );
            }

            $fenye = $this->bbsfy($styler);
            $nows = time();
            //根据日86400秒为单位计算余数
            $ys = $nows%86400;
            //计算第二天凌晨的时间戳
            $sj = $nows-$ys+86400;
            $query5 = $this->db->where('sj',$sj)->get('users');
            $res5 = $query5->result();
            $nums5 = count($res5);
            $this->load->view('bbs/sqone',array('ress'=>$ress,'fenye'=>$fenye,'username'=>$username,'abc'=>$abc,'nums5'=>$nums5));
        }
    }

    //发帖页面
    public function fatie(){
        $username = $this->session->userdata('username');
        $this->load->view('bbs/fatie',array('username'=>$username));
    }

    public function dosend(){
        $title = $this->input->post('title');
        $styler = $this->input->post('styler');
        $content = $this->input->post('content');
        $username = $this->session->userdata('username');
        $res = $this->getAvatar($username);
        $timer =  date("Y-m-d H:i:s",intval(time()));
        if(empty($username)){
            echo 0;
        }else{
            $data = array(
                'title'=>$title,
                'styler'=>$styler,
                'content'=>$content,
                'avatar'=>$res->avatar,
                'username'=>$username,
                'timer'=>$timer,
                'telphone'=>$res->telphone
            );

            $this->db->insert('bbsone',$data);
            echo 1;
        }
    }

    public function content(){
        $id = $this->uri->segment(3);
        //根据帖子id查询本贴信息
        $query = $this->db->where('id',$id)->get('bbsone');
        $res = $query->row();
        //根据帖子id查询浏览量
        $query2 = $this->db->where('bytiezi',$id)->get('bbsread');
        $res2 = $query2->row();

        //根据帖子id查询评论
        $query4 = $this->db->where('bytiezi',$id)->get('huifu');
        $res4 = $query4->result();
        $nums4 = count($res4);

        if(empty($res2)){
            $nums = 1;
            $data = array(
                'nums'=>$nums,
                'bytiezi'=>$id
            );
            $this->db->insert('bbsread',$data);
        }else{
            $nums = $res2->nums+1;
            $data2 = array(
                'nums'=>$nums,
                'bytiezi'=>$id
            );
            $this->db->update('bbsread',$data2,array('bytiezi'=>$id));
        }


        $username = $this->session->userdata('username');
        //根据用户名查询用信息
        $res3 = $this->getAvatar($username);
        //统计本日已签到人数
        $nows = time();
        //根据日86400秒为单位计算余数
        $ys = $nows%86400;
        //计算第二天凌晨的时间戳
        $sj = $nows-$ys+86400;
        $query5 = $this->db->where('sj',$sj)->get('users');
        $res5 = $query5->result();
        $nums5 = count($res5);
        $this->load->view('bbs/content',array('res'=>$res,'nums'=>$nums,'res3'=>$res3,'username'=>$username,'res4'=>$res4,'nums4'=>$nums4,'nums5'=>$nums5));
    }

    public function huifu(){
        $content = $this->input->post('content');
        $username = $this->input->post('username');
        $id = $this->input->post('id');
        $res = $this->getAvatar($username);
        $timer =  date("Y-m-d H:i:s",intval(time()));

        $data = array(
            'username'=>$username,
            'avatar'=>$res->avatar,
            'content'=>$content,
            'timer'=>$timer,
            'bytiezi'=>$id
        );
        $this->db->insert('huifu',$data);
        echo 1;
    }

    //签到
    public function qiandao(){
        //判断用户是否已登陆
        $username = $this->session->userdata('username');
        if(empty($username)){
            echo 0;  //提示登录
        }else{
            //根据用户名查询之前签到的时间戳
            $query = $this->db->where('username',$username)->get('users');
            $res = $query->row();
            $oldsj = $res->sj;
            //获取当前时间戳
            $nows = time();
            if($nows < $oldsj){
                echo 1;   //已签到
            }else{
                //根据日86400秒为单位计算余数
                $ys = $nows%86400;
                //计算第二天凌晨的时间戳
                $sj = $nows-$ys+86400;

                $data = array(
                    'username'=>$username,
                    'password'=>$res->password,
                    'telphone'=>$res->telphone,
                    'avatar'=>$res->avatar,
                    'jf'=>$res->jf,
                    'jy'=>$res->jy+10,
                    'sj'=>$sj
                );
                $this->db->update('users',$data,array('username'=>$username));
                echo 2;   //签到成功
            }
        }
    }

    //我的帖子
    public function mytz(){
        //获取用户名
        $username = $this->session->userdata('username');
        $row = $this->getAvatar($username);
        $telphone = $row->telphone;
        if(empty($username)){
            $this->load->view('user/login');
        }else{
            //根据用户名查询帖子
            $query = $this->db->where('telphone',$telphone)->get('bbsone');
            $res = $query->result();
            $this->load->view('bbs/mytz',array('username'=>$username,'res'=>$res));
        }
    }

    //删除我的帖子
    public function st(){
        //获取用户名
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/login');
        }else {
            $id = $this->uri->segment(3);
            $this->db->delete('bbsone', array('id' => $id));
            $this->mytz();
        }
    }
}
?>