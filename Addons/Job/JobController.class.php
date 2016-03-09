<?php
namespace Home\Controller;
use Think\Controller;
class JobController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    // 首页
    public function index() {
        $this->display('job');
    }
    
}