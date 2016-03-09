<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    public function __construct() {
        parent::__construct();
		$this->getSiteInfo();//获取站点信息
		$this->isOpenWebsite();//判断网站是否为开启状态
		//显示所有的栏目
		$this->navInfo = $this->getNavInfo();
    }
	
	//获取站点信息
	public function getSiteInfo(){
		$where['status'] = 1;
		$data = M('setting')->field('id,name,title,value,status,sort')->where($where)->order('sort asc')->select();
		foreach($data as $key=>$val){
			$_data[$val['name']] = $val['value'];
		}
		$this->assign('site',$_data);
		return $_data;
	}
	
	//判断网站是否为开启状态
	public function isOpenWebsite(){
		$site = $this->getSiteInfo();
		if($site['WEB_SITE_OPEN']['value'] == 0){
			//网站为关闭状态
			header('content-type:text/html;charset=utf8;');
            $this->display('./Public/close.html');
            exit();
		}
	}
	
	//获取模版名称
	public function getTemplate($id){
		$nav = $this->getNavInfo();
		if($nav[$id]['template']){
			return $nav[$id]['template'];
		}else{
			$pid = $this->getParentId($nav, $id);
			return $nav[$pid]['template'];
		}
	}
	
	//获取顶级pid
	public function getParentId($list,$id){
		$pid = $list[$id]['pid'];
		if($pid == 0){
			return $id;
			exit;
		}else{
			return $this->getParentId($list, $pid);
		}
	}
		
	//获取所有菜单
	public function getNavInfo(){
		$where['status'] = 1;
		$data = M('nav')->field(true)->where($where)->order('sort asc')->select();
		$_data = array();
		foreach($data as $key=>$val){
			$_data[$val['id']] = $val;
		}
		return $_data;
	}
	
	//获取所有菜单 url作为键
	public function getNavInfoByUrl(){
		$where['status'] = 1;
		$data = M('nav')->field('id,url,name')->where($where)->order('sort asc')->select();
		$_data = array();
		foreach($data as $key=>$val){
			$_data[$val['url']] = $val;
		}
		return $_data;
	}
	
	//获取菜单id
	protected function getNavId(){
		$alias = I('request.alias','','trim');
		//别名处理
		if($alias){
			$nav_menu = $this->getNavInfoByUrl();
			$alias = strtolower(CONTROLLER_NAME).'/'.$alias;
			if(isset($nav_menu[$alias])){
				$nav_id = $nav_menu[$alias]['id'];
			}
		}
		if(!isset($nav_id)){
			//栏目不存在
		}
		return $nav_id;
	}
	
	//面包屑
	protected function getBread($nav_id = 2){
		$nav = $this->getNavInfo();
		$my_nav = $nav[$nav_id];
		//父级栏目
		$my_nav_tree = getHomeTreeBySelf($nav, $nav_id);
		foreach($my_nav_tree as $key=>$val){
			$_my_nav_tree[$val['id']] = $val;
		}
//		dumps($_my_nav_tree);
		//父级定位
		$nav_pos = array();
		if($_my_nav_tree[$nav_id]['pid'] == 0){
			$nav_pos = $_my_nav_tree[$nav_id];
		}else{
			$nav_pos = $_my_nav_tree[$_my_nav_tree[$nav_id]['pid']];
		}
//		dumps($nav_pos);
		//获取子栏目和同级栏目
		$ppid = $this->getParentId($nav, $nav_id);
		$tree_nav = getHomeTreeAll($nav);
		$nav_arr = $tree_nav[$ppid]['son'];
//		dumps($nav_arr);
		
		$this->assign('position',$nav_pos);
		$this->assign('bread',$my_nav_tree);
		$this->assign('nav_arr',$nav_arr);
	}
}