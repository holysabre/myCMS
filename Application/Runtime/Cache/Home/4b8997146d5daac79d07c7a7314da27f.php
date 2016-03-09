<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo ($info["title"]); ?> - <?php echo ($site["WEB_SITE_TITLE"]); ?></title>
		<meta name="Keywords" content="<?php echo ($info["keywords"]); ?>"/>
		<meta name="Description" content="<?php echo ($info["description"]); ?>"/>
		<link rel="stylesheet" type="text/css" href="/myCMS/tpl/css/css.css"/>
		<script src="/myCMS/tpl/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		
		<header class="header">
	<ul>
		<li><a href="<?php echo U('Index/index');?>">网站首页</a></li>
		<li><a href="<?php echo U('Page/about');?>">关于我们</a></li>
		<li><a href="<?php echo U('News/index');?>">新闻中心</a></li>
		<li><a href="<?php echo U('Products/index');?>">产品中心</a></li>
		<li><a href="">网站首页</a></li>
	</ul>
</header>
<div class="banner">
	
</div>
		
		<section class="inside">
			<article class="inside_nav clearfix">
				<ul>
					<?php if(is_array($nav_arr)): $i = 0; $__LIST__ = $nav_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U($vo['url']);?>"><?php echo ($vo["name"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</article>
			<aside class="inside_right clearfix">
				<div class="bread"> 
					<a href="<?php echo U('Index/index');?>">首页</a>
					<?php if(is_array($bread)): $i = 0; $__LIST__ = $bread;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url']);?>"> > <?php echo ($vo["name"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="bread_pos"><?php echo ($position["name"]); ?></div>
				</div>
				<div class="inside_con">
					<div class="news">
						<ul>
							<?php if(is_array($info["list"])): $i = 0; $__LIST__ = $info["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<a href="<?php echo (get_home_url($vo["id"],$vo['pid'])); ?>"><?php echo ($vo["title"]); ?></a>
									<span><?php echo (get_strtotime($vo["time"])); ?></span>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<div class="pageNav"><?php echo ($info["pages"]); ?></div>
					</div>
				</div>
			</aside>
		</section>
		
		<footer class="footer">
	<div class="footer_con">
		版权所有：XXXXXXXXX有限公司  技术支持：XXXX
	</div>
</footer>
	</body>
</html>