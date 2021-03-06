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
<link href="/mycms/Application/Admin/View/Static/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/mycms/Application/Admin/View/Static/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/mycms/Application/Admin/View/Static/skin/default/skin.css" rel="stylesheet" type="text/css"/>
<link href="/mycms/Application/Admin/View/Static/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/mycms/Application/Admin/View/Static/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="/mycms/Application/Admin/View/Static/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">-->
<link rel="stylesheet" type="text/css" href="/mycms/Application/Admin/View/Static/lib/plupload/style.css" />
<link rel="stylesheet" type="text/css" href="/mycms/Application/Admin/View/Static/css/upload.css" />
<link rel="stylesheet" type="text/css" href="/mycms/Application/Admin/View/Static/lib/bootstrap-Switch/bootstrapSwitch.css" />

<link rel="stylesheet"  href="/mycms/Application/Admin/View/Static/css/style.css"/>
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/kindeditor/kindeditor-min.js"></script>
<title>资讯列表</title>
</head>

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <span class="c-gray en">&gt;</span> 文章列表
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="pd-20">
		<div class="text-c"> <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span> 日期范围：
			<input type="text" onfocus="WdatePicker()" id="logmin" class="input-text Wdate" style="width:120px;"> -
			<input type="text" onfocus="WdatePicker()" id="logmax" class="input-text Wdate" style="width:120px;">
			<input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
						<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
					</a> 
					<a class="btn btn-primary radius" onclick="article_add('添加文章','<?php echo U('add');?>')" href="javascript:;">
						<i class="Hui-iconfont">&#xe600;</i> 添加文章
					</a>
				</span>
			<span class="r">共有数据：<strong>54</strong> 条</span> </div>
		<div class="mt-20">
			<div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Base/ajax_edit');?>" data-del="<?php echo U('Base/delete');?>" data-change="<?php echo U('Base/ajax_change');?>"></div>
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="25">
							<input type="checkbox" name="" value="">
						</th>
						<th width="80">ID</th>
						<th width="80">缩略图</th>
						<th>标题</th>
						<th width="80">分类</th>
						<th width="80">来源</th>
						<th width="120">更新时间</th>
						<th width="75">浏览次数</th>
						<th width="75">排序</th>
						<th width="60">发布状态</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
							<td>
								<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="id">
							</td>
							<td><?php echo ($vo["id"]); ?></td>
							<td class="thumbnail"><img src="<?php echo ($vo["img"]); ?>" width="30" height="30" />
								<div class="thumb_pic"><img src="<?php echo ($vo["img"]); ?>" width="100" height="100" /></div>
							</td>
							<td class="text-l">
								<i class="Hui-iconfont">&#xe6df;</i><a href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="text_edit" data-name="title"><?php echo ($vo["title"]); ?></a>

								<!--<u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','<?php echo U('edit');?>','<?php echo ($vo["id"]); ?>')" title="查看"><?php echo ($vo["title"]); ?></u>-->
							</td>
							<td><?php echo getCateName($vo['cid']);?></td>
							<td><?php echo ($vo["auth"]); ?></td>
							<td><?php echo (get_strtotime($vo["edittime"],full)); ?></td>
							<td><?php echo ($vo["count"]); ?></td>
							<td>
								<input type="text" name="sort" class="input-text text_edit" value="<?php echo ($vo["sort"]); ?>" data-id="<?php echo ($vo["id"]); ?>" />
							</td>
							<td class="td-status"><span class="label <?php echo $vo['status']==1?'label-success':'label-danger';?> radius change_btn" data-id="<?php echo ($vo["id"]); ?>" data-val="<?php echo ($vo["status"]); ?>"><?php echo $vo['status']==1?'已发布':'已下架';?></span></td>
							<td class="f-14 td-manage">
								<a style="text-decoration:none" class="ml-5" onClick="article_edit('编辑','<?php echo U('edit');?>','<?php echo ($vo["id"]); ?>')" href="javascript:;" title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
								<a style="text-decoration:none" class="ml-5 del_btn" data-id="<?php echo ($vo["id"]); ?>" href="javascript:;" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/js/H-ui.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/Validform/5.3.2/Validform.min.js"></script>
<!--<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>-->
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/plupload/jquery.dragsort-0.5.2.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/plupload/pluploadQueue.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/js/uploader.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/laypage/1.2/laypage.js"></script>
<!--<script type="text/javascript" src="/mycms/Application/Admin/View/Static/js/H-ui.admin.system.js"></script>-->
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/lib/bootstrap-Switch/bootstrapSwitch.js"></script>
	
	
<script type="text/javascript" src="/mycms/Application/Admin/View/Static/js/style.js"></script>

	<script type="text/javascript">
		$('.table-sort').dataTable({
			"aaSorting": [
				[1, "desc"]
			], //默认第几个排序
			"bStateSave": true, //状态保存
			"aoColumnDefs": [
				//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
				{
					"orderable": false,
					"aTargets": [0, 8]
				} // 制定列不参与排序
			]
		});
		/*资讯-添加*/
		function article_add(title, url, w, h) {
			var index = layer.open({
				type: 2,
				title: title,
				content: url
			});
			layer.full(index);
		}
		/*资讯-编辑*/
		function article_edit(title, url, id, w, h) {
			var index = layer.open({
				type: 2,
				title: title,
				content: url + '&id=' + id
			});
			layer.full(index);
		}
	</script>
</body>

</html>