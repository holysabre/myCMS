<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<!--[if lt IE 9]>
		<script type="text/javascript" src="lib/html5.js"></script>
		<script type="text/javascript" src="lib/respond.min.js"></script>
		<script type="text/javascript" src="lib/PIE_IE678.js"></script>
		<![endif]-->
		<link href="/myCMS/Application/Admin/View/Static/css/H-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="/myCMS/Application/Admin/View/Static/css/H-ui.admin.css" rel="stylesheet" type="text/css" />

		<link href="/myCMS/Application/Admin/View/Static/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
		<!--[if IE 6]>
		<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
		<script>DD_belatedPNG.fix('*');</script>
		<![endif]-->
		<title>我的桌面</title>
	</head>

	<body>
		<div class="pd-20" style="padding-top:20px;">
			<p class="f-20 text-success">欢迎使用内容管理系统！</p>
			<p>登录次数：<?php echo ($data["count"]); ?> </p>
			<p>当前登录IP：<?php echo ($data["server"]["REMOTE_ADDR"]); ?> 上次登录时间：<?php echo (get_strtotime($data["lasttime"],'full')); ?></p>
			<!--<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th colspan="7" scope="col">信息统计</th>
					</tr>
					<tr class="text-c">
						<th>统计</th>
						<th>资讯库</th>
						<th>图片库</th>
						<th>产品库</th>
						<th>用户</th>
						<th>管理员</th>
					</tr>
				</thead>
				<tbody>
					<tr class="text-c">
						<td>总数</td>
						<td>92</td>
						<td>9</td>
						<td>0</td>
						<td>8</td>
						<td>20</td>
					</tr>
					<tr class="text-c">
						<td>今日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr class="text-c">
						<td>昨日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr class="text-c">
						<td>本周</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
					<tr class="text-c">
						<td>本月</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
					</tr>
				</tbody>
			</table>-->
			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th width="200">服务器计算机名</th>
						<td><span id="lbServerName"><?php echo ($data["server"]["SERVER_NAME"]); ?></span></td>
					</tr>
					<tr>
						<td>服务器IP地址</td>
						<td><?php echo ($data["server"]["SERVER_ADDR"]); ?></td>
					</tr>
					<tr>
						<td>服务器域名</td>
						<td><?php echo ($data["server"]["SERVER_NAME"]); ?></td>
					</tr>
					<tr>
						<td>服务器端口 </td>
						<td><?php echo ($data["server"]["SERVER_PORT"]); ?></td>
					</tr>
					<tr>
						<td>服务器IIS版本 </td>
						<td><?php echo ($data["server"]["SERVER_SOFTWARE"]); ?></td>
					</tr>
					<tr>
						<td>本文件所在文件夹 </td>
						<td><?php echo ($data["server"]["SCRIPT_FILENAME"]); ?></td>
					</tr>
					<tr>
						<td>服务器操作系统 </td>
						<td><?php echo php_uname();?></td>
					</tr>
					<tr>
						<td>服务器操作系统所在位置 </td>
						<td><?php echo ($data["server"]["PATH"]); ?></td>
					</tr>
					<tr>
						<td>服务器脚本超时时间 </td>
						<td><?php echo get_cfg_var("max_execution_time")."秒 ";?></td>
					</tr>
					<tr>
						<td>服务器的语言种类 </td>
						<td><?php echo ($data["server"]["HTTP_ACCEPT_LANGUAGE"]); ?></td>
					</tr>
					<tr>
						<td>Zend 版本 </td>
						<td><?php echo Zend_Version();?></td>
					</tr>
					<tr>
						<td>服务器当前时间 </td>
						<td><?php echo get_strtotime(time(),'full');?></td>
					</tr>
					<tr>
						<td>服务器IE版本 </td>
						<td><?php echo ($data["server"]["HTTP_USER_AGENT"]); ?></td>
					</tr>
					<tr>
						<td>服务器解译引擎 </td>
						<td><?php echo ($data["server"]["SERVER_SOFTWARE"]); ?></td>
					</tr>
					<tr>
						<td>CPU 总数 </td>
						<td><?php echo ($data["server"]["PROCESSOR_IDENTIFIER"]); ?></td>
					</tr>
					<tr>
						<td>当前程序占用内存 </td>
						<td><?php echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无";?></td>
					</tr>
					<tr>
						<td>当前Session数量 </td>
						<td><?php echo count($_SESSION);?></td>
					</tr>
					<tr>
						<td>当前SessionID </td>
						<td><?php echo session_id();?></td>
					</tr>
					<tr>
						<td>MYSQL支持 </td>
						<td><?php echo function_exists (mysql_close)?"是":"否";?></td>
					</tr>
					<tr>
						<td>MySQL数据库持续连接 </td>
						<td><?php echo @get_cfg_var("mysql.allow_persistent")?"是 ":"否";?></td>
					</tr>
					<tr>
						<td>MySQL最大连接数 </td>
						<td><?php echo @get_cfg_var("mysql.max_links")==-1 ? "不限" : @get_cfg_var("mysql.max_links");?></td>
					</tr>
					<tr>
						<td>最大上传限制 </td>
						<td><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";?></td>
					</tr>
					<tr>
						<td>当前连接的MYSQL数据库的版本 </td>
						<td><?php echo mysql_get_server_info();?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/H-ui.js"></script>
		
	</body>

</html>