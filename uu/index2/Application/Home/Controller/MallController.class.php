<?php
namespace Home\Controller;
use Think\Controller;
class MallController extends Controller {
    public function mall(){
		
		//die;
		if(empty($_SESSION['userID'])){
			$userID = I('get.userID');
			session_start;
			session('userID',$userID);
		}else{
			$userID = $_SESSION['userID'];
			
		}
		
		
			
		$score = M('student_score');
		$scoreList = $score->where("userID=$userID")->order('createTime desc')->limit(1)->find();
		if(!$scoreList){
			$totalScore = 0;
		}else{
			$totalScore = $scoreList['totalscore'];
		}
		
		$this->assign('totalScore',$totalScore);
		$this->display();
		
    }
	
	public function record(){
		$userID = I('get.userID');
		$score = M('student_score');
		$scoreList = $score->where("userID=$userID")->order('createTime desc')->limit(10)->select();
		foreach($scoreList as &$value){
			$value['createtime'] = date('Y-m-d', $value['createtime']) ;
		}
		$this->assign('scoreList', $scoreList);
		$this->display('record');
    }
	
	public function buy(){
		$userID = $_SESSION['userID'];	
		$price = I('post.price');
		$addScore = - $price;
		$Form = M('send_goods');
		
		if($Form->create()) {
			
			$Form->createTime = time();
			$result = $Form->add();
		}
		
		
		
		$score = M('student_score');
		$scoreList = $score->field('totalScore')->where("userID=$userID")->order('createTime desc')->limit(1)->find();
		$totalScore = $scoreList['totalscore'];
		$score->totalScore = $totalScore + $addScore;
		$score->addScore = $addScore;
		$score->createTime = time();
		$score->reason = '积分兑换';
		$score->userID = $userID;
		$score->add();
		
		$this->redirect('/index/home/mall/wait');
	}

}