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
<link href="/myCMS/Application/Admin/View/Static/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
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
		<form method="post" class="form form-horizontal" id="form-article-add">
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>文章标题：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="<?php echo ($data["title"]); ?>" placeholder="" id="" name="title">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>分类栏目：</label>
				<div class="formControls col-2"> 
					<?php echo getHtmlSelect(1,$data['cid']);?>
				</div>

				<label class="form-label col-2">排序值：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="<?php echo ($data["sort"]); ?>" placeholder="默认为0" id="" name="sort">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">文章作者：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="<?php echo ((isset($data["auth"]) && ($data["auth"] !== ""))?($data["auth"]):session('myadmin.username')); ?>" placeholder="" id="" name="auth">
				</div>
				<label class="form-label col-2">文章来源：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="<?php echo ($data["source"]); ?>" placeholder="" id="" name="source">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">使用独立模版：</label>
				<div class="formControls col-2">
					<span class="select-box">
						<select name="template" class="select">
							<option value="0">请选择模版</option>
							<option value="1">自定义模版1</option>
							<option value="2">自定义模版2</option>
							<option value="3">自定义模版3</option>
						</select>
					</span>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">缩略图：</label>
				<div class="formControls col-10">
					<div id="container_filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
					<div class="upload_img">
						<ul>
							<?php if(($data['imgdata'] != '') or ($data['imgdata'] != NULL)): if(is_array($data["imgdata"])): $i = 0; $__LIST__ = $data["imgdata"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
									<img src="<?php echo ($vo); ?>" width="100" height="100" class="showimg"/>
									<a href="javascript:;" class="close_btn">X</a>
									<input type="hidden" name="imgdata[]" value="<?php echo ($vo); ?>" />
								</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</ul>
					</div>
					<div id="container">
						<input type="text" name="one" id="one" value="" class="input-text" style="width: 140px;"/>
						<input type="button" id="pickfiles" class="btn btn-primary radius" value="上传图片">
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">文章内容：</label>
				<div class="formControls col-10">
					<!--<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo ($data["content"]); ?></script>-->
					<?php echo (get_editor('content','content',$data['content'], 'ke', '100%,300px')); ?>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">文章摘要：</label>
				<div class="formControls col-10">
					<textarea name="description" cols="" rows="" class="textarea" placeholder="若为空，则截取240个字符..." datatype="*0-240" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,240)"><?php echo ($data["intro"]); ?></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/240</p>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">关键词：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="<?php echo ($data["keywords"]); ?>" placeholder="" id="" name="keywords">
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">文章描述：</label>
				<div class="formControls col-10">
					<textarea name="description" cols="" rows="" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo ($data["description"]); ?></textarea>
					<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
					<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
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
		$('#container').pluploadQueue({
			browse_button: 'pickfiles',
			url: '<?php echo U('Base/uploadFile');?>',
			filters: {
				mime_types: [{
					title: "Image files",
					extensions: "jpg,gif,png"
				}],
				max_file_size: '5mb'
			},
			multipart_params: {
				one: 'one',
				dirname: 'article'
			},
			callSuccess: function(data) {
//				console.log(data);
				layer.msg(data.message, {
					icon: 6,
					time: 2000
				});
				upload_img(data.data);
			}, // 上传成功后返回数据
			callUploadFile: function(params) {
					params.one = $("#one").val();
				} // 开始上传后触发事件
		});
		$(function(){
			
			//异步提交表单
			$('#form-article-add').submit(function(){
				var self = $(this);
				$.ajax({
					type: "POST",
					url: "<?php echo U('edit');?>",
					data: self.serializeArray(),
					async: false,
					dataType: "json",
					success:function(data){
						if(data.status == 1){
							layer.msg(data.message,{
								icon: 6,
								time: 1000
							},function(){
								console.log(data.data);
								parent.location.reload();
							});
						}else{
							layer.msg(data.message, {
								icon: 5,
								time: 2000
							});
						}
					}
				})
				return false;
			})
		})
	</script>
</body>

</html>