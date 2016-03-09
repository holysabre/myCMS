<?php

function getAuthName($id){
	$name = M('auth')->field('name')->find($id);
	return $name['name'];
}

function getModularName($id){
	if(!$id){
		return '';
	}
	$name = M('modular')->field('name')->find($id);
	return $name['name'];
}

function getNavName($id = 0,$lang){
	$langset = M('nav')->field('langset')->find($id);
	$langset = unserialize($langset['langset']);
	return $langset[$lang]['name'];
}

/**
* 计算文件大小
*
* @param int    $bytes
* @return string
*/
function byte_format($bytes) {
    $sizetext = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
    $i = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . $sizetext[$i] . ' ';
}

/**
 * 获取插件类的类名
 *
 * @param strng $name      插件名
 */
function get_addon_class($name) {
    $class = "Addons\\{$name}\\{$name}Addon";
    return $class;
}

function get_addon_file($name) {
    $class = "./Addons/{$name}/{$name}Addon.class.php";
    return $class;
}

function change_color($str,$change = array('color'=>'','condition'=>'')){
	if($str == $change['condition']){
		$str = '<p style="color:'.$change['color'].'">'.$str.'</p>';
	}
	return $str;
}
/**
 * 执行SQL文件
 */
function execute_sql_file($sql_path) {
    // 读取SQL文件
    $sql = eg_file_get_contents($sql_path);
    $sql = str_replace("\r", "\n", $sql);
    $sql = explode(";\n", $sql);
    
    // 替换表前缀
    $orginal = 'eg_';
    $prefix = C('DB_PREFIX');
    $sql = str_replace("{$orginal}", "{$prefix}", $sql);
    
    // 开始安装
    foreach($sql as $value) {
        $value = trim($value);
        if(empty($value))
            continue;
        $res = M()->execute($value);
    }
}

/**
 * 防超时的file_get_contents改造函数
 *
 * @param string        $url
 * @return string
 */
function eg_file_get_contents($url) {
    $context = stream_context_create(array(
        'http' => array('timeout' => 30) 
    ));
    // 超时时间，单位为秒
    return file_get_contents($url, 0, $context);
}

function getStauts($int,$status = array(-1=>'损坏',0=>'禁用',1=>'启用',null=>'不存在')){
	return $status[$int];
}

/**
 * 异步修改
 *
 * @param string   $value   字段
 * @param int      $id      字段主键
 * @param string   $field   字段名称
 * @return string  
 */
function get_span($value,$id,$field = 'name'){
	return '<span class="text_edit" data-tdtype="edit" data-id="'.$id.'" data-name="'.$field.'">'.$value.'</span>';
}

/**
 * 异步改变状态
 * 
 * 
 * <span class="label {:$vo['status']==1?'label-success':'label-danger'} radius change_btn" data-name="status" data-id="{$vo.id}" data-val="{$vo.status}">{:$vo['status']==1?'启用':'禁用'}</span>
 */
function get_toggle($status,$id,$field = 'status'){
	$yes = '<i class="Hui-iconfont toggle_yes">&#xe6a7;</i>';
	$no  = '<i class="Hui-iconfont toggle_no" >&#xe6a6;</i>';
	$_status = $status == 1 ? $yes : $no;
	return '<span data-tdtype="toggle" class="change_btn" data-name="'.$field.'" data-id="'.$id.'" data-val="'.$status.'" >'.$_status.'</span>';
}

/*
 * 左侧菜单判断是否显示
 */
function is_show_left($id){
	$role = session(MY_ID)['userrole'];
	if($role != 0){
		$role = explode(',', $role);
		if(!in_array($id, $role)){
			return 'style="display:none;"';
		}else{
			return 'style="display:block;"';
		}
	}
}















