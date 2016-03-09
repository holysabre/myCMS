<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'banner';
		$this -> assign('table', $table);
		$this->mod = M($table);
	}
	
	public function index(){
		$pid = I('request.pid');
		if($pid){
			$where['pid'] = $pid;
		}
		$where['b.status'] = 1;
		$data['data'] = M()->field('b.*,p.name as pos_name')->table('my_banner as b')->join('inner join my_banner_pos as p on b.pid = p.id')->where($where)->select();
		$data['count'] = $this->mod->count();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function edit(){
		$id = I('request.id',0);
		if(IS_POST){
			$data = $this->mod->create();
			$data['time'] = time();
			if($id == 0){
				$res = $this->mod->add($data);
				if($res){
					D('cache')->bannerCache();//刷新缓存
					$this->ajax_json('添加成功',1,$data);
				}else{
					$this->ajax_json('添加失败',0,$data);
				}
			}else{
				$res = $this->mod->save($data);
				if($res){
					D('cache')->bannerCache();//刷新缓存
					$this->ajax_json('修改成功',1,$data);
				}else{
					$this->ajax_json('修改失败',0,$data);
				}
			}
		}else{
			$data['status'] = 1;
			if($id != 0){
				$data = $this->mod->find($id);
			}
			$data['pos'] = M('banner_pos')->where(array('status'=>1))->order('sort asc')->select();
			$this->assign('data',$data);
			$this->display(CONTROLLER_NAME.'/edit');
		}
	}
	
	public function posIndex(){
		$data['data'] = M('banner_pos')->where(array('status'=>1))->order('sort asc')->select();
		$data['count'] = M('banner_pos')->count();
		$this->assign('data',$data);
		$this->display(CONTROLLER_NAME.'/pos_index');
//		dumps($data);
//		echo M('banner_pos')->getLastSql();
	}
	
	public function posEdit(){
		$id = I('request.id',0);
		if(IS_POST){
			$data = M('banner_pos')->create();
			$data['time'] = time();
			if($id == 0){
				$res = M('banner_pos')->add($data);
				if($res){
					$this->ajax_json('添加成功',1,$data);
				}else{
					$this->ajax_json('添加失败',0,$data);
				}
			}else{
				$res = M('banner_pos')->save($data);
				if($res){
					$this->ajax_json('修改成功',1,$data);
				}else{
					$this->ajax_json('修改失败',0,$data);
				}
			}
		}else{
			$data['status'] = 1;
			if($id != 0){
				$data = M('banner_pos')->find($id);
			}
			$this->assign('data',$data);
			$this->display(CONTROLLER_NAME.'/pos_edit');
		}
	}
	
}
