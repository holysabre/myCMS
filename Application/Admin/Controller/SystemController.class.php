<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends BaseController {

	protected $mod = '';
	protected $group_list = array('1' => '基本设置', '2' => '联系设置', '3' => '版权设置', '4' => '其它设置', '5' => '水印设置' ,'6' => '邮箱设置' ,'7' => '地图设置');
	protected $type_list = array('1' => '字符', '2' => '数字', '3' => '下拉框', '4' => '图片上传', '5' => '文本框', '6' => '单选框');
	public function __construct() {
		parent::__construct();
		$table = 'setting';
		$this -> mod = M($table);
		$this -> assign('table', $table);
		$this -> assign('type_list', $this -> type_list);
		$this -> assign('group_list', $this -> group_list);
	}

	public function setting() {
		$data = $this -> mod -> order('sort asc,status asc,id desc') -> select();
		$this -> assign('data', $data);
		$count = $this -> mod -> count();
		$this -> assign('count', $count);
		$this -> display();
	}

	public function settingEdit() {
		$id = I('request.id', 0);
		if (IS_POST) {
			$data = $this -> mod -> create();
			//			$this->ajax_json('111',1,$data);
			if ($data) {
				if ($id == 0) {
					$data['addtime'] = time();
					$data['status'] = $data['status'] == 'on' ? 1 : 0;
					$res = $this -> mod -> add($data);
					if ($res) {
						$this -> ajax_json('添加成功！', 1);
					} else {
						$this -> ajax_json('添加失败');
					}
				} else {
					$data['edittime'] = time();
					$data['status'] = $data['status'] == 'on' ? 1 : 0;
					$res = $this -> mod -> save($data);
					if ($res) {
						$this -> ajax_json('添加成功！', 1);
					} else {
						$this -> ajax_json('添加失败');
					}
				}
			}
		} else {
			$data['status'] = 1;
			if ($id != 0) {
				$data = $this -> mod -> find($id);
			}
			$this -> assign('data', $data);
			$this -> display(CONTROLLER_NAME . '/setting_edit');
		}
	}

	public function baseSetting() {
		if (IS_POST) {
//			$data = I('post.');
			$data = $_POST;
			$map = $data['map'];
			unset($data['address'],$data['map']);
//			dumps($data);dumps($map);exit();
			foreach($data as $k=>$v){
				$this->mod->where('id='.$k)->setField('value',$v);
			}
			foreach($map as $k=>$v){
				$res = $this->mod->where(array('name'=>$k))->save(array('value'=>$v,'edittime'=>time()));
			}
			D('Cache')->configCache();
			$this->success('success');
		} else {
//			$where = '';
//			$where['status'] = 1;
//			$data = $this -> mod -> where($where)->order('groups asc,sort asc')-> select();
//			echo $this->mod->getLastSql();
//			foreach ($data as $k => $v) {
//				$_data[$v['name']] = $v;
//			}
			foreach($this->group_list as $key=>$val){
				$data[$key] = $this->mod -> where(array('status'=>1,'groups'=>$key))->order('groups asc,sort asc')-> select();
			}
			$map = $data[7];
			unset($data[7]);
			foreach($map as $k=>$v){
				$_map[$v['name']] = $v;
			}
//			foreach ($data as $k => $v) {
//				if ($v['groups'] == 1) {
//					$_data[0][] = $data[$k];
//				} elseif ($v['groups'] == 2) {
//					$_data[1][] = $data[$k];
//				} elseif ($v['groups'] == 3) {
//					$_data[2][] = $data[$k];
//				} elseif ($v['groups'] == 5) {
//					$_data[4][] = $data[$k];
//				} elseif ($v['groups'] == 6) {
//					$_data[5][] = $data[$k];
//				} else {
//					$_data[3][] = $data[$k];
//				}
//			}
			$this -> assign('map', $_map);
			$this -> assign('basedata', $data);
			$this -> display(CONTROLLER_NAME . '/setting_base');
		}
	}

	public function adminLog() {
		$data = M('adminlog') -> select();
		$this -> assign('data', $data);
		$this -> display(CONTROLLER_NAME . '/log');
	}
	
	//发送邮件
	public function sendEmail(){
		//获取配置中的邮箱设置信息
		$config = S('config');
		$email = '1026579245@qq.com';//邮件接收人邮箱
		$mailtitle = '测试邮件标题';
		$content = '测试邮件内容';
		$res = getEmail($email, $mailtitle, $content);
		if($res){
			$this->ajaxreturn(1);
		}else{
			$this->ajax_json('发送失败');
		}
	}

}
