<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
    	if (!IS_POST) {
	    	$this->display();	    	
	    }else{
	    	$data = I('post.');
 			$this->ajaxReturn(D('User')->Login($data));					
	    }
    }
    public function verify(){
    	ob_clean();
    	$Verify = new \Think\Verify();
    	$Verify->entry();
    }
    public function register(){
        if (!IS_POST) {

            $this->display();
            
        }else{

            $data = I('post.');

            $this->ajaxReturn(D('User')->Register($data));
        }

    }
}