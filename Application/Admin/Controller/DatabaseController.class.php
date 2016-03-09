<?php
namespace Admin\Controller;
use Think\Controller;
class DatabaseController extends BaseController {

	protected $mod = '';
	public function __construct() {
		parent::__construct();
		$table = 'database';
		$this -> assign('table', $table);
		$this->mod = M($table);
	}
	
	public function index(){
		$dbName = C('DB_NAME');
        $data = M()->query('SHOW TABLE STATUS FROM '.$dbName);
		$this->assign('data',$data);
		$this->display();
	}
	
	public function recover(){
		$db = D('Database');
		$list = $db->getSqlFileList();
		$this->assign('data',$list);
		$this->display();
	}
	
	public function query(){
		if(IS_POST){
			$sql = I('request.sql');
			if($sql){
				$sql = stripslashes($sql);
				$res = M()->query($sql);
				if($res){
					$this->ajax_json('执行成功',1);
				}else{
					$this->ajax_json('执行失败');
				}
			}
		}else{
			$this->display();	
		}
	}
	
	public function deleteFile(){
		$path = RUNTIME_PATH.'Backup/';
		$filename = I('request.filename');
		if(!file_exists($path.$filename)){
			$this->ajax_json('文件不存在');
		}
		if(unlink($path.$filename)){
			$this->ajax_json('删除成功',1);
		}else{
			$this->ajax_json('删除失败');
		}
	}
	
	public function backupDB(){
		$db = D('Database');
		
		$tables = $db->getTables();
		
		$dir = RUNTIME_PATH . 'Backup/'.date('YmdHis').rand(100000, 999999);
		if(count($tables) < 0){
			$this->ajax_json('请选择要备份的表');
		}
		$time = "-- Time: ".date('Y-m-d H:i:s')."\r\n--\r\n";
		$type = "-- 备份数据库\r\n";
		$pre = "-- \r\n".
			   "-- Type: {$type}\r\n".
			   "-- \r\n";
		$desc = implode('、', $tables);
		$desc = "-- Description:当前SQL文件包含了表：".$desc."\r\n";
		
		$tablesStructure = $db->getTableStructure($tables);
		$outPut = '';
		$file_n = 1;
		foreach($tables as $tab){
			$temp = "-- 数据库表：{$tab} 数据信息\r\n";
			$res = $db->getTabelRecord($tab);
			$outPut .= $temp.$res."\r\n";
		}
		
		$outPut = $pre.$type.$desc.$time.$tablesStructure.$outPut;
		
		$file = $dir.".sql";
		file_put_contents($file, $outPut, FILE_APPEND);
		if(file_exists($file)) {
            $this->ajax_json("成功备份,生成了1个SQL文件。", 1);
        } 
        else {
            $this->ajax_json("备份失败");
        }
	}
	
	public function recovery(){
		$filename = I('request.filename');
		function_exists('set_time_limit') && set_time_limit(0);//防止恢复备份数据过程超时
		$filename = RUNTIME_PATH.'Backup/'.$filename;
		$start_time = time();
		if(!file_exists($filename)){
			$this->ajax_json('文件不存在');
		}
		$file = fopen($filename, 'r');
		$sql = '';
		$rows = 0;
		while(!feof($file)){
			$temp = trim(fgets($file));
			if(empty($temp) || $temp[0] == '#' || ($temp[0] == '-' && $temp[1] == '-')){
				continue;
			}
			//统计一行的长度
			$length = (int)(strlen($temp));
			//检测一行字符串的最后是否是分号，是则语句结束，否则继续下一行
			if($temp[$length-1] == ';'){
				$sql .= $temp;
				M()->query($sql);
//				echo M()->getLastSql();
				$sql = '';
				$rows++;
				if($row > 500){
					$this->ajax_json('SQL文件较大，请耐心等待，请勿刷新本页');
				}
			}else{
				$sql .= $temp;
			}
		}
		fclose($file);
		$time = time() - $start_time;
		$this->ajax_json("导入成功，耗时：{$time} 秒钟", 1);
	}
	
}
