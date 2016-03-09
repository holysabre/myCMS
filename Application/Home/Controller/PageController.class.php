<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends BaseController {
	
	public function __construct(){
		parent::__construct();
	}
	
    public function index(){
    	
    }
	
	public function detail(){
		$nav_id = $this->getNavId();
//		echo $nav_id;
		$this->getBread($nav_id);
    	$info = D('page')->getPageInfo();
		$template = $this->getTemplate($info['id']);
		$this->assign('info',$info);
        $this->display($template);
    }
	
}