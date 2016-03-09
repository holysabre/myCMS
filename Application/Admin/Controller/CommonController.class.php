<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

    public $language = array();
    public function __construct() {
        parent::__construct();
        defined('MY_ID') or define('MY_ID', 'myadmin');
        define('MY_AUTH_KEY', ',5GX!N)&mbO}Wjo#;:1da4+wZ=$T%?p<LvzU06Vt'); //加密KEY
    }
    
    /**
     * 纯ajax方式 
     *
     * @access public
     * @param string    $message 内容
     * @param integer   $status  状态 默认 0,1
     * @param array     $data    数组
     * @param string    $dialog  弹窗
     * @param string    $url     url
     * @param integer   $id      数字
     * @return string
     */
    public function ajax_json($message = '', $status = 0, $data = '', $dialog = '', $url = '', $id = '') {
        $_data = array();
        $_data['message'] = $message;
        $_data['status']  = $status;
        $_data['data']    = $data;
        $_data['dialog']  = $dialog;
        $_data['url']     = $url;
        $_data['id']      = $id;
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($_data));
    }

    /**
     * 若非ajax方式访问,则以HTML输出,基于非弹窗模式
     *
     * @access public
     * @param string    $message 内容
     * @param integer   $status  状态 默认 0,1
     * @param string    $url     url
     * @return string
     */
    public function ajax_check($message = '', $status = 0, $url = '') {
        IS_AJAX && $this->ajax_json($message, $status, '', '', $url);
        $status == 1 ? $this->success($message, $url) : $this->error($message, $_url);
    }
    
    /**
     * 若非ajax方式访问,则以HTML输出,基于弹窗模式
     * @access public
     * @param string    $message 内容
     * @param integer   $status  状态 默认 0,1
     * @param array     $data    数组
     * @param string    $dialog  弹窗
     * @param string    $url     url
     * @return string
     */
    public function ajax_dialog($message = '', $status = 0, $data = '', $dialog = '', $url = '') {
        IS_AJAX && $this->ajax_json($message, $status, $data, $dialog, $url);
        $status == 1 ? $this->success($message, $url) : $this->error($message, $url);
    }
    
}
