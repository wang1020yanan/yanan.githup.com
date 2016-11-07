<?php
	namespace Home\Controller;
	use Think\Controller;
	class NeedController extends Controller{
		public function submit(){
			
			$Form = M('need_guest');
			
			if($Form->create()) {
				$Form->createTime = time();
				$result = $Form->add();
				if($result) {
					echo 1;
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}
		
		public function read($id=0){
			$Form = M('Form');
			// 读取数据
			$data = $Form->find($id);
			if($data) {
				$this->assign('data',$data);// 模板变量赋值
			}else{
				$this->error('数据错误');
			}
			$this->display();
		}
		
		public function edit($id=0){
			$Form = M('Form');
			$this->assign('vo',$Form->find($id));
			$this->display();
		}
		
	}
