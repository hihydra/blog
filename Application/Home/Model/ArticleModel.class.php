<?php
namespace Home\Model;
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
				'mapping_fields' => 'id',
				),
			'cate' => array(
				'mapping_type' => self::BELONGS_TO,
				'foreign_key'  => 'cid',
				'mapping_fields' => 'name,slug',
				'as_fields'  => 'name:typename,slug:slug',
				),
            'picture' => array(
                'mapping_type'  => self::BELONGS_TO,           
                'foreign_key'  => 'thumbnail',
                'as_fields'  => 'path:picturepath,id:pictureid',
            )
		);


	public function getArticleArc(){
		$id=I('get.id');
		$field = array('title','time','click','content','cid');
		$article = $this->field($field)->where(array('id'=>$id))->find();

		return 	$article;	
	}
	public function prev($info){
        $map = array(
            'id'          => array('lt', $info['id']),
            'pid'		  => 0,
            'category_id' => $info['category_id'],
            'status'      => 1,
            'create_time' => array('lt', NOW_TIME),
            '_string'     => 'deadline = 0 OR deadline > ' . NOW_TIME,  			
        );

        /* 返回前一条数据 */
        return $this->field(true)->where($map)->order('id DESC')->find();
    }

    /**
     * 获取下一篇文档基本信息
     */
    public function next($info){
        $map = array(
            'id'          => array('gt', $info['id']),
            'pid'		  => 0,
            'category_id' => $info['category_id'],
            'status'      => 1,
            'create_time' => array('lt', NOW_TIME),
            '_string'     => 'deadline = 0 OR deadline > ' . NOW_TIME,  			
        );

        /* 返回下一条数据 */
        return $this->field(true)->where($map)->order('id')->find();
    }
}
?>