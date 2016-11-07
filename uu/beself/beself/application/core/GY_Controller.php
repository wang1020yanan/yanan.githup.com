<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/8/25
 * Time: 10:50
 */
class GY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $gwc = $this->session->userdata('gwc');
        if($gwc=="" || $gwc==null){
            $gwc = uniqid();
            $this->session->set_userdata('gwc',$gwc);
        }
    }

    //验证用户是否登陆
    public function isLogin(){
        $username = $this->session->userdata('username');
        if($username == "" || $username ==null){
            $username = 0;
        }
        return $username;
    }

    //验证用户登录的用户名和密码是否正确
    public function checkLogin($telphone,$password){
        $query = $this->db->where(array('telphone'=>$telphone,'password'=>$password))->get('users');
        $nums = $query->num_rows();
        return $nums;
    }

    //验证手机号码是否已注册
    public function isRegister($telphone){
        $query = $this->db->where('telphone',$telphone)->get('users');
        $nums = $query->num_rows();
        return $nums;
    }
    //验证手机号码是否已注册
    public function isNameRegister($username){
        $query = $this->db->where('username',$username)->get('users');
        $nums = $query->num_rows();
        return $nums;
    }

    //根据手机号码查询用户信息
    public function getUserMsg($telphone){
        $query = $this->db->where('telphone',$telphone)->get('users');
        $row = $query->row();
        return $row;
    }

    //根据用户名查询用户的信息
    public function getAvatar($username){
        $query = $this->db->where('username',$username)->get('users');
        $row = $query->row();
        return $row;
    }

    /*
     * 产品信息模块
     * */

    //查询所有产品信息
    public function getProducts(){
        $query = $this->db->get('products');
        $res = $query->result();
        return $res;
    }
    //根据种类查询对应产品信息
    public function getTypeProducts($types){
        $query = $this->db->where('types',$types)->get('products');
        $res = $query->result();
        return $res;
    }

    //根据系列查询产品信息信息
    public function getSeriesProducts($series){
        $query = $this->db->where('series',$series)->get('products');
        $res = $query->result();
        return $res;
    }

    //根据编号查询产品信息
    public function getProductMsg($number){
        $query = $this->db->where('number',$number)->get('products');
        $row = $query->row();
        return $row;
    }

    //根据种类和系列查询产品信息
    public function getTypeSeriesProducts($types,$series){
        $query = $this->db->where(array('types'=>$types,'series'=>$series))->get('products');
        $res = $query->result();
        return $res;
    }

    //根据sessionid查询购物车信息
    public function getAllGwc($gwc){
        $query = $this->db->where('gwc',$gwc)->get('gwc');
        $res = $query->result();
        return $res;
    }

    //根据订单号查询订单信息
    public function getOrderMgs($tradeno){
        $query = $this->db->where('tradeno',$tradeno)->get('orders');
        $res = $query->result();
        return $res;
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

    //分页器
    public function fy(){
        $query = $this->db->get('messages');
        $res = $query->result();
        $nums = count($res);
        $this->load->library('pagination');
        $config['base_url'] = 'http://www.25to75.com/welcome/index';
        $config['total_rows'] = $nums;         //总条数
        $config['per_page'] = 3;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<div>';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        return $fenye;
    }
    //留言板分页查询
    public function getMessage($page){
//        $o = ($page-1)*3;
//        $n = $page*3;
//        $query = $this->db->query ( "select * from gy_messages order by id DESC limit $o,$n" );
        $query=$this->db->order_by('id desc')->get('messages',3,$page-1);
        $res = $query->result();
        return $res;
    }


//
//    //分页查询
//    public function page($series,$types,$o,$n){
//        $result = $this->db->query ( "select * from gy_products where series=$series AND types=$types order by id desc limit $o,$n" );
//    }
//

    //分页器
    public function bbsfy($styler){
        $query = $this->db->where('styler',$styler)->get('bbsone');
        $res = $query->result();
        $nums = count($res);
        $this->load->library('pagination');
        $config['base_url'] = 'http://www.25to75.com/bbs/sqone/'.$styler;
        $config['total_rows'] = $nums;         //总条数
        $config['per_page'] = 15;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<div>';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        return $fenye;
    }
    //留言板分页查询
    public function bbsgetMessage($page,$styler){
        $n = ($page-1)*15;
        $query=$this->db->where('styler',$styler)->order_by('id desc')->get('bbsone',15,$n);
        $res = $query->result();
        return $res;
    }

    //后台分页器
    public function bbsadminfy($styler){
        $query = $this->db->where('styler',$styler)->get('bbsone');
        $res = $query->result();
        $nums = count($res);
        $this->load->library('pagination');
        $config['base_url'] = 'http://www.25to75.com/bbsadmin/tz/'.$styler;
        $config['total_rows'] = $nums;         //总条数
        $config['per_page'] = 15;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<div>';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        return $fenye;
    }

    public function adminfy(){
        $query = $this->db->where('zt',"已付款")->or_where('zt',"已发货")->get('orders');
        $res = $query->result();
        $nums = count($res);
        $this->load->library('pagination');
        $config['base_url'] = 'http://www.25to75.com/admin/orders/';
        $config['total_rows'] = $nums;         //总条数
        $config['per_page'] = 15;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<div>';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        return $fenye;
    }

    public function goodsfy($nums){
        $this->load->library('pagination');
        $config['base_url'] = 'http://www.25to75.com/admin/products/';
        $config['total_rows'] = $nums;         //总条数
        $config['per_page'] = 15;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<div>';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        return $fenye;
    }

}
?>