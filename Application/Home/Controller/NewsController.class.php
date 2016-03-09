<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends BaseController {
	
	public function __construct(){
		parent::__construct();
	}
	
    public function index(){
    	$nav_id = $this->getNavId();
		$this->getBread($nav_id);
    	$info = D('News')->getNewsInfo($nav_id);
		$template = $this->getTemplate($nav_id);
		$this->assign('info',$info);
        $this->display($template);
//		$this->display('news');
    }
	
	public function detail(){
    	$nav_id = $this->getNavId();
		$this->getBread($nav_id);
		$info = D('News')->getNewsDetail($nav_id);
		$template = $this->getTemplate($nav_id);
		$this->assign('info',$info);
        $this->display($template.'_detail');
    }
	
}