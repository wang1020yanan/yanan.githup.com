<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/10/21
 * Time: 16:05
 */

class Mobile extends GY_Controller{
    //首页
    public function mb_1(){
        $username = $this->session->userdata('username');
        $avatar = $this->session->userdata('avatar');
        $this->load->view('mobile/mb_1',array('username'=>$username,'avatar'=>$avatar));
    }
    //根据品类和系列查询产品信息
    public function getProducts(){
        $username = $this->session->userdata('username');
        $avatar = $this->session->userdata('avatar');
        $type = $this->uri->segment(3);
        $series = $this->uri->segment(4);
        $res = $this->getTypeProducts($type);
        $this->load->view('mobile/mb_fenlei',array('res'=>$res,'username'=>$username,'avatar'=>$avatar));
    }
    //根据产品编号查询对应的产品信息
    public function getSingleProduct(){
        $username = $this->session->userdata('username');
        $avatar = $this->session->userdata('avatar');
        $number = $this->uri->segment(3);
        $res = $this->getProductMsg($number);
        $this->load->view('mobile/mb_single',array('res'=>$res,'username'=>$username,'avatar'=>$avatar));
    }

    public function getBuyMsg(){
        $username = $this->session->userdata('username');
        $avatar = $this->session->userdata('avatar');
        $number = $this->uri->segment(3);
        $res = $this->getProductMsg($number);
        $this->load->view('mobile/mb_buy',array('res'=>$res,'username'=>$username,'avatar'=>$avatar));
    }
    //购物车页面,根据sessionid查询购物车页面
    public function gwc(){
        $username = $this->session->userdata('username');
        $avatar = $this->session->userdata('avatar');
        $gwc = $this->session->userdata('gwc');
        $res = $this->getAllGwc($gwc);
        $len = count($res);
        if($len==0){
            $this->mb_1();
        }else{
            for($i=0;$i<$len;$i++){
                //获取产品编号
                $number = $res[$i]->number;
                //根据产品编号查询产品信息
                $msg = $this->getProductMsg($number);
                $data[$i] = array(
                    'msg'=>$msg,
                    'id'=>$res[$i]->id,
                    'sizes'=>$res[$i]->sizes
                );
            }
            $this->load->view('mobile/mb_gwc',array('data'=>$data,'username'=>$username,'len'=>$len,'avatar'=>$avatar));
        }
    }
    //加入购物车
    public function addGwc(){
        $number = $this->input->post('number');
        $sizes = $this->input->post('sizes');
        $gwc = $this->session->userdata('gwc');
        $times = time();

        $data = array(
            'number'=>$number,
            'sizes'=>$sizes,
            'gwc'=>$gwc,
            'times'=>$times
        );
        $this->db->insert('gwc',$data);
        $this->gwc();
    }

    //删除购物车产品
    public function delGwc(){
        $id = $this->uri->segment(3);
        $this->db->delete('gwc',array('id'=>$id));
        $this->gwc();
    }

    //订单页
    public function ding(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/login');
        }else{
            $row2 = $this->getAvatar($username);
            $tradeno = $this->uri->segment(3);
            //根据订单号查询待付款产品
            $query = $this->db->where('tradeno',$tradeno)->get('orders');
            $res = $query->result();
            $row = $query->row();
            $subject = $row->subject;
            $Allmoney = $res[0]->money;
            //根据手机号查询是否有红包
            $res2 = $this->db->where('tel',$row2->telphone)->get('hb');
            $hb = $res2->row();
            if(empty($hb->hb)){
                $money = $Allmoney;
            }else{
                $money = $Allmoney-100;
            }
            $this->load->view('mobile/mb_ding',array('res'=>$res,'money'=>$money,'tradeno'=>$tradeno,'subject'=>$subject,'username'=>$username,'avatar'=>$row2->avatar,'hb'=>$hb));
        }
    }

    //生成随机数
    public function GetRandStr($length){
        $str='0123456789';
        $len=strlen($str)-1;
        $randstr='';
        for($i=0;$i<$length;$i++){
            $num=mt_rand(0,$len);
            $randstr .= $str[$num];
        }
        return $randstr;
    }

    public function ddlb(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/login');
        }else {
            //根据用户名查询已付款订单
            $row = $this->getAvatar($username);
            $query = $this->db->where(array('telphone'=>$row->telphone,'zt'=>"已付款"))->group_by('tradeno')->order_by('id desc')->get('orders');
            $res = $query->result();
            $len = count($res);
            if($len==0){
                $this->mb_1();
            }else{
                for($i=0;$i<$len;$i++){
                    //获取订单号
                    $tradeno = $res[$i]->tradeno;
                    //获取收获地址
                    $address = $res[$i]->address;
                    //获取订单总金额
                    $money = $res[$i]->money;
                    //获取订单时间
                    $times = $res[$i]->times;
                    //获取订单状态
                    $zt = $res[$i]->zt;
                    //根据订单号查询订单信息
                    $msg = $this->getOrderMgs($tradeno);
                    $data[$i] = array(
                        'msg'=>$msg,
                        'tradeno'=>$tradeno,
                        'address'=>$address,
                        'money'=>$money,
                        'times'=>$times,
                        'zt'=>$zt
                    );
                }

                $this->load->view('mobile/mb_dd',array('username'=>$username,'data'=>$data,'avatar'=>$row->avatar));
            }
        }

    }

    //红包
    public function getHb(){
        $username = $this->session->userdata('username');
        if(empty($username)){
            $this->load->view('user/login');
        }else{
            $row = $this->getAvatar($username);
            $res = $this->db->where('tel',$row->telphone)->get('hb');
            $hb = $res->row();
            $this->load->view('mobile/mb_hb',array('hb'=>$hb,'username'=>$username,'avatar'=>$row->avatar));
        }
    }
}