<?php
namespace Admin\Controller;
use Think\Controller;
class LanguageController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'language';
		$this -> assign('table', $table);
		$this -> assign('top_title', '语言');
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
//			dump($data);
			if ($data) {
				if($data['name'] == ''){
					$this->ajax_json('名称不能为空');
					exit();
				}
				if ($id == 0) {
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
			}
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}

	//编辑语言文件
	public function edit_lang(){
		$mark = I('request.mark');
		$file =  APP_PATH.'Home/lang/'.$mark.'.php';
		if(IS_POST){
			$data = I('request.content');
			if(empty($data)){
				$this->ajax_json('操作失败',0,$data);
			}else{
				$data = htmlspecialchars_decode($data);
            	if(file_put_contents($file, $data)){
            		$this->ajax_json('操作成功',1,$data);
            	}
			}
		}else{
			$file_content = htmlspecialchars(file_get_contents($file));
			$this->assign('mark',$mark);
			$this->assign('file_content',$file_content);
			$this -> display(CONTROLLER_NAME . '/edit_lang');
		}
	}
}
