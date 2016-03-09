<?php
namespace Home\Model;
use Think\Model;
class PageModel extends BaseModel{
	
	public $model;
	public function __construct(){
		parent::__construct();
		$this->model = M('page');
	}
	
	public function getPageInfo($nav_id = ''){
		$where = array();
		if(!empty($nav_id)){
			$where['n.id'] = $nav_id;
		}
		
		$where['n.url'] = 'Page/'.$this->alias;
		$where['n.modular_id'] = 1;
		$where['n.status'] = 1;
		$field = 'n.id,n.pid,n.sort,n.template,n.status,n.addtime,n.modular_id,n.url,p.nav_id,p.title,p.content,p.keywords,p.description,p.custom';
		$data = M()->table('my_page as p')->join('right join my_nav as n on p.nav_id = n.id')->field($field)->where($where)->find();
		$data['custom'] = unserialize($data['custom']);
		//		echo M()->getLastSql(); 
		return $data;
	}
}
