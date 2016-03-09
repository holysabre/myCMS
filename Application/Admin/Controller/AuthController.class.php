<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends BaseController {

	protected $mod = '';
	protected $table = '';
	public function __construct() {
		parent::__construct();
		$this -> table = 'auth';
		$this -> assign('table', $this -> table);
		$this -> mod = M($this -> table);
	}

	public function index() {
		$data['data'] = $this -> mod -> select();
		$data['count'] = $this -> mod -> count();
		$this -> assign('data', $data);
		$this -> display();
//		dumps($data);
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		if($id){
			$id = I('request.id',0);
		}
		if(IS_POST){
			$data = $this->mod->create();
			$data['auth'] = implode(',',$data['auth']);
//			$this -> ajax_json('操作失败',0,$data);exit();
			if($id == 0){
				$data['edittime'] = time();
				$res = $this->mod->add($data);
				if ($res) {
					$this -> ajax_json('操作成功', 1,$data);
				} else {
					$this -> ajax_json('操作失败',0,$data);
				}
			}else{
				$data['edittime'] = time();
				$res = $this->mod->save($data);
				if ($res) {
					$this -> ajax_json('操作成功', 1);
				} else {
					$this -> ajax_json('操作失败',0,$data);
				}
			}
		}else{
			if($id!=0){
				$data = $this->mod->find($id);
				$data['auth'] = explode(',', $data['auth']);
			}
			$data['menu'] = getCateInfo('',0,'menu');
			if($data['auth']){
				foreach($data['auth'] as $k=>$v){
					foreach($data['menu'] as $key=>$val){
						if($val['id'] == $v){
							$data['menu'][$key]['checked'] = 1;
						}
					}
				}
			}
			$this->assign('data',$data);
			$this->display(CONTROLLER_NAME . '/edit');
		}
	}

}
