<?php
	namespace Home\Controller;
	use Think\Controller;
	use Org\ChuanglanSmsHelper;
	
	class RegisterController extends Controller{
		public function getVerifyCode(){
			
			$telephone = I('post.telephone');
			$verifyCodeType = I('post.verifyCodeType');
			
			$User = M("basicteacherinformation");
			$list = $User->where("telephone=$telephone")->find();

			if($list){
				echo 1;
				
				if( $verifyCodeType == "register"){
					exit;
				}
				//
			}else{
				echo 0;
				if($verifyCodeType == "reset"){
					exit;
				}
			}
			
			session_start;
			if(time() - $_SESSION['messageTime'] < 60)
				exit;
			
			
					
			$clapi  = new \Org\ChuanglanSmsHelper\ChuanglanSmsApi();
			$verifyCode = \Org\ChuanglanSmsHelper\ChuanglanSmsApi::random(4,1);
			$messageContent = "您的短信验证码是：$verifyCode 。为保障您的账户安全，请勿将此短信校验码告诉他人。";
			
			$result = $clapi->sendSMS("$telephone", $messageContent,'true');
			$result = $clapi->execResult($result);
			
			
			
			$Form = M('verifycoderecordtable');
			$data['telephone'] = $telephone;
			$data['verifyCode'] = $verifyCode;
			$data['createTime'] = time();
			$result = $Form->add($data, array(), true);
				
			if(!$result) {
				echo '服务器出错啦';
				exit;
			}
		
			session('messageTime',time());
		}
		
		public function register() {			
			$telephone = I('post.telephone');
			$User = M("basicteacherinformation");
			$list = $User->where("telephone=$telephone")->find();

			if($list){
				echo '该号码已注册，请直接登录';
				exit;
			}
			
			$verifyCodePost = I('post.verifyCode');
			$verify = M('verifycoderecordtable');
			$verifyCode = $verify->where("telephone=$telephone")->getField('verifyCode');
			if($verifyCode != $verifyCodePost) {
				echo "验证码错误";
				exit;
			}
			
			$userID = "1".substr($telephone,-3)."0".sprintf('%02d',rand(0,99));
			
			
			$Form = M("basicteacherinformation");
			if($Form->create()) {
				$Form->createTime = time();
				$Form->userID = $userID;
			
				$result = $Form->add();
				if($result) {
					session_start;
					session('userID',$userID);
					session('userName',I('post.userName'));
					if (I('post.userSex') == '0') {
						$sex = "男";
					} else if (I('post.userSex') == '1') {
						$sex = "女";
					}
					session('sex',$sex);
					echo 1;
				}else{
					echo "服务器出错啦";
				}
			}else{
				echo "服务器出错啦";
			}
			
		}
		
		public function resetPassword() {	
			$telephone = I('post.telephone');
			$User = M("basicteacherinformation");
			$list = $User->where("telephone=$telephone")->find();
			
			$verifyCodePost = I('post.verifyCode');
			$verify = M('verifycoderecordtable');
			$verifyCode = $verify->where("telephone=$telephone")->getField('verifyCode');
			if($verifyCode != $verifyCodePost) {
				echo "验证码错误";
				exit;
			}
			
			
			$Form = M("basicteacherinformation");
			if($Form->create()) {
				$Form->createTime = time();
			
				$result = $Form->where("telephone=$telephone")->save();
				if($result) {
					echo 1;
				}else{
					echo "服务器出错啦";
				}
			}else{
				echo "服务器出错啦";
			}
			
		}
	}
