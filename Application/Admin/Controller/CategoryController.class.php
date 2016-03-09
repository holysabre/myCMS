<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'category';
		$this -> assign('table', $table);
		$this -> mod = M($table);
	}

	public function index() {
		$data = $this -> mod -> order('sort asc,id asc') -> select();
		foreach ($data as $key => $val) {
			$val['src'] = trim($val['img'], ',');
			$val['src'] = explode(',', $val['src']);
			$data[$key]['src'] = $val['src'][0];
		}
		$data = getTree1($data, $id = 0);
		//		dump($data);
		$this -> assign('data', $data);
		$this -> display();
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		$id = I('request.id');
		if (IS_POST) {
			$data = $this -> mod -> create();
			if ($data) {
				$data['img'] = $data['imgdata'][0];
				$data['imgdata'] = implode(',', $data['imgdata']);
				if ($id == 0) {
					$data['addtime'] = time();
					if ($this -> mod -> add($data)) {
						$this -> success('操作成功', U('index'));
					} else {
						$this -> error('操作失败', U('index'));
					}
				} else {
					$data['edittime'] = time();
					if ($this -> mod -> save($data)) {
						$this -> success('操作成功', U('index'));
					} else {
						$this -> error('操作失败', U('index'));
					}
				}
			} else {
				$this -> error($this -> mod -> getError());
			}
		} else {
			if ($id != 0) {
				$data = $this -> mod -> find($id);
				$data['imgdata'] = explode(',', $data['imgdata']);
			}
			$cateinfo = $this -> mod -> order('sort asc,id asc') -> select();
			$cateinfo = getTree1($cateinfo, $id = 0);
			$this -> assign('cateinfo', $cateinfo);
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}

	public function delete() {
		$id = I('request.id', '', 'trim');
		if (is_array($id)) {
			$id = explode(',', $id);
		}
		if ($id != '') {
			if ($this -> mod -> delete($id)) {
				$this -> success('操作成功');
			} else {
				$this -> error('操作失败');
			}
		} else {
			$this -> error('id不存在');
		}
	}

}
