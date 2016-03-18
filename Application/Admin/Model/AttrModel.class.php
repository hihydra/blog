<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class AttrModel extends RelationModel{

		//定义关联关系
		Protected $_link = array(
			'article_attr' => array(
				'mapping_type' => self::HAS_MANY,
				'class_name' => 'article_attr',
				'foreign_key'  => 'aid',
				'mapping_fields' => 'aid',
				)
		);	
}

?>