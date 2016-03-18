<?php
namespace Admin\Model;
use Think\Model\RelationModel;
use Org\Util\Rbac;

class UserModel extends RelationModel{
		//定义主表名称
		Protected $tableName = "user";

	   //定义关联关系
		Protected $_link = array(
			'role' => array(
				'mapping_type' => self::BELONGS_TO,
				'foreign_key' => 'persona',
				'mapping_fields' => 'remark,id',
				'as_fields'  => 'remark:roleremark,id:roleid',
				)
		);	

	   protected $_validate = array(    
	   	   array('username','require','用户名不能为空',0,'',3),		    		      
		   array('username','/^([\d\w]){4,20}$/','帐号名称只能是英文和数字,长度为4到20位',0,'',3),  
		   array('username','','帐号名称已经存在！',0,'unique',1), 
		   array('password','require','密码不能为空',0,'',3),       
		   array('password','/^([\w\d]){6,15}$/','密码长度必须是6到15位,并且只能是英文和数字',0,'',3),      
		   array('repassword','password','2次密码不一致',0,'confirm',3), 
		   array('email','require','邮箱不能为空',0,'',3),  
		   array('email',email,'邮箱格式不对',0,'',3), 
		   array('verify','require','验证码不能为空',0,'',3),
		   array('verify','check_verify','验证码错误',0,'function',3), 		   
	   );

	   protected $_auto = array(
	   		array('password','md5',3,'function'),
	   		//array('status','1',2),  
	   		//array('loginip','get_client_ip',2,'function'),
	   		//array('logintime','time',2,'function'),
	   		array('registered','time',1,'function'),	   		
	   	);


    public function Register($data){   		
			
			if (!$this->create($data,1)) {

			   return $this->getError();
			}else{	   
		  	   $this->relation(true)->add();
			   $info  = array('status'=>1,'url' => U("User/index"));

			   return $info;
		}
    }

    public function Login($data){   			   
				 
		    if (!$this->create($data,2)) {

				return $this->getError();

			}else{
			  $data_arr =  array('username' =>$data['username'] , 'password' => md5($data['password']));
			  $user = $this->where($data_arr)->find();


			  if (!$user||$user['password'] != $data_arr['password']) {
			  	 	$info  = array('status'=>0,'error'=>'用户名或密码错误');
			  	}else{

			  		$info  = array(
			  			'id'=>$user['id'],
			  			'status'=>1,
			  			'loginip'=>get_client_ip(),
			  			'logintime'=>time(),
			  			);

			  		$this->relation(true)->save($info);

	  			  				  		
			  		session('uid',$user['id']);
			  		session('username',$user['username']);
			  		session('logintime',date('Y-m-d H:i:s',$user['logintime']));
			  		session('loginip',$user['loginip']);

			  		if ($user['username'] == C('RBAC_SUPERADMIN')) {
			  			session(C('ADMIN_AUTH_KEY'),true);
			  		}

			  		RBAC::saveAccessList();
			  		$info['url'] = U("index/index");
			  		
			  	}
			  	return $info;

		}							
		
    }



    public function getEditUser($data,$id){
       if (!$this->create($data,2)) {
		   return $this->getError();
		}else{
		   $this->relation(true)->where(array('id'=>$id))->save();
		   $info  = array('status'=>1,'url' => U("User/index"));
		   return $info; 
		}   
    }
}