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
		<div class="cl pd-5 bg-1 bk-gray">
			<span class="l">
					<a href="<?php echo U('index');?>" class="btn btn-primary radius">备份</a>
					<a href="<?php echo U('recover');?>" class="btn btn-secondary radius" <?php echo session(MY_ID)['userrole'] == 0 ? '' : 'style="display:none"';?>>恢复</a>
					<a href="<?php echo U('query');?>"  class="btn btn-warning radius" <?php echo session(MY_ID)['userrole'] == 0 ? '' : 'style="display:none"';?>>执行</a>
				</span>
			<!--<span class="r">共有数据：<strong><?php echo ($data["count"]); ?></strong> 条</span> </div>-->
			<div class="mt-20">
				<div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Base/ajax_edit');?>" data-del="<?php echo U('Base/delete');?>" data-change="<?php echo U('Base/ajax_change');?>"></div>
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
						<tr class="text-c">
							<th width="25">
								<input type="checkbox" name="" value="">
							</th>
							<th>数据表名</th>
							<th width="80">引擎</th>
							<th width="100">版本</th>
							<th width="100">编码</th>
							<th width="150">平均每条数据长度</th>
							<th width="100">数据长度</th>
							<th width="100">表名注释</th>
							<th width="100">记录数</th>
							<th width="100">自增量</th>
							<th width="200">创建时间</th>
							<th width="100">空闲数据</th>
							<th width="120">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
								<td>
									<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="id">
								</td>
								<td class="text-l"><?php echo ($vo["Name"]); ?></td>
								<td><?php echo ($vo["Engine"]); ?></td>
								<td><?php echo ($vo["Version"]); ?></td>
								<td><?php echo ($vo["Collation"]); ?></td>
								<td><?php echo (byte_format($vo["Avg_row_length"])); ?></td>
								<td><?php echo (byte_format($vo["Data_length"])); ?></td>
								<td><?php echo ($vo["Comment"]); ?></td>
								<td><?php echo ($vo["Rows"]); ?></td>
								<td><?php echo ($vo["Auto_increment"]); ?></td>
								<td><?php echo ($vo["Create_time"]); ?></td>
								<td><?php echo ($vo["Data_free"]); ?></td>
								<td class="f-14 td-manage">
									<a style="text-decoration:none" class="ml-5" href="javascript:;" title="编辑">
										<i class="Hui-iconfont">&#xe6df;</i>
									</a>
									<a style="text-decoration:none" class="ml-5 del_btn" data-id="<?php echo ($vo["id"]); ?>" href="javascript:;" title="删除">
										<i class="Hui-iconfont">&#xe6e2;</i>
									</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<div class="pd-10">
					<a href="javascript:;" class="btn btn-success radius backup_db">
						<i class="Hui-iconfont">&#xe626;</i> 备份数据库
					</a>
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
				$('.backup_db').click(function() {
					$.ajax({
						type: "get",
						url: "<?php echo U('backupDB');?>",
						async: true,
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
				})
			})
		</script>
</body>

</html>