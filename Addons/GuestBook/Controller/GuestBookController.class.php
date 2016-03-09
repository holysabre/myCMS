<?php
namespace Addons\GuestBook\Controller;
use Admin\Controller\AddonsController;

class GuestBookController extends AddonsController {
    
    public function __construct() {
        parent::__construct();
    }
    
    // 后台列表
    public function index() {
        $list       = M('guest_book')->order('id desc')->select();
        $request    = (array)I('request.');
        $total      = $list? count($list) : 1 ;
        $listRows   = 20;
        $page       = new \Think\Page($total, $listRows, $request);
        $voList     = array_slice($list, $page->firstRow, $page->listRows);
        $p          = $page->show();
        //dump($voList);
        $this->assign('_list', $voList);
        $this->assign('_page', $p?$p:'');
        $this->displaylist('index');
    }
    
    // 后台回复
    public function replay() {
        $mod = M('guest_book');
        if (IS_POST) {
            if (false === $data = $mod->create()) {
                $this->ajax_check($mod->getError());
            }
            
            $data['edittime'] = time();
            
            $save_id = $mod->save($data);
            if ( $save_id ) {
                $this->ajax_check('回复成功', 1);
            } 
            else {
                $this->ajax_check('回复失败');
            }
        } 
        else {
            $id   = I('get.id');
            $info = $mod->find($id);
            $this->assign('info', $info);

            $this->displaylist('replay');
        }
    }
    
}

