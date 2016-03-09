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
<title>新增单页</title>
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

	<div class="pd-20">
		<form action="<?php echo U('edit');?>" method="post" class="form form-horizontal" id="form-page-add">
			<div class="HuiTab" id="tab">
				<div class="tabBar cl">
					<?php if(is_array($langset)): $i = 0; $__LIST__ = $langset;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><?php echo ($vo["name"]); ?>内容</span><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!--基本信息-->
				<?php if(is_array($langset)): $i = 0; $__LIST__ = $langset;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lang): $mod = ($i % 2 );++$i; $lang = $lang['mark']; ?>
					<div class="tabCon">
						<input type="hidden" name="langset[<?php echo ($lang); ?>][lang]" value="<?php echo ($lang); ?>" />
						<input type="hidden" name="langset[<?php echo ($lang); ?>][id]" value="<?php echo ((isset($data["id"]) && ($data["id"] !== ""))?($data["id"]):0); ?>" />
						<input type="hidden" name="langset[<?php echo ($lang); ?>][nav_id]" value="<?php echo ($nav_id); ?>" />
						<div class="row cl">
							<label class="form-label col-1"><span class="c-red">*</span>单页名称：</label>
							<div class="formControls col-10">
								<input type="text" class="input-text" value="<?php echo ((isset($data[$lang]['title']) && ($data[$lang]['title'] !== ""))?($data[$lang]['title']):getNavName($nav_id,$lang)); ?>" placeholder="" id="" name="langset[<?php echo ($lang); ?>][title]">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-1">内容：</label>
							<div class="formControls col-10">
								<?php echo (get_editor('content'.$i,'langset['.$lang.'][content]',$data[$lang]['content'], 'ke', '100%,500px')); ?>
							</div>
						</div>
						<?php echo $_custom = getCustomValue('page',unserialize($data[$lang]['custom']),$lang);?>
						<div class="row cl">
							<label class="form-label col-1">关键词：</label>
							<div class="formControls col-10">
								<input type="text" class="input-text" value="<?php echo ($data[$lang]['keywords']); ?>" name="langset[<?php echo ($lang); ?>][keywords]">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-1">文章描述：</label>
							<div class="formControls col-10">
								<textarea name="langset[<?php echo ($lang); ?>][description]" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo ($data[$lang]['description']); ?></textarea>
								<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</form>
	</div>
	
	<script type="text/javascript">
		$(function(){
			$('button[type="submit"]').click(function(){
				$('#form-page-add').submit();
			})
			//异步提交表单
//			$('#form-page-add').submit(function(){
//				var self = $(this);
//				$.ajax({
//					type: "POST",
//					url: "<?php echo U('edit');?>",
//					data: self.serializeArray(),
//					async: false,
//					dataType: "json",
//					success:function(data){
//						console.log(data);
//						if(data.status == 1){
//							layer.msg(data.message,{
//								icon: 6,
//								time: 1000
//							},function(){
//								console.log(data.data);
//								location.reload();
//							});
//						}else{
//							layer.msg(data.message, {
//								icon: 5,
//								time: 2000
//							});
//						}
//					}
//				})
//				return false;
//			});
			$.Huitab("#tab .tabBar span", "#tab .tabCon", "current", "click", "0");
		})
	</script>
</body>

</html>