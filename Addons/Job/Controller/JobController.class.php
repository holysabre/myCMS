<?php
namespace Addons\Job\Controller;
use Admin\Controller\AddonsController;

class JobController extends AddonsController {
    
    public function __construct() {
        parent::__construct();
		$this->nav_id = I('request.nav_id');
		$this->assign('nav_id', $this->nav_id);
		$this->assign('table', 'job');
//      $this->nid = I("request.nid", 20);
//      $this->assign('nid', $this->nid);
//      $nav = M('nav')->where('id='.$this->nid)->find();
//      $this->assign('nav', $nav);
    }
    
    // 列表
    public function index() {
        $type   = I('get.type',1);
        $sort   = I("request.sort", 'id', 'trim');
        $order  = I("request.order", 'desc', 'trim');
        $where  = array();
        $data  = array();
        //$where['type'] = $type; 
        
        $lang       = I('request.lang');
        $display    = I('request.display');
        $istop      = I('request.istop');
        $islink     = I('request.islink');
        $keytype    = I('request.keytype');
        $keywords   = I('request.keywords');
        if ($lang !== '') {
            $where['lang'] = $lang;
        }
        if ($display !== '') {
            $where['display'] = $display;
        }
        if ($istop !== '') {
            $where['istop'] = $istop;
        }
        if ($islink !== '') {
            $where['islink'] = $islink;
        }
        if ($keywords !== '') {
            $where[$keytype] = array('like',"%{$keywords}%");
        }
        
        $Model      = M('job');
        $count      = $Model->where($where)->count();
        $Page       = new \Think\Page($count, 20, I('request.'));
        $voList     = $Model->where($where)->order($sort.' '.$order)->
                      limit($Page->firstRow . ',' . $Page->listRows)->select();
        
        $data['list'] = $voList;
        $data['page'] = $Page->show();
        $this->assign('data', $data);
        $this->displaylist('index');
    }
    
    // 新增
    public function add() {
        $this->edit();
    }
    
    // 编辑
    public function edit() {
        $Model  = M('job');
        $id     = I('get.id');
        if (IS_POST) {
            $data = $Model->create();
//			dumps($data);exit;
            if (empty($data['lang'])) $this->error('请选择语言');
            if (empty($data['title'])) $this->error('请输入职位');
			$url = addons_url('Job://Job/index?nid='.$this->nid.'&nav_id='.$this->nav_id);
            if($data){
                if ($data['id'] == '') {
                    $data['addtime'] = time();
                    $insert_id = $Model->add($data);
                    $insert_id ? $this->success('添加成功',$url) : $this->error('添加失败',$url);
                } 
                else {
                    $data['edittime'] = time();
                    $save_id = $Model->save($data);
                    $save_id ? $this->success('编辑成功',$url) : $this->error('编辑失败',$url);
                }
                exit;
            } 
            else {
                $this->error($Model->getError());
            }
        } 
        else {
            $info = array();
            if($id){
                $info = $Model->field(true)->find($id);
                $info['action'] = 'edit?nid='.$this->nid;
            }
            
            $this->assign('info', $info);
            $this->displaylist('edit');
        }
    }
    
    // 后台删除
    public function delete() {
        $mod = M('job');
        $ids = trim(I('get.id'), ',');
        if ($ids) {
            if (false !== $mod->delete($ids)) {
                $this->ajax_check('操作成功', 1);
            } 
            else {
                $this->ajax_check('操作失败');
            }
        } 
        else {
            $this->ajax_check('非法参数');
        }
    }
    
    
    //批量操作
    public function frmpost() {
        $action = I('get.action');
        $nid    = I('get.nid');
        $id     = trim(I('get.id'), ',');
        
        if ( empty($action) ) {
            $this->ajax_json('请先在下拉列表里选择批量操作类型!');
        }
        
        if ( empty($id) ) {
            $this->ajax_json('请选择要操作的数据!');
        }
        $data = array();
        $map = array('id' => array('IN', $id));
        switch($action) {
            case 'delete':{ 
                $map = array('pid' => array('IN', $id));
                $sql = M('job')->where($map)->delete();
                if($sql) {
                    $this->ajax_json('批量删除成功,2秒后刷新页面', 1);
                } 
                else {
                    $this->ajax_json('批量删除失败');
                } 
                break;
            }
            case 'nodisplay':{ $data['display'] = 0; break;}
            case 'display':{ $data['display'] = 1; break;}
            case 'noistop':{ $data['istop'] = 0; break;}
            case 'istop':{ $data['istop'] = 1; break;}
            
        }
        $data['edittime'] = time();
        $map = array('id' => array('IN', $id));
        $sql = M('job')->where($map)->save($data);
        if($sql) {
            $this->ajax_json('批量操作成功,2秒后刷新页面', 1);
        } 
        else {
            $this->ajax_json('批量操作失败');
        }
    }
}

