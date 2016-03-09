<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'menu';
		$this -> assign('table', $table);
		$this -> mod = M($table);
	}

	public function index() {
//		$data['data'] = $this -> mod -> select();
		$data['data'] = getCateInfo('',0,'menu');
		$data['count'] = $this -> mod -> count();
		$this -> assign('data', $data);
		$this -> display();
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		$id = I('request.id', 0);
		if (IS_POST) {
			$data = $this -> mod -> create();
			//			$this->ajax_json('111',0,$data);exit();
			if ($data) {
//				unset($data['id']);
				if ($data['name'] == '') {
					$this -> ajax_json('名称不能为空');
					exit();
				}
				//				dumps($data);exit();
				if ($id == 0) {
					$data['edittime'] = time();
					if ($this -> mod -> add($data)) {
						$this -> ajax_json('操作成功', 1);
					} else {
						$this -> ajax_json('操作失败', 0, $data);
					}
				} else {
					$data['edittime'] = time();
					if ($this -> mod -> save($data)) {
						$this -> ajax_json('操作成功', 1, $data);
					} else {
						$this -> ajax_json('操作失败', 0, $this -> mod -> getError());
					}
				}
			} else {
				$this -> error($this -> mod -> getError());
			}
		} else {
			if ($id != 0) {
				$data = $this -> mod -> find($id);
			}
			//			dumps($data);
			$cateinfo = $this -> mod -> order('sort asc,id asc') -> select();
			$cateinfo = getTree1($cateinfo, $id = 0);
			$this -> assign('cateinfo', $cateinfo);
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}

}
