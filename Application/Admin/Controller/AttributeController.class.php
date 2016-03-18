<?php
namespace Admin\Controller;
use Think\Controller;
class AttributeController extends CommonController {
    public function index(){
    	$attr = M('attr')->order('id ASC')->select();
   		$this->assign('attr',$attr);
   		$this->display(); 
    }
    public function addAttr(){
        if(IS_POST) {
            if (M('attr')->add(I('post.'))) {
               header("Location:".U("Attribute/index"));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
		
    }
    public function editAttr(){
    
        if (IS_POST) {
            $id = I('get.id',0,intval);

            if (M('attr')->where("id='$id'")->save(I('post.'))) {
                header("Location:".U("Attribute/index"));
            }else{
                $this->error('修改失败');
            }

        }else{  
            $id = I('id',0,intval);     
            $attr = M('attr')->where("id='$id'")->find();
            $this ->assign('attr',$attr);
            $this ->display();
        }
    }
    public function delAttr(){
            $id = I('id',0,int);
            if (D('Attr')->relation(true)->delete($id)) {
                header("Location:".U("Attribute/index"));
            }else{
                $this->error('删除失败');   
            }   
    
    }
}