<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends CommonController {
	
	public $static;
	public function __construct(){
		parent::__construct();
        $this->admin  = session(MY_ID);
		$this->check_authority();
		$this->static = './Application/Admin/View/Static/';
		//多语言显示
		$this->show_language();
	}
	
	//判断权限
	public function check_authority(){
		if(!$this->admin){
			redirect(U('Login/login'));
		}
        if ( time() - $this->admin['logintime'] < 3*60*60 ) { //超过1小时则离线
            session(MY_ID, null);
            IS_AJAX && $this->ajax_json('操作超时!', 0, '', 'dialog', U('Login/login'));
            redirect(U('Login/login'));
        }
		
		if ( in_array( strtolower(CONTROLLER_NAME), explode(',', 'index,base,addons,page,products,news,nav') ) || $this->admin['userissys'] == 1 ) {
            return true;
        }
		
		$where = array();
		$where['url'] = CONTROLLER_NAME.'/'.ACTION_NAME;
		$menu_id = M('menu')->where($where)->getField('id');
		if(!in_array($menu_id, explode(',', $this->admin['userrole']))){
			IS_AJAX && $this->ajax_json('无权操作',0,'','dialog',U('Index/welcome'));
			$this->error('无权操作',U('Index/welcome'));
		}
	}
	
	//多语言显示
	public function show_language(){
		$lang = S('language');
		if(!$lang){
			$lang = D('Cache')->languageCache();
		}
		$this->assign('langset',$lang);
	}
	
	//ajax修改
	public function ajax_edit(){
		$table = I('request.table');
		$id    = I('request.id');
		$val   = I('request.val');
		$name  = I('request.name');
		if(!$table){
			$this->ajax_json('表不存在');
		}
		$res = M($table)->where('id='.$id)->setField($name,$val);
		if($res){
			$this->ajax_json('操作成功',1);
		}else{
			$this->ajax_json('操作失败');
		}
	}
	
	//ajax改变状态
	public function ajax_change(){
		$table = I('request.table');
		$id    = I('request.id');
		$val   = I('request.val');
		$name  = I('request.name','status');
		if(!$table){
			$this->ajax_json('表不存在');
		}
		$res = M($table)->where('id='.$id)->setField($name,$val);
		if($res){
			$this->ajax_json('操作成功',1);
		}else{
			$this->ajax_json('操作失败');
		}
	}
	

	//上传文件
	public function uploadFile() {
		
		$rootPath = './upload/';
		$savePath = I('request.dirname');
		
		// 实例化上传类
		$upload = new \Think\Upload();
		// 设置附件上传大小
		$upload -> maxSize = 1145728;
		// 设置附件上传类型
		$upload -> exts = array('jpg', 'gif', 'png', 'jpeg', 'rar', 'zip');
		// 设置附件上传根目录
		$upload -> rootPath = $rootPath;
		// 设置附件上传（子）目录
		$upload -> savePath = $savePath ? $savePath.'/' : '';
		// 设置上传的文件名称，按时间戳命名
		$upload -> saveName = time().mt_rand(100000,999999);
		// 上传文件
		$info = $upload -> upload();
//		dump($info);
		if (!$info) {// 上传错误提示错误信息
			$this->ajax_json($upload->getError());
		} else {// 上传成功
			$url = $rootPath.$info['file']['savepath'].$info['file']['savename'];
			
			//对图片进行处理
			
			//裁剪处理
			
			//水印处理
			if($savePath == 'products'){
				$config = S('config');
				if($config['WATER_SWITCH']['value'] == 1){//判断是否开启水印
					$image = new \Think\Image(); 
					if($config['WATER_TEXT']['value'] != '' && $config['WATER_TEXT']['status'] == 1 && $config['WATER_IMG']['status'] == 0){
						$image->open($url)->text($config['WATER_TEXT']['value'],$this->static.'ttf/wryh.ttf',$config['WATER_SIZE']['value'],$config['WATER_COLOR']['value'],$config['WATER_POS']['value'])->save($url);
					}
					elseif($config['WATER_IMG']['value'] != '' && $config['WATER_IMG']['status'] == 1 && $config['WATER_TEXT']['status'] == 0){
						$image->open($url)->water($config['WATER_IMG']['value'],$config['WATER_POS']['value'],$config['WATER_PCT']['value'])->save($url);
					}
					else{
						$this->ajax_json('未选择水印类型！');
					}
				}
			}
			$this->ajax_json('上传成功！',1,$url);
		}

	}
	
	//刷新缓存
	public function reflash(){
		$action = I('request.action');
		if(!$action){
			$this->ajax_json('无效的action参数!');
		}
		$action .= 'Cache';
		$res = D('Cache')->$action();
		if($res){
			$this->ajax_json('刷新缓存成功！',1,$res);
		}else{
			$this->ajax_json('刷新缓存失败！',0,$res);
		}
	}
	

	//异步删除
	public function delete() {
		$id = I('request.id', '', 'trim');
		$table = I('request.table');
		if (is_array($id)) {
			$id = explode(',', $id);
		}
		if ($id != '') {
			if (M($table) -> delete($id)) {
				$sql = M($table)->getLastSql();
				$this -> ajax_json('操作成功',1,$sql);
			} else {
				$this -> ajax_json('操作失败');
			}
		} else {
			$this -> ajax_json('id不存在');
		}
	}

}
