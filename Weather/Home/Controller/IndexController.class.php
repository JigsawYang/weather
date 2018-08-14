<?php
namespace Home\Controller;
use Common\Component\DisasterService;
use Common\Component\MemberService;
use Common\Component\DataService;
use Common\Component\ArrayHelper;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
        $warn = DataService::all_warning_result();
        $now = date('Y-m-d H');
        $now = $now . ':00:00.000';
        $day = date('Y-m-d');
        $day = $day . ' 00:00:00.000';
        $now = '2017-10-09 19:00:00.000';
//        print_r($now);die;
        $livewarn = DisasterService::baojing($now);
        $yujing = DisasterService::yujing($day);

//        print_r($yujing);die;
        $this->livewarn = $livewarn;
        $this->yujing = $yujing;
        $this->warn = $warn;
        $this->display();
    }
}