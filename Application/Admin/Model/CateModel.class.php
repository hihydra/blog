<?php
namespace Admin\Model;
use Think\Model\RelationModel;
use Lib\Category;

class CateModel extends RelationModel{
		//定义关联关系
		Protected $_link = array(
			'article' => array(
				'mapping_type' => self::HAS_MANY,
				'class_name' => 'article',
				'foreign_key'  => 'cid',
				'mapping_fields' => 'cid',
				)
		);
		
		public function	getSelCate(){
			$cate = $this->order('sort ASC')->select();
			$cate = Category::unlimitedForLevel($cate);
			return $cate;
		}
}

?>