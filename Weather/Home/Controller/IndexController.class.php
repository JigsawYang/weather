<?php
namespace Home\Controller;
use Common\Component\MemberService;
use Common\Component\DataService;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
        $warn = DataService::all_warning_result();

//        print_r($warn);die;
        $this->warn = $warn;
        $this->display();
    }
}