<?php
namespace Admin\Controller;
use Think\Controller;
class CustomController extends BaseController {

	public $mod = '';
	public function __construct() {
		parent::__construct();
		$this->mod = M('custom');
	}
	
	public function index(){
		if(IS_POST){
			$data = I('post.');
			if($data['value'][0]['name'] == ''){
				unset($data['value'][0]);
			}
			$res = $this->mod->where(array('model'=>$data['model']))->save(array('value'=>serialize($data['value']),'time'=>time()));
			if($res){
				$this->success('操作成功');
			}else{
				$this->error('操作失败 '.$this->mod->getError());
			}
		}else{
			$data = $this->mod->select();
			$this->assign('data',$data);
			$this->display();
		}
	}
	
	
}
