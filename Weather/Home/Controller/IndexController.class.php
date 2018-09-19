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
        //$now = '2017-10-09 19:00:00.000';
       // print_r($now);die;
        $s = date('Y-m-d');
        $livewarn = DisasterService::baojing($s);
        // print_r($livewarn);die;
        $yujing = DisasterService::yujing($day);
        // print_r($livewarn);die;

        $stlist = DataService::GetLandStation();

        $yesterday1 = date("Y-m-d", strtotime("-1 day"));
        $yesterday1 = $yesterday1 . ' ' . '12:00:00';
//        print_r($yesterday1);die;
        $snow = date("Y-m-d", strtotime("+1 day"));

        // $yesterday1 = '2018-08-23 12:00:00';
        $bnow = date('Y-m-d');
        $res = DataService::weather_rp("53446", $bnow);
        $res_feature = DataService::weather_rpt("53446", $snow);
        $sky = DataService::weather_sky("53446", $yesterday1);

        $res = json_encode($res);
//        $res_feature = json_encode($res_feature);
       // print_r($res_feature);die;
        $this->stlocation = "包头市";
        $this->st = "53446";
        $this->sky = $sky;
        $this->s = $s;
        $this->stlist = $stlist;
        $this->wrp = $res;
        $this->res_f = $res_feature;
        $this->day = $day1;
        $this->livewarn = $livewarn;
        $this->yujing = $yujing;
        $this->display();
    }

    public function show_table() {
        if (IS_POST) {
            $now = I("post.sdate1");
            $day1 = $now;
            $st = I("post.station");
            $now = $now . ':00:00.000';
            $day = $day1 . ' 00:00:00.000';
            // $now = '2017-10-09 19:00:00.000';
//        print_r($now);die;

            $livewarn = DisasterService::baojing($now);
            $yujing = DisasterService::yujing($day);

            $stlist = DataService::GetLandStation();

            $yesterday1 = date("Y-m-d",(strtotime($day1) - 3600*24));
            $yesterday1 = $yesterday1 . ' ' . '12:00:00';
//        print_r($yesterday1);die;

            // $yesterday1 = '2018-08-23 12:00:00';////上线注释
            $res = DataService::weather_rp($st, $yesterday1);
            $res_feature = DataService::weather_rpt($st, $yesterday1);
            $sky = DataService::weather_sky($st, $yesterday1);
        } else {
            $now = date('Y-m-d H');
            $now = $now . ':00:00.000';
            $day1 = date('Y-m-d');
            $day = $day1 . ' 00:00:00.000';
            // $now = '2017-10-09 19:00:00.000';
//        print_r($now);die;

            $livewarn = DisasterService::baojing($now);
            $yujing = DisasterService::yujing($day);

            $stlist = DataService::GetLandStation();

            $yesterday1 = date("Y-m-d", strtotime("-1 day"));
            $yesterday1 = $yesterday1 . ' ' . '12:00:00';
//        print_r($yesterday1);die;
        $snow = date("Y-m-d", strtotime("+1 day"));

        // $yesterday1 = '2018-08-23 12:00:00';
        $bnow = date('Y-m-d');
            // $yesterday1 = '2018-08-23 12:00:00';
            $res = DataService::weather_rp("53446", $bnow);
            $res_feature = DataService::weather_rpt("53446", $snow);
            $sky = DataService::weather_sky("53446", $yesterday1);

        }
//        print_r($day1);die;
        $this->stlocation = "包头市";
        $this->st = "53446";
        $this->sky = $sky;
        $this->stlist = $stlist;
        $this->res = $res;
        $this->res_f = $res_feature;
        $this->day1 = $day1;
        $this->livewarn = $livewarn;
        $this->yujing = $yujing;
        $this->display();
    }

    public function getdata() {
        if (IS_POST) {
            $data = I('post.');
           // print_r($data);die;
            if ($data['sdate']) {
                $y = date("Y-m-d",(strtotime($data['sdate'])));
            }
            $snow = date("Y-m-d", strtotime("+1 day"));

        // $yesterday1 = '2018-08-23 12:00:00';
            
            $res = DataService::weather_rp($data['station'], $y);
            $res_feature = DataService::weather_rpt($data['station'], $snow);
//            print_r($res_feature);die;
            $t = DataService::GetLandStationDt()[$data['station']];

            $sky = DataService::weather_sky($data['station'], $y);
            if ($sky || $res || $res_feature) {
                $this->ajaxReturn(['status' => true, 'res' => $res, 'sky' => $sky,
                    'resf' => $res_feature,
                    'sdate' => $data['sdate'],
                    'slocation' => $t]);
            } else {
                $this->ajaxReturn(['status' => false, 'info' => '全部没数据']);
            }
        } else {
            $this->error('非法操作');
            $this->redirect('/');
        }
    }


}