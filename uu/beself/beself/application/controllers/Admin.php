<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/9/2
 * Time: 16:17
 */
class Admin extends GY_Controller{
    private $admin;
    public function __construct(){
        parent::__construct();
        $this->admin = $this->session->userdata('admin');
    }
    public function addProduct(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $this->load->view('admin/addProduct');
        }
    }

    public function login(){
        $this->load->view('admin/login');
    }
    //添加产品
    public function doAdd(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $this->load->helper(array('form', 'url'));

            //文件要求设置
            $config['upload_path'] = './public/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width']  = '2000';
            $config['max_height']  = '2000';
            //生成新文件名
            $config['file_name'] = uniqid();
            //装载文件上传类 , 上传并获取图片名称
            $this->load->library('upload',$config);
            $res=$this->upload->do_upload('pic');
            $data=$this->upload->data();
            $pic = $data['file_name'];

            $res2=$this->upload->do_upload('pic2');
            $data2=$this->upload->data();
            $pic2 = $data2['file_name'];

            $number = $this->input->post('number');
            $name = $this->input->post('name');
            $types = $this->input->post('types');
            $series = $this->input->post('series');
            $price = $this->input->post('price');
            $material = $this->input->post('material');
            $stone = $this->input->post('stone');
            $htmlData = $_POST['content1'];
            $htmlData2 = $_POST['content2'];

            $datax = array(
                'number'=>$number,
                'name'=>$name,
                'types'=>$types,
                'series'=>$series,
                'price'=>$price,
                'material'=>$material,
                'stone'=>$stone,
                'htmlData'=>$htmlData,
                'htmlData2'=>$htmlData2,
                'pic'=>$pic,
                'pic2'=>$pic2
            );
            $this->db->insert('products',$datax);
            $this->products();
            //echo $htmlData;
        }

    }

    //编辑产品页
    public function productMsg(){
        if(empty($this->admin)){
            $this->login();
        }else{
            //获取产品编号
            $number = $this->uri->segment(3);
            //根据产品编号查询产品信息
            $res = $this->getProductMsg($number);

            $this->load->view('admin/updateProduct',array('res'=>$res));
        }
    }

    //编辑产品
    public function updateProduct(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $this->load->helper(array('form', 'url'));

            //文件要求设置
            $config['upload_path'] = './public/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width']  = '2000';
            $config['max_height']  = '2000';
            //生成新文件名
            $config['file_name'] = uniqid();
            //装载文件上传类 , 上传并获取图片名称
            $this->load->library('upload',$config);

            $number = $this->input->post('number');
            $name = $this->input->post('name');
            $types = $this->input->post('types');
            $series = $this->input->post('series');
            $price = $this->input->post('price');
            $material = $this->input->post('material');
            $stone = $this->input->post('stone');
            $htmlData = $_POST['content1'];
            $htmlData2 = $_POST['content2'];
            $picSize = $_FILES['pic']['size'];
            $picSize2 = $_FILES['pic2']['size'];

            $oldernumber = $this->uri->segment(3);
            //根据产品编号查询产品信息
            $productMsg = $this->getProductMsg($oldernumber);


            if($picSize==0){
                $pic = $productMsg->pic;
            }else{
                $res=$this->upload->do_upload('pic');
                $data=$this->upload->data();
                $pic = $data['file_name'];
            }

            if($picSize2==0){
                $pic2 = $productMsg->pic2;
            }else{
                $res2=$this->upload->do_upload('pic2');
                $data2=$this->upload->data();
                $pic2 = $data2['file_name'];
            }

            $datax = array(
                'number'=>$number,
                'name'=>$name,
                'types'=>$types,
                'series'=>$series,
                'price'=>$price,
                'material'=>$material,
                'stone'=>$stone,
                'htmlData'=>$htmlData,
                'htmlData2'=>$htmlData2,
                'pic'=>$pic,
                'pic2'=>$pic2
            );
            $this->db->update('products',$datax,array('number'=>$oldernumber));

            $this->products();
        }

    }

    //产品列表
    public function products(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $page = $this->uri->segment(3);
            if(empty($page)){
                $page = 1;
            }
            $res2 = $this->getProducts();
            $nums = count($res2);
            $fy = $this->goodsfy($nums);
            $n = ($page-1)*15;
            $query=$this->db->order_by('id desc')->get('products',15,$n);
            $res = $query->result();
            $this->load->view('admin/products',array('res'=>$res,'fy'=>$fy));
        }

    }

    //删除产品
    public function delProduct(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $id = $this->uri->segment(3);
            $this->db->delete('products',array('id'=>$id));
            $this->products();
        }
    }

    //判断手机号码是否已注册
    public function checkTel(){
        $number = $this->GetRandStr(4);
        $telphone = $this->input->post('tel');
        //查询admin账号是否有访问权限
        $query = $this->db->where('telphone',$telphone)->get('admin');
        $nums = $query->num_rows();
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

    public function checkAdmin(){
        $telphone = $this->input->post('telphone');
        $pwd = $this->input->post('pwd');
        $query = $this->db->where(array('telphone'=>$telphone,'pwd'=>$pwd))->get('admin');
        $nums = $query->num_rows();
        if($nums < 1){
            echo 0;
        }else{
            $this->session->set_userdata('admin',$telphone);
            echo 1;
        }
    }

    public function countUsers(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $query = $this->db->get('users');
            $res = $query->result();
            $nums = count($res);
            $this->load->view('admin/users',array('nums'=>$nums));
        }
    }

    public function orders(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $page = $this->uri->segment(3);
            if(empty($page)){
                $page = 1;
            }
            $n = ($page-1)*15;
            $fy = $this->adminfy();
            $query = $this->db->where('zt',"已付款")->or_where('zt',"已发货")->order_by('id desc')->get('orders',15,$n);
            $res = $query->result();
            $len = count($res);
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
            $this->load->view('admin/orders',array('data'=>$data,'len'=>$len,'fy'=>$fy));
        }
    }

    public function uporder(){
        if(empty($this->admin)){
            $this->login();
        }else{
            $tradeno = $this->uri->segment(3);
            $query = $this->db->where('tradeno',$tradeno)->get('orders');
            $res = $query->result();
            foreach($res as $vo){
                $data = array(
                    'number'=>$vo->number,
                    'name'=>$vo->name,
                    'num'=>$vo->num,
                    'sizes'=>$vo->sizes,
                    'price'=>$vo->price,
                    'address'=>$vo->address,
                    'fp'=>$vo->fp,
                    'tradeno'=>$tradeno,
                    'subject'=>$vo->subject,
                    'money'=>$vo->money,
                    'pic'=>$vo->pic,
                    'telphone'=>$vo->telphone,
                    'times'=>$vo->times,
                    'zt'=>"已发货"
                );
                $this->db->update('orders',$data,array('tradeno'=>$tradeno));
            }
            $this->orders();
        }
    }
}
?>