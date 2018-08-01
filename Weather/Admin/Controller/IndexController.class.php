<?php
/**
 * @Email fadeblack307@163.com
 * @copyright Copyright (c) 2015 Jigsaw.
 */

namespace Admin\Controller;
//use Common\Component\MemberService;
use Think\Controller;


class IndexController extends CommonController {
    public function __construct() {
        parent::__construct();

        $this->nav = "home"; //应该激活左侧导航哪个nav
    }

    /**
     * 首页
     *
     * @return void
     */
    public function index() {
        $this->display();
    }
}
