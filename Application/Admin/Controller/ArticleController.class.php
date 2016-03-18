<?php
namespace Admin\Controller;
use Think\Controller;
use Lib\Category;
class ArticleController extends CommonController {
	//文章列表
    public function index(){   
    	$article = D('Article')->getAction();
    	$this->assign('article',$article);
        $cate = D('Cate')->getSelCate();
        $this->assign('cate',$cate);
        $attr = M('attr')->order('id ASC')->select();
        $this->assign('attr',$attr);
        $this->display(); 
    }
    //搜索文章
    public function search(){
        $search = I('post.search');
        $article = D('Article')->getAction(0,$search);
        $this->assign('article',$article);
        $cate = D('Cate')->getSelCate();
        $this->assign('cate',$cate);
        $attr = M('attr')->order('id ASC')->select();
        $this->assign('attr',$attr);
        $this->display('index');
    }
    //筛选
    public function screen(){
        $cid = I('get.cid',0,int);
        $article = D('Article')->getAction(0,null,$cid);
        $this->assign('article',$article);
        $cate = D('Cate')->getSelCate();
        $this->assign('cate',$cate);
        $attr = M('attr')->order('id ASC')->select();
        $this->assign('attr',$attr);
        $this->display('index'); 
    }
    //移动
    public function move(){
        $id = I('post.id');
        $aid = I('post.type');
        $this->ajaxReturn(D('article')->uploadAll($id,$type,'cid'));
    }
    //增加属性
    public function addProperty(){
        $id = I('post.id');
        $aid = I('post.type');
        print_r(explode(',',$id));
       // $this->M('attr')->where($where)->addAll();
    }
    //删除属性
    public function delProperty(){
        $id = I('post.id');
        $type = I('post.type');
        $this->M('attr')->where($where)->addAll();
    }
    //发布文章
    public function addArticle(){
    	if (IS_POST) {
    		$data = I('post.','','');
    		$data['time'] = time();

            if ($data['thumbnail']&&!in_array('4',$data['attr'])) {
                 $data['attr'][] = '4';
            }
            if (!$data['cid']) {
                $data['cid'] = 1;
            }
            if (empty($data['summary'])) {
                $data['summary'] = mb_substr(strip_tags($data['content']), 0, 250);
            }
            if(D('Article')->relation(true)->add($data)){               
                header("Location:".U("Article/index"));
            }else{
                $this->error('发布失败');   
            }
            
		}else{
	    	$cate = M('cate')->order('sort ASC')->select();
	   		$this->assign('cate',Category::unlimitedForLevel($cate));

	   		$attr = M('attr')->order('id ASC')->select();
	   		$this->assign('attr',$attr);

	    	$this->display();
    	}
    }
    //修改文章
    public function editArticle(){
    	if (IS_POST) {

    		$data = I('post.','','');
    		$id = I('get.id',int);

            if ($data['thumbnail']&&!in_array('4',$data['attr'])) {
                 $data['attr'][] = '4';
            }
            if (!$data['cid']) {
                $data['cid'] = 1;
            }
            if (empty($data['summary'])) {
                $data['summary'] =  mb_substr(strip_tags($data['content']), 0, 250);
            }
			if(D('Article')->relation(true)->where(array('id'=>$id))->save($data)){			 	
				header("Location:".U("Article/index"));
			}else{
				$this->error('修改失败');	
			}

		}else{

	    	$cate = M('cate')->order('sort ASC')->select();
	   		$this->assign('cate',Category::unlimitedForLevel($cate));

	   		$attr = M('attr')->order('id ASC')->select();
	   		$this->assign('attr',$attr);

	   		$id = I('get.id',0,int);

			$article = D('Article')->relation(true)->where("id='$id'")->find();
			$this->assign('article',$article);
	    	$this->display();
    	}
    }
    //回收站
    public function trach(){
        $article = D('Article')->getAction(1);
        $this->assign('article',$article);
        $this->display('index');
    }
    //$type=1删除到回收站,$type=0从回收站还原
    public function toTrach(){
        if (IS_POST) {
           $id =  I('post.id');
           $type = I('post.type');
           $this->ajaxReturn(D('article')->uploadAll($id,$type,'del'));
        }else{
        	$id = I('get.id',int);
        	$type = I('get.type',int);
        	 if(M('Article')->where("id='$id'")->setField('del',$type)){
        	 	header("Location:".U("Article/index"));
        	 }else{
        	 	$this->error('删除失败');
        	 }
        }
     }   
    //清空回收站
    public function emptyTrach(){
    	if(D('Article')->relation('attr')->where("del=1")->delete()){
    	    header("Location:".U("Article/trach"));
    	 }else{
    	 	$this->error('清空回收站失败');
    	 } 
    }
    //彻底删除
    public function delete(){
        if (IS_POST) {
           $id =  I('post.id');
           $this->ajaxReturn(D('article')->delAll($id));
        }else{
        	$id = I('get.id',int);
        	if(D('Article')->relation('attr')->delete($id)){
        	    header("Location:".U("Article/trach"));
        	}else{
        	 	$this->error('彻底删除失败');
    	    } 
        }	
    }
    //编辑器
    public function ueditor(){
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }

    //上传
    public function upload(){     
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =      '/allimg/'; // 设置附件上传目录

        $info   =   $upload->upload();

		if(!$info) {
		// 上传错误提示错误信息  
            $info = array('status'=>0,'error'=>$upload->getError());           
		 }else{
		// 上传成功 获取上传文件信息
            foreach($info as $file){        
                $value['path'] =  "/Uploads".$file['savepath'].$file['savename'];    
            }
            $value['create_time'] = time();
            $value['status'] =1;

            $id = M('picture')->add($value);
            $info = array(
                'status'=>1,
                'url'=> $value['path'],
                'id' =>$id,
                );
		 }
         $this->ajaxReturn($info);
	}

}