<?php
	namespace Admin\Controller;
	use Think\Controller;
	
	class LoginController extends Controller{
		public function index() {
			$this->display('adminlogin');
		}
		
		public function login() {

			$admin_name = I('post.admin_name');
			$passwordPost = I('post.password');
			
			$User = M("admin");
			$baobao = "baobao";
			$list = $User->where("admin_name='{$admin_name}'")->find();
			//dump($list);
			
			$password = $list['password'];

			if(!$password){
				echo "该管理员账号不存在咧v_v";
				exit;
			}
			
			if($password != $passwordPost) {
				echo "password error 密码没有填对诶 v_v";
				exit;
			}

			echo 1;
			session_start;
			session('admin_name',$admin_name);
			
		}
		
		public function logout() {
			session(null); // 清空当前的session
			session('[destroy]'); // 销毁session
			$this->success('退出登录成功', U('admin/Login/index'), 0);
		}
	}
