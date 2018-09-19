<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/31
 * Time: 14:38
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class WarningController extends CommonController {
    public function index() {
        session("download", null);

//        $day = date('Y-m-d');//实际上线时候 吧这个注释去掉
//        $hour = date('H');
//        $now = $day.' '.$hour;
        $now = date('Y-m-d H:i');
        $a = substr($now, 0, -1);
        $now = $a.'0';
//        print_r($now);die;
        if (date('H') > 20) {
            $now1 = date('Y-m-d');
            $yesterday1 = date("Y-m-d",strtotime("-1 day"));
           // $now1 = '2015-06-01';
            //$yesterday1 = '2015-05-31';
        } else {
            $now1 = date("Y-m-d",strtotime("-1 day"));
            $yesterday1 = date("Y-m-d",strtotime("-2 day"));
            //$now1 = '2015-06-01';
            //$yesterday1 = '2015-05-31';
        }
         //$now = '2015-06-01 09:20';
         //$day = '2015-06-01';
        $stlist = DataService::GetStation();
        if (IS_POST) {
//            $now = I("post.sdate1");
//            $day = $now;
            $st = I("post.station");
//            print_r($now);die;
//            $yesterday1 = date("Y-m-d",(strtotime($now) - 3600*24));
            // print_r($now);print_r($yesterday1);die;
            // print_r($st);die;
//            $now1 = $now . ' '.'09';
//            print_r($now);print_r($now1);print_r($yesterday1);die;
            $cold = DataService::Warning_cold($now, $st);
            $hot = DataService::Warning_hot($now, $st);
            $airdry = DataService::Warning_airdry($yesterday1, $now1, $st);
            $landdry = DataService::Warning_landdry($yesterday1, $now1, $st);
            $airwet = DataService::Warning_airwet($yesterday1, $now1, $st);
            $landwet = DataService::Warning_landwet($yesterday1, $now1, $st);
            $sun = DataService::Warning_sun($yesterday1, $now1, $st);
            // print_r($sun);die;
            $station = DataService::GetStationDt()[$st];
        } else {
//                        print_r($now);print_r($now1);print_r($yesterday1);die;
            $cold = DataService::Warning_cold($now, 'N0001');
            $hot = DataService::Warning_hot($now, 'N0001');

            $airdry = DataService::Warning_airdry($yesterday1, $now1, 'N0001');
            $landdry = DataService::Warning_landdry($yesterday1, $now1, 'N0001');
            $airwet = DataService::Warning_airwet($yesterday1, $now1, 'N0001');
            $landwet = DataService::Warning_landwet($yesterday1, $now1, 'N0001');
            $sun = DataService::Warning_sun($yesterday1, $now1, 'N0001');
//            print_r($airwet);die;

            $station = DataService::GetStationDt()['N0001'];
        }

//        if (!$st) {
//            $cold = DataService::Warning_cold($now, 'N0001');
//            $hot = DataService::Warning_hot($now, 'N0001');
//            $airdry = DataService::Warning_airdry($yesterday1, $now1, 'N0001');
//            $landdry = DataService::Warning_landdry($yesterday1, $now1, 'N0001');
//            $airwet = DataService::Warning_airwet($yesterday1, $now1, 'N0001');
//            $landwet = DataService::Warning_landwet($yesterday1, $now1, 'N0001');
//            $sun = DataService::Warning_sun($yesterday1, $now1, 'N0001');
//            $station = DataService::$station_dict['N0001'];
////            print_r($cold);
////            print_r($airwet);die;
//        } else {
//            $cold = DataService::Warning_cold($now, $st);
//            $hot = DataService::Warning_hot($now, $st);
//            $airdry = DataService::Warning_airdry($yesterday1, $now1, $st);
//            $landdry = DataService::Warning_landdry($yesterday1, $now1, $st);
//            $airwet = DataService::Warning_airwet($yesterday1, $now1, $st);
//            $landwet = DataService::Warning_landwet($yesterday1, $now1, $st);
//            $sun = DataService::Warning_sun($yesterday1, $now1, $st);
//            $station = DataService::$station_dict[$st];
//        }
        // print_r($hot);die;
        $this->stlist = $stlist;
        $this->cold = $cold;
        $this->hot = $hot;
        $this->airdry = $airdry;
        $this->landdry = $landdry;
        $this->airwet = $airwet;
        $this->landwet = $landwet;
        $this->sun = $sun;
        $this->st = $st;
        $this->day = $day;
        $this->station = $station;
        $this->now = $now;
        $this->display();
    }

    public function sbaojing() {
        $now = date('Y-m-d H:i');
        $a = substr($now, 0, -1);
        $now = $a.'0';
//        print_r($now);die;
        if (date('H') > 20) {
            $now1 = date('Y-m-d');
            $yesterday1 = date("Y-m-d",strtotime("-1 day"));
            //$now1 = '2015-06-01';
            //$yesterday1 = '2015-05-31';
        } else {
            $now1 = date("Y-m-d",strtotime("-1 day"));
            $yesterday1 = date("Y-m-d",strtotime("-2 day"));
            //$now1 = '2015-06-01';
           // $yesterday1 = '2015-05-31';
        }
       // $now = '2015-06-01 09:20';
        if (IS_POST) {
//            $now = I("post.sdate1");
//            $day = $now;
            $st = I("post.station");
//            print_r($now);die;
//            $yesterday1 = date("Y-m-d",(strtotime($now) - 3600*24));
            // print_r($now);print_r($yesterday1);die;
//             print_r($st);die;
//            $now1 = $now . ' '.'09';
//            print_r($now);print_r($now1);print_r($yesterday1);die;
            $cold = DataService::Warning_cold($now, $st);
            $hot = DataService::Warning_hot($now, $st);
            $airdry = DataService::Warning_airdry($yesterday1, $now1, $st);
            $landdry = DataService::Warning_landdry($yesterday1, $now1, $st);
            $airwet = DataService::Warning_airwet($yesterday1, $now1, $st);
            $landwet = DataService::Warning_landwet($yesterday1, $now1, $st);
            $sun = DataService::Warning_sun($yesterday1, $now1, $st);
            // print_r($sun);die;
            $this->ajaxReturn(['status' => true, 'cold' => $cold, 'hot' => $hot,
                                'airdry' => $airdry, 'airwet' => $airwet,
                                'landdry' => $landdry, 'landwet' => $landwet,
                                'sun' => $sun]);

        } else {
            $this->ajaxReturn(['status' => false, 'info' => '必须POST请求']);

        }
    }

    public function feature() {
        session("download", null);
        $nows = date("Y-m-d");
        $now = $nows." "."00:00:00.000";
        //$now = '2017-06-20 00:00:00.000'; //注释

        $stlist = DataService::GetStation();
        $stdt = DataService::GetStationDt();

        $n = date("Y-m-d",strtotime("-1 day"));
        $no = $n." "."00:00:00.000";
        //$no ='2017-06-20 00:00:00.000'; //注释
        if (IS_POST) {
//            $nows = I("post.sdate1");
            $st = I("post.satid");
//            $now = $nows." "."00:00:00.000";

//            print_r($nows);die;
            $res = DataService::NewFeature($no, $st);

            $station = DataService::GetStationDt()[$st];
//            print_r($station);die;
            $cold = DataService::Fwarning_cold($now, $st);
            $hot = DataService::Fwarning_hot($now, $st);
            $sun = DataService::Fwarning_sun($now, $st);

        } else {
            $res = DataService::NewFeature($no, 'N0001');
//            print_r($res);die;
            $station = $stdt['N0001'];
            $cold = DataService::Fwarning_cold($now, "N0001");
            $hot = DataService::Fwarning_hot($now, 'N0001');
            $sun = DataService::Fwarning_sun($now, 'N0001');
            $station = ['包头', '厚墙体Ⅱ'];
            $st = 'N0001';
        }
//        if (!$st) {
//            $cold = DataService::Fwarning_cold($y, $m, $d, '包头');
//            $hot = DataService::Fwarning_hot($y, $m, $d, '包头');
//            $sun = DataService::Fwarning_sun($y, $m, $d, '包头');
//            $station = '包头';
//        } else {
//            $station = DataService::$distruct[$st];
//            $cold = DataService::Fwarning_cold($y, $m, $d, $station);
//            $hot = DataService::Fwarning_hot($y, $m, $d, $station);
//            $sun = DataService::Fwarning_sun($y, $m, $d, $station);
//        }
        $this->no = $n;
        $this->res = $res;
        $this->stlist = $stlist;
        $this->cold = $cold;
        $this->hot = $hot;
        $this->sun = $sun;
        $this->station = $station;
        $this->st = $st;
        $this->now = $nows;
        $this->display();

    }

    public function syujing() {
        $nows = date("Y-m-d");
        $now = $nows . " " . "00:00:00.000";
       // $now = '2017-06-20 00:00:00.000'; //注释


        $n = date("Y-m-d", strtotime("-1 day"));
        $no = $n . " " . "00:00:00.000";
       // $no = '2017-06-20 00:00:00.000'; //注释
        if (IS_POST) {
            $st = I("post.satid");
            $res = DataService::NewFeature($no, $st);

            $cold = DataService::Fwarning_cold($now, $st);
            $hot = DataService::Fwarning_hot($now, $st);
            $sun = DataService::Fwarning_sun($now, $st);
            $this->ajaxReturn(['status' => true, 'res' => $res,
                                'cold' => $cold, 'hot' => $hot,
                                'sun' => $sun]);

        } else {
            $this->ajaxReturn(['status' => false, 'info' => '必须POST请求']);

        }
    }
}