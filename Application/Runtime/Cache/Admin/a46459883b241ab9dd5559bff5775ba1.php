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
<title>模块列表</title>
</head>

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 模块管理 <span class="c-gray en">&gt;</span> 模块列表
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="pd-20">
		<div class="cl pd-5 bg-1 bk-gray">
			<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a> 
					<a class="btn btn-primary radius" onclick="article_add('添加模块','<?php echo U('add');?>')" href="javascript:;">
						<i class="Hui-iconfont">&#xe600;</i> 添加模块
					</a>
				</span>
			<span class="r">共有数据：<strong><?php echo ($data["count"]); ?></strong> 条</span> </div>
		<div class="mt-20">
			<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>Tip:若模块为插件，链接例子为：（插件名称/控制器/方法）</div>
		</div>
		<div class="mt-20">
			<div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Base/ajax_edit');?>" data-del="<?php echo U('Base/delete');?>" data-change="<?php echo U('Base/ajax_change');?>"></div>
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="25">
							<input type="checkbox" name="" value="">
						</th>
						<th width="80">ID</th>
						<th width="200">模版名称</th>
						<th width="100">表名</th>
						<th width="200">链接</th>
						<th width="100">显示模式</th>
						<th width="150">更新时间</th>
						<th width="50">状态</th>
						<th width="50">系统模块</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data["data"])): $i = 0; $__LIST__ = $data["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
							<td>
								<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="id">
							</td>
							<td><?php echo ($vo["id"]); ?></td>
							<td class="text-l"><?php echo (get_span($vo["name"],$vo['id'],'name')); ?></td>
							<td class="text-l"><?php echo (get_span($vo["table"],$vo['id'],'table')); ?></td>
							<td class="text-l"><?php echo (get_span($vo["url"],$vo['id'],'url')); ?></td>
							<td class="text=l"><?php echo $display_mode[$vo['modular']];?></td>
							<td><?php echo (get_strtotime($vo["edittime"],full)); ?></td>
							<td class="td-status"><?php echo (get_toggle($vo["status"],$vo['id'],'status')); ?></td>
							<td><?php echo $vo['is_system']==1?'<i class="Hui-iconfont" style="color: red;">&#xe6a7;</i>':'<i class="Hui-iconfont" style="color: black;">&#xe6a6;</i>';?></td>
							<td class="f-14 td-manage">
								<?php if($vo['is_system'] == 1): ?><span class="ml-5 disabled" title="无法编辑" disabled="true"><i class="Hui-iconfont" style="color: #ccc;">&#xe6df;</i></span>
									<span class="ml-5" title="无法删除"><i class="Hui-iconfont" style="color: #ccc;">&#xe6e2;</i></span>
								<?php else: ?>
									<a style="text-decoration:none" class="ml-5" onClick="article_edit('编辑','<?php echo U('edit');?>','<?php echo ($vo["id"]); ?>')" href="javascript:;" title="编辑" disabled="true"><i class="Hui-iconfont">&#xe6df;</i></a>
									<a style="text-decoration:none" class="ml-5 del_btn" data-id="<?php echo ($vo["id"]); ?>" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
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
		/*资讯-添加*/
		function article_add(title, url, w, h) {
				var index = layer.open({
					type: 2,
					title: title,
					content: url,
					area:['600px','80%']
				});
			}
			/*资讯-编辑*/

		function article_edit(title, url, id, w, h) {
			var index = layer.open({
				type: 2,
				title: title,
				content: url + '&id=' + id,
				area:['600px','80%']
			});
		}
	</script>
</body>

</html>