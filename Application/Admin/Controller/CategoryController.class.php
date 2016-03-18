<?php
namespace Admin\Controller;
use Think\Controller;

Class CategoryController extends CommonController {
   	Public function index() {
        $cate = D('Cate')->getSelCate();
        $this->assign('cate',$cate);
   		$this->display();   		

	}
	public function addCate(){
		if (IS_POST) {
			if (M('cate')->add(I('post.'))) {
				header("Location:".U("Category/index"));
			}else{
				$this->error('添加失败');
			}
		}else{
		    $this->assign('pid',I('pid',0,'intval'));
		    $this->display();
		}
	}
	public function sortCate(){

		$db=M('cate');
		foreach (I('post.') as $id => $sort) {
			$db->where(array('id' => $id))->setField('sort',$sort);
		}
		$this->redirect(MODULE_NAME.'/Category/index');
		
	}
	public function delCate(){
			$id = I('id',0,int);
			if (D('Cate')->relation(true)->delete($id)) {
				header("Location:".U("Category/index"));
			}else{
				$this->error('删除失败');	
			}	
	
	}
	public function editCate(){
	
		if (IS_POST) {
			$id = I('get.id',0,intval);

			if (M('cate')->where("id='$id'")->save(I('post.'))) {
				header("Location:".U("Category/index"));
			}else{
				$this->error('修改失败');
			}

		}else{	
			$id = I('id',0,intval);		
			$cate = M('cate')->where("id='$id'")->find();
			$this ->assign('cate',$cate);
			$this ->display();
		}
	}	
}	
