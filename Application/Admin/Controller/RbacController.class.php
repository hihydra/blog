<?php
namespace Admin\Controller;
use Think\Controller;
class RbacController extends CommonController {
    //角色列表
    public function role(){
    	$role = M('role')->order('id ASC')->select();
	    $this->assign('role',$role);
	   	$this->display(); 
    }
    //节点列表
    public function node(){
    	$field = array('id','name','title','pid' );
    	$node = M('node')->field($field)->order('sort')->select();
	    $this->assign('node',node_merge($node));
	   	$this->display(); 
    }
    //添加角色
    public function addRole(){
    	if(IS_POST) {
	    	if (M('role')->add(I('post.'))) {
				header("Location:".U("Rbac/role"));
			}else{
				$this->error('添加失败');
			}
    	}else{
    		$this->display();
    	}

    }
    //编辑角色
    public function editRole(){
        if(IS_POST) {
            $data = I('post.');
            $id = I('get.id',int);

            if (M('role')->where("id='$id'")->save($data)){
                header("Location:".U("Rbac/role"));
            }else{
                $this->error('添加失败');
            }
        }else{
            $id = I('id',0,intval);
            $role = M('role')->where("id='$id'")->find();
            $this->assign('role',$role);
            $this->display();
        }

    }
/*    //删除角色
    public function delRole(){
            $id = I('id',0,intval);
            if (M('role')->where("id='$id'")->delete()) {
                header("Location:".U("Rbac/role"));
            }else{
                $this->error('删除失败');   
            }   
    
    }*/
    //添加节点
    public function addNode(){
    	if(IS_POST) {
	    	if (M('node')->add(I('post.'))) {
                header("Location:".U("Rbac/node"));
			}else{
				$this->error('添加失败');
			}
    	}else{
    		$pid = I('pid',0,'intval');
    		$level = I('level',1,'intval');

    		switch ($level) {
    			case 1:
    				$this->assign('type','应用');
    				break;
    			
    			case 2:
    				$this->assign('type','控制器');
    				break;

    			case 3:
    				$this->assign('type','动作方法');
    				break;	
    		}

    		$this->assign('pid',$pid);
    		$this->assign('level',$level);
    		$this->display();
    	}

    }
    //编辑节点
    public function editNode(){
        if(IS_POST) {
            $data = I('post.');
            $id = I('get.id',int);

            if (M('node')->where("id='$id'")->save($data)){
                header("Location:".U("Rbac/node"));
            }else{
                $this->error('修改失败');
            }
        }else{
            $id = I('id',0,intval);
            $role = M('node')->where("id='$id'")->find();

            $level = $role['level'];

            switch ($level) {
                case 1:
                    $this->assign('type','应用');
                    break;
                
                case 2:
                    $this->assign('type','控制器');
                    break;

                case 3:
                    $this->assign('type','动作方法');
                    break;  
            }

            $role = M('node')->where("id='$id'")->find();
            $this->assign('node',$role);
            $this->display();
        }

    }
    //删除节点
    public function delNode(){
            $id = I('id',0,intval);
            $node = M('node');
            if($node->where("pid='$id'")->find()){
                if($node->where("id='$id'")->delete()&&$node->where("pid='$id'")->delete()){
                    header("Location:".U("Rbac/node"));
                }else{
                    $this->error('删除失败');
                } 
            }else{
                if ($node->where("id='$id'")->delete()) {
                    header("Location:".U("Rbac/node"));
                }else{
                    $this->error('删除失败');   
                }  
            } 
    
    }
    //配置权限
    public function access(){

    	if (IS_POST) {
            $rid = I('rid',0,'intval');
    		$db = M('access');
    		$data = array();
    		foreach (I('POST.access') as $v) {
    			$tmp = explode('_',$v);
    			$data[] = array(
    				'role_id' => $rid,
    				'node_id' => $tmp[0],
    				'level' => $tmp[1] 
    				);
    		}
    		if($db ->addAll($data)||$db -> where(array('role_id' => $rid))->delete()){
    			header("Location:".U("Rbac/role"));
    		}else{
    			$this->error('配置失败');
    		}

    		
    	}else{
            $rid = I('rid',0,'intval');
    		$field = array('id','name','title','pid' );
    		$node = M('node')->order('sort')->field($field)->select();

    		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);

	    	$this->assign('node',node_merge($node,$access));

	    	$this->assign('rid',$rid);
	    	$this->display();
    	}

    }
}