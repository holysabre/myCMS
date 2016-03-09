<?php
namespace Admin\Model;
use Think\Model;
class DatabaseModel extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	//获取数据库中所有的表名
	public function getTables(){
		$dbName = C('DB_NAME');
		$res = M()->query('show tables from '.$dbName);
		foreach ($res as $tab){
            $arr[] = $tab['Tables_in_' . $dbName];
        }
        return $arr;
	}
	
	//读取数据表结构
	public function getTableStructure($table_list){
		M()->query("SET SQL_QUOTE_SHOW_CREATE = 1"); //1，表示表名和字段名会用``包着的,0 则不用``
        $outPut = '';
        if (!is_array($table_list) || empty($table_list)) {
            return false;
        }
        foreach ($table_list as $table) {
            $outPut.="-- 数据库表：`{$table}` 的结构信息\n";
            $outPut .= "DROP TABLE IF EXISTS `{$table}`;\n";
            $tmp = M()->query("SHOW CREATE TABLE {$table}");
            $outPut .= $tmp[0]['Create Table'] . " ;\n\n";
        }
        return $outPut;
	}
	
	//获取数据表中的数据
	public function getTabelRecord($tableName){
		$res = M()->query('select * from '.$tableName);
		if(count($res) < 0){
			return '';
		}
		foreach($res as $k=>$v){
			$sql .= "INSERT INTO `{$tableName}` VALUES (";
			foreach($v as $key=>$val){
				if($val == ''){
					$val = '';
				}
				$type = gettype($val);
				if($type == 'string'){
					$val = "'".addslashes($val)."'";
				}
				$sql .= "$val,";
			}
			$sql .= ");\r\n";
		}
		$sql = str_replace(',)', ')', $sql);
		return $sql;
		
	}
	
	public function getSqlFileList(){
		$list = array();
		$size = 0;
		$path = RUNTIME_PATH.'Backup/';
		$dir = opendir($path);
		
		while($file = readdir($dir)){
			if(preg_match('#\.sql$#', $file)){
				$fp = fopen($path.$file, 'rb');
				$contents = fread($fp, filesize($path.$file));
				fclose($fp);
				$detail = explode("\n", $contents);
				$bk = array();
				$bk['name'] = $file;
				$bk['type'] = substr($detail[1], 12);
				$bk['description'] = substr($detail[5], 15);
				$bk['time'] = substr($detail[6], 9);
				$bk['size'] = byte_format(filesize($path.$file));
				$list[] = $bk;
			}
		}
		closedir($dir);
		return $list;
	}
	
}