<?php
/**
 * Created by PhpStorm.
 * User: adc
 * Date: 2015/12/2
 * Time: 16:30
 */
class MY_controller extends CI_Controller {
       public function __construct(){
           parent::__construct();
       }

//     判断是否登录
      public function isLogin(){
          $name = $this->session->userdata('username');
          if($name){
              return 1;
          }else{
              return'0';
          }
      }
//     根据账号名查询用户
      public function  getUser($name){
        $user =  $this->db->where('username',$name)->get('users');
        $res = $user->row();
        return $res;
      }
//      根据分类查询产品
      public function getProductByClassification($classIfCation){
        $products=$this->db->where('types',$classIfCation)->get('products');
        $res=$products->result();
        return $res;
      }
//     根据分类和系列查询产品
      public function getProductsBySeries($classIfCation,$series){
        $products=$this->db->where(array('types'=>$classIfCation,'series'=>$series))->get('products');
        $res=$products->result();
        return $res;
      }
//     根据系列查询产品
      public function getProductBySe($series){
          $products=$this->db->where('series',$series)->get('products');
          $res=$products->result();
          return $res;
      }
//     根据编码查询产品
      public function getProByNm($number){
          $products=$this->db->where('number',$number)->get('products');
          $res=$products->row();
          return $res;
      }
}