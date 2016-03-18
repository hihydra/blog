<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        //最新文章
        $arcnum = 10;//最新文章数量
        $article = M('article');
        $latestarc = $article->order('id desc')->limit($arcnum)->select();
        $countarc = $article->count();

        $this->assign('latestarc',$latestarc);
        $this->assign('countarc',$countarc);
    	
        //在线用户
        $usernum = 5;
        $user = M('user');
        $onuser = $user->where("status='1'")->limit($usernum)->select();
        $countuser = $user->count();
        $this->assign('onuser',$onuser);
        $this->assign('countuser',$countuser);


        $this->display();
    }
    //退出登录
    public function logout(){
    	$id = session('uid');
    	if(M('user')->where("id='$id'")->setField('status','0')){
    		session('[destroy]');
    	 	$this->redirect(MODULE_NAME.'/Login/index');
    	}else{
    		$this->error('退出失败');
    	}

    }
}