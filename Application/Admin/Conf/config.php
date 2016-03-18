<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
        '__ADMIN__' => __ROOT__ . '/Public/Admin',
	),
	'URL_HTML_SUFFIX' => '',
	

	//RBAC配置
	'RBAC_SUPERADMIN' => 'admin',       //超级管理员名称
	'ADMIN_AUTH_KEY'  => 'superadmin',  //超级管理员识别

	'USER_AUTH_ON'    => true,           //是否开启验证
	'USER_AUTH_TYPE'  => 2,             //验证类型（1:登录验证，2：时时验证）
	'USER_AUTH_KEY'   => 'uid',         //用户认证识别号

	'NOT_AUTH_MODULE' => '',			//无需认证的控制器
	'NOT_AUTH_ACTION' => 'logout',            //无需认证的动作方法

	'RBAC_ROLE_TABLE' => 'tp_role',		//角色表名称
	'RBAC_USER_TABLE' => 'tp_role_user',//角色与用户的中间表名称
	'RBAC_ACCESS_TABLE' => 'tp_access',	//权限表名称
	'RBAC_NODE_TABLE'	=> 'tp_node',	//节点表名称

);