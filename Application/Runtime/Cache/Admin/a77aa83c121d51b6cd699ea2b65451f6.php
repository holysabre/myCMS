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
<title>新增文章</title>
</head>

<body>
	<div class="pd-20">
		<form method="post" class="form form-horizontal" id="form-menu-add">
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>菜单名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="<?php echo ($data["name"]); ?>" placeholder="菜单名称" id="" name="name">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>菜单链接：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="<?php echo ($data["url"]); ?>" placeholder="(控制器/方法)" id="" name="url">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">父级菜单：</label>
				<div class="formControls col-4"> 
					<span class="select-box">
						<select name="pid" class="select">
								<option value="0">顶级菜单</option>
							<?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php echo $data['pid'] == $vo['id'] ? 'selected=""':'';?>><?php echo ($vo["title_show"]); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</span>
				</div>

				<label class="form-label col-2">排序值：</label>
				<div class="formControls col-4">
					<input type="text" class="input-text" value="<?php echo ((isset($data["sort"]) && ($data["sort"] !== ""))?($data["sort"]):0); ?>" placeholder="默认为0" id="" name="sort">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">是否显示左侧：</label>
				<div class="formControls col-4"> 
					<span class="select-box">
						<select name="is_left" class="select">
							<option value="0" <?php echo $data['is_left']=='0'?'selected=""':'';?>>不显示</option>
							<option value="1" <?php echo $data['is_left']=='1'?'selected=""':'';?>>显示</option>
						</select>
					</span>
				</div>
				<label class="form-label col-2">菜单状态：</label>
				<div class="formControls col-4">
					<span class="select-box">
						<select name="status" class="select">
							<option value="1" <?php echo $data['status']=='1'?'selected=""':'';?>>启用</option>
							<option value="0" <?php echo $data['status']=='0'?'selected=""':'';?>>禁用</option>
						</select>
					</span>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">是否显示左侧：</label>
				<div class="formControls col-4"> 
					<input type="text" class="input-text" value="<?php echo ($data["css"]); ?>" placeholder="Hui-iconfont样式代码" id="" name="css">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">备注信息：</label>
				<div class="formControls col-10">
					<textarea name="note" cols="" rows="" class="textarea" placeholder="备注信息，最多240个字符..." datatype="*0-240" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,240)"><?php echo ($data["note"]); ?></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/240</p>
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
					<button onClick="menu_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</form>
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
		$(function(){
			//异步提交表单
			$('#form-menu-add').submit(function(){
				var self = $(this);
				$.ajax({
					type: "POST",
					url: "<?php echo U('edit');?>",
					data: self.serializeArray(),
					async: false,
					dataType: "json",
					success:function(data){
//						console.log(data);
						if(data.status == 1){
							layer.msg(data.message,{
								icon: 6,
								time: 1000
							},function(){
//								console.log(data.data);
								parent.location.reload();
							});
						}else{
							layer.msg(data.info, {
								icon: 5,
								time: 2000
							});
						}
					}
				})
				return false;
			});
		})
//		function menu_save_submit(){
//			$('#form-menu-add').submit();
//		}
	</script>
</body>

</html>