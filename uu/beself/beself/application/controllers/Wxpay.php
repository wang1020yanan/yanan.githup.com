<?php
/**
 * Created by PhpStorm.
 * User: 高杨
 * Date: 2015/11/23
 * Time: 15:01
 */
class Wxpay extends GY_Controller{
    public function notify(){
        //商户订单号

        $out_trade_no = $this->input->post('aa');

        //付款金额
        $total_fee = $this->input->post('cc');

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
                'subject'=>$vo->subject,
                'money'=>$total_fee,
                'pic'=>$vo->pic,
                'telphone'=>$vo->telphone,
                'times'=>$times,
                'zt'=>"已付款"
            );
            $this->db->update('orders',$data,array('tradeno'=>$out_trade_no));
        }
        $this->db->delete('hb',array('tel'=>$row->telphone));
        echo 1;
    }

    public function deletw(){
        $this->db->delete('orders',array('zt'=>"未付款"));
    }
}
?>