<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
        '__Home__' => __ROOT__ . '/Public/Home',
	),
	'TAGLIB_PRE_LOAD' => 'Home\\TagLib\\Blog',
	'TAGLIB_BUILD_IN' => 'Cx,Html',

);