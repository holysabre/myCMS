<?php
namespace Admin\Controller;
use Think\Controller;
class AddonsController extends CommonController {

	protected $mod = '';
	protected $table = '';
	public function __construct() {
		parent::__construct();
		$this -> table = 'admin';
		$this -> assign('table', $this -> table);
		$this -> mod = M($this -> table);
	}

	public function index(){
		$list = D('Addons')->getList();
		$this->assign('data',$list);
		$this->display();
	}
	
	//安装插件
	public function install(){
		$addon_name = I('request.addon_name');
		$class = get_addon_class($addon_name);
		$file = get_addon_file($addon_name);
		if(!file_exists($file)){
			$this->error('插件不存在');
		}
		include_once($file);
		$addons = new $class();
		$info = $addons->info;
		if(!$info || !$addons->checkInfo()){
			$this->error('插件信息缺失');
		}
		$install_flag = $addons->install();
		if(!$install_flag){
			$this->error('插件预安装失败');
		}
		$addonsM = D('Addons');
		$data = $addonsM->create($info);
		
		if(!$data){
			$this->error($addonsM->getError());
		}
//		dumps($data);
		if($addonsM->add($data)){
			$config         = array('config'=>json_encode($addons->getConfig()));
            $addonsM->where("name='{$addon_name}'")->save($config);
            $hooks_update   = D('Hooks')->updateHooks($addon_name);
            if($hooks_update){
                S('hooks', null);
                $this->success('安装成功');
            }else{
                $addonsM->where("name='{$addon_name}'")->delete();
                $this->error('更新钩子处插件失败,请卸载后尝试重新安装');
            }
		}else{
			$this->error('写入插件数据失败');
		}
	}
	
	function uninstall(){
		$id = I('request.addon_id');
		$addon_name = I('request.addon_name');
		$class = get_addon_class($addon_name);
		$file = get_addon_file($addon_name);
		if(!file_exists($file)){
			$this->error('插件不存在');
		}
		include_once($file);
		$addons = new $class();
		$uninstall_flag = $addons->uninstall();
		if(!$uninstall_flag){
			$this->error('插件卸载失败');
		}
		$addonsM = D('Addons');
		$res = $addonsM->delete($id);
		if($res){
			S('hooks', null);
			$this->success('插件卸载成功');
		}else{
			$this->error('卸载插件失败');
		}
	}
	
	/**
     * 载入插件文件夹下的控制器
     */
    public function execute($_addons = null, $_controller = null, $_action = null){
        $_addons        = ucfirst(parse_name($_addons, 1));
        $_controller    = parse_name($_controller,1);
        defined('_ADDONS')      or define('_ADDONS',        $_addons);
        defined('_CONTROLLER')  or define('_CONTROLLER',    $_controller);
        defined('_ACTION')      or define('_ACTION',        $_action);
        
        // 判断文件是否存在 并载入函数
        $common = './Addons/'.$_addons.'/common.php';
        if (file_exists($common)) {
            include($common);
        }
        
        if(!empty($_addons) && !empty($_controller) && !empty($_action)){
            $class = parse_res_name("Addons://{$_addons}/{$_controller}", 'Controller');
			$filename = $class.'.class.php';
            if ( !file_exists($filename) ) {
                $this->error('控制器不存在!', U('Index/welcome'));
            }
			include_once($filename);
            $Addons = A("Addons://{$_addons}/{$_controller}")->$_action();
        } 
        else {
            $this->error('没有指定插件名称,控制器或操作!');
        }
    }
	
	
	// 重写解析和获取模板内容 用于输出
    protected function fetchlist($templateFile = '', $content = '', $prefix = '') {
        $templateFile = $this->getAddonTemplate($templateFile);
        return $this->fetch($templateFile, $content, $prefix);
    }
    
    // 重写模板显示 调用内置的模板引擎显示方法
    protected function displaylist($templateFile = '', $charset = '', $contentType = '', $content = '', $prefix = '') {
        $templateFile = $this->getAddonTemplate($templateFile);
//		echo $templateFile;exit;
//		$templateFile = './Addons/GuestBook/View/index.html';
        $this->display($templateFile, $charset, $contentType, $content, $prefix);
    }
    
    public function getAddonTemplate($templateFile = '') {
        if (file_exists($templateFile)) {
            return $templateFile;
        }
        $oldFile = $templateFile;
        if (empty($templateFile)) {
            $templateFile = T('Addons://' . _ADDONS . '@' . _CONTROLLER . '/' . _ACTION);
        } 
        else {
            $templateFile = T('Addons://' . _ADDONS . '@' . $templateFile);
        }
        return $templateFile;
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
	
}
