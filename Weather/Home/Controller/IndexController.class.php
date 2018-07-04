<?php
namespace Home\Controller;
use Common\Component\MemberService;
use Common\Component\DataService;
use Common\Component\ArrayHelper;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
        $warn = DataService::all_warning_result();

        $this->warn = $warn;
        $this->display();
    }
}