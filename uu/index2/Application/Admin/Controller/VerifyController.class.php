<?php
	namespace Admin\Controller;
	use Think\Controller;
	
	class VerifyController extends Controller{
		function _initialize(){
			if(empty($_SESSION['admin_name'])){
				$this->error('请登录', U('admin/Login/index'), 2);
			}
		}
		
		public function getCount(){

			$basic = M("basicteacherinformation"); // 实例化对象
			$verifyCount = $basic->where("ifVerify='2'")->count();
			
			$basic = M("basicteacherinformation");
			$detailCount = $basic->where("ifVerify='1' AND ifUploadProfile='2'")->count();// 查询满足要求的数量
			
			echo json_encode(array('verifyCount'=>$verifyCount,'detailCount'=>$detailCount));
		}
		
		public function verifyList(){

			//$basic = M("basicteacherinformation"); // 实例化对象
			//$data = $basic->where("ifVerify='2'")->find();
			
			$basic = M("basicteacherinformation");
			$count = $basic->where("ifVerify='2'")->count();// 查询满足要求的数量
			
			$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $basic->where("ifVerify='2'")->order('createTime')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); //输出模板
		}
		
		public function detailList(){

			$basic = M("basicteacherinformation");
			$count = $basic->where("ifVerify='1' AND ifUploadProfile='2'")->count();// 查询满足要求的数量
			
			$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$show = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $basic->where("ifVerify='1' AND ifUploadProfile='2'")->order('createTime')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
		}
		
		
		public function verify(){
			$userID = I('get.userID');
			if(empty($_GET['userID'])){
				$basic = M("basicteacherinformation");
				$userID = $basic->where("ifVerify='2'")->getField('userID');
				if(empty($userID)){
					$this->error('没有要审核的了', U('admin/Verify/verifyList'), 2);
				}
			}
			
			$basic = M("basicteacherinformation"); // 实例化对象
			$basicResult = $basic->field("telephone,usersex")->where("userID={$userID}")->find();
			if ($basicResult['usersex'] == '0'){
				$basicResult['usersex'] = '男';
			} else if($basicResult['usersex'] == '1'){
				$basicResult['usersex'] = '女';
			}
			
			$detail = M("teacherdetailinformation"); // 实例化对象
			$detailResult = $detail->field("mostbachelor,degreeschoolname,major")->where("userID={$userID}")->find();
			
			$verify = M("teacherverify"); // 实例化对象
			$verifyResult = $verify->where("userID={$userID}")->find();
			
			$pic = M("uploadteachermypictable"); // 实例化对象
			$picResult = $pic->field("imageurl")->where("userID={$userID}")->find();
			
			$this->assign($basicResult);
			$this->assign($detailResult);
			$this->assign($verifyResult);
			$this->assign($picResult);
			$this->display();
		}
		
		public function detail(){
			$userID = I('get.userID');
			if(empty($_GET['userID'])){
				$basic = M("basicteacherinformation");
				$userID = $basic->where("ifVerify='1' AND ifUploadProfile='2'")->getField('userID');
				if(empty($userID)){
					$this->error('没有要审核的了', U('admin/Verify/detailList'), 2);
				}
			}
			
			$basic = M("basicteacherinformation"); // 实例化对象
			$basicResult = $basic->field("telephone,usersex")->where("userID={$userID}")->find();
			if ($basicResult['usersex'] == '0'){
				$basicResult['usersex'] = '男';
			} else if($basicResult['usersex'] == '1'){
				$basicResult['usersex'] = '女';
			}
			
			$detail = M("teacherdetailinformation"); // 实例化对象
			$detailResult = $detail->field("mostbachelor,degreeschoolname,major")->where("userID={$userID}")->find();
			
			$verify = M("teacherverify"); // 实例化对象
			$verifyResult = $verify->where("userID={$userID}")->find();
			
			$pic = M("uploadteachermypictable"); // 实例化对象
			$picResult = $pic->field("imageurl")->where("userID={$userID}")->find();
			
			$this->assign($basicResult);
			$this->assign($detailResult);
			$this->assign($verifyResult);
			$this->assign($picResult);
			$this->display();
		}
		
		public function verifyDetermine(){
			$userID = I('post.userID');
			$data['ifVerify'] = I('post.ifVerify');
			$data['ifUploadProfile'] = I('post.ifUploadProfile');
			$data['identityVerifyResult'] = I('post.identityVerifyResult');
			$data['eduVerifyResult'] = I('post.eduVerifyResult');
			$data['verifyDesciption'] = I('post.verifyDesciption');
			
			
			
			$User = M("basicteacherinformation");
			$ifVerify = $User->where("userID={$userID}")->getField('ifVerify');
			
			if($ifVerify != '2'){
				
				echo '0';
				exit;
			}
			$User->where("userID={$userID}")->save($data);
			
			
			
			$verify = M("teacherverify"); // 实例化对象		
			$verify->where("userID={$userID}")->save($data);
			$verifyResult = $verify->where("userID={$userID}")->find();
			
			$verifyResult['teachingAge'] = $verifyResult['teachingage'];
			$verifyResult['teachingPoint'] = $verifyResult['teachingpoint'];
			$verifyResult['otherWork'] = $verifyResult['otherwork'];
			$detail = M("teacherdetailinformation"); // 实例化对象
			$detailResult = $detail->data($verifyResult)->where("userID={$userID}")->save();

			echo '1';
		}
		
		public function detailDetermine(){
			$userID = I('post.userID');
			$data['ifUploadProfile'] = I('post.ifUploadProfile');
			$data['verifyDesciption'] = I('post.verifyDesciption');

			$User = M("basicteacherinformation");
			$ifUploadProfile = $User->where("userID={$userID}")->getField('ifUploadProfile');
			
			
			
			if($ifUploadProfile != '2'){
				
				echo '0';
				exit;
			}
			$User->where("userID={$userID}")->save($data);
			
			$verify = M("teacherverify"); // 实例化对象		
			$verify->where("userID={$userID}")->save($data);		
			$verifyResult = $verify->where("userID={$userID}")->find();
			
			$verifyResult['teachingAge'] = $verifyResult['teachingage'];
			$verifyResult['teachingPoint'] = $verifyResult['teachingpoint'];
			$verifyResult['otherWork'] = $verifyResult['otherwork'];
			$detail = M("teacherdetailinformation"); // 实例化对象
			$detailResult = $detail->data($verifyResult)->where("userID={$userID}")->save();

			echo '1';
		}
		
		
	}
