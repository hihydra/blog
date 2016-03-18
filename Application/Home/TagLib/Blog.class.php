<?php
namespace Home\TagLib;
use Think\Template\TagLib;

defined('THINK_PATH') or exit();
/**
 * 自定义标签库
 */
class Blog extends TagLib{
    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'channel'    => array('attr'=>'row,typeid'),
        'arclist'    => array('attr'=>'row,typeid,titlelen,orderby,flag'),
        'channelartlist'    => array('attr'=>'row'),
        'list'    => array('attr'=>'row,titlelen'),
        'article'    => array(),
        'page' => array('attr'=>'row','close'=>0),
        'position' =>  array('close'=>0),
        );

    //分类标签
    public function _channel($tag,$content){

        $row    = empty($tag['row'])   ? '' : $tag['row'];

        $parse .= '<?php ';
        $parse .= '$_channel = M("cate")';
        if(!empty($tag['typeid'])){
            $parse .= '->where("id='.$tag['typeid'].'")';
        }   
        $parse .= '->limit('.$row.')->select();';
        $parse .= '$_channel = Lib\Category::unlimitedForLayer($_channel);';
        $parse .= '?>';
        $parse .= '<volist name="_channel" id="field">';
        $parse .= '<?php ';
        $parse .= '$field["typelink"]="/category/".$field["slug"]."/";';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '</volist>';
            
        return $parse;      
    }
    //分类文章标签
    public function _channelartlist($tag,$content){

        $row    = empty($tag['row'])   ? '10' : $tag['row'];

        $parse .= '<?php';  
        $parse .= '$_channelartlist = D("Cate")->getCateIndex('."{$attr['row']}".');'; 
        $parse .= '?>';
        $parse .= $content;
            
        return $parse;      
    }
    //文章列表标签
    public function _arclist($tag,$content){

        $row    = empty($tag['row'])   ? '10' : $tag['row'];
        $orderby  = empty($tag['orderby'])   ? 'time desc' : $tag['orderby'];       
        $titlelen   = empty($tag['titlelen'])   ? '30' : $tag['titlelen'];

        $parse .= '<?php '; 
        $parse .= '$field = array("id","title","summary","click","cid","thumbnail","time");';  
        if(I('get.slug')&&$tag['typeid'] != "top"){
            $parse .= '$where = D("cate")->getCateWhere(I("get.slug"));'; 
        }
        $parse .= '$where["del"] = 0;';
        $parse .= '$_arclist = D("Article")->relation(true)'; 
        if(!empty($tag['flag'])){
            $parse .= '->where(array("id"=>array("in",arrayToString(M("article_attr")->field("bid")->where("aid='.$tag["flag"].'")->select()))))';
        }        
        $parse .= '->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,'.$row.')->order("'.$orderby.'")->select();'; 
        $parse .= ' ?>';
        $parse .= '<volist name="_arclist" id="field">';
        $parse .= '<?php';
        $parse .= '$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";';      
        $parse .= '$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";'; 
        $parse .= '$field["typelink"]="/category/".$field["slug"]."/";';
        $parse .= '$field["title"] = mb_substr($field["title"], 0, '.$titlelen.');';
        $parse .= '?>';
        $parse .=  $content;
        $parse .= '</volist>';
            
        return $parse;      
    }
    //文章标签
    public function _article($tag,$content){
        $parse .=   '<?php ';  
        $parse .=   '$_article = D("Article")->getArticleArc();'; 
        $parse .=   'extract($_article); ?>';
        $parse .= $content;
            
        return $parse;      
    }
    //面包屑导航
    public function _position($tag,$content){
        $parse .= '<?php ';  
        $parse .= '$_position = D("Cate")->Position();'; 
        $parse .= 'echo $_position ?>';

        return $parse;

    }
    //分页标签
    public function _page($tag,$content){

        $row    = empty($tag['row'])   ? '10' : $tag['row'];

        $parse .=   '<?php '; 
        if(I("get.slug")){
            $parse .='$slug = I("get.slug");';
        } 
        $parse .=   '$_page = D("Cate")->getCatePage($slug,'.$row.');'; 
        $parse .=   'echo $_page; ?>';

        return $parse;
    }  
}