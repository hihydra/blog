<?php
namespace Home\Model;
use Think\Model;
use Lib\Category;


class CateModel extends Model{
    public function getCateIndex($row){
        $list = $this->field(array("id","name","pid","slug"))->where(array("pid"=>0))->limit($row)->order("sort")->select();
        $cate = $this->order("sort")->select();
        $article = M("article");
        $field = array("id","title","time");
        foreach($list as $k=>$v){
            $cids = Category::getChildsId($cate,$v['id']);
            $cids[] = $v['id'];
            $where = array('cid' => array('IN',$cids));
            $list[$k]['article'] = $article->field($field)->where($where)->select();        
        }
        return $list;
    }

    //分类查询条件
    public function getCateWhere($slug = null ){
        $catefind = $this->where("slug='$slug'")->find();
        $cateid = $catefind['id'];
        $cate = $this->order('sort')->select();
        $cids = Category::getChildsId($cate,$cateid);
        $cids[] = $cateid;

        $where = array('cid'=>array('IN',$cids));

        return $where;
    }     
    //分页
    public function getCatePage($slug,$row){
        if ($slug) {
            $where = $this->getCateWhere($slug);
        }
        $where['del'] = 0;      
        $count = D('Article')->where($where)->count();// 查询满足要求的总记录数
        $Page  = new \Think\Page($count,$row);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
        $show  = $Page->show();// 分页显示输出

        return $show;
    }
    //面包屑导航
    public function Position(){            
        if(I('get.slug')&&I('get.id')){
             $id = I('get.id');
             $slug = I('get.slug'); 
             $cate = $this->where("slug='$slug'")->field(array('slug','name'))->find();
             $article = M("Article")->field('title')->where("id='$id'")->find();  
             $page =  '<li><a href="/category/'.$cate['slug'].'/">'.$cate['name'].'</a></li>'.'<li>'.$article['title'].'</li>';
        }else if(I('get.slug')){
             $slug = I('get.slug'); 
             $cate = $this->where("slug='$slug'")->field(array('slug','name'))->find(); 
             $page = '<li><a href="/category/'.$cate['slug'].'/">'.$cate['name'].'</a></li>'; 
        } 
        return $page;                  
    }    

}
?>