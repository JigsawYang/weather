<?php
/**
 * @Email fadeblack307@163.com
 * @copyright Copyright (c) 2015 Jigsaw.
 */

$arr = array(
    'MODULE_ALLOW_LIST'    => array('Home', 'Admin'),
    'DEFAULT_MODULE'         => 'Home', //默认模块
    'URL_MODEL'                    => '2',
    'URL_CASE_INSENSITIVE' => false,

    'SHOW_PAGE_TRACE' => APP_DEBUG,//显示调试信息
    'TMPL_PARSE_STRING'  =>array(
        '__ASSETS__' => '/Public/assets',
        '__DOWN__' => '/Public/upload/',
        '__ICON__' => '/Public/assets/images/ICON/'
    ),
    'DOC' => array(
        'mimes' => array('image/jpeg', 'image/png', 'image/jpg'),
        'maxSize' => 2 * 1024 * 1024,
        'exts' => array('png', 'jpg', 'jpeg'),
        'autoSub' => true,
        'subName' => 'adv',
        'rootPath' => './Public/upload/',
        'savePath' => '',
        'saveName' => time().'_'.mt_rand()
    ),
    'DNAME' => 'nqdb-new'

);
return array_merge($arr, $GLOBALS['appConf']);
