<?php
namespace Home\Model;
use Think\Model;
class BaseModel extends Model{
	
	public $alias;
	public function __construct(){
		parent::__construct();
		$this->alias = I('request.alias');
	}
	
}
