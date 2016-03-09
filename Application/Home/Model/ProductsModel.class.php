<?php
namespace Home\Model;
use Think\Model;
class ProductsModel extends BaseModel{
	
	public $model;
	public function __construct(){
		parent::__construct();
		$this->model = M('products');
	}
	
	public function getProInfo($nav_id = 7,$pages = 12){
		$nav_id_arr = getSonAllArr(getNavInfo(),$nav_id);
		$where['status'] = 1;
		$where['pid'] = array('in',$nav_id_arr);
		
		$count      = $this->model->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,$pages);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $this->model->where($where)->order('sort asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$data['count'] = $count;
		$data['pages'] = $show;
		$data['list']  = $list;
//		dumps($data);
		return $data;
	}
	
	public function getProDetail($nav_id = 7){
		$id = I('request.id');
		$where['status'] = 1;
		$where['id'] = $id;
		$data = $this->model->field('*')->where($where)->find();
		if($data['imgdata']){
			$data['imgdata'] = explode(',', $data['imgdata']);
		}
		$data['custom'] = unserialize($data['custom']);
		//点击次数+1
		$count = $this->model->where($where)->setField('count',$data['count']+1);
		//上一篇 下一篇
		$res  = $this->model->field('id,pid,title')->where(array('pid'=>$nav_id,'status'=>1))->order('sort asc')->select();
		foreach($res as $key=>$val){
			$_res[$val['id']] = $val;
		}
		$next = $this->model->where(array('pid'=>$nav_id,'status'=>1,'id'=>array('gt',$id)))->order('sort asc')->min('id');
		$prev = $this->model->where(array('pid'=>$nav_id,'status'=>1,'id'=>array('lt',$id)))->order('sort asc')->max('id');
		$data['prev'] = $_res[$prev];
		$data['next'] = $_res[$next];
//		dump($data);
		return $data;
	}
	
}
