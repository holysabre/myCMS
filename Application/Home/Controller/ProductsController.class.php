<?php
namespace Home\Controller;
use Think\Controller;
class ProductsController extends BaseController {
	
	public function __construct(){
		parent::__construct();
	}
	
    public function index(){
    	$nav_id = $this->getNavId();
		$this->getBread($nav_id);
    	$info = D('Products')->getProInfo($nav_id);
		$template = $this->getTemplate($nav_id);
		$this->assign('info',$info);
//      $this->display($template);
		$this->display('products');
    }
	
	public function detail(){
    	$nav_id = $this->getNavId();
		$this->getBread($nav_id);
		$info = D('Products')->getProDetail($nav_id);
		$template = $this->getTemplate($nav_id);
		$this->assign('info',$info);
        $this->display($template.'_detail');
    }
	
}