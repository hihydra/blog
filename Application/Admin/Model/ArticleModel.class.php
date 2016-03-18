<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class ArticleModel extends RelationModel{

		//定义关联关系
		Protected $_link = array(
			'attr' => array(
				'mapping_type' => self::MANY_TO_MANY,
				'mapping_name' => 'attr',
				'foreign_key' => 'bid',
				'relation_foreign_key' => 'aid',
				'relation_table' => 'tp_article_attr',
				),
			'cate' => array(
				'mapping_type' => self::BELONGS_TO,
				'foreign_key'  => 'cid',
				'mapping_fields' => 'name,id',
				'as_fields'  => 'name:catename,id:cateid',
				),
			'picture' => array(
				'mapping_type'  => self::BELONGS_TO,           
				'foreign_key'  => 'thumbnail',
				'as_fields'  => 'path:picturepath,id:pictureid',
				)
		);	

		public function getAction($type = 0,$search = null,$screen = null){
		    $field = array('del');
		    $where = array('del' => $type);
		    if ($search !== null) {
		    	$where['title'] = array('like','%'.$search.'%');
		    }
		    if ($screen !== null) {
		    	$where['cid'] = $screen;
		    }		
    	    $count = $this->where($where)->count();
	    	$Page  = new \Think\Page($count,10);
	    	$Page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
	    	$show  = $Page->show();
    		$data  = $this->field($field,true)->where($where)->order('id desc')->relation(true)->limit($Page->firstRow.','.$Page->listRows)->select();
    		return array('list' => $data, 'page' => $show );
		}
		//批量更新
		public function uploadAll($id,$type,$fieldname){
			$where['id'] = array('in',$id);
			if ($this->where($where)->setField($fieldname,$type)){	
				$info  = array('status'=>1,'url' => U("Article/index"));		
				return	$info;
			}else{
				$info  = array('status'=>0);
				return  $info;
			}			
		}
		//批量删除
		public function delAll($id){
			$where['id'] = array('in',$id);
			if ($this->relation('attr')->where($where)->delete()){	
				$info  = array('status'=>1,'url' => U("Article/trach"));		
				return	$info;
			}else{
				$info  = array('status'=>0);
				return  $info;
			}			
		}
}

?>