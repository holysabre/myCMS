<?php
namespace Admin\Model;
use Think\Model;
class CacheModel extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	//配置信息缓存刷新
	public function configCache(){
		$data = M('setting')->field('name,title,value,status')->select();
		foreach($data as $key=>$val){
			$_data[$val['name']] = $val;
		}
		S('config',$_data);
		return $_data;
	}
	
	//幻灯片缓存刷新
	public function bannerCache(){
		$pos = M('banner_pos')->where(array('status'=>1))->select();
		foreach($pos as $key=>$val){
			$val['son'] = M('banner')->where(array('pid'=>$val['id']))->select();
			$data[] =$val;
		}
		S('home_banner',$data);
	}
	
	//语言缓存刷新
	public function languageCache(){
		$where['status'] = 1;
		$data = M('language')->where($where)->select();
		foreach($data as $key=>$val){
			$_data[$val['mark']] = $val;
		}
		S('language',$_data);
		return $_data;
	}
	
	//栏目菜单缓存刷新
	public function navCache(){
		$where['status'] = 1;
		$data = M('nav')->where($where)->select();
		foreach($data as $key=>$val){
			$_data[$val['id']] = $val;
		}
		S('my_nav',$_data);
		return $_data;
	}
}