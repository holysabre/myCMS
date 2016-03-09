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
    <h3><?php echo ($nav['name']); ?> - 招聘管理</h3>
    <div class="menulist col-10">
        <a class="btn btn-default col-1" href="javascript:location.reload();">刷新</a>
        <a class="btn btn-info col-1" href="<?php echo addons_url('Job://Job/add?nav_id='.$nav_id);?>">添加</a>
        
        <div class="menuright col-8">
            <form action="<?php echo addons_url('Job://Job/index?'.$mobileurl.'nid='.$nid);?>" method="post">
            <select name="lang" class="select-box" style="width: 100px;">
                <option value="">请选择语言</option>
                <?php if(is_array($language)): $i = 0; $__LIST__ = $language;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lang): $mod = ($i % 2 );++$i;?><option value="<?php echo ($lang["name_en"]); ?>"><?php echo ($lang["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name="display" class="select-box" style="width: 100px;">
                <option value="">请选择状态</option>
                <option value="1">显示</option>
                <option value="0">隐藏</option>
            </select>
            <select name="istop" class="select-box" style="width: 100px;">
                <option value="">置顶状态</option>
                <option value="1">置顶</option>
                <option value="0">非置顶</option>
            </select>
            <select name="islink" class="select-box" style="width: 100px;">
                <option value="">是否链接</option>
                <option value="1">是</option>
                <option value="0">否</option>
            </select>
            <select name="keytype" class="select-box" style="width: 100px;">
                <option value="title">职位</option>
                <option value="content">内容</option>
            </select>
            <input type="text" class="input-text input_h" style="width:150px;" name="keywords" value="<?php echo ($data["keywords"]); ?>" />
            <input type="submit" class="btn btn-default" value="搜索" />
            </form>
        </div>
    </div>
    
    <!-- 列表 -->
	<div id="data_table" data-table="<?php echo ($table); ?>" data-edit="<?php echo U('Base/ajax_edit');?>" data-del="<?php echo U('Base/delete');?>" data-change="<?php echo U('Base/ajax_change');?>"></div>
    <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
            <tr>
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="50">语言</th>
                <th width="50">编号</th>
                <th>职位</th>
                <th width="50">招聘人数</th>
                <th width="50">置顶</th>
                <th width="50">状态</th>
                <th width="100">有效时间</th>
                <th width="150">更新时间</th>
                <th width="50">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data["list"])): if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" class="J_checkitem ids" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                <td><?php echo ($vo['lang']); ?></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); if($vo['islink'] == 1): ?>&nbsp;&nbsp;<span style="color:red">[链]</span><?php endif; ?></td>
                <td><?php echo $vo['count'] == 0 ? '不限':$v['count'];?></td>
                <td class="td-status"><span class="label <?php echo $vo['istop']==1?'label-success':'label-danger';?> radius change_btn" data-name="istop" data-id="<?php echo ($vo["id"]); ?>" data-val="<?php echo ($vo["istop"]); ?>"><?php echo $vo['istop']==1?'启用':'禁用';?></span></td>
                <td class="td-status"><span class="label <?php echo $vo['display']==1?'label-success':'label-danger';?> radius change_btn" data-name="display" data-id="<?php echo ($vo["id"]); ?>" data-val="<?php echo ($vo["display"]); ?>"><?php echo $vo['display']==1?'启用':'禁用';?></span></td>
                <td><?php echo $vo['lifedays']?$vo['lifedays']:'不限';?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["edittime"])); ?></td>
                <td>
                	<a style="text-decoration:none" class="ml-5" href="<?php echo addons_url('Job://Job/edit?id='.$vo['id'].'&nav_id='.$nav_id);?>" title="编辑">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a>
					<a style="text-decoration:none" class="ml-5" href="<?php echo addons_url('Job://Job/delete?id='.$vo['id']);?>" title="删除">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <!--<td colspan="9" style="background:#F6F6F6">
                <select name="batchaction" id="batchaction" class="select-box">
                    <option value="">请选择批量操作</option>
                    <option value="delete">删除</option>
                    <option value="display">显示</option>
                    <option value="nodisplay">隐藏</option>
                    <option value="istop">置顶</option>
                    <option value="caceltop">取消置顶</option>
                </select>
                <input type="button" value="批量操作" class="btn btn-default" onclick="batchctrl('<?php echo addons_url('Job://Job/frmpost?'.$mobileurl.'nid='.$nid);?>');">
                </td>-->
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="9" class="text-center"> aOh! 暂时还没有内容! </td>
            </tr><?php endif; ?>
        </tbody>
    </table>
    <div class="pageNav"><?php echo ($data["page"]); ?></div>
    </div>
    <!-- 列表 -->
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