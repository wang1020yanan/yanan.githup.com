<?php
	namespace Home\Controller;
	use Think\Controller;
	
	class LoginController extends Controller{
		
		public function login() {
	
			$telephone = I('post.telephone');
			$passwordPost = I('post.password');
			
			$User = M("basicteacherinformation");
			$list = $User->where("telephone=$telephone")->find();
			//dump($list);
			$userID = $list['userid'];
			$userName = $list['username'];
			$userSex = $list['usersex'];
			
			if ($userSex == '0') {
				$sex = "男";
			} else if ($userSex == '1') {
				$sex = "女";
			}
			
			$password = $list['password'];

			if(!$password){
				echo '该号码未注册，请注册';
				exit;
			}
			
			if($password != $passwordPost) {
				echo "密码错误";
				exit;
			}
			
			echo 1;
		
			
			session_start;
			session('userID',$userID);
			session('userName',$userName);
			session('sex',$sex);
		}
		
		public function logout() {
			session(null); // 清空当前的session
			session('[destroy]'); // 销毁session
			$this->success('退出登录成功', U('home/Index/login'), 0);
		}
	}
