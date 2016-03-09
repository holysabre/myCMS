<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/myCMS/Application/Admin/View/Static/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/myCMS/Application/Admin/View/Static/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/myCMS/Application/Admin/View/Static/skin/default/skin.css" rel="stylesheet" type="text/css"/>
<link href="/myCMS/Application/Admin/View/Static/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/myCMS/Application/Admin/View/Static/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="/myCMS/Application/Admin/View/Static/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">-->
<link rel="stylesheet" type="text/css" href="/myCMS/Application/Admin/View/Static/lib/plupload/style.css" />
<link rel="stylesheet" type="text/css" href="/myCMS/Application/Admin/View/Static/css/upload.css" />
<link rel="stylesheet" type="text/css" href="/myCMS/Application/Admin/View/Static/lib/bootstrap-Switch/bootstrapSwitch.css" />

<link rel="stylesheet"  href="/myCMS/Application/Admin/View/Static/css/style.css"/>
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/kindeditor/kindeditor-min.js"></script>
<title>自定义设置</title>
</head>

<body>
	<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/H-ui.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/Validform/5.3.2/Validform.min.js"></script>
<!--<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>-->
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/plupload/jquery.dragsort-0.5.2.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/plupload/pluploadQueue.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/uploader.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/laypage/1.2/laypage.js"></script>
<!--<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/H-ui.admin.system.js"></script>-->
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/lib/bootstrap-Switch/bootstrapSwitch.js"></script>
	
	
<script type="text/javascript" src="/myCMS/Application/Admin/View/Static/js/style.js"></script>

	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 自定义字段管理 
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"title="刷新">
			<i class="Hui-iconfont">&#xe68f;</i>
		</a>
	</nav>
	<div class="pd-20">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><?php echo ($vo["name"]); ?>自定义</span><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tabCon">
					<form action="<?php echo U();?>" method="post" class="form form-horizontal" id="form_setting_base">
						<?php $value = unserialize($vo['value']) ?>
						<?php if(is_array($value)): $i = 0; $__LIST__ = $value;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="row cl">
								<div class="form-control col-12">
									名称：<input type="text" name="value[<?php echo ($i); ?>][name]" value="<?php echo ($val["name"]); ?>" class="input-text" style="width: 200px;"/>
									说明：<input type="text" name="value[<?php echo ($i); ?>][instruction]" value="<?php echo ($val["instruction"]); ?>" class="input-text" style="width: 200px;"/>
									排序：<input type="text" name="value[<?php echo ($i); ?>][order]" value="<?php echo ($val["order"]); ?>" class="input-text" style="width: 50px;"/>
									类型：
									<select name="value[<?php echo ($i); ?>][type]" id="" class="select-box" style="width: 200px;">
										<option value="1" <?php echo $val['type'] == 1 ? 'selected' : '';?>>文本框(默认)</option>
										<option value="2" <?php echo $val['type'] == 2 ? 'selected' : '';?>>文本域</option>
										<option value="3" <?php echo $val['type'] == 3 ? 'selected' : '';?>>富文本编辑器</option>
										<option value="4" <?php echo $val['type'] == 4 ? 'selected' : '';?>>单选框</option>
										<option value="5" <?php echo $val['type'] == 5 ? 'selected' : '';?>>多选框</option>
										<option value="6" <?php echo $val['type'] == 6 ? 'selected' : '';?>>图片上传</option>
									</select>
									<span style="display:<?php echo $val['option']?'':'none';?>">选项：<input type="text" name="value[<?php echo ($i); ?>][option]" value="<?php echo ($val['option']); ?>" class="input-text" style="width: 250px;" /></span>
									标签调用说明：
									<a href="javascript:;" class="btn btn-danger custom_del">删除</a>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="row cl">
							<div class="form-control col-12">
								名称：<input type="text" name="value[0][name]" value="" class="input-text" style="width: 200px;"/>
								说明：<input type="text" name="value[0][instruction]" value="" class="input-text" style="width: 200px;"/>
								排序：<input type="text" name="value[0][order]" value="255" class="input-text" style="width: 50px;"/>
								类型：
								<select name="value[0][type]" id="" class="select-box" style="width: 200px;">
									<option value="1">文本框(默认)</option>
									<option value="2">文本域</option>
									<option value="3">富文本编辑器</option>
									<option value="4">单选框</option>
									<option value="5">多选框</option>
									<option value="6">图片上传</option>
								</select>
								<span class="custom_option" style="display: none;">
									选项：<input type="text" name="value[0][option]" value="" class="input-text" style="width: 250px;" />
								</span>
								标签调用说明：
							</div>
						</div>
						<div class="row cl">
							<div class="form-control col-8">
								<input type="hidden" name="model" id="model" value="<?php echo ($vo["model"]); ?>" />
								<input type="submit" class="btn btn-primary radius" value="保存" />
							</div>
						</div>
					</form>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
		</div>
	</div>
	

	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});
			$.Huitab("#tab-system .tabBar span", "#tab-system .tabCon", "current", "click", "0");
			
			$('.select-box').change(function(){
				var select_val = $(this).val();
				if(select_val == 4 || select_val == 5){
					$(this).next('span').show();
				}else{
					$(this).next('span').hide();
				}
			});
			
			$('.custom_del').click(function(){
				$(this).parent().parent().remove();
			})
		});

	</script>
</body>

</html>