<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
	
	public function __construct(){
		parent::__construct();
	}
	
    public function index(){
    	$_menu = $this->getMenuInfo();
    	$this->assign('menu',$_menu);
		$this->getAddonsList();
        $this->display();
    }
	
	public function welcome(){
		$userinfo = session(MY_ID);
		$data = M('admin')->find($userinfo['userid']);
		$data['server'] = $_SERVER;
//		dumps($userinfo);
//		$this->getAddonsList();
		$this->assign('data',$data);
		$this->display('Index/welcome');
	}
	
	public function getMenuInfo(){
		$where['status'] = 1;
		$where['is_left'] = 1;
		$menu = M('menu')->where($where)->order('sort asc,id asc')->select();
		foreach($menu as $k=>$v){
			if($v['pid']==0){
				$_menu[] = $menu[$k];
			}
		}
		foreach($menu as $k=>$v){
			foreach($_menu as $key=>$val){
				if($v['pid'] == $val['id']){
					$_menu[$key]['son'][] = $menu[$k];
				}
			}
		}
		return $_menu;
	}
	
	public function getAddonsList(){
		$data = M('addons')->field('id,name,title,is_system')->where('status=1')->select();
		if($data){
			foreach($data as $addon){
				if($addon['is_system'] != 1){
					$_data[] = array(
						'id'    => $addon['id'],
						'title' => $addon['title'],
						'link'  => U('Addons/execute?_addons='.$addon['name'].'&_controller='.$addon['name'].'&_action=index'),
					);
				}
			}
		}
		$this->assign('addons_list',$_data);
//		dumps($_data);
	}
}