<?php
namespace Admin\Controller;
use Think\Controller;
class ModularController extends BaseController {

	protected $mod = '';
	protected $display_mode = array(
		1 => '单页形式',
		2 => '列表形式',
		3 => '单页+列表形式',
	);
	public function __construct() {
		parent::__construct();
		$table = 'modular';
		$this -> assign('table', $table);
		$this->mod = M($table);
		$this -> assign('display_mode', $this->display_mode);
	}

	public function index() {
		$data['count'] = $this->mod->count();	
		$data['data'] = $this->mod -> order('id asc') -> select();
		$this -> assign('data', $data);
		$this -> display();
//		dumps($data);
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		$id = I('request.id');
		if (IS_POST) {
			$data = $this->mod -> create();
//			dump($data);
			if ($data) {
				if($data['name'] == ''){
					$this->ajax_json('模块名称不能为空');
					exit();
				}
				if ($id == 0) {
					$data['edittime'] = time();
					if ($this->mod -> add($data)) {
						$this->ajax_json('操作成功',1);
					} else {
						$this->ajax_json('操作失败');
					}
				} else {
					$data['edittime'] = time();
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
			}
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}
	
}
