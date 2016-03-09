<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController {

	protected $mod = '';
	protected $table = '';
	public function __construct() {
		parent::__construct();
		$this -> table = 'admin';
		$this -> assign('table', $this -> table);
		$this -> mod = M($this -> table);
	}

	public function index() {
		$data['data'] = $this -> mod ->order('id asc')-> select();
		$data['count'] = $this -> mod -> count();
		$this -> assign('data', $data);
		$this -> display();
//		dumps($data);
	}

	public function add($id = 0) {
		$this -> edit($id);
	}

	public function edit($id = 0) {
		$id = I('request.id',0);
		if(IS_POST){
			$data = I('post.');
			if($data['username'] == ''){
				$this -> ajax_json('用户名不能为空');
			}
			$username = $this->mod->field('username')->select();
			foreach($username as $k=>$v){
				if($v['username'] == $data['username']){
					$this -> ajax_json('用户名已存在');
				}
			}
			if($data['password'] != $data['repassword']){
				$this -> ajax_json('两次密码不一致');
			}
			unset($data['repassword']);
			if($data){
				if($id==0){
					$data['regtime'] = time();
					$data['password'] = md5($data['password']);
					$res = $this->mod->add($data);
					if ($res) {
						$this -> ajax_json('操作成功', 1);
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
				$this->ajax_json('数据不存在',0,$this->mod->getError());
			}
		}else{
			if($id!=0){
				$data = $this->mod->find($id);
				$this->assign('data',$data);
			}
			$auth_arr = M('auth')->select();
			$this->assign('auth_arr',$auth_arr);
			$this->display(CONTROLLER_NAME . '/edit');
		}
	}

}
