<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo ($info["title"]); ?> - <?php echo ($site["WEB_SITE_TITLE"]); ?></title>
		<meta name="Keywords" content="<?php echo ($info["keywords"]); ?>"/>
		<meta name="Description" content="<?php echo ($info["description"]); ?>"/>
		<link rel="stylesheet" type="text/css" href="/myCMS/tpl/css/css.css"/>
		<script src="/myCMS/tpl/js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				$('.inside_nav li').click(function(){
					$(this).next('.nav_two').toggle();
				})
				$('.pro_detail_imgdata li a').click(function(){
					var img_path = $(this).children('img').attr('src');
					$('.pro_detail_l img').attr('src',img_path);
				})
			})
		</script>
		<style type="text/css">
			.nav_two li{
				padding-left: 40px;
				width: 230px;
			}
		</style>
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
						</li>
						<div class="nav_two" style="display: none;">
							<ul>
								<?php if(is_array($vo["son"])): $i = 0; $__LIST__ = $vo["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
										<a href="<?php echo U($val['url']);?>"><?php echo ($val["name"]); ?></a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</article>
			<aside class="inside_right clearfix">
				<div class="bread"> 
					<a href="<?php echo U('Index/index');?>">首页</a>
					<?php if(is_array($bread)): $i = 0; $__LIST__ = $bread;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url']);?>"> > <?php echo ($vo["name"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="bread_pos"><?php echo ($position["name"]); ?></div>
				</div>
				<div class="inside_con">
					<div class="products_detail">
						<div class="pro_detail_l clearfix">
							<img src="<?php echo (get_img($info["img"])); ?>"/>
						</div>
						<div class="pro_detail_r clearfix">
							产品名称：<?php echo ($info["title"]); ?><br />
							产品型号：<br />
							产品规格：<br />
							<div class="pro_detail_prev">
								<?php if(isset($info['prev'])): ?><a href="<?php echo (get_home_url($info["prev"]["id"],$info['prev']['pid'])); ?>">上一个：<?php echo ($info["prev"]["title"]); ?></a><?php endif; ?>
								<?php if(isset($info['next'])): ?><a href="<?php echo (get_home_url($info["next"]["id"],$info['next']['pid'])); ?>">下一个：<?php echo ($info["next"]["title"]); ?></a><?php endif; ?>
							</div>
						</div>
						<div class="pro_detail_imgdata">
							<ul>
								<?php if(is_array($info["imgdata"])): $i = 0; $__LIST__ = $info["imgdata"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
										<a href="javascript:;">
											<img src="<?php echo (get_img($vo)); ?>"/>
										</a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
						<div class="pro_detail_more_title">产品详情</div>
						<div class="pro_detail_more_con">
							<?php echo (get_htmlcode($info["content"])); ?>
						</div>
						
						<style type="text/css">
							#tab{
								
							}
							.tabBar{
								font-size: 0;
							}
							.tabBar span{
								display: inline-block;
								*zoom: 1;
								*display: inline;
								width: 50px;
								line-height:30px;
								background: #ccc;
								text-align: center;
								cursor: pointer;
								font-size: 14px;
								margin-right: 5px;
							}
							.tabCon{
								width: 800px;
								height: 300px;
								border: 1px solid #ccc;
								display: none;
							}
						</style>
						
						<script type="text/javascript">
							$(function(){
								$('.tabBar span').click(function(){
									$('.tabCon').hide().eq($(this).index()).show();
								});
							})
						</script>
						
						<div class="tab" id="tab">
							<div class="tabBar">
								<span>1</span>
								<span>2</span>
								<span>3</span>
								<span>4</span>
							</div>
							<div class="tabCon" style="display: block;">
								111
							</div>
							<div class="tabCon">
								222
							</div>
							<div class="tabCon">
								333
							</div>
							<div class="tabCon">
								444
							</div>
						</div>
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