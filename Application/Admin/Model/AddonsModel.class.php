<?php
namespace Admin\Model;
use Think\Model;
class AddonsModel extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getList($addons_dir = '' , $type = 0){
		if (!$addon_dir){
			$addon_dir = './Addons/';
		}
        $dirs = array_map('basename', glob($addon_dir . '*', GLOB_ONLYDIR) );
        if ($dirs === FALSE || ! file_exists ($addon_dir)) {
            $this->error = '插件目录不可读或者不存在';
            return FALSE;
        }
        $addons = array ();
        $where ['name'] = array ('in',$dirs);
        $list = $this->where ( $where )->field ( true )->select();
        foreach ( $list as $addon ) {
            $addon ['is_install'] = 1;
            $addons [$addon ['name']] = $addon;
        }
        
//		$status = array(
//			-1    => '损坏',
//			0     => '禁用',
//			1     => '启用',
//			null  => '未安装'
//		);
		
        foreach ( $dirs as $value ) {
            if (! isset ( $addons [$value] )) {
                $filename = get_addon_file ( $value );
				if(!file_exists($filename)){
					\Think\Log::record( '插件' . $value . '的入口文件不存在！' );
                    continue;
				}
				include_once($filename);
				$val = get_addon_class($value);
				$obj = new $val();
				$addons[$value] = $obj->info;
			
				if($addons[$value]){
					$addons[$value]['is_install'] = 0;
					unset($addons[$value]['status']);
				}
				foreach ($addons as $k => $v) {
					$addons[$k]['status'] = getStauts($v['status'],array(-1=>'损坏',0=>'禁用',1=>'启用',null=>'未安装'));
				}
				
            }
        }
//		dumps($addons);
		return $addons;
	}
	
	
}