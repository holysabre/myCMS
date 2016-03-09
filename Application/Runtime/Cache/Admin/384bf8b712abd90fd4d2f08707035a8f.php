<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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

<style type="text/css">
	.form-label col-1{margin-right:15px;}
</style>
<script type="text/javascript">
	$(function(){
		$('#islink').on('click',function(){
			var _input = $('input[name="url"]');
			if(_input.css('display') == 'block'){
				_input.hide();
			}else{
				_input.show();
			}
		})
	})
</script>
<div class="main ml-20 col-10">
	<h3><?php echo ($nav['name']); ?> - <?php echo isset($info['id'])?'编辑':'添加';?>招聘</h3>
	<div class="menulist">
		<a class="btn btn-default" href="javascript:location.reload();">刷新</a>
		<a class="btn btn-default" href="<?php echo addons_url('Job://Job/index?'.$mobileurl.'&nav_id='.$nav_id);?>">返回</a>
	</div>

	<!-- 表单 -->
	<div class="formlist" id="formlist">
		<form action="<?php echo addons_url('Job://Job/'.$info['action']);?>" method="post" class="form form-horizontal">

			<div class="row cl">
				<label class="form-label col-1 col-1">语言：</label>
				<div class="formControls col-9">
					<select name="lang" class="select-box" style="width: 100px;">
						<option value="zh-cn">中文</option>
						<option value="en-us">英文</option>
					</select>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">招聘职位:</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" name="title" value="<?php echo ($info["title"]); ?>">
				</div>
				<div class="formControls col-1">
					<input type="checkbox" name="islink" id="islink" value="1" <?php echo $islink == 1 ? 'checked=""' : '';?> />
					<span class="c-red">转向链接</span>
				</div>
				<div class="formControls col-3">
					<input type="text" class="input-text" name="url" value="<?php echo ($info["url"]); ?>" placeholder="http://www.baidu.com" style="display: <?php echo $islink == 1 ? 'block':'none';?>;"/>
				</div>
				<label class="form-label col-1">显示状态:</label>
				<div class="formControls col-2">
					<input type="checkbox" name="display" class="checkbox" value="<?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>" />
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">招聘人数:</label>
				<div class="formControls col-7">
					<input type="text" class="input-text" name="count" value="<?php echo ((isset($info["count"]) && ($info["count"] !== ""))?($info["count"]):0); ?>">
				</div>
				<div class="input-msg col-2"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>（0或留空则为不限）</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">工作地点:<span class="form-tip"></span></label>
				<div class="formControls col-9">
					<input type="text" class="input-text" name="place" value="<?php echo ((isset($info["place"]) && ($info["place"] !== ""))?($info["place"]):''); ?>">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">工资待遇:</label>
				<div class="formControls col-9">
					<input type="text" class="input-text" name="deal" value="<?php echo ((isset($info["deal"]) && ($info["deal"] !== ""))?($info["deal"]):''); ?>">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">有效天数:</label>
				<div class="formControls col-7">
					<input type="text" class="input-text" name="lifedays" value="<?php echo ((isset($info["lifedays"]) && ($info["lifedays"] !== ""))?($info["lifedays"]):0); ?>">
				</div>
				<div class="input-msg col-2"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>（0或留空则为不限）</div>
			</div>

			<div class="row cl">
				<label class="form-label col-1">内容</label>
				<div class="formControls col-9"><?php echo (get_editor('content','content',$info['content'], 'ke', '100%,350px')); ?></div>
			</div>

			<div class="row cl">
				<div class="form-btn">
					<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
					<input type="hidden" name="mobile" value="<?php echo ($mobile); ?>">
					<input type="hidden" name="nav_id" value="<?php echo ($nav_id); ?>">
					<input type="hidden" name="token" value="<?php echo ($token); ?>">
					<input class="btn btn-success" type="submit" value="提交">
				</div>
			</div>

		</form>
	</div>
	<!-- 表单 -->

</div>
<script type="text/javascript">
	setValue("lang", "<?php echo ((isset($info["lang"]) && ($info["lang"] !== ""))?($info["lang"]):'zh-cn'); ?>");
	setValue("display", "<?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>");
	setValue("islink", "<?php echo ((isset($info["islink"]) && ($info["islink"] !== ""))?($info["islink"]):0); ?>");
</script>

</body>

</html>