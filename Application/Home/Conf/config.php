<?php
return array(
	//'配置项'=>'配置值'
	'VIEW_PATH'         => './Tpl/', // 自定义主题目录
    'DEFAULT_THEME'     => '', // 模板主题为空
    'URL_MODEL'         => 2,
	'URL_ROUTER_ON'     => true,
	'URL_ROUTE_RULES'   => array (
		'/^page\/(\w+)$/i'        => 'Page/detail?alias=:1',
		'/^news\/(\w+)$/i'        => 'News/index?alias=:1',
		'/^news\/(\w+)\/detail\/([0-9]+)$/i'        => 'News/detail?alias=:1&id=:2',
		'/^products\/(\w+)$/i'        => 'Products/index?alias=:1',
		'/^products\/(\w+)\/detail\/([0-9]+)$/i'        => 'Products/detail?alias=:1&id=:2',
	),
	
	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__ . '/Public/static', //静态文件
		'__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons', //插件目录
		'__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images', //图片目录
		'__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css', //CSS目录
		'__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js', //JS目录
	),
);