<?php

/**
 * 格式化输出
 * @param array $data
 * @return $data
 */
function dumps($data) {
	echo '<pre>';
	dump($data);
	echo '</pre>';
}

/**
 * 获取分类
 * @param string $type
 * @param string $cid
 * @return $data
 */
function getCateInfo($type = '', $cid = 0,$table='category') {
	if($type != ''){
		$where['type'] = $type;
	}
	$cateinfo = M($table) -> where($where) -> order('sort asc,id asc') -> select();
	$cateinfo = getTree1($cateinfo, $cid);
	return $cateinfo;
}

/**
 * 获取分类名称
 * @param string $type
 * @param string $cid
 * @return $data
 */
function getCateName($cid = 0) {
	$catename = M('category') -> field('name') -> find($cid);
	return $catename['name'];
}

/**
 * 获取分类下拉框
 * @param string $type
 * @param string $cid
 * @return $data
 */
function getHtmlSelect($type, $cid) {
	$cateinfo = getCateInfo($type, $cid);
	echo '<span class="select-box">';
	echo '<select name="cid" class="select">';
	echo '<option value="0">顶级分类</option>';
	foreach ($cateinfo as $val) {
		if ($val['id'] == $cid) {
			$selected = 'selected=""';
		}
		echo '<option value="' . $val['id'] . '"' . $selected . ' >' . $val['title_show'] . $val['name'] . '</option>';
	}
	echo '</select>';
	echo '</span>';
}

/**
 * 字符截取
 * @param string   $str         字符
 * @param string   $length      截取长度
 * @param string   $encoding    编码
 * @return string
 */
function get_substr($str, $length, $encoding = 'utf-8') {
	$str = trim(strip_tags($str));
	// 函数剥去 HTML、XML 以及 PHP 的标签。
	$str = str_replace('&nbsp;', '', $str);
	if (mb_strlen($str, $encoding) > $length) {
		$string = mb_substr($str, 0, $length, $encoding) . '...';
	} else {
		$string = $str;
	}
	return $string;
}

/**
 * 时间戳转换成日期
 * @param string $str
 * @param string $full     是否为完整时间
 * @return $string
 */
function get_strtotime($str, $full = false) {
	if ($str != '') {
		if ($full) {
			$str = date('Y-m-d H:i:s', $str);
		} else {
			$str = date('Y-m-d', $str);
		}
		return $str;
	} else {
		return '';
	}
}

/**
 * 获取分类主类
 *
 * @param integer   $id      分类ID
 * @param array     $list    数组
 * @return array
 */
function getChild($list, $id) {
	$child = array();
	if (is_array($list)) {
		foreach ($list as $val) {
			if ($val['pid'] == $id)
				$child[] = $val;
		}
	}
	return $child;
}

/**
 * 获取分类,子类追加进son中,无限级分类
 *
 * @param array     $arr    数组
 * @param integer   $id     分类ID
 * @param integer   $level  等级
 * @param integer   $cid    GET
 * @return array
 */
function getTreeSonAllChild($arr, $pid, $id, $level = 1) {
	static $num = 0;
	foreach ($arr as $key => $items) {
		if ($items['pid'] == $pid) {
			$num = $level;
			$cat_id = $items['id'];
			$items['level'] = $num;
			$son = getTreeSonAllChild($arr, $cat_id, $id, ++$num);
			$newarr[$items['id']] = array_merge($items, array('son' => $son));
		}
	}
	return $newarr;
}

function getTree1($list, $id, $symbol = 0, $bol = '') {
	static $type_arr = array();
	static $level = 0;
	$child = getChild($list, $id);
	if (is_array($child)) {
		foreach ($child as $val) {
			$level = $symbol;
			$val['level'] = $level;
			$val['title_show'] = ($val['pid'] == 0 ? '' : $bol);
			$type_arr[$val['id']] = $val;
			getTree1($list, $val['id'], ++$level, '&nbsp;&nbsp;├&nbsp;' . $bol);
		}
	}
	return $type_arr;
}

function getTree2($list, $id, $symbol = 0, $bol = '') {
	static $type_arr = array();
	static $level = 0;
	$child = getChild($list, $id);
	if (is_array($child)) {
		foreach ($child as $val) {
			$level = $symbol;
			$val['level'] = $level;
			$val['title_show'] = ($val['pid'] == 7 ? '' : $bol);
			$type_arr[$val['id']] = $val;
			getTree1($list, $val['id'], ++$level, '&nbsp;&nbsp;├&nbsp;' . $bol);
		}
	}
	return $type_arr;
}

function getNavTree($list, $id, $symbol = 0, $bol = '') {
	static $type_arr = array();
	static $level = 0;
	foreach($list as $k=>$v){
		$list[$k]['disabled'] = hasChild($list,$v['id'])?'1':'0';
	}
	$child = getChild($list, $id);
	if (is_array($child)) {
		foreach ($child as $val) {
			$level = $symbol;
			$val['level'] = $level;
			$val['title_show'] = ($val['pid'] == 0 ? '' : $bol);
			$type_arr[$val['id']] = $val;
			getNavTree($list, $val['id'], ++$level, '&nbsp;&nbsp;├&nbsp;' . $bol);
		}
	}
	return $type_arr;
}

function hasChild($list, $id) {
	if (is_array($list)) {
		foreach ($list as $val) {
			$_pid[] = $val['pid'];
		}
		return in_array($id, $_pid);
	}
}


/**
 * KE编辑器
 *
 * @param int       $id         ID
 * @param string    $name       名称
 * @param string    $textarea   内容
 * @param int       $option     选择
 * @param string    $style      样式
 * @return string
 */
function get_editor($id = '', $name = '', $textarea = '', $option = '', $style = '', $data = '') {
	$_style = !empty($style) ? explode(',', $style) : array('100%', '300px');

	if ($option == 'ke') {//" . __ROOT__ . "
		$html = "<script type=\"text/javascript\">  
KindEditor.ready(function(K) { 
    var editor_" . $id . " = K.create('#{$id}',{
        resizeType:2,
        /*newlineTag:'br',*/
        wellFormatMode:false, /*禁用美化*/
        allowFileManager:true,
        uploadJson:'./Application/Admin/View/Static/lib/kindeditor/php/upload_json.php', 
        afterChange:function(){this.sync();},
        afterBlur:function(){this.sync();},
        filterMode:false,/* 不过滤script */
        urlType:'relative',/* 对路径使用相对 */
    }); 
});
</script>
<textarea name=\"{$name}\" id=\"{$id}\" style=\"width:{$_style[0]};height:{$_style[1]};\"{$data}>{$textarea}</textarea>";

	} elseif ($option == '') {
		$html = "<textarea name=\"{$name}\" id=\"{$id}\" class=\"textarea\" style=\"width:{$_style[0]};height:{$_style[1]};\"{$data}>{$textarea}</textarea>";
	}
	return $html;
}

/**
* 判断图片是否外链或者本地链接
*
* <img id="containImg" src="{$data.img|get_img=###,'','100x100.png'}" onerror="this.src='__PUBLIC__100x100.png'" />
* @param string        $img    图片路径
* @param string        $ext    扩展
* @param string        $err    图片不存在显示图片
* @return string
*/
function get_img($img, $ext = '', $err = '100x100.png') {
    if(strpos($img, 'http://')!==false) {
        $_img   = $img;
    } 
    else {
        if (in_array(C('URL_MODEL'), array(1,2))) {
            $no     = __ROOT__;
            $yes    = __ROOT__ . str_replace('./', '/', $img);
        } else {
            $no     = '.';
            $yes    = $img;
        }
        $_img       = (!empty($img) && file_exists($img.$ext)) ? ($yes . $ext) : ($no . '/Public/images/' . $err);
    }
    return $_img;
}

/**
* 获取插件的配置数组
*/
function getAddonConfig($name) {
    static $_config = array();
    if(isset($_config[$name])) {
        return $_config[$name];
    }
    
    $config = array();
    
    if(empty($config)) {
        $map['name'] = $name;
        $map['status'] = 1;
        $config = M('Addons')->where($map)->getField('config');
        $config = json_decode($config, true);
    }
    
    if(!$config) {
        $temp_arr = include_once './addons/' . $name . '/config.php';
        foreach($temp_arr as $key => $value) {
            $config[$key] = $temp_arr[$key]['value'];
        }
    }
    $_config[$name] = $config;
    return $config;
}

/**
* 字符串转换为数组，主要用于把分隔符调整到第二个参数
*
* @param string $str    要分割的字符串
* @param string $glue     分割符
* @return array
*/
function str2arr($str, $glue = ',') {
    return explode($glue, $str);
}

/**
* 数组转换为字符串，主要用于把分隔符调整到第二个参数
*
* @param array $arr        要连接的数组
* @param string $glue       分割符
* @return string
*/
function arr2str($arr, $glue = ',') {
    return implode($glue, $arr);
}

/**
* 插件显示内容里生成访问插件的url
*
* @param string $url    url
* @param array $param    参数
*/
function addons_url($url, $param = array()) {
    // 凡星：修复如user_center://user_center/add 识别错误的问题
    $urlArr = explode('://', $url);
    if(stripos($urlArr[0], '_') !== false) {
        $addons = $urlArr[0];
        $url = 'http://' . $urlArr[1];
    }
    $url = parse_url($url);
    $case = C('URL_CASE_INSENSITIVE');
    ! $addons || $url['scheme'] = $addons;
    $addons = $case ? parse_name($url['scheme']) : $url['scheme'];
    $controller = $case ? parse_name($url['host']) : $url['host'];
    $action = trim($case ? strtolower($url['path']) : $url['path'], '/');
    
    /* 解析URL带的参数 */
    if(isset($url['query'])) {
        parse_str($url['query'], $query);
        $param = array_merge($query, $param);
    }
    
    /* 基础参数 */
    $params = array(
    '_addons' => ucfirst($addons),
    '_controller' => ucfirst($controller),
    '_action' => $action 
    );
    $params = array_merge($params, $param); // 添加额外参数
    return U('Addons/execute', $params);
}

/**
* 插件钩子
* @param string $hook 标签名称
* @param mixed $params 传入参数
* @return mixed
*/
function hook($hook, $params=array()){
    return \Think\Hook::listen($hook, $params);
} 

/**
 * 发送邮件
 * @param string   $email    接收方邮件地址
 * @param string   $title    邮件标题
 * @param string   $content  邮件内容
 * @return int
 */
function getEmail($email, $mailtitle, $content) { 
    import('Common.Org.email');
	$config = S('config');
    $smtpserver     = $config['EMAIL_SMTP_HOST']['value'];//SMTP服务器
    $smtpserverport = $config['EMAIL_SMTP_PORT']['value'];//SMTP服务器端口
    $smtpuseremail  = $config['EMAIL_USERNAME']['value'];//SMTP服务器的用户邮箱
    list($user,$web)= explode('@', $smtpuseremail);
    $smtpuser       = $user;//SMTP服务器的用户帐号
    $smtppass       = $config['EMAIL_PASSWORD']['value'];//SMTP服务器的用户密码
    $smtpemailto    = $email;//发送给谁
    $mailtype       = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    //************************ 配置信息 ****************************
    $smtp = new \email($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    //$smtp->debug = true;//是否显示发送的调试信息
    $smtp->useSSL   = true;//开启SSL
    $state = $smtp->sendmail($smtpemailto, $smtpuseremail, $mailtitle, $content, $mailtype);
    return $state;
}

/*
 * 163邮箱
 */
//function getEmail($email, $mailtitle, $content) { 
//  import('Common.Org.email');
//  $smtpserver     = 'smtp.163.com';//SMTP服务器
//  $smtpserverport = 25;//SMTP服务器端口
//  $smtpuseremail  = '15867673578@163.com';//SMTP服务器的用户邮箱
//  list($user,$web)= explode('@', $smtpuseremail);
//  $smtpuser       = $user;//SMTP服务器的用户帐号
//  $smtppass       = 'gbnlltofpjrlpnnl';//SMTP服务器的用户密码
//  $smtpemailto    = $email;//发送给谁
//  $mailtype       = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
//  //************************ 配置信息 ****************************
//  $smtp = new \email($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
//  $smtp->debug = true;//是否显示发送的调试信息
//  $state = $smtp->sendmail($smtpemailto, $smtpuseremail, $mailtitle, $content, $mailtype);
//  return $state;
//}

//获取自定义的类型
function getCustomType($type='',$name='',$value='',$option='',$lang = 'zh-cn'){
	$str = '';
	switch($type){
		case 1://文本框
			$str = '<input type="text" name="langset['.$lang.'][custom]['.$name.']" class="input-text" value="'.$value.'" />';
			break;
		case 2://文本域
			$str = '<textarea name="langset['.$lang.'][custom]['.$name.']" class="textarea">'.$value.'</textarea>';
			break;
		case 3://富文本编辑器
			$str = get_editor($name.substr($lang, 3 ,2),'langset['.$lang.'][custom]['.$name.']' ,$value, 'ke', '100%,500px');
			break;
		case 4://单选框
			//0:开启,1:关闭
			if (empty($option)) return '';
			$option = explode(',', $option);
			foreach($option as $k=>$v){
				list($a,$b) = explode(':', $v);
				$checked = $value==$a ? 'checked' : '';
				$str .='<input type="radio" name="langset['.$lang.'][custom]['.$name.']" value="'.$a.'" class="" style="width: auto;" '.$checked.' />'.$b;
			}
			break;
		case 5://复选框
			//1:选项一,2:选项二,3:选项三
			if (empty($option)) return '';
			$option = explode(',', $option);
			foreach($option as $k=>$v){
				list($a,$b) = explode(':', $v);
				$checked = $value[$k]==$a ? 'checked' : '';
				$str .='<input type="checkbox" name="langset['.$lang.'][custom]['.$name.']['.$k.']" value="'.$a.'" class="" style="width: auto;" '.$checked.' />'.$b;
			}
			break;	
		case 6://图片上传
			
			$str="
				<div id=\"container".substr($lang, 3 ,2).$name."_filelist\">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
				<div class=\"upload_img upload_img".$name."\">
					<ul>
						<li>
							<img src=\"".get_img($value)."\" width=\"100\" height=\"100\" class=\"showimg".substr($lang, 3 ,2)."\" />
							<a href=\"javascript:;\" class=\"close_one_btn\">X</a>
							<input type=\"hidden\" name=\"langset[".$lang."][custom][".$name."]\" value=\"".$value."\" class=\"showinput".substr($lang, 3 ,2)."\" />
						</li>
					</ul>
				</div>
				<div id=\"container".substr($lang, 3 ,2).$name."\">
					<input type=\"button\" id=\"pickfiles".substr($lang, 3 ,2).$name."\" class=\"btn btn-primary radius\" value=\"上传图片\">
				</div>
				<script type=\"text/javascript\">
					$('#container".substr($lang, 3 ,2).$name."').pluploadQueue({
						browse_button: 'pickfiles".substr($lang, 3 ,2).$name."',
						url: '".U('Base/uploadFile')."',
						filters: {
							mime_types: [{
								title: \"Image files\",
								extensions: \"jpg,gif,png\"
							}],
							max_file_size: '5mb'
						},
						multipart_params: {
							one: 'one',
							dirname: 'custom'
						},
						callSuccess: function(data) {
							//console.log(data);
							layer.msg(data.message, {
								icon: 6,
								time: 2000
							});
							upload_custom_img(data.data,'".substr($lang, 3 ,2)."');
						}, // 上传成功后返回数据
						callUploadFile: function(params) {} // 开始上传后触发事件
					});
				</script>
			";
			break;	
		default:
			
	}
	return $str;
}

//获取自定义内容
function getCustomValue($model,$data,$lang = 'zh-cn'){
	$custom = M('custom')->field('value')->where(array('model'=>$model))->find();
	$custom = unserialize($custom['value']);
	foreach($custom as $k=>$v){
		$custom[$k]['input'] = getCustomType($v['type'], $v['name'], $data[$v['name']], $v['option'] ,$lang);
	}
	dumps($data);
	dumps($custom);
	foreach($custom as $key=>$val){
		$str  = '';
		$str  = '<div class="row cl">';
		$str .= '<label class="form-label col-1">'.$val['instruction'].'：</label>'; 
		$str .= '<div class="formControls col-10">'.$val['input'].'</div>';	
		$str .= '</div>';	
		echo $str;
	}
//	return $custom;
}

//设置自定义内容
function setCustomValue(){
	$custom_data = I('post.custom');
	foreach($custom_data as $k=>$v){
		$arr['name'] = $k;
		$arr['value'] = $v;
		$_custom_data[] = $arr;
	}
	$custom_data = serialize($_custom_data);
	return $custom_data;
}

//将所有的子集信息放入父级的son中
function getHomeTreeAll($list,$pid = 0){
	foreach($list as $key=>$val){
		if($val['pid'] == $pid){
			$son = getHomeTreeAll($list, $val['id']);
			$_list[$val['id']] = array_merge($val,array('son'=>$son));
		}
	}	
	return $_list;
}
//根据自身去找父级
function getHomeTreeBySelf($list,$id){
	static $_list;
	$pid = $list[$id]['pid'];
	foreach($list as $key=>$val){
		if($pid == 0){
			$_list[] = array_merge($list[$id]); 
			sort($_list);
			return $_list;
		}else{
			$_list[] = array_merge($list[$id]); 
			return getHomeTreeBySelf($list, $pid);
		}
	}
}

//根据别名获取id
function getIdByAlias($alias,$modular_id){
	$where['alias'] = $alias;
	$where['modular_id'] = $modular_id;
	$id = M('nav')->where($where)->getField('id');
	return $id;
}

//将编辑器中的预定义字符转化为html代码实体
function get_htmlcode($content = ''){
	if (empty($content)) return '';
    $content = htmlspecialchars_decode($content);
    $content = str_replace(array('src="./upload/','src="upload/'), 'src="' . __ROOT__ . '/upload/', $content);
    return $content;
}

//获取所有的子集（包括自身）
function getSonAllArr($list,$id){
	$id_arr = $id;
	if(is_array($list)){
		foreach($list as $key=>$val){
			if($val['pid'] == $id && $val['id'] != $id){
				$id_arr .= ','.getSonAllArr($list, $key);
			}
		}
	}
	return $id_arr;
}
//获取所有菜单
function getNavInfo(){
	$where['status'] = 1;
	$data = M('nav')->field(true)->where($where)->order('sort asc')->select();
	$_data = array();
	foreach($data as $key=>$val){
		$_data[$val['id']] = $val;
	}
	return $_data;
}
//前台获取详细信息链接
function get_home_url($id,$pid){
    $nav  = getNavInfo();
    $nav  = $nav[$pid];
    $link = U($nav['url'].'/detail/'.$id);
    return $link;
}
//前台获取banner图      根据位置pid获取
function get_home_banner($pid = 1){
	$banner = S('home_banner');
	$data = array();
	foreach($banner as $key=>$val){
		$data[$val['id']] = $val;
	}
	//如果pid为0，则返回所有
	if($pid == 0){
		$data = $data;
	}else{
		$data = $data[$pid]['son'];
	}
	return $data;
}
