<?php

namespace Addons\Job;
use Common\Controller\Addon;

/**
* 插件
*/
class JobAddon extends Addon {
    
    public $info = array(
        'name'=>'Job',
        'title'=>'人才招聘管理',
        'description'=>'人才招聘管理',
        'status'=>1,
        'author'=>'',
        'version'=>'1.0',
        'template'=>1,
        'is_system'=>1
    );
    
    public function install() {
        $install_sql = './Addons/Job/install.sql';
        if (file_exists($install_sql)) {
            execute_sql_file($install_sql);
        }
        // 添加钩子
        $Hooks = M("Hooks");
        $data = array(
            array (
                'name' => 'HomeJobList',
                'description' => '人才招聘管理钩子',
                'type' => 1,
                'update_time' => time(),
                'addons' => 'Job' 
            ) 
        );
        $result = $Hooks->addAll($data, array(), true);
        if (!$result) {
            session('addons_install_error', $Hooks->getError());
            return false;
        }
        copy('./Addons/Job/JobController.class.php', './Application/Home/Controller/JobController.class.php');
        return true;
    }
    
    public function uninstall() {
        $uninstall_sql = './Addons/Job/uninstall.sql';
        if (file_exists($uninstall_sql)) {
            execute_sql_file($uninstall_sql);
        }
        $Hooks = M("Hooks");
        $map['name'] = array('in', 'HomeJobList');
        $res = $Hooks->where($map)->delete();
        if ($res == false) {
            session('addons_install_error', $Hooks->getError());
            return false;
        }
        return true;
    }
    
    //实现的 HomeJobList 钩子方法
    public function HomeJobList($data) {
        $Model  = M('job');
        $where  = array();
        $where['display']  = 1;
        $where['lang']     = LANG_SET;
        $count  = $Model->where($where)->count();
        $Page   = new \Think\Page($count, $data['count']);
        $Page->urlPage = get_page_url();
        $voList = $Model->where($where)->order($data['order'])->limit($Page->firstRow . ',' . $Page->listRows)->select();
        //echo $Model->getLastSql();
        $data = array();
        $data['list'] = $voList;
        $data['page'] = $Page->show();
        //dumps($data);
        return $data;
    }
    
}