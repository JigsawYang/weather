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

        $day = date('Y-m-d');//实际上线时候 吧这个注释去掉
        $hour = date('H');
        $now = $day.' '.$hour;
        if (date('H') > 20) {
            $now1 = date('Y-m-d');
            $yesterday1 = date("Y-m-d",strtotime("-1 day"));
            $now1 = '2015-06-01';
            $yesterday1 = '2015-05-31';
        } else {
            $now1 = date("Y-m-d",strtotime("-1 day"));
            $yesterday1 = date("Y-m-d",strtotime("-2 day"));
            $now1 = '2015-06-01';
            $yesterday1 = '2015-05-31';
        }
         $now = '2015-06-01 09';
         $day = '2015-06-01';
        $stlist = DataService::GetStation();
        if (IS_POST) {
            $now = I("post.sdate1");
            $day = $now;
            $st = I("post.station");
//            print_r($now);die;
            $yesterday1 = date("Y-m-d",(strtotime($now) - 3600*24));
            // print_r($now);print_r($yesterday1);die;
            // print_r($st);die;
            $now1 = $now . ' '.'09';
//            print_r($now);print_r($now1);print_r($yesterday1);die;
            $cold = DataService::Warning_cold($now1, $st);
            $hot = DataService::Warning_hot($now1, $st);
            $airdry = DataService::Warning_airdry($yesterday1, $now, $st);
            $landdry = DataService::Warning_landdry($yesterday1, $now, $st);
            $airwet = DataService::Warning_airwet($yesterday1, $now, $st);
            $landwet = DataService::Warning_landwet($yesterday1, $now, $st);
            $sun = DataService::Warning_sun($yesterday1, $now, $st);
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

    public function feature() {
        session("download", null);
        $nows = date("Y-m-d");
        $now = $nows." "."00:00:00.000";
        $now = '2014-11-18'; //注释
        $y = '2014';
        $m = '11';
        $d = '18';
        $st = I('get.station');//**
        $stlist = DataService::GetStation();
        if (IS_POST) {
            $nows = I("post.sdate1");
            $st = I("post.station");
            $now = $nows." "."00:00:00.000";

//            print_r($now);print_r($st);die;
            $station = DataService::GetStationDt()[$st];
            $cold = DataService::Fwarning_cold($now, $st);
            $hot = DataService::Fwarning_hot($now, $st);
            $sun = DataService::Fwarning_sun($now, $st);
        } else {
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

        $this->stlist = $stlist;
        $this->cold = $cold;
        $this->hot = $hot;
        $this->sun = $sun;
        $this->station = $station;
        $this->st = $st;
        $this->now = $now;
        $this->display();

    }
}