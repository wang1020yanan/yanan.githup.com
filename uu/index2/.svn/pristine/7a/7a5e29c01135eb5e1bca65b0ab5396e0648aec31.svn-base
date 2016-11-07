<?php
	namespace Mobile\Controller;
	use Think\Controller;
	
	class CourseController extends Controller{
		
		public function getCourse(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$course = M("mycourseinformation"); // 实例化对象
			$data = $course->field("coursetype,coursegrade,coursemoney")->where("userID={$_SESSION['userID']}")->order("coursetype,coursegrade")->select();
			
			echo json_encode($data);
		}
		
		public function setCourse(){
			$userID = $_POST['userID'];			
			$coursePost = $_POST['course'];
			
			$course = M("mycourseinformation"); // 实例化对象
			$course->where("userID={$userID}")->delete();
			$courseList = json_decode($coursePost, true);
			if(empty($courseList[0][courseType])){
				$data['code'] = '200';
				$data['message'] = '课程设置成功';
				$this->ajaxReturn($data);
				exit;
			}
			
			
		
			
			foreach($courseList as $key=>$value){
				$courseList[$key]['userID'] = $userID;
				$courseList[$key]['createTime'] = time();
			}
			
			

			
			$result = $course->addAll($courseList, array(), true);
			
			if($result){
				$data['code'] = '200';
				$data['message'] = '课程设置成功';
				$this->ajaxReturn($data);
			}else{
				$data['code'] = '500';
				$data['message'] = '服务器内部错误';
				$this->ajaxReturn($data);
			}
		}
		
	}
