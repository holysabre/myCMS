<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'article';
		$this -> assign('table', $table);
		$this->mod = M($table);
	}

	public function index() {
		$data = $this->mod -> select();
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
//			dump($data);
			if ($data) {
				//截取描述
				
				if($data['title'] == ''){
					$this->ajax_json('文章标题不能为空');
					exit();
				}
				if($data['cid'] == 0){
					$this->ajax_json('请选择分类');
					exit();
				}
				
				if($data['intro'] == ''){
					$data['intro'] = substr($data['intro'], 0 , 240);
				}
				$data['img'] = $data['imgdata'][0];
				$data['imgdata'] = implode(',', $data['imgdata']);
//				dumps($data);exit();
				if ($id == 0) {
					$data['status'] = 1;
					$data['addtime'] = time();
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
				$data['imgdata'] = $data['imgdata'] ? explode(',', $data['imgdata']) : '';
			}
//			dumps($data);
			$this -> assign('cateinfo', $cateinfo = getCateInfo(1));
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}
	
}
