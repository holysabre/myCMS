<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends CommonController {

	private $Verify;
	private $adminlogin = '';
    public function __construct() {
        parent::__construct();
    }

	public function index() {
		$user = session(MY_ID);
		if ((isset($user['userid']) || $user['userid'])) {
			redirect(U('Index/index'));
		} else {
			$this -> login();
		}
	}

	//验证登录信息
	public function login() {
		
		if (IS_POST) {
			$username = I('post.username');
			$pwd = I('post.password');
			$code = I('post.loginverify');
			if (empty($username) || empty($pwd) || empty($code)) {
				$this -> ajax_json('用户名、密码、验证码为必填');
				exit();
			}
			$Verify = new \Think\Verify();
			$code = $Verify -> check($code, 1);
			if (!$code) {
				$this -> ajax_json('验证码错误');
				exit();
			} else {
				$mod = M('admin');
				$res = $mod -> where(array('username' => $username)) -> find();
				if (!$res) {
					$this -> ajax_json('用户名不存在');
					exit();
				}
				$info = $mod -> where(array('username' => $username)) -> find();
				if ($info['password'] !== md5($pwd)) {
					$this -> ajax_json('用户名或密码错误');
					exit();
				}
				//验证通过
				$session = array();
				$session['userid'] = $info['id'];
				$session['username'] = $info['username'];
				$session['userpass'] = $info['password'];
				$session['userrole'] = M('auth')->where('id='.$info['roleid'])->getField('auth');
				$session['userissys'] = $info['is_system']?$info['is_system']:0;
				$session['userauth']  = M('auth')->where('id=' . $info['roleid'])->getField('name');
				session(MY_ID, $session);
				$data = array();
				$data['count'] = $info['count'] + 1;
				$data['lasttime'] = $info['logintime'];
				$data['logintime'] = time();
				$result = $mod -> where(array('username' => $username)) -> save($data);
				if ($result) {
					$this -> adminLog($info['username'], '登录成功!');
					$this -> ajax_json('登陆成功', 1);
				}

			}
		} else {
			session(MY_ID, F($this->adminlogin));
            $user = session(MY_ID);
            if ( (isset($user['userid']) || $user['userid']) ) {
                redirect(U('Index/index'));
            } 
		}
		$this -> display();
	}

	//验证码
	public function getVerify() {
		ob_clean();
		$Verify = new \Think\Verify();
		$Verify -> length = 4;
		$Verify -> fontSize = 16;
		//$Verify->useCurve = false;
		$Verify -> codeSet = '0123456789';
		$Verify -> fontttf = '4.ttf';
		$Verify -> useNoise = false;
		//$Verify->useImgBg = true;
		return $Verify -> entry(1);
	}

	//登录成功后，写入管理员日志
	public function adminLog($username, $action) {
		$data = array();
		$data['ip'] = get_client_ip();
		$data['username'] = $username;
		$data['action'] = $action;
		$data['createtime'] = time();
		$res = M('adminlog') -> add($data);
	}

	//登出
	public function loginOut() {
		unset($_SESSION[MY_ID]);
		$this -> success('注销成功', U('Login/login'));
	}

}
