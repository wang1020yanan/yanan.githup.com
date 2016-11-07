<?php
	namespace Home\Controller;
	use Think\Controller;
	
	class TeacherCenterController extends Controller{
		function _initialize(){
			if(empty($_SESSION['userID'])){
				$this->error('请登录', U('home/Index/login'), 2);
			}
		}
		
		public function index(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			if ($ifVerify == 2){
				$this->display('mtrue');
			} else if ($ifVerify == 3){
				$this->display('mfalse');
			} else{
				$this->redirect('home/TeacherCenter/teacherCenter');
			}
		}
		
		public function getDetailVerifyResult(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifUploadProfile = $User->where("userID={$_SESSION['userID']}")->getField('ifUploadProfile');
			echo $ifUploadProfile;
		}
		
		public function getTeachingAge(){
			$userID = $_SESSION['userID'];
			$verify = M("teacherverify");
			echo $teachingAge = $verify->where("userID={$_SESSION['userID']}")->getField('teachingAge');

		}
		
		public function teacherCenter(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$detail = M("teacherverify"); // 实例化对象
			$data = $detail->where("userID={$_SESSION['userID']}")->find();
			
			$pic = M("uploadteachermypictable"); // 实例化对象
			$data2 = $pic->where("userID={$_SESSION['userID']}")->find();
			
			$data['picUrl'] = $data2['imageurl'];
			$this->assign($data);
			
			//echo $data['signiture'];
			if ($ifVerify == 0 || $ifVerify == 3){
				$this->display('f-center');
			} else if ($ifVerify == 1){
				if(I('get.edit') == 1){
					$this->display('center-edit');
				} else{
					$this->display('center');
				}
				
			} else{
				$this->redirect('home/TeacherCenter/index');
			}
		}
		
		public function setDetailVerify(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$fuck = M("teacherverify");
			$list = $fuck->where("userID={$_SESSION['userID']}")->find();
			if($list){
				$fuck = M("teacherverify");
				$fuck->create();
				$fuck->where("userID={$_SESSION['userID']}")->save();
			}else{
				$fuck = M("teacherverify");
				$fuck->create();
				$fuck->userID = $userID;
				$fuck->add('', array(), true);
			}
			
			
			$basic = M("basicteacherinformation");
			$basic->ifUploadProfile = '2';
			$basic->where("userID={$_SESSION['userID']}")->save();
			
			if($ifVerify == 0 || $ifVerify == 3) {
				$jump = 'home/TeacherCenter/f-course';
			}else{
				$jump = 'home/TeacherCenter/teacherCenter';
			}
			
			if(empty($_FILES["photo"]["name"])){
				$this->redirect($jump);
				exit;
			}
			
			$config = array(
				'maxSize' => 3145728,
				'rootPath' => "../resource/teacher/myPic/",
				'savePath' => "",
				'saveName' => $_SESSION['userID'],
				'replace' => true,
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub' => false,
			);
			$upload = new \Think\Upload($config);// 实例化上传类
			// 上传文件
			$info = $upload->upload();
			
					
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError(), U($jump), 1);
			}else{// 上传成功
				$pic = M("uploadteachermypictable"); // 实例化对象
				$pic->userID = $_SESSION['userID'];
				$pic->imageUrl = "http://139.196.29.70/resource/teacher/myPic/".$info['photo']['savename'];
				$pic->uploadTime = time();
				//echo $pic->imageUrl;
				$pic->add('', array(), true);
				$this->redirect($jump);
			}	
		}
		
		public function getCourse(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$course = M("mycourseinformation"); // 实例化对象
			$data = $course->field("coursetype,coursegrade,coursemoney")->where("userID={$_SESSION['userID']}")->order("coursetype,coursegrade")->select();
			
			echo json_encode($data);
		}
		
		public function setCourse(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');

			$coursePost = $_POST['project'];
			
			$courseList = json_decode($coursePost, true);
			if(empty($courseList[0][courseType])){
				echo 0;
			}
			
			foreach($courseList as $key=>$value){
				$courseList[$key]['userID'] = $userID;
				$courseList[$key]['createTime'] = time();
			}
			
			$course = M("mycourseinformation"); // 实例化对象
			$course->where("userID={$userID}")->delete();
			$result = $course->addAll($courseList, array(), true);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
		
		public function verify(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$verify = M("teacherverify"); // 实例化对象
			$data = $verify->where("userID={$_SESSION['userID']}")->find();
			
			$detail = M("teacherdetailinformation"); // 实例化对象
			$data2 = $detail->field("mostbachelor,degreeschoolname,major")->where("userID={$_SESSION['userID']}")->find();
			
			$this->assign($data);
			$this->assign($data2);
			
			if($ifVerify == 0 || $ifVerify == 3) {
				$this->display('f-uppic');
			}else if($ifVerify == 1){
				$this->display('uppicok');
			}
		}
		
		public function setVerify(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$_SESSION['userID']}")->getField('ifVerify');
			
			$verify = M("teacherverify"); // 实例化对象
			$verify->create();
			
			$config = array(
				'maxSize' => 3145728,
				'rootPath' => "../../resource/teacher/verify/",
				'savePath' => '',
				
				'replace' => true,
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub' => false,
			);
			
			
			// 上传文件
			if(!empty($_FILES["identity"]["name"])){
				$upload = new \Think\Upload($config);// 实例化上传类
				$upload->saveName = $userID."_identity";
				$info = $upload->uploadOne($_FILES['identity']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else {// 上传成功			
					$verify->identityUrl = "http://139.196.29.70/resource/teacher/verify/".$info['savename'];
					$verify->identityVerifyResult = '2';
				}
				//echo "上传了身份证";
			}
			
			if(!empty($_FILES["edu"]["name"])){
				$upload2 = new \Think\Upload($config);// 实例化上传类
				$upload2->saveName = $userID."_edu";
				$info2 = $upload2->uploadOne($_FILES['edu']);
				if(!$info2) {// 上传错误提示错误信息
					$this->error($upload2->getError());
				}else {// 上传成功			
					$verify->eduUrl = "http://139.196.29.70/resource/teacher/verify/".$info2['savename'];
					$verify->eduVerifyResult = '2';
					
					
				}	
			}
					
			$verify->where("userID={$_SESSION['userID']}")->save();
			
			$detail = M("teacherdetailinformation"); // 实例化对象
			$list = $detail->where("userID={$_SESSION['userID']}")->find();
			$detail->mostBachelor = I('post.mostBachelor');
			$detail->degreeSchoolName = I('post.degreeSchoolName');
			$detail->major = I('post.major');
			
			if($list){
				$detail->where("userID={$_SESSION['userID']}")->save();
			}else{
				$detail->userID = $userID;
				$detail->add();
			}
			
			
					
			$User->ifVerify = '2';
			$User->where("userID={$_SESSION['userID']}")->save();
			$this->redirect('home/TeacherCenter/index');
		}
		
		public function setVerifyPic(){
			$userID = $_SESSION['userID'];
			$User = M("basicteacherinformation");
			
			$verify = M("teacherverify"); // 实例化对象
			
			$config = array(
				'maxSize' => 3145728,
				'rootPath' => "../resource/teacher/verify/",
				'savePath' => '',
				
				'replace' => true,
				'exts' => array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub' => false,
			);
			
			// 上传文件
			if(!empty($_FILES["identity"]["name"])){
				$upload = new \Think\Upload($config);// 实例化上传类
				$upload->saveName = $userID."_identity";
				$info = $upload->uploadOne($_FILES['identity']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else {// 上传成功			
					$verify->identityUrl = "http://139.196.29.70/resource/teacher/verify/".$info['savename'];
					$verify->identityVerifyResult = '2';
					$verify->where("userID={$_SESSION['userID']}")->save();
					echo "http://139.196.29.70/resource/teacher/verify/".$info['savename'];
				}
				//echo "上传了身份证";
			}
			
			if(!empty($_FILES["edu"]["name"])){
				$upload2 = new \Think\Upload($config);// 实例化上传类
				$upload2->saveName = $userID."_edu";
				$info2 = $upload2->uploadOne($_FILES['edu']);
				if(!$info2) {// 上传错误提示错误信息
					$this->error($upload2->getError());
				}else {// 上传成功			
					$verify->eduUrl = "http://139.196.29.70/resource/teacher/verify/".$info2['savename'];
					$verify->eduVerifyResult = '2';
					$verify->where("userID={$_SESSION['userID']}")->save();
					echo "http://139.196.29.70/resource/teacher/verify/".$info2['savename'];
				}	
			}
		}
		
	}
