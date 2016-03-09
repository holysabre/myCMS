<?php
namespace Home\Controller;
use Think\Controller;
class GuestBookController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    // 首页
    public function index() {
        $this->display('guestbook');
    }
    
    // 前台提交数据到数据库
    public function message() {
        if (IS_POST) {
            $mod = M('guest_book');

            if (false === $data = $mod->create()) {
                $this->ajax_check($mod->getError());
            }
            
            if (!$data['title']) {
                $this->ajax_check(L('messagearr#errtitle'));
            }
            
            $data['addtime'] = time();
            
            $id = $mod->add($data);
            if ( $id ) {
                $this->ajax_check(L('success'), 1, '', U('index/index'));
            } 
            else {
                $this->ajax_check(L('failure'));
            }
            exit;
        } 
        $this->ajax_check(L('operation'));
    }
    
}