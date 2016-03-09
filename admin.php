<?php
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',     true);
// 绑定访问Admin模块
define('BIND_MODULE',   'Admin');
// 定义后台参数
define('MY_ID',         'myadmin');
// 定义应用目录
define('APP_PATH','./Application/');
require './ThinkPHP/ThinkPHP.php';
?>