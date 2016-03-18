<?php

return array(
	
    //'配置项'=>'配置值'
    //数据库设置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'blog',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',


    'LOAD_EXT_CONFIG' => 'sysconfig', 
    
    'SHOW_PAGE_TRACE'=>True,
    
    'TMPL_TEMPLATE_SUFFIX'  =>  '.tpl',     // 默认模板文件后缀

    'URL_ROUTER_ON' => true,
    'MODULE_ALLOW_LIST'  => array('Home','Admin'), 
    'DEFAULT_MODULE'     => 'Home',//默认模块
    'URL_ROUTE_RULES'    => array(       
        'category/:slug$' => 'List/index',
        ':slug/:id\d' => 'Article/index',
    )
);

	
?>