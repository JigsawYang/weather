<?php


@$GLOBALS['appConf'] = require_once '../Envs/config.php';
if (!defined('APP_DEBUG')) {
    exit();
}
if (!APP_DEBUG) {
    error_reporting(0);
}

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');// 检测PHP环境
define('APP_PATH','../Weather/');// 定义应用目录
require '../ThinkPHP/ThinkPHP.php';// 引入ThinkPHP入口文件
