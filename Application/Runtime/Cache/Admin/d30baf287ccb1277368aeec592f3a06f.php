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
<div class="main">
    <nav class="breadcrumb">留言插件管理
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <!-- 列表 -->
    <div class="pd-20">
    <div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Addons/ajax_edit');?>" data-del="<?php echo U('Addons/delete');?>" data-change="<?php echo U('Addons/ajax_change');?>"></div>
    <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
            <tr>
                <th class="w4">编号</th>
                <th class="w15">标题</th>
                <th>语言</th>
                <th>姓名</th>
                <th>电话</th>
                <th>手机</th>
                <th>传真</th>
                <th>邮箱</th>
                <th>留言日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($language[$vo['lang']]['name']); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["tel"]); ?></td>
                <td><?php echo ($vo["mobile"]); ?></td>
                <td><?php echo ($vo["fax"]); ?></td>
                <td><?php echo ($vo["email"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                <td>
                    <a href="<?php echo addons_url('GuestBook://GuestBook/replay?id='.$vo['id']);?>" style="text-decoration: none;" class="ml-5" title="查看"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a href="javascript:;" style="text-decoration: none;" class="ml-5 del_btn" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
            <tr>
                <td colspan="10" class="text-center"> aOh! 暂时还没有内容! </td>
            </tr><?php endif; ?>
        </tbody>
    </table>
    <div class="pageNav"><?php echo ($_page); ?></div>
    </div>
    <!-- 列表 -->
</div>
<include file="Public:_footer">
<script type="text/javascript">
	function guestbook_edit(title, url, w, h) {
		var index = layer.open({
			type: 2,
			title: title,
			content: url,
			area: ['800px', '80%'],
		});
	}
</script>
</body>
</html>