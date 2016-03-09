<?php
namespace Admin\Controller;
use Think\Controller;
class NavController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'nav';
		$this -> assign('table', $table);
		$this->mod = M($table);
	}

	public function index() {
		$data['count'] = $this->mod->count();	
		$data['data'] = $this->mod -> order('sort asc,id asc') -> select();
		$data['data'] = getTree1($data['data'], $id = 0);
		$this -> assign('data', $data);
		$this -> display();
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		$id = I('request.id');
		if (IS_POST) {
			$data = $this->mod -> create();
			$langdata = I('request.langset');
			if ($data) {
				$data['name'] = $langdata['zh-cn']['name'];
				$data['langset'] = serialize($langdata);
				$data['time'] = time();
				if($langdata['zh-cn']['name'] == ''){
					$this->ajax_json('栏目名称不能为空');
					exit();
				}
				if($data['modular_id'] == 0){
					$arr = $this->mod->select();
					$pid = $this->getParentId($arr, $data['pid']);
					$data['modular_id'] = $arr[$pid]['modular_id'];
				}
				if ($id == 0) {
					if ($this->mod -> add($data)) {
						$this->ajax_json('操作成功',1);
					} else {
						$this->ajax_json('操作失败');
					}
				} else {
					if ($this->mod -> save($data)) {
						$this->ajax_json('操作成功',1,$data);
					} else {
						$this->ajax_json('操作失败');
					}
				}
			} else {
				$this -> error($this->mod -> getError());
			}
		} else {
			if ($id != 0) {
				$data = $this->mod -> find($id);
				$data['langset'] = unserialize($data['langset']);
			}
			$parent_arr = $this -> mod -> order('sort asc,id asc') -> select();
			$parent_arr = getTree1($parent_arr, $id = 0);
			$this -> assign('parent_arr', $parent_arr);
			
			$tpls = scandir('./tpl');
			foreach($tpls as $k=>$v){
			 	$tpls[$k] = str_replace('.html', '', $v);
				if($v == '.' || $v == '..'){
					unset($tpls[$k]);
				}
			}
			$modular_arr = M('modular')->select();
			$this -> assign('modular_arr', $modular_arr);
			$this -> assign('tpls', $tpls);
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
//			dumps($modular_arr);
		}
	}

	public function getParentId($list,$id){
		foreach ($list as $key => $val) {
			if($val['pid'] == 0){
				return $val['id'];
				exit();
			}else{
				return $this->getParentId($list, $val['pid']);
			}
		}
	}
	
	public function getParId($list,$pid){
		if($list[$pid]['pid'] == 0){
			return $list[$pid]['id'];
			exit();
		}else{
			return $this->getParId($list, $list[$pid]['pid']);
		}
	}
	
	public function getSelfNav($id){
		$selfNav = $_nav = array();
		$nav = $this->mod->select();
		foreach($nav as $k=>$v){
			$_nav[$v['id']] = $v;
		}
		$pid = $this->getParId($_nav, $_nav[$id]['pid']);
		foreach($nav as $k=>$v){
			$_pid = $this->getParId($_nav, $v['pid']);
			if($_pid == $pid){
				$selfNav[] = $v;
			}
		}
		$data['pid'] = $pid;
		$data['selfNav'] = $selfNav;
		return $data;
	}
	
	public function getBorthers($id){
		$borther = array();
		$nav = $this->mod->select();
		foreach($nav as $k=>$v){
			if($v['pid'] == $nav[$id]['pid']){
				$borther[] = $v; 	
			}
		}
		return $borther;
	}
	
	public function content(){
		$where['n.status'] = 1;
		$menu = M()->table('my_nav as n')->join('left join my_modular as m on n.modular_id = m.id')->field('n.*,m.table,m.url,m.modular,m.is_system')
			    ->where($where)->order('id asc')->select();
		foreach($menu as $k=>$v){
			//非系统模块，即为插件
			if($v['is_system'] == 1){
				if($v['modular'] == 1){
					$menu[$k]['url'] = $v['url'].'/edit?nav_id='.$v['id'];
				}else{
					if($v['url'] == ''){
						$pid = $this->getParentId($menu, $v['id']);
						$menu[$k]['url'] = $menu[$pid]['url'].'/index?nav_id='.$v['id'];
					}else{
						$menu[$k]['url'] = $v['url'].'/index?nav_id='.$v['id'];
					}
				}
			}else{
				if($v['modular'] == 1){
					$menu[$k]['url'] = addons_url($v['url']).'&nav_id='.$v['id'];
				}else{
					$url = explode('/', $v['url']);
					$menu[$k]['url'] = 'Addons/execute?_addons='.$url[0].'&_controller='.$url[1].'&_action='.$url[2].'&nav_id='.$v['id'];
				}
			}
		}
		$menu = getNavTree($menu, $id = 0);
		$this->assign('menu',$menu);
		$this->display();
//		print_r($menu);
	}
}
