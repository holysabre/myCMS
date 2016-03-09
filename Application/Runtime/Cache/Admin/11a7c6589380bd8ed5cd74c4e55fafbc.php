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
<title>基本设置</title>
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
		<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);"title="刷新">
			<i class="Hui-iconfont">&#xe68f;</i>
		</a>
	</nav>
	<!--<a href="<?php echo U('sendEmail');?>">发送测试邮件</a>-->
	<div class="pd-20">
		<form action="<?php echo U('baseSetting');?>" method="post" class="form form-horizontal" id="form_setting_base">
			<div id="tab-system" class="HuiTab">
				<div class="tabBar cl">
					<?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

				<?php if(is_array($basedata)): $j = 0; $__LIST__ = $basedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($j % 2 );++$j;?><div class="tabCon">
						<?php if(is_array($vo)): $k = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; switch($val["type"]): case "1": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-6">
											<input type="text" placeholder="" value="<?php echo ($val["value"]); ?>" name="<?php echo ($val["id"]); ?>" class="input-text">
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div><?php break;?>
								<?php case "2": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-6">
											<input type="number" placeholder="" value="<?php echo ($val["value"]); ?>" name="<?php echo ($val["id"]); ?>" class="input-text" style="width: 300px;">
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div><?php break;?>
								<?php case "3": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-2">
											<?php $item = explode(',', $val['item']); foreach($item as $k=>$v){ $_item[$k] = explode(':', $v); } ?>
											<select name="<?php echo ($val["id"]); ?>" class="select-box">
												<?php if(is_array($_item)): $i = 0; $__LIST__ = $_item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><option value="<?php echo ($it["0"]); ?>" <?php echo $val[ 'value']==0? 'selected': '';?>><?php echo ($it["1"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div><?php break;?>
								<?php case "4": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-6">
											<div id="container<?php echo ($val["id"]); ?>_filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
											<div class="upload_img upload_img<?php echo ($val["id"]); ?>">
												<ul>
													<li>
														<img src="<?php echo (get_img($val["value"])); ?>" width="100" height="100" class="showimg" />
														<a href="javascript:;" class="close_one_btn">X</a>
														<input type="hidden" name="<?php echo ($val["id"]); ?>" value="<?php echo ($val["value"]); ?>" />
													</li>
												</ul>
											</div>
											<div id="container<?php echo ($val["id"]); ?>">
												<input type="button" id="pickfiles<?php echo ($val["id"]); ?>" class="btn btn-primary radius" value="上传图片">
											</div>
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div>
									<script type="text/javascript">
										$('#container<?php echo ($val["id"]); ?>').pluploadQueue({
												browse_button: 'pickfiles<?php echo ($val["id"]); ?>',
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
													dirname: 'system'
												},
												callSuccess: function(data) {
									//				console.log(data);
													layer.msg(data.message, {
														icon: 6,
														time: 2000
													});
													upload_one_img(data.data,<?php echo ($val["id"]); ?>);
												}, // 上传成功后返回数据
												callUploadFile: function(params) {} // 开始上传后触发事件
											});
									</script><?php break;?>
								<?php case "5": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-6">
											<textarea name="<?php echo ($val["id"]); ?>" cols="" rows="" class="textarea"><?php echo ($val["value"]); ?></textarea>
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div><?php break;?>
								<?php case "6": ?><div class="row cl">
										<label class="form-label col-2"><?php echo ($val["title"]); ?>：</label>
										<div class="formControls col-2">
											<?php $item = explode(',', $val['item']); foreach($item as $k=>$v){ $_item[$k] = explode(':', $v); } ?>
											<?php if(is_array($_item)): $i = 0; $__LIST__ = $_item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><input type="radio" name="<?php echo ($val["id"]); ?>" value="<?php echo ($it["0"]); ?>" <?php echo $val[ 'value']==$it[0]? 'checked': '';?> /><?php echo ($it["1"]); ?>&nbsp;&nbsp;<?php echo $i%3==0?'<br/>':''; endforeach; endif; else: echo "" ;endif; ?>
										</div>
										<?php if($val["note"] != ''): ?><div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i><?php echo ($val["note"]); ?></div><?php endif; ?>
										<div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>调用代码：{$site.<?php echo ($val["name"]); ?>}</div>
									</div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
				<div class="tabCon"><!-- 选项开始 -->
		            <!-- 修改了 
		            WEB_MAP_CONTENT,WEB_MAP_LAT,WEB_MAP_LNG 三个参数
		            Application/Common/Api/SystemApi.class.php, 
		            Application/Admin/Controller/SystemController.class.php, 
		            Tpl/Home/Page/contactus.html -->
		            <div class="row cl">
                    	<label class="form-label col-2">地址：</label>
                    	<div class="formControls col-4">
                    		<input type="text" id="address" name="address" value="" class="input-text" />
                    	</div>
                    	<div class="formControls col-2">
                    		<button type="button" class="btn btn-primary mapsub" name="submit" value="搜索" id="searchmap">搜索</button>
                    	</div>
	                    <span class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>可以通过查询地址，快速定位地图位置。</span>
		            </div>
		            <div class="row cl">
                    	<label class="form-label col-2">内容：</label>
                    	<div class="formControls col-6">
                    		<textarea name="map[MAP_CONTENT]" class="textarea wb"><?php echo ($map['MAP_CONTENT']['value']); ?></textarea>
                    	</div>
	                    <div class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>（{$site.MAP_CONTENT}）</div>
		            </div>
		            <div class="row cl">
	                    <label class="form-label col-2">地理位置：</label>
	                    <div class="formControls col-6">	
	                    	<input type="text" class="input-text" style="width: 200px;" name="map[MAP_LNG]" id="lng" value="<?php echo ($map['MAP_LNG']['value']); ?>">
	                    	&nbsp;&nbsp;-&nbsp;&nbsp;
	                    	<input type="text" class="input-text" style="width: 200px;" name="map[MAP_LAT]" id="lat" value="<?php echo ($map['MAP_LAT']['value']); ?>">
	                    </div>
	                    <span class="input-msg"><i class="Hui-tags-icon Hui-iconfont">&#xe64b;</i>（{$site.MAP_LNG}/{$site.MAP_LAT}）</span>
		            </div>
		            <div class="row cl">
		            	<label class="form-label col-2">地图：</label>
			            <div class="form-control col-6">
			                <div id="baidumap" style=" height:550px;"></div>
			            </div>
		            </div>
		            
		        </div><!-- 选项结束 -->

			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<button onClick="setting_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</form>
	</div>
	
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=CgS5DdyDqg2EKEEylrw0WxNn"></script>  
    <script type="text/javascript">
	    var val = {};
	    val.lng = parseFloat($("#lng").val());
	    val.lat = parseFloat($("#lat").val());
	    mapbaidu(val, function(r){
	        $("#lng").val(r.lng); // 纬度
	        $("#lat").val(r.lat); // 经度
	        $("#address").val(r.label); // 地址
	    })
	    
	    function mapbaidu(val, callback){
	        if(!val) { val = {}; }
	        if(!val.lng) { val.lng = 116.403851; }
	        if(!val.lat) { val.lat = 39.915177; }
	        var point = new BMap.Point(val.lng, val.lat);
	        var geo = new BMap.Geocoder();
	        var map = new BMap.Map('baidumap');
	        map.centerAndZoom(point, 15);
	        map.enableScrollWheelZoom();
	        map.enableDragging();
	        map.enableContinuousZoom();
	        map.addControl(new BMap.NavigationControl());
	        map.addControl(new BMap.OverviewMapControl());
	        // 添加标注
	        var marker = new BMap.Marker(point);
	        marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {'offset': new BMap.Size(10,-20)}));
	        map.addOverlay(marker);
	        marker.enableDragging();
	        showPointValue();
	        marker.addEventListener('dragend', function(e){
	        	showPointValue();
	        });
	        // 显示到坐标经纬度和地址
	        function showPointValue() {
	        	var point = marker.getPosition();
	        	geo.getLocation(point, function(address){
	                if($.isFunction(callback)) {
	                    var val = {lng: point.lng, lat: point.lat, label: address.address};
	                    callback(val);
	                }
	        	});
	        }
	        // 搜索
	        function searchAddress(address) {
	        	geo.getPoint(address, function(point){
	        		map.panTo(point);
	        		marker.setPosition(point);
	        		marker.setAnimation(BMAP_ANIMATION_BOUNCE);
	        		setTimeout(function(){marker.setAnimation(null)}, 3600);
	        	});
	        }
	        // 搜索框回车
	        $('#address').keydown(function(e){
	        	if(e.keyCode == 13) {
	        		var kw = $(this).val();
	        		searchAddress(kw);
	                return false;
	        	}
	        });
	        // 搜索点击
	        $('#searchmap').click(function(){
	        	var kw = $('#address').val();
	        	searchAddress(kw);
	        });
		}
	    </script>

	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});
			$.Huitab("#tab-system .tabBar span", "#tab-system .tabCon", "current", "click", "0");
		});

		function setting_submit() {
			$('#form_setting_base').submit();
		}
	</script>
</body>

</html>