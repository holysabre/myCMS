<?php

namespace Addons\GuestBook;
use Common\Controller\Addon;

/**
* 留言管理插件
*/
class GuestBookAddon extends Addon {

    //public $custom_config = 'config.html';
    public $info = array(
        'name'=>'GuestBook',
        'title'=>'留言管理',
        'description'=>'网友反馈的信息,留言板管理',
        'status'=>1,
        'author'=>'',
        'version'=>'0.1',
        'template'=>1,
        'is_system'=>1
    );
    
    public $admin_list = array('model' => 'GuestBook');
    
    public function install() {
        $install_sql = './Addons/GuestBook/install.sql';
        if (file_exists($install_sql)) {
            execute_sql_file($install_sql);
        }
        // 添加钩子
        $Hooks = M("Hooks");
        $data = array(
            array (
                'name' => 'HomeBookList',
                'description' => '留言管理钩子',
                'type' => 1,
                'update_time' => time(),
                'addons' => 'GuestBook' 
            ) 
        );
        $result = $Hooks->addAll($data, array(), true);
        if (!$result) {
            session('addons_install_error', $Hooks->getError());
            return false;
        }
        copy('./Addons/GuestBook/GuestBookController.class.php', './Application/Home/Controller/GuestBookController.class.php');
        return true;
    }
    
    public function uninstall() {
        $uninstall_sql = './Addons/GuestBook/uninstall.sql';
        if (file_exists($uninstall_sql)) {
            execute_sql_file($uninstall_sql);
        }
        $Hooks = M("Hooks");
        $map['name'] = array('in', 'HomeBookList');
        $res = $Hooks->where($map)->delete();
        if ($res == false) {
            session('addons_install_error', $Hooks->getError());
            return false;
        }
        return true;
    }
    
    //实现的 HomeBookList 钩子方法
    public function HomeBookList($data) {
        $this->display("message");
    }
    
}