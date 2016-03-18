<?php
namespace Admin\Controller;
use Think\Controller;
Class SystemController extends CommonController {
   	Public function index() {
   		$this->display();   		
	}
	public function upconfig(){
		$file = CONF_PATH.'/sysconfig.php';
		if(writeArr($_POST,$file)){
			$this->redirect(MODULE_NAME.'/System/index');
		}else{
			$this->error('修改失败');
		}
	}
}	
