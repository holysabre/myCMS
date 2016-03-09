<?php
namespace Admin\Controller;
use Think\Controller;
class PageController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'page';
		$this -> assign('table', $table);
		$this->mod = M($table);
	}
	public function edit() {
		$nav_id = I('request.nav_id');
		if (IS_POST) {
			$data = I('request.langset');
//			$custom = I('request.custom');
//			dumps($data);exit;
			if ($data) {
				$res = false;
				foreach($data as $key=>$val){
					if(empty($val['title'])){
						$this->error('标题不能为空！');
					}
					$val['time'] = time();
					//自定义字段
					if(!empty($val['custom'])){
						$val['custom'] = serialize($val['custom']);
					}
					if($val['id'] == 0){
						//增加
						unset($val['id']);
						if (!$this->mod -> add($val)) {
							$this->error('新增操作失败');
							$res = false;
						}else{
							$res = true;
						}
					}else{
						//修改
						if (!$this->mod -> save($val)) {
							$this->error('修改操作失败');
							$res = false;
						}else{
							$res = true;
						}
					}
				}
				if($res == true){
					$this->success('操作成功');
				}
			} else {
				$this -> error($this->mod -> getError());
			}
		} else {
			if ($nav_id) {
				$where['nav_id'] = $nav_id;
				$data = $this->mod ->where($where)-> select();
				foreach($data as $key=>$val){
					$_data[$val['lang']] = $val;
				}
			}
//			dumps($_data);
			$this -> assign('data', $_data);
			$this -> assign('nav_id', $nav_id);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}
	
}
