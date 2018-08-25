<?php
namespace Home\Controller;
use Common\Component\DisasterService;
use Common\Component\DataService;
use Common\Component\ArrayHelper;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
//        $warn = DataService::all_warning_result();
        $now = date('Y-m-d H');
        $now = $now . ':00:00.000';
        $day1 = date('Y-m-d');
        $day = $day1 . ' 00:00:00.000';
        $now = '2017-10-09 19:00:00.000';
//        print_r($now);die;

        $livewarn = DisasterService::baojing($now);
        $yujing = DisasterService::yujing($day);

        $stlist = DataService::GetLandStation();

        $yesterday1 = date("Y-m-d", strtotime("-1 day"));
        $yesterday1 = $yesterday1 . ' ' . '12:00:00';
//        print_r($yesterday1);die;

        $yesterday1 = '2018-08-23 12:00:00';
        $res = DataService::weather_rp("53446", $yesterday1);

        $sky = DataService::weather_sky("53446", $yesterday1);

        $res = json_encode($res);

        $this->sky = $sky;
        $this->stlist = $stlist;
        $this->wrp = $res;
        $this->day = $day1;
        $this->livewarn = $livewarn;
        $this->yujing = $yujing;
        $this->display();
    }

    public function getdata() {
        if (IS_POST) {
            $data = I('post.');
//            print_r($data);die;
            if ($data['sdate']) {
                $y = date("Y-m-d",(strtotime($data['sdate']) - 3600*24)). " ".'12:00:00';
            }
//            print_r($y);die;
            $res = DataService::weather_rp($data['station'], $y);

            $sky = DataService::weather_sky($data['station'], $y);
            if ($sky || $res) {
                $this->ajaxReturn(['status' => true, 'res' => $res, 'sky' => $sky,
                    'sdate' => $data['sdate']]);
            } else {
                $this->ajaxReturn(['status' => false, 'info' => '全部没数据']);
            }
        } else {
            $this->error('非法操作');
            $this->redirect('/');
        }
    }
}