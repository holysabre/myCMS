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
<title>数据库列表</title>
</head>

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据库管理 <span class="c-gray en">&gt;</span> 数据库列表
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="pd-20">
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
					<a href="<?php echo U('index');?>" class="btn btn-primary radius">备份</a>
					<a href="<?php echo U('recover');?>" class="btn btn-secondary radius">恢复</a>
					<a href="<?php echo U('query');?>"  class="btn btn-warning radius">执行</a>
				</span>
			<!--<span class="r">共有数据：<strong><?php echo ($data["count"]); ?></strong> 条</span> </div>-->
			<div class="mt-20">
				<div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Base/ajax_edit');?>" data-del="<?php echo U('Base/delete');?>" data-change="<?php echo U('Base/ajax_change');?>"></div>
				<br />
				<div class="row cl">
					<div><span class="c-red">*执行SQL将直接操作数据库，请谨慎使用</span></div>
				</div>
				<div class="row cl">
					<div class="formControls col-8">
						<textarea name="sql" rows="" cols="" class="textarea sql"></textarea>
					</div>
				</div>
				<br />
				<div class="row cl">
					<div class="formControls col-1">
						<input type="button" value="提交" class="btn btn-block submit" />
					</div>
				</div>
			</div>
		</div>
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

		<script type="text/javascript">
			$(function() {
				$('.submit').click(function(){
					var sql = $('.sql').val();
					if(sql == ''){
						layer.tips('提示：SQL语句不能为空！', '.submit', {
						    tips: [2, '#78BA32']
						});
						return false;
					}else{
						$.ajax({
							type:"post",
							url:"<?php echo U('querySql');?>",
							data:"sql=" + sql,
							async:true,
							success: function(data) {
	//							console.log(data);
								if (data.status == 1) {
									//成功
									layer.msg(data.message, {
										icon: 6,
										time: 3000
									});
								} else {
									//失败
									layer.msg(data.message, {
										icon: 5,
										time: 3000
									});
								}
							}
						});
					}
				})
			})
		</script>
</body>

</html>