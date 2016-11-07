<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 2015/7/8
 * Time: 12:31
 */
class Alipay extends GY_Controller{
    //付款成功之后，获取订单数据，并存储到订单表
    public function go(){
        //商户订单号

        $out_trade_no = $_POST['out_trade_no'];

        //支付宝交易号

        $trade_no = $_POST['trade_no'];

        //交易状态
        $trade_status = $_POST['trade_status'];

        //商品名称
        $subject = $_POST['subject'];

        //付款金额
        $total_fee = $_POST['total_fee'];

        //根据订单号查询未付款信息
        $query = $this->db->where('tradeno',$out_trade_no)->get('orders');
        $res = $query->result();
        $row = $query->row();

        //付款时间
        $times = date("Y-m-d H:i:s",intval(time()));

        foreach($res as $vo){
            $data = array(
                'number'=>$vo->number,
                'name'=>$vo->name,
                'num'=>$vo->num,
                'sizes'=>$vo->sizes,
                'price'=>$vo->price,
                'address'=>$vo->address,
                'fp'=>$vo->fp,
                'tradeno'=>$out_trade_no,
                'subject'=>$subject,
                'money'=>$total_fee,
                'pic'=>$vo->pic,
                'telphone'=>$vo->telphone,
                'times'=>$times,
                'zt'=>"已付款"
            );
            $this->db->update('orders',$data,array('tradeno'=>$out_trade_no));
        }
        $this->db->delete('hb',array('tel'=>$row->telphone));
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
}
?>