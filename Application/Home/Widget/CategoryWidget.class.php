<?php
namespace Home\Widget;
use Think\Controller;
use Lib\Category;
/**
 * 自定义标签库
 */
class CategoryWidget extends Controller{
    public function list($data){
           $Cate = Category::unlimitedForLevel(M('cate')->order('sort ASC')->select());

    }

}