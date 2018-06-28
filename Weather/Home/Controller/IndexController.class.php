<?php
namespace Home\Controller;
use Common\Component\MemberService;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
}