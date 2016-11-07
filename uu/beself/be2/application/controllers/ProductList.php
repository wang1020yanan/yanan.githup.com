<?php
/**
 * Created by PhpStorm.
 * User: adc
 * Date: 2015/12/3
 * Time: 10:39
 */
class ProductList extends  MY_controller{
//     查询
      public function  listFen($classIfCation,$series){
          if($series=="wu"){
              $res=$this->getProductByClassification($classIfCation);
              $data['proList']=$res;
              $data['name']=$this->isLogin();
              $data['fl']=$classIfCation;
              $data['xl']="";
              $uname = $this->session->userdata('username');
              $data['is']=$this->isLogin();
              $data['uname']=$uname;
              $this->load->view('ProductList',$data);
          }else{
              $res=$this->getProductsBySeries($classIfCation,$series);
              $data['proList']=$res;
              $data['name']=$this->isLogin();
              $data['fl']=$classIfCation;
              $data['xl']=$series;
              $uname = $this->session->userdata('username');
              $data['is']=$this->isLogin();
              $data['uname']=$uname;
              $this->load->view('ProductList',$data);
          }

      }
//       查询
      public function seList($classIfCation,$series){
             $res=$this->getProductBySe($series);
             $data['proList']=$res;
             $data['name']=$this->isLogin();
             $data['fl']="";
             $data['xl']=$series;
             $uname = $this->session->userdata('username');
             $data['is']=$this->isLogin();
             $data['uname']=$uname;
             $this->load->view('ProductList',$data);
      }
//    编码查询产品
      public function single($number){
             $res=$this->getProByNm($number);
             $data['single']=$res;
             $data['name']=$this->isLogin();
             $a=22;
             $uname = $this->session->userdata('username');
             $data['is']=$this->isLogin();
             $data['uname']=$uname;
             $this->load->view('single',$data);
      }
      public function test(){
          $this->load->view('test');
      }

}