<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends BaseController {

	protected $mod = '';
	protected $nav_id = '';
	public function __construct() {
		parent::__construct();
		$table = 'news';
		$this -> assign('table', $table);
		$this->mod = M($table);
		$this->nav_id = I('request.nav_id');
		$this->assign('nav_id',$this->nav_id);
	}
	
	public function index(){
		$where = '';
		$where['nav_id'] = $this->nav_id;
		$data = array();
		$res = $this->mod->where($where)->order('sort asc,time desc,id asc')->select();
		foreach($res as $key=>$val){
			$res_data = M('news_data')->where(array('pid'=>$val['id']))->select();
			foreach($res_data as $k=>$v){
				$val[$v['lang']] = $v;
			}
			$data['data'][] = $val;
		}
		$data['count'] = $this->mod->count();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function add($id=0){
		$this->edit($id);
	}
	
	public function edit() {
		$id = I('request.id',0);
		if (IS_POST) {
			$data = I('request.langset');
			$basedata = I('request.base');
			$basedata['imgdata'] = I('request.imgdata');
			if ($data) {
				if($basedata['nav_id'] == 0){
					$this->ajax_json('请选择父级栏目');
					exit();
				}
				$basedata['time'] = time();
				$basedata['img'] = $basedata['imgdata'][0];
				$basedata['imgdata'] = implode(',', $basedata['imgdata']);
				if($id == 0){
					$res = $this->mod->add($basedata);
					foreach($data as $key=>$val){
						$val['pid'] = $res;
						$val['lang'] = $key;
						$val['custom'] = serialize($val['custom']);
						$val['time'] = time();
						$result = M('news_data')->add($val);
					}
					if($res && $result){
						$this->ajax_json('增加操作成功',1);
					}else{
						$this->ajax_json('增加操作失败');
					}
				}else{
					$basedata['id'] = $id;
					$res = $this->mod->save($basedata);
					foreach($data as $key=>$val){
						$where['pid'] = $id;
						$where['lang'] = $key;
						$val['custom'] = serialize($val['custom']);
						$val['time'] = time();
						$result = M('news_data')->where($where)->save($val);
					}
					if($res && $result){
						$this->ajax_json('修改操作成功',1);
					}else{
						$this->ajax_json('修改操作失败',0,$data);
					}
				}
			} else {
				$this -> error($this->mod -> getError());
			}
		} else {
			if ($id) {
				$data = $this->mod ->where($where)-> find($id);
				$langdata = M('news_data')->where(array('pid'=>$id))->select();
				foreach($langdata as $key=>$val){
					$data[$val['lang']] = $val;
				}
			}
			$cate_arr = A('nav')->getBorthers($this->nav_id);
			$this -> assign('cate_arr', $cate_arr);
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/edit');
		}
	}
	
}
