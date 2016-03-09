<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<a href="<?php echo U('GuestBook/index');?>">留言页面</a><br />
		<hr />
		站点信息：<br />
		网站关键字：<?php echo ($site["WEB_SITE_KEYWORDS"]); ?> <br />
		网站电话    ：<?php echo ($site["WEB_SITE_TEL"]); ?>
		<hr />
		<a href="<?php echo U('Page/about');?>">单页</a>
	</body>
</html>