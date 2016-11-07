<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/8/25
 * Time: 11:56
 */
class Best extends GY_Controller{

    //购物车页面,根据sessionid查询购物车页面
    public function gwc(){
        $username = $this->session->userdata('username');
        $gwc = $this->session->userdata('gwc');
        $res = $this->getAllGwc($gwc);
        $len = count($res);
        if($len==0){
            $this->load->view('best/kgwc',array('username'=>$username,'len'=>$len));
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
            $this->load->view('best/gwc',array('data'=>$data,'username'=>$username,'len'=>$len));
        }
    }

    /*
     *产品模块
     */
    
    //根据品类和系列查询产品信息
    public function getProducts(){
        $username = $this->session->userdata('username');
        $type = $this->uri->segment(3);
        $series = $this->uri->segment(4);
        $res = $this->getTypeSeriesProducts($type,$series);
        $this->load->view('best/fenlei',array('res'=>$res,'username'=>$username,'series'=>$series));
    }

    //根据产品编号查询对应的产品信息
    public function getSingleProduct(){
        $username = $this->session->userdata('username');
        $number = $this->uri->segment(3);
        $res = $this->getProductMsg($number);
        $this->load->view('best/single',array('res'=>$res,'username'=>$username));
    }

    public function getBuyMsg(){
        $username = $this->session->userdata('username');
        $number = $this->uri->segment(3);
        $res = $this->getProductMsg($number);
        $this->load->view('best/buy',array('res'=>$res,'username'=>$username));
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

    //结算生成预订单
    public function preOrders(){

        $arr = $this->input->post('arr');
        //生成订单号tradeno，保证每个订单号都不同
        $now = time();
        $numbers = $this->GetRandStr(5);
        $tradeno = ($now-1436200000).$numbers;

        $gwc = $this->session->userdata('gwc');
        $username = $this->session->userdata('username');
        $res = $this->getAvatar($username);
        if(empty($username)){
            echo 0;
        }else{
            $this->db->delete('gwc',array('gwc'=>$gwc));
            foreach($arr as $vo){
                $data = array(
                    'number' => $vo[0],   //产品编号
                    'pic' => $vo[1],      //产品图片
                    'name' => $vo[2],     //产品名称
                    'num' => $vo[3],      //产品数量
                    'sizes' => $vo[4],    //产品尺寸
                    'money' => $vo[5],    //订单总金额
                    'price'=>$vo[6],
                    'tradeno' => $tradeno, //订单号
                    'subject'=>"Beself订单:".$tradeno,
                    'telphone'=>$res->telphone,
                    'zt'=>"未付款"
                );
                //将预订单存入数据库
                $this->db->insert('orders',$data);
            }
            echo $tradeno;
        }
    }
    //给预订单添加收获地址及信息
    public function preAddress(){
        $tradeno = $this->input->post('tradeno');
        $name = $this->input->post('name');
        $telphone = $this->input->post('telphone');
        $address = $this->input->post('address');
        $fp = $this->input->post('fp');

        $addresss = $name.$telphone.": ".$address;
        //根据订单号查询未付款该订单信息
        $query = $this->db->where('tradeno',$tradeno)->get('orders');
        $res = $query->result();

        foreach($res as $vo){
            $data = array(
                'number'=>$vo->number,
                'name'=>$vo->name,
                'num'=>$vo->num,
                'sizes'=>$vo->sizes,
                'price'=>$vo->price,
                'address'=>$addresss,
                'fp'=>$fp,
                'tradeno'=>$tradeno,
                'subject'=>$vo->subject,
                'money'=>$vo->money,
                'pic'=>$vo->pic,
                'telphone'=>$vo->telphone,
                'zt'=>"未付款"
            );
            $this->db->update('orders',$data,array('tradeno'=>$tradeno));
        }
        echo 1;
    }

    //订单页
    public function ding(){
        $username = $this->session->userdata('username');
        $tradeno = $this->uri->segment(3);
        //根据订单号查询待付款产品
        $query = $this->db->where('tradeno',$tradeno)->get('orders');
        $res = $query->result();
        $row = $query->row();
        $subject = $row->subject;
        $Allmoney = $res[0]->money;

        $res2 = $this->getAvatar($username);
        $res3 = $this->db->where('tel',$res2->telphone)->get('hb');
        $hb = $res3->row();
        if(empty($hb->hb)){
            $money = $Allmoney;
        }else{
            $money = $Allmoney - $hb->hb;
        }
        $this->load->view('best/ding',array('res'=>$res,'money'=>$money,'tradeno'=>$tradeno,'subject'=>$subject,'username'=>$username,'hb'=>$hb,'allmoney'=>$Allmoney));
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
        $row = $this->getAvatar($username);
        //根据用户名查询已付款订单
        $query = $this->db->where(array('telphone'=>$row->telphone,'zt'=>"已付款"))->group_by('tradeno')->order_by('id desc')->get('orders');
        $res = $query->result();
        $len = count($res);

        if($len==0){
            $this->load->view('best/kddlb',array('username'=>$username));
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

            $this->load->view('best/ddlb',array('username'=>$username,'data'=>$data));
        }
    }



    public function dx(){
        $times = date("YmdHis",intval(time()));
        $taskId = "SHbatan915_".$times."_http_".round(rand(1,999999));
        $url = "http://sms.huoni.cn:8080/smshttp/infoSend?account=SHbatan915&password=gaotan999&content=【巴钽】您的验证码为1678&sendtime=&phonelist=18602110730&taskId=$taskId";
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

        echo $content,"</br>";
        echo "<hr>";
        print_r($rinfo);
    }



    public function test(){
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/best/test2/';
        $config['total_rows'] = 200;         //总条数
        $config['per_page'] = 20;            //每页显示的条数
        $config['use_page_numbers'] = TRUE;  //开启后url参数由总条数变为页数
        //$config['display_pages'] = FALSE;    //如果你不想显示数字链接（例如你只想显示上一页和下一页链接）
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $config['next_link'] = "下页";
        $config['prev_link'] = '上页';
        $config['first_link'] = "首页";
        $config['last_link'] = "末页";
        $this->pagination->initialize($config);

        $fenye =  $this->pagination->create_links();
        $this->load->view('best/test',array('fenye'=>$fenye));
    }





    public function js(){
        $username = $this->session->userdata('username');
        $name = $this->uri->segment(3);
        $number = $this->uri->segment(4);
        $this->load->view('best/cz',array('number'=>$number,'name'=>$name,'username'=>$username));
    }

    //模糊搜索
    public function search(){
        $search = $this->input->post('search');
        $query = $this->db->like('name', $search, 'both')->get('products');
        $row = $query->row();
        if(empty($row->number)){
            $url ="http://www.25to75.com";
        }else{
            $url = "http://www.25to75.com/best/getSingleProduct/".$row->number;
        }
        Header("Location: $url");
    }

}
?>