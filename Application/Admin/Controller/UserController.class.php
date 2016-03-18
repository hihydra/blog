<?php
namespace Admin\Controller;
use Think\Controller;
Class UserController extends CommonController {
   	Public function index() {

   		$user = M('user');
   		$count = $user->count();
	    $Page  = new \Think\Page($count,10);
	    $show  = $Page->show();
	    $data  = D('User')->relation(true)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
   		$this->assign('data',$data);
   		$this->assign('show',$show);
   		$this->display();

	}
	public function search(){

		$search = I('post.search');

		$user = M('user');
   		$count = $user->where("username='$search'")->count();
	    $Page  = new \Think\Page($count,10);
	    $show  = $Page->show();
	    $data  = D('User')->relation(true)->order('id desc')->where("username='$search'")->limit($Page->firstRow.','.$Page->listRows)->select();
   		$this->assign('data',$data);
   		$this->assign('show',$show);
   		$this->display('index');

	}
	public function addUser(){
			$role = M('role')->select();
			$this->assign('role',$role); 
			$this->display();
		
	}
	public function editUser(){

		
		if (IS_POST) {
			$data = I('post.');
			$id = I('get.id',0,int);

			$this->ajaxReturn(D('User')->getEditUser($data,$id));

		}else{	
			$id = I('id',0,int);

			$user = D('User')->relation(true)->where("id='$id'")->find();

			$role = M('role')->select();
			$this ->assign('user',$user);
			$this->assign('role',$role); 
			$this ->display();
		}
	}
	public function delUser(){
			$id = I('id',0,int);
			if (D('User')->relation(true)->delete($id)) {
				header("Location:".U("User/index"));
			}else{
				$this->error('删除失败');	
			}	
	
	}
}	
