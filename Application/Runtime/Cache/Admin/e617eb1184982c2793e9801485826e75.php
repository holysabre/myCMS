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
    <nav class="breadcrumb">
    	<i class="Hui-iconfont">&#xe67f;</i> 留言回复
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新">
			<i class="Hui-iconfont">&#xe68f;</i>
		</a>
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="<?php echo addons_url('GuestBook://GuestBook/index');?>" title="返回">
			<i class="Hui-iconfont">&#xe66b;</i>
		</a>
    </nav>
    <div class="pd-20">
    <form action="<?php echo addons_url('GuestBook://GuestBook/replay');?>" method="post">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <tbody>
                <tr>
                    <td width="100" class="text-c">标题</td>
                    <td><?php echo ($info["title"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">姓名</td>
                    <td><?php echo ($info["name"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">性别</td>
                    <td><?php echo ($info['sex']==1?'男':'女'); ?></td>
                </tr>
                <tr>
                    <td class="text-c">地址</td>
                    <td><?php echo ($info["address"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">电话</td>
                    <td><?php echo ($info["tel"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">手机</td>
                    <td><?php echo ($info["mobile"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">传真</td>
                    <td><?php echo ($info["fax"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">公司名称</td>
                    <td><?php echo ($info["company"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">邮箱</td>
                    <td><?php echo ($info["email"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">主页</td>
                    <td><?php echo ($info["home"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">内容</td>
                    <td><?php echo ($info["content"]); ?></td>
                </tr>
                <tr>
                    <td class="text-c">发布时间</td>
                    <td><?php echo (date('Y-m-d H:i:s',$info["addtime"])); ?></td>
                </tr>
                <tr>
                    <td class="text-c">回复</td>
                    <td><textarea name="back" class="textarea"><?php echo ($info["back"]); ?></textarea></td>
                </tr>

            </tbody>
        </table>
        <div class="row clearfix" style="margin-top:5px;">
            <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
            <input type="submit" class="btn btn-success w8" value="回复" />
            
            <input type="reset" class="btn btn-default w8" value="重置" />
        </div>
    </form>
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

</body>
</html>