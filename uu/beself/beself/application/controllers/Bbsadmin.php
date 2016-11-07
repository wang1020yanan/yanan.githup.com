<?php
/**
 * Created by PhpStorm.
 * User: GaoYang
 * Date: 2015/10/20
 * Time: 13:27
 */
class Bbsadmin extends GY_Controller{

    public function tz(){
        $username = $this->session->userdata('username');
        $styler = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        if(empty($page)){
            $page = 1;
        }
        if(empty($styler)){
            $styler = "ring";
            $url = "http://www.25to75.com/bbsadmin/tz/".$styler."/".$page;
            Header("Location: $url");
        }else{
//            $query = $this->db->where('styler',$styler)->get('bbsone');
//            $res = $query->result();
            $res = $this->bbsgetMessage($page,$styler);

            $fenye = $this->bbsfy($styler);
            $this->load->view('bbsadmin/tz',array('res'=>$res,'fenye'=>$fenye));
        }
    }

    //加精
    public function jing(){
        $styler = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $row = $this->getTz($id);
        $data = array(
            'id'=>$id,
            'username'=>$row->username,
            'avatar'=>$row->avatar,
            'telphone'=>$row->telphone,
            'title'=>$row->title,
            'content'=>$row->content,
            'timer'=>$row->timer,
            'styler'=>$row->styler,
            'jing'=>"1"
        );
        $this->db->update('bbsone',$data,array('id'=>$id));
        $url = "http://www.25to75.com/bbsadmin/tz/".$styler;
        Header("Location: $url");
    }

    //根据帖子id查询帖子信息
    public function getTz($id){
        $query = $this->db->where('id',$id)->get('bbsone');
        $row = $query->row();
        return $row;
    }

    //删帖
    public function st(){
        $styler = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->db->delete('bbsone',array('id'=>$id));
        $url = "http://www.25to75.com/bbsadmin/tz/".$styler;
        Header("Location: $url");
    }

    //置顶
    public function zd(){
        $styler = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $row = $this->getTz($id);
        $newid = round(rand(100000,999999));
        $data = array(
            'id'=>$newid,
            'username'=>$row->username,
            'avatar'=>$row->avatar,
            'telphone'=>$row->telphone,
            'title'=>$row->title,
            'content'=>$row->content,
            'timer'=>$row->timer,
            'styler'=>$row->styler,
            'jing'=>"1"
        );

        $query = $this->db->where('bytiezi',$id)->get('bbsread');
        $row2 = $query->row();
        $data2 = array(
            'nums'=>$row2->nums,
            'bytiezi'=>$newid
        );

        $this->db->update('bbsone',$data,array('id'=>$id));
        $this->db->update('bbsread',$data2,array('bytiezi'=>$id));

        $url = "http://www.25to75.com/bbsadmin/tz/".$styler;
        Header("Location: $url");
    }
}
?>