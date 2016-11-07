<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/10/23
 * Time: 18:13
 */
class Huod extends GY_Controller{
    public function hd_1(){
        $this->load->view('huodong/hd_1');
    }
    public function hd_2(){
        $this->load->view('huodong/hd_2');
    }
    public function hd_2_2(){
        $this->load->view('huodong/hd_2_2');
    }
    public function lc(){
        $this->load->view('lucky');
    }
    public function shou(){
        $this->load->view('welcome_message');
    }
    public function guoguan(){
        $this->load->view('huodong/guoguan');
    }
    public function moon(){
        $this->load->view('huodong/moon');
    }
    public function scarf(){
        $this->load->view('huodong/scarf');
    }
}
?>